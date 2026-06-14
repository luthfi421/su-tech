<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verifikasi OTP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
    font-family:'Segoe UI',sans-serif;
}

.container-box{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card-box{
    width:100%;
    max-width:420px;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.logo{
    text-align:center;
    margin-bottom:30px;
}

.logo h1{
    color:#0c8a63;
    font-weight:700;
}

.logo p{
    color:#777;
}

.title{
    font-size:18px;
    color:#111827;
    font-weight:700;
}

.subtitle{
    color:#6b7280;
    margin-bottom:25px;
}

.otp-box{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
}

.otp-box input{
    width:60px;
    height:60px;
    border-radius:50%;
    border:1px solid #ccc;
    text-align:center;
    font-size:24px;
    font-weight:bold;
}

.btn-submit{
    width:100%;
    height:50px;
    border:none;
    border-radius:12px;
    background:#0c8a63;
    color:white;
    font-weight:600;
}

.btn-submit:hover{
    background:#087554;
}

.resend{
    margin-bottom:25px;
}

.resend a{
    color:#ff5e57;
    text-decoration:none;
}
</style>

</head>
<body>

<div class="container-box">

<div class="card-box">

<div class="logo">
    <h1>Smart Umrah</h1>
    <p>Perjalanan Spiritual Anda</p>
</div>

<h3 class="title">Masuk ke Akun Anda</h3>

<p class="subtitle">
    verification<br>
    enter verification code
</p>

<p>Email : {{ session('email') }}</p>
<p>OTP : {{ session('otp') }}</p>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="/verify-otp" method="POST">
    @csrf

<div class="otp-box">
    <input type="text" name="otp1" maxlength="1">
    <input type="text" name="otp2" maxlength="1">
    <input type="text" name="otp3" maxlength="1">
    <input type="text" name="otp4" maxlength="1">
</div>

<div class="resend">
    If you didn't receive a code,
    <a href="#">Resend</a>
</div>

<button class="btn-submit">
    Kirim
</button>

</form>

</div>

</div>

</body>
</html>