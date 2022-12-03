<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="icon" href="/favicon.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
  </head>
  <style>
      body{
            
            
            font-family:'Courier New', Courier, monospace;
            background-color: rgb(48, 46, 46);
            color: white;
            text-align: center;
            margin-left: 50px;
            margin-top: 40px;
            
        
        }
        .container{
            width: 400px;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
           
            margin-top: 70px;
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
            margin-left: 5px;
            margin-top: 30px;
            text-align: center;
            font-size: 18px;
            color: white;
            background-color: rgb(48, 46, 46);

        }
        .register{
            margin: 15px auto;
            margin-left: 85px;
            background-color: white;
            color: magenta;
        }

        .btns{
            margin: 15px auto;
            margin-left: 5px;
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


<body>
        

        <ul>
            <li><a class="active" href="/">Back to Welcome Page</a></li>
            <li style="float:right"><a href="/register">Register</a></li>
            <li style="float:right"><a href="/login">Login</a></li>
        </ul>

    <div class="container">
        <h2>Registration Form</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name" value="{{ __('Name') }}">
                <input id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
            </div>

            <div>
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Email">
            </div>

            <div>
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password">
            </div>

            <div>
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div>
                    <x-jet-label for="terms">
                        <div>
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div>
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="register">
                <a  href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <div>
                <button class="btns">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>

    

    
</body>
<br><br><br><br><br><br>
@include('footer')
</html>

