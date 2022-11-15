<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>

        <style>
            body {
                background-color: rgb(48, 46, 46);
                width: 100vw;
                height: 100vh;
                justify-content: center;
                align-items: center;
                font-family:'Courier New', Courier, monospace;
          
        }
        .container{
            padding: 0;
            font-family:'Courier New', Courier, monospace;
            /* background-color: rgb(48, 46, 46); */
            color: white;
            text-align: center;
            margin-left: 480px;
            margin-top: 200px;
            padding-top: 25vh;


            width: 400px;
            /* display: flex; */
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

        .search-box{
  width: fit-content;
  margin-top: 100px;
  margin-left: 470px;
  position: relative;
}
.input-search{
  height: 60px;
  width: 30px;
  border-style: none;
  padding: 10px;
  font-size: 18px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 50px;
  transition: all .5s ease-in-out;
  background-color: #22a6b3;
  padding-right: 40px;
  color:white;
}
.input-search::placeholder{
  color:rgba(255,255,255,.5);
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: 100;
}
.btn-search{
  width: 15px;
  height: 60px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  top: 5px;
  right: -15px;
  
}
.btn-search:focus ~ .input-search{
  width: 800px;
  border-radius: -500px;
  background-color: black;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.input-search:focus{
  width: 400px;
  border-radius: 50px;
  background-color: black;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}


        </style>




    </head>
    <body>


    
    <div class="container">
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
    </div>






    <div class="search-box">
        <form action = "/serp" method="POST" role="search">
        {{ csrf_field() }}
        
            <input type="text"  class="input-search" placeholder="Type to Search..."  name="p" required/>
            <button type="submit" class="btn-search"><i class="fa fa-search" ></i></button>

        </form>
    </div>


        
    </body>
</html>

