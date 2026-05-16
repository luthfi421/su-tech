<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Umrah</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body{
            background-color: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card{
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .logo{
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h1{
            color: #0c8a63;
            font-weight: 700;
        }

        .logo p{
            color: #777;
            margin-top: -5px;
        }

        .title{
            font-size: 36px;
            font-weight: 700;
            color: #1f2937;
        }

        .subtitle{
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-label{
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-group{
            margin-bottom: 20px;
        }

        .input-group-text{
            background: white;
            border-right: none;
            border-radius: 12px 0 0 12px;
        }

        .form-control{
            border-left: none;
            border-radius: 0 12px 12px 0;
            height: 50px;
        }

        .form-control:focus{
            box-shadow: none;
            border-color: #ced4da;
        }

        .remember-forgot{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-forgot a{
            text-decoration: none;
            color: #0c8a63;
            font-weight: 500;
        }

        .btn-login{
            background: #0c8a63;
            color: white;
            width: 100%;
            height: 50px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #087554;
        }

        .register{
            text-align: center;
            margin-top: 25px;
        }

        .register a{
            text-decoration: none;
            color: #0c8a63;
            font-weight: 700;
        }

        .admin-login{
            text-align: center;
            margin-top: 20px;
            color: #777;
        }

        .divider{
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #999;
        }

        .divider::before,
        .divider::after{
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider span{
            padding: 0 10px;
        }

        .google-btn{
            border: 1px solid #ddd;
            border-radius: 12px;
            height: 50px;
            width: 100%;
            background: white;
            font-weight: 500;
        }

        .google-btn i{
            color: red;
            margin-right: 10px;
        }

        @media(max-width: 500px){
            .login-card{
                border-radius: 0;
                min-height: 100vh;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="login-card">

        <!-- Logo -->
        <div class="logo">
            <h1>Smart Umrah</h1>
            <p>Perjalanan Spiritual Anda</p>
        </div>

        <!-- Title -->
        <h2 class="title">Masuk ke Akun Anda</h2>
        <p class="subtitle">
            Selamat datang kembali! Silakan masuk untuk melanjutkan
        </p>

        <!-- Form -->
        <form action="" method="POST">
            @csrf

            <!-- Email -->
            <label class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-regular fa-envelope"></i>
                </span>
                <input type="email"
                       class="form-control"
                       placeholder="nama@email.com">
            </div>

            <!-- Password -->
            <label class="form-label">Kata Sandi</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password"
                       class="form-control"
                       placeholder="Masukkan kata sandi">
            </div>

            <!-- Remember -->
            <div class="remember-forgot">
                <div>
                    <input type="checkbox">
                    <label>Ingat Saya</label>
                </div>

                <a href="#">Lupa Kata Sandi?</a>
            </div>

            <!-- Button -->
            <button type="submit" class="btn-login">
                Masuk
            </button>

        </form>

        <!-- Register -->
        <div class="register">
            <p>
                Belum punya akun?
                <br>
                <a href="#">Daftar</a>
            </p>
        </div>

        <!-- Admin -->
        <div class="admin-login">
            <i class="fa-solid fa-user-shield"></i>
            Login Admin
        </div>

        <!-- Divider -->
        <div class="divider">
            <span>atau</span>
        </div>

        <!-- Google -->
        <button class="google-btn">
            <i class="fa-brands fa-google"></i>
            Masuk dengan Google
        </button>

    </div>
</div>

</body>
</html>