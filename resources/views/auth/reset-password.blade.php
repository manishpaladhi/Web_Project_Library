<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
   
</head>

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
            margin: auto;
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
            margin: 5px ;
            text-align: center;
            font-size: 18px;
            color: white;
            background-color: rgb(48, 46, 46);

        }

        .box1{
            margin-left: 80px;
        }

        .box2{
            margin-left: 80px;
        }

        .box3{
            margin-left: 80px;
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
            background-color: tomato;
        }
</style>
<body>
    
    <div class="container">
        <h2>Reset your Password </h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="box1">
                <label for="email" value="{{ __('Email') }}">
                <input id="email"  type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder=Email>
            </div>

            <div class="box2">
                <label for="password" value="{{ __('Password') }}">
                <input id="password"  type="password" name="password" required autocomplete="new-password" placeholder="New Password">
            </div>

            <div class="box3">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">
                <input id="password_confirmation"  type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new-password">
            </div>

            <div class="btns">
                <button>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
        
    </div>
</body>
</html>



































