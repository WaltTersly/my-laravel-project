<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="description" content=" GYMMS is Gym Management System that  facilitates the operations and control of Gym properties and activities, a useful tool for gym managers">
	    <meta name="keywords" content="GYMMS, GYM, management, html">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Favicon -->   
	    <link href="../img/favicon.ico" rel="shortcut icon"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
	    <link rel="stylesheet" href="../css/animate.css"/>
        <link rel="stylesheet" href="../css/style.css"/>
        <!-- Styles -->
        <style>
            html, body {
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://use.fontawesome.com/3b04672f1b.js"></script>

    </head>
    <body>

       
        <div class="flex-center position-ref full-height">
             <!-- Hero section -->
            <div class="container">
                <div class="hero">
                    <b class=" b"> G Y M M S</b>
		            <div class="container hero-text text-white">
			            <h2>FITNESS LIFE-STYLE AND STRENGTH</h2>
			            <p>ULEASH YOUR INNER BEAST, STRENGTH AND <br>POTENTIAL. COME SEE WHAT YOUR BODY CAN REALLY DO</p>
			            <a href="#" class="site-btn">G Y M M S</a>
		         </div>
                    <b class="b">G Y M M S</b>
                </div>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if (Auth::user()->hasRole('Admin'))
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th"></i> Dashboard</a>
                        @elseif(Auth::user()->hasRole('user'))
                            <a href="{{ route('memberacc') }}"><i class="fa fa-th"></i> Dashboard</a>
                        @elseif(Auth::user()->hasRole('trainer'))
                            <a href="{{ route('traineracc') }}"><i class="fa fa-th"></i> Dashboard</a>
                        @elseif(Auth::user()->hasRole('cashier'))
                            <a href="{{ route('cashieracc') }}"><i class="fa fa-th"></i> Dashboard</a>
                        {{-- @elseif(Auth::user()->hasRole('manager'))
                            <a href="{{ route('memberacc') }}"><i class="fa fa-th"></i> Dashboard</a>     --}}
                        @endif
                           
                            @else
                       

                        @if (Route::has('register'))
                            <a href="{{ url('register') }}"><i class="fa fa-user"></i> Register</a>
                        @endif
                        <a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                
                </div>

                
            </div>
        </div>
    </body>
</html>
