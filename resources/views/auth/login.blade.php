<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="{{ asset('css/login.css') }}">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
     <div class="container">
        <div class="left-panel">
            <div class="left-panel-content">
                <h1>Welcome to aviaLink</h1>
                <p>Get Your ticket now!</p>
            </div>
        </div>
        
        <div class="right-panel">
            <h2>Create Account</h2>
            <form action="{{ route('login') }}"  method="POST" class="login-form" id="loginForm">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                     <input type="email" id="loginEmail" name="email" placeholder="Fill Your Email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" placeholder="Create a password" required style="padding-right: 40px;">
                        <span onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 20px;">
                             <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
                
               <button type="submit" class="login-button">Masuk</button>
                <div class="toggle-form">
                    <p>Belum punya akun? <a href="{{ url('/register') }}" style="text-decoration: none;">Daftar di sini</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
       function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('span i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

    </script>
</body>
</html>