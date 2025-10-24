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
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="registerPassword" name="password" placeholder="Create Password" required>
    </div>
    
    <div class="form-group">
        <label for="registerConfirmPassword">Confirm Password</label>
        <input type="password" id="registerConfirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
    </div>
    
    <button type="submit" class="login-button">Daftar</button>
</form>
                <div class="toggle-form">
                    <p>Sudah punya akun? <a href="{{ url('/login') }}" style="text-decoration: none;">Masuk di sini</a></p>
                </div>
        </div>
    </div>
  
</body>
</html>