<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
    <link rel="stylesheet" href="/login_styles/login.css">
</head>
<body>
    <div class="container">
        <!-- Login Form -->
        <div id="login-form">
            <h1>Login</h1>
            <form action="/actionLogin" method="POST">
                @csrf
                <input type="text" name="loginname" placeholder="Username">
                <input type="email" name="loginemail" placeholder="Email">
                <input type="password" name="loginpassword" placeholder="Password">
                <button>Login</button>
            </form>
            <p class="switch-text">
                Belum punya akun? 
                <a href="#" onclick="showRegister()">Daftar di sini</a>
            </p>
        </div>

        <!-- Register Form (hidden by default) -->
        <div id="register-form" style="display: none;">
    <h1>Register</h1>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #842029; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul style="margin:0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/actionRegister" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password">
        <button>Register</button>
    </form>
    <p class="switch-text">
        Sudah punya akun? 
        <a href="#" onclick="showLogin()">Login di sini</a>
    </p>
</div>
    </div>

    <script>
        function showRegister() {
            document.getElementById("login-form").style.display = "none";
            document.getElementById("register-form").style.display = "block";
        }

        function showLogin() {
            document.getElementById("register-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";
        }
    </script>
</body>
<script>

    @if ($errors->any())
        document.getElementById("login-form").style.display = "none";
        document.getElementById("register-form").style.display = "block";
    @endif
</script>
</html>
