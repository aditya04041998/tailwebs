<?php
session_start(); 

if (!isset($_SESSION['userid'])) {
    header("Location: login.php"); 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwebs Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>
<body>
    <div class="header-area">
    <header>
        <div class="nav-left">
            <h3 class="title">tailwebs.</h3>
        </div>
        <div class="nav-right">
            <div class="nav-actions">
                <span class="nav-item">Home</span>
                <span class="nav-item"><a href="api/logout.php">Logout</a></span>
            </div>
        </div>
    </header>
    </div>
    <div class="container">
        <table id="result">
            <thead>
                <tr>
                    <th style="width:100px;">Name</th>
                    <th style="width:150px;">Subject</th>
                    <th style="width:80px;">Mark</th>
                    <th style="width:50px;">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>


    <button class="add-button">Add Entry</button>

    <div class="popup-overlay"></div>
    <div class="popup">
        <span class="close-button">✖️</span>
        <div class="form-container">
        <form id="addForm" method="POST">
            <div class="input-group">
                <span class="icon">👤</span>
                <div class="vertical-divider"></div> 
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="input-group">
                <span class="icon">📘</span>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="input-group">
                <span class="icon">🎓</span>
                <input type="number" id="marks" name="marks" placeholder="mark" required>
            </div>  
            <div class="input-group">
                <p id="addAlert"></p>
            </div>  
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
    </div>

    <script>
        const actionButtons = document.querySelectorAll('.action-button');
        actionButtons.forEach(button => {
            button.addEventListener('click', () => {
                const menu = button.querySelector('.action-menu');
                menu.classList.toggle('show');
            });
        });


        const addButton = document.querySelector('.add-button');
        const popup = document.querySelector('.popup');
        const overlay = document.querySelector('.popup-overlay');
        const closeButton = document.querySelector('.close-button');

        addButton.addEventListener('click', () => {
            popup.classList.add('show');
            overlay.classList.add('show');
        });

        closeButton.addEventListener('click', () => {
            popup.classList.remove('show');
            overlay.classList.remove('show');
        });

        overlay.addEventListener('click', () => {
            popup.classList.remove('show');
            overlay.classList.remove('show');
        });

        document.getElementById('save-button').addEventListener('click', () => {
            const name = document.getElementById('name').value;
            const subject = document.getElementById('subject').value;
            const mark = document.getElementById('mark').value;
            console.log(`New Entry - Name: ${name}, Subject: ${subject}, Mark: ${mark}`);

            document.getElementById('name').value = '';
            document.getElementById('subject').value = '';
            document.getElementById('mark').value = '';
            popup.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>

    <script src="assets/js/custom.js"></script>

</body>
</html>
