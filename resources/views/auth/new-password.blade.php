<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Baru - Smart Umrah</title>

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
            padding:40px 30px;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .logo{
            text-align:center;
            margin-bottom:35px;
        }

        .logo h1{
            color:#0c8a63;
            font-weight:700;
        }

        .logo p{
            color:#777;
            margin-top:-5px;
        }

        .title{
            font-size:18px;
            font-weight:700;
            color:#1f2937;
        }

        .subtitle{
            color:#6b7280;
            margin-bottom:30px;
        }

        .form-label{
            font-weight:600;
            margin-bottom:8px;
        }

        .form-control{
            height:50px;
            border-radius:12px;
        }

        .btn-submit{
            width:100%;
            height:50px;
            background:#0c8a63;
            color:white;
            border:none;
            border-radius:12px;
            font-weight:600;
            margin-top:15px;
        }

        .btn-submit:hover{
            background:#087554;
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
        <p class="subtitle">New Password</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/update-password" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="At least 8 Password"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="********"
                    required
                >
            </div>

            <button type="submit" class="btn-submit">
                Kirim
            </button>

        </form>

    </div>

</div>

</body>
</html>