<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>

        <style>
            body {
               
            padding: 0;
            font-family:'Courier New', Courier, monospace;
            background-color: rgb(48, 46, 46);
            color: white;
            text-align: center;
            margin-left: 480px;
            margin-top: 180px;
            padding-top: 25vh;
        }
        .container{
            width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgb(22, 21, 21);
            border-radius: 15px;
            padding: 25px 10px;
            box-shadow: 0 0 15px rgb(80, 79, 79);
        }
        
       
        .buttons{
            
            margin: 15px auto;
        }
        button{
            font-family: 'Courier New', Courier, monospace;
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            padding: 8px 30px;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            margin: 5px 25px;
        }
        button:hover{
            background-color: silver;
        }

        </style>




    </head>
    <body class="container">


        <div class="buttons">
            <h2>Digital Library</h2>
            @if (Route::has('login'))
                <div class=" ">
                    @auth
                        <a></a>
                    @else
                        
                        <a href="{{ route('login') }}"><button>Login</button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><button>Register</button></a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>`