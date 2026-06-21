<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verifikasi OTP - Smart Umrah</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body{ background:#f5f5f5; font-family:'Segoe UI',sans-serif; }
    .container-box{ min-height:100vh; display:flex; justify-content:center; align-items:center; }
    .card-box{ width:100%; max-width:420px; background:white; padding:35px; border-radius:20px; box-shadow:0 5px 20px rgba(0,0,0,.08); }
    .logo{ text-align:center; margin-bottom:30px; }
    .logo h1{ color:#0c8a63; font-weight:700; }
    .logo p{ color:#777; }
    .title{ font-size:1.4rem; color:#111827; font-weight:700; }
    .subtitle{ color:#6b7280; margin-bottom:25px; }
    .otp-box{ display:flex; justify-content:space-between; gap:10px; margin-bottom:25px; }
    .otp-box input{ width:70px; height:70px; border-radius:16px; border:1px solid #ccc; text-align:center; font-size:28px; font-weight:bold; }
    .otp-box input:focus{ outline:none; border-color:#0c8a63; box-shadow:0 0 0 3px rgba(12,138,99,.15); }
    .btn-submit{ width:100%; height:50px; border:none; border-radius:12px; background:#0c8a63; color:white; font-weight:600; }
    .btn-submit:hover{ background:#087554; }
    .resend{ margin-bottom:25px; text-align:center; }
    .resend a{ color:#0c8a63; text-decoration:none; font-weight:600; }
</style>
</head>
<body>

<div class="container-box">
<div class="card-box">

<div class="logo">
    <h1>Smart Umrah</h1>
    <p>Perjalanan Spiritual Anda</p>
</div>

<h3 class="title">Verifikasi Kode OTP</h3>
<p class="subtitle">Masukkan 4 digit kode yang dikirim ke email Anda.</p>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form action="{{ route('verify.otp.post') }}" method="POST">
    @csrf

    <div class="otp-box">
        <input type="text" name="otp1" maxlength="1" inputmode="numeric" required autofocus>
        <input type="text" name="otp2" maxlength="1" inputmode="numeric" required>
        <input type="text" name="otp3" maxlength="1" inputmode="numeric" required>
        <input type="text" name="otp4" maxlength="1" inputmode="numeric" required>
    </div>

    <div class="resend">
        Tidak menerima kode? <a href="{{ route('forgot.password') }}">Kirim ulang</a>
    </div>

    <button type="submit" class="btn-submit">Verifikasi</button>
</form>

</div>
</div>

<script>
// Auto-advance antar input OTP
const inputs = document.querySelectorAll('.otp-box input');
inputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        if (input.value.length === 1 && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
    });
    input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
            inputs[index - 1].focus();
        }
    });
});
</script>

</body>
</html>
