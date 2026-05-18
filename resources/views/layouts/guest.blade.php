<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager Pro') }}</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- VITE -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CUSTOM STYLES -->
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#f4f7fc;
            overflow-x:hidden;
        }

        /* AUTH LAYOUT */

        .auth-container{
            display:flex;
            min-height:100vh;
        }

        /* LEFT SIDE */

        .auth-left{
            width:50%;
            background:
            linear-gradient(rgba(30,60,114,0.9),
            rgba(42,82,152,0.9)),
            url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1600&auto=format&fit=crop');

            background-size:cover;
            background-position:center;

            display:flex;
            align-items:center;
            justify-content:center;

            padding:60px;
            color:white;
        }

        .left-content{
            max-width:500px;
        }

        .brand{
            display:flex;
            align-items:center;
            margin-bottom:30px;
        }

        .brand i{
            font-size:40px;
            margin-right:15px;
        }

        .brand h1{
            font-size:34px;
            font-weight:700;
            margin:0;
        }

        .left-content h2{
            font-size:46px;
            font-weight:700;
            margin-bottom:20px;
            line-height:1.2;
        }

        .left-content p{
            font-size:18px;
            line-height:1.8;
            opacity:0.95;
        }

        /* RIGHT SIDE */

        .auth-right{
            width:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px;
        }

        /* CARD */

        .form-card{
            width:100%;
            max-width:500px;
            background:white;
            border-radius:25px;
            padding:45px;
            box-shadow:0 15px 50px rgba(0,0,0,0.08);
        }

        .icon-circle{
            width:90px;
            height:90px;
            border-radius:50%;
            background:linear-gradient(135deg,#1e3c72,#2a5298);

            display:flex;
            align-items:center;
            justify-content:center;

            margin:auto;
            margin-bottom:20px;
        }

        .icon-circle i{
            color:white;
            font-size:35px;
        }

        /* INPUTS */

        .form-control{
            height:55px;
            border-radius:14px;
            border:1px solid #dbe2ea;
            padding-left:15px;
            font-size:15px;
        }

        .form-control:focus{
            box-shadow:none;
            border-color:#2a5298;
        }

        label{
            font-weight:600;
            margin-bottom:8px;
        }

        /* BUTTON */

        .btn-main{
            width:100%;
            height:55px;
            border:none;
            border-radius:14px;

            background:linear-gradient(135deg,#1e3c72,#2a5298);

            color:white;
            font-weight:600;
            font-size:16px;

            transition:0.3s;
        }

        .btn-main:hover{
            transform:translateY(-2px);
            opacity:0.95;
            color:white;
        }

        /* LINKS */

        a{
            text-decoration:none;
            color:#2a5298;
            font-weight:600;
        }

        /* MOBILE */

        @media(max-width:992px){

            .auth-left{
                display:none;
            }

            .auth-right{
                width:100%;
            }

        }

    </style>

</head>

<body>

    <div>
        {{ $slot }}
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>