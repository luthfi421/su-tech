<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Smart Umrah</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body{ background-color: #f5f5f5; font-family: 'Segoe UI', sans-serif; }
        .login-container{ min-height: 100vh; display:flex; justify-content:center; align-items:center; }
        .card-register{ width:100%; max-width:420px; background:white; padding:40px 30px; border-radius:20px; box-shadow:0 5px 20px rgba(0,0,0,0.08); }
        .logo{text-align:center; margin-bottom:25px}
        .logo h1{ color:#0c8a63; font-weight:700 }
        .logo p{ color:#777; margin-top:-5px }
        .title{ font-size:32px; font-weight:700; color:#1f2937 }
        .subtitle{ color:#6b7280; margin-bottom:20px }
        .form-label{ font-weight:600; margin-bottom:8px }
        .input-group{ margin-bottom:16px }
        .input-group-text{ background:white; border-right:none; border-radius:12px 0 0 12px }
        .form-control{ border-left:none; border-radius:0 12px 12px 0; height:50px }
        .form-control:focus{ box-shadow:none; border-color:#ced4da }
        .btn-register{ background:#0c8a63; color:white; width:100%; height:50px; border-radius:12px; border:none; font-weight:600 }
        .btn-register:hover{ background:#087554 }
        .login-link{text-align:center; margin-top:18px }
        .login-link a{ color:#0c8a63; font-weight:700; text-decoration:none }
        @media(max-width:500px){ .card-register{ border-radius:0; min-height:100vh; box-shadow:none } }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="card-register">

        <div class="logo">
            <h1>Smart Umrah</h1>
            <p>Perjalanan Spiritual Anda</p>
        </div>

        <h2 class="title">Daftar Akun Anda</h2>
        <p class="subtitle">Buat akun baru untuk mengelola pendaftaran umrah Anda</p>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <!-- Email -->
            <label class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <label class="form-label">Kata Sandi</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
            </div>

            <!-- Phone -->
            <label class="form-label">Nomor Handphone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxxx" value="{{ old('phone') }}" required>
            </div>

            <button type="submit" class="btn-register">Daftar</button>
        </form>

        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ url('/login') }}">Masuk</a></p>
        </div>

    </div>
</div>

</body>
</html>