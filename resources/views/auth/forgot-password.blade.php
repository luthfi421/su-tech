<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Smart Umrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body{ background:#f5f5f5; font-family:'Segoe UI',sans-serif; display:flex; justify-content:center; align-items:center; min-height:100vh; }
        .card-box{ width:100%; max-width:420px; background:white; padding:40px 30px; border-radius:20px; box-shadow:0 5px 20px rgba(0,0,0,.08); }
        .logo{ text-align:center; margin-bottom:30px; }
        .logo h1{ color:#0c8a63; font-weight:700; }
        .logo p{ color:#777; margin-top:-5px; }
        .title{ font-size:1.4rem; font-weight:700; color:#1f2937; }
        .subtitle{ color:#6b7280; margin-bottom:24px; }
        .form-label{ font-weight:600; margin-bottom:8px; }
        .form-control{ height:50px; border-radius:12px; margin-bottom:16px; }
        .btn-submit{ width:100%; height:50px; background:#0c8a63; color:white; border:none; border-radius:12px; font-weight:600; }
        .btn-submit:hover{ background:#087554; }
        .back-link{ text-align:center; margin-top:18px; }
        .back-link a{ color:#0c8a63; font-weight:600; text-decoration:none; }
    </style>
</head>
<body>

<div class="card-box">

    <div class="logo">
        <h1>Smart Umrah</h1>
        <p>Perjalanan Spiritual Anda</p>
    </div>

    <h2 class="title">Lupa Kata Sandi?</h2>
    <p class="subtitle">Masukkan email akun Anda. Kami akan mengirimkan kode OTP untuk mereset password.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('forgot.password.send') }}" method="POST">
        @csrf

        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="nama@email.com"
               value="{{ old('email') }}" required autofocus>

        <button type="submit" class="btn-submit">Kirim Kode OTP</button>
    </form>

    <div class="back-link">
        <a href="{{ route('login') }}">&larr; Kembali ke Login</a>
    </div>

</div>

</body>
</html>
