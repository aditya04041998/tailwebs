<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwebs - Login Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="containers">
    <div class="form-container">
        <h3 class="up">Tailwebs</h3>
        <form id="loginForm" method="POST">
            <label for="unsername" class="input-label">Userame</label>
            <div class="input-group">
                <span class="icon">👤</span>
                <div class="vertical-divider"></div> 
                <input type="text" name="userid" id="userid" placeholder="Username" required>
            </div>
            <label for="password" class="input-label">Password</label>
            <div class="input-group">
                <span class="icon">🔒</span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="eye-icon" onclick="togglePassword()">👁️</span>
            </div>
            <a href="#" class="forgot-password">Forgot Password?</a><div>  
                
                <div class="input-group">
                    <p id="alert"></p>
                </div>  
            <button type="submit" class="submit-buttons">Submit</button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.querySelector('.eye-icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.textContent = '👁️‍🗨️'; 
        } else {
            passwordInput.type = 'password';
            eyeIcon.textContent = '👁️'; 
        }
    } 
</script>

<script src="assets/js/custom.js"></script>

</body>
</html>
