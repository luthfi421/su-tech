<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            width:400px;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .logo{
            text-align:center;
            color:#0f8a5f;
            font-size:32px;
            font-weight:bold;
        }

        .subtitle{
            text-align:center;
            color:#666;
            margin-bottom:30px;
        }

        h2{
            color:#1f2937;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ddd;
            border-radius:10px;
            margin-top:10px;
        }

        button{
            width:100%;
            padding:12px;
            background:#0f8a5f;
            color:white;
            border:none;
            border-radius:10px;
            margin-top:20px;
            cursor:pointer;
        }

        button:hover{
            background:#0c6f4d;
        }

        .success{
            color:green;
            margin-top:10px;
        }

        .error{
            color:red;
            margin-top:10px;
        }
    </style>
</head>
<body>

<div class="card">

    <div class="logo">Smart Umrah</div>
    <div class="subtitle">Perjalanan Spiritual Anda</div>

    <h2>Masuk ke Akun Anda</h2>

    <p>
        if you forgot password <br>
        enter email address
    </p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="/forgot-password" method="POST">
        @csrf

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="nama@email.com"
            required
        >

        <button type="submit">
            Kirim
        </button>

    </form>

</div>

</body>
</html>