<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
                     <input type="email" id="loginEmail" name="email"placeholder="Fill Your Email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password"name="password" placeholder="Create a password" required>
                </div>
                
               <button type="submit" class="login-button">Masuk</button>
                <div class="toggle-form">
                    <p>Belum punya akun? <a href="{{ url('/register') }}" style="text-decoration: none;">Daftar di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>