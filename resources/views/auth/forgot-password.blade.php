<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="icon" href="/download.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <style>
    body{
            padding: 0;
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
            background-color: rgb(48, 46, 46);
            color: white;
            padding-top: 25vh;
        }
        .container{
            width: 400px;
            display: flex;
            flex-direction: column;
            margin:0 auto;
            align-items: center;
            background-color: rgb(22, 21, 21);
            border-radius: 15px;
            padding: 25px 10px;
            box-shadow: 0 0 15px rgb(80, 79, 79);
            margin-top: 100px;
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
            margin: 5px ;
            text-align: center;
            font-size: 18px;
            color: white;
            background-color: rgb(48, 46, 46);

        }

        .emailbox{
            margin-top: 15px;
            margin-left: 70px;
        }
        .btns{
            margin: 15px auto;
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

        ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                margin-top: -200px;
              }

              li {
                float: left;
                border-right:1px solid #bbb;
                
              }

              li:last-child {
                border-right: none;
              }

              li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
              }

                li a:hover:not(.active) {
                  background-color: #111;
                }



    </style>
   
</head>
<body>
    
        <ul>
            <li><a class="active" href="/">Back to Welcome Page</a></li>
            <li style="float:right"><a href="/register">Register</a></li>
            <li style="float:right"><a href="/login">Login</a></li>
        </ul>


    <div class="container">
        <h2>Forgot Password Page</h2>
        <form method="POST" action="{{ route('password.email') }}">

        <div>
            {{ __('Please enter your email id below.') }}
        </div>

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        
            @csrf

            <div class="emailbox">
                <label for="email" value="{{ __('Email') }}">
                <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
            </div>

            <div class="btns">
                <button>
                    {{ __('Reset Link') }}
                </button>
            </div>
        </form>
            
        </form>
    </div>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@include('footer') 
</html>


