<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | aviaLink</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Travel the world with aviaLink</h1>
            <p>Get Your Ticket!</p>
        </div>
        
        <div class="right-panel">
            <h2>Create Account</h2>
            <form action="{{ route('register.post') }}" method="POST" class="login-form" id="registerForm">
                @csrf

                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="registerName" name="name" placeholder="Your Full Name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="registerEmail" name="email" placeholder="Fill Your Email" required>
                </div>
                
                <div class="form-group" style="position: relative;">
                    <label for="registerPassword">Password</label>
                    <input type="password" id="registerPassword" name="password" placeholder="Create Password" required style="padding-right: 40px;">
                    <span class="password-toggle" onclick="togglePassword('registerPassword', this)" style="position: absolute; right: 10px; top: 55%; transform: translateY(-50%); cursor: pointer; font-size: 18px;">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                
                <div class="form-group" style="position: relative;">
                    <label for="registerConfirmPassword">Confirm Password</label>
                    <input type="password" id="registerConfirmPassword" name="password_confirmation" placeholder="Confirm Password" required style="padding-right: 40px;">
                    <span class="password-toggle" onclick="togglePassword('registerConfirmPassword', this)" style="position: absolute; right: 10px; top: 55%; transform: translateY(-50%); cursor: pointer; font-size: 18px;">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                
                <button type="submit" class="login-button">Daftar</button>
            </form>

            <div class="toggle-form">
                <p>Sudah punya akun? <a href="{{ url('/login') }}" style="text-decoration: none;">Masuk di sini</a></p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, element) {
            const passwordInput = document.getElementById(inputId);
            const icon = element.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
