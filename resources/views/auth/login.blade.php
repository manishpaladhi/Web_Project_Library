
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

        <style>body{
            
            padding: 0;
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
            color: white;
        

        
        }
        .container{
            width: 400px;
            display: flex;
            flex-direction: column;
            margin: auto;
            margin-left: 480px;
            margin-top: 180px;
            align-items: center;
            background-color: rgb(22, 21, 21);
            border-radius: 15px;
            padding: 25px 10px;
            box-shadow: 0 0 15px rgb(80, 79, 79);
        }
        
        form{
            display: flex;
            flex-direction: column;
            width: 90%;
            
            
        }
        input{
            height: 40px;
            border-radius: 10px;
            border: none;
            outline: none;
            margin-left: 80px;
            margin-top: 30px;
            text-align: center;
            font-size: 18px;
            color: white;
            background-color: rgb(48, 46, 46);

        }

        .forgot{
            margin: 15px auto;
            margin-left: 75px;
            background-color: white;
            color: magenta;
            
        }

        .btns{
            margin: 15px auto;
            margin-left: 120px;
        }

        button{
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
        <h2>Login Form</h2>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" value="{{ __('Email') }}">
                <input type="email" name="email" id="email" :value="old('email')" required autofocus placeholder="Email">
            </div>

            <div>
                
                <label for="password" value="{{ __('Password') }}">
                <input type="password" name="password" id="password" required autocomplete="current-password" placeholder="Password">
            </div>


            <div class="forgot">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div>
                <button class="btns">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    
        
    </body>
</html>
