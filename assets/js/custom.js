$(document).ready(function() {

// Login function start here 

$('#loginForm').on('submit', function(e) {
    e.preventDefault(); 

    $.ajax({
        type: 'POST',
        url: 'api/login.php', 
        data: $(this).serialize(), 
        success: function(response) {
            if(response == '200'){
                $('#alert').html('Login Successfully'); 
                $('#alert').css("color","green");
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 2000);

            }else{
                $('#alert').html('Failed to login'); 
                $('#alert').css("color","red");
            }
        },
        error: function() {
            $('#alert').html('Error in AJAX request.');
        }
    });
});


// Add a new record function start here    

$('#addForm').on('submit', function(e) {
    e.preventDefault(); 
    $.ajax({
        type: 'POST',
        url: 'api/add.php', 
        data: $(this).serialize(), 
        success: function(response) {
            if(response == '200'){
                $('#addAlert').html('Successfully ! Record has been added.'); 
                $('#addAlert').css("color","green");
                $('#result tbody').html('');
                fetchData();
                $('#addForm')[0].reset();
                setTimeout(function() {
                    $('#addAlert').html(''); 
                }, 2000);
            }else if(response == '300'){
                $('#addAlert').html('Failed ! Record with name and subject exist.'); 
                $('#addAlert').css("color","red");
                setTimeout(function() {
                    $('#addAlert').html(''); 
                }, 2000);
            }else{
                $('#addAlert').html('Failed ! Something went wrong.'); 
                $('#addAlert').css("color","red");
                setTimeout(function() {
                    $('#addAlert').html(''); 
                }, 2000);
            }
        },
        error: function() {
            $('#alert').html('Error in AJAX request.');
        }
    });
});

// Edit the record function start here


$('#result').on('click', '.editButton', function() {
    var id = $(this).data('id');
    alert('Not mention for edit design in pdf');
        // popup.classList.add('show');
        // overlay.classList.add('show');
    // if (confirm('Are you sure you want to delete this item?')) {
    //         $.ajax({
    //             url: 'api/delete.php?id=' + id, 
    //             type: 'GET', 
    //             success: function(response) {
    //                 if(response == '200'){
    //                     alert('Record deleted successfully!');
    //                     $('#result tbody').html('');
    //                     fetchData();
    //                 }else{
    //                     alert('Failed to delete!');
    //                 }
    //             },
    //             error: function(xhr) {
    //                 alert('Error deleting item: ' + xhr.responseText);
    //             }
    //         });
    //     }
    });

// Delete the record function start here

$('#result').on('click', '.alertButton', function() {
    var id = $(this).data('id');
    if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: 'api/delete.php?id=' + id, 
                type: 'GET', 
                success: function(response) {
                    if(response == '200'){
                        alert('Record deleted successfully!');
                        $('#result tbody').html('');
                        fetchData();
                    }else{
                        alert('Failed to delete!');
                    }
                },
                error: function(xhr) {
                    alert('Error deleting item: ' + xhr.responseText);
                }
            });
        }
    });



fetchData();
function fetchData(){
 $.ajax({
         url: 'api/fetchData.php', // Path to your PHP script
         method: 'GET',
         success: function(data) {
             let html = '';
             if(data != null){
                 $.each(data, function(index, item) {
                 const firstLetter = item.name.charAt(0); 
                 html += `<tr>
                  <td style="width:100px;"><div class="circle">${firstLetter}</div> ${item.name}</td>
                  <td style="width:150px;">${item.subject}</td>
                  <td style="width:80px;">${item.marks}</td>
                   <td style="width:50px;">
                                 <div class="action-button">
                                     ☰
                                     <div class="action-menu">
                                         <button id="editButton" class="editButton" data-id="${item.id}">Edit</button>
                                         <button id="alertButton" class="alertButton" data-id="${item.id}">Delete</button>
                                     </div>
                                 </div>
                             </td> 
                          </tr>`;
             });
             $('#result tbody').append(html);
             }else{
                 html += `<tr>
                  <td colspan=5 style="text-align:center;">No Record Found</td>
                             
                          </tr>`;
                 $('#result tbody').append(html);
             }
             
         },
         error: function(error) {
             $('#result tbody').append('<tr><td colspan="3">An error occurred while fetching data.</td></tr>');
         }
     });
}

});








    
