<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 50px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown>input[type="checkbox"] {
            position: absolute;
            left: -100vw;
        }

        .dropdown>label,
        .dropdown>a[role="button"] {
            display: inline-block;
            padding: 6px 15px;
            color: #333;
            line-height: 1.5em;
            text-decoration: none;
            border: 1px solid #8c8c8c;
            cursor: pointer;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .dropdown>label:hover,
        .dropdown>a[role="button"]:hover,
        .dropdown>a[role="button"]:focus {
            border-color: #333;
        }

        .dropdown>label:after,
        .dropdown>a[role="button"]:after {
            content: "\f0d7";
            font-family: FontAwesome;
            display: inline-block;
            margin-left: 6px;
        }

        .dropdown>ul {
            position: absolute;
            z-index: 999;
            display: block;
            left: -100vw;
            top: calc(1.5em + 14px);
            border: 1px solid #8c8c8c;
            background: #fff;
            padding: 6px 0;
            margin: 0;
            list-style: none;
            width: 100%;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .15);
            -moz-box-shadow: 0 3px 8px rgba(0, 0, 0, .15);
            box-shadow: 0 3px 8px rgba(0, 0, 0, .15);
        }

        .dropdown>ul a {
            display: block;
            padding: 6px 15px;
            text-decoration: none;
            color: #333;
        }

        .dropdown>ul a:hover,
        .dropdown>ul a:focus {
            background: #ececec;
        }

        .dropdown>input[type="checkbox"]:checked~ul,
        .dropdown>ul:target {
            left: 0;
        }

        .dropdown>[type="checkbox"]:checked+label:after,
        .dropdown>ul:target~a:after {
            content: "\f0d8";
        }

        .dropdown a.close {
            display: none;
        }

        .dropdown>ul:target~a.close {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            text-indent: -100vw;
            z-index: 1000;
        }


        /*
 Demo purposes only
*/
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        .dropdown+h2 {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            {{-- <a href="{{ route('login') }}">Login Administator</a>
            <a href="#">Login Dosen</a>
            <a href="#">Login Mahasiswa</a>
            --}}
            <div class="dropdown">
                <ul id="login">
                    <li><a href="{{ route('login') }}">Administator</a></li>
                    <li><a href="#">Dosen</a></li>
                    <li><a href="#">Mahasiswa</a></li>
                </ul>
                <a href="#login" aria-controls="my-dropdown2" role="button" data-toggle="dropdown" id="close">
                    <i class="fa fa-sign-in"> Login </i>
                </a>
                <a href="#close" aria-controls="my-dropdown2" role="button" data-toggle="dropdown" class="close">
                    Close dropdown
                </a>
            </div>
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Sistem Informasi Akademik
            </div>
        </div>
    </div>
</body>

</html>
