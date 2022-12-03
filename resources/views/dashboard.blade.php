
<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


    <link rel="icon" href="/favicon.ico">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        
        </head>
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
                width: 1400px;
                /* display: flex; */
                flex-direction: column;
                align-items: center;
                background-color: palegoldenrod;
                border-radius: 15px;
                padding: 25px 10px;
                box-shadow: 0 0 15px rgb(80, 79, 79);
        }

            .search-box{
                width: fit-content;
                margin-top: 100px;
                margin-left: 300px;
                position: relative;
        }

            .input-search{
                height: 50px;
                width: 50px;
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
                margin-left: 150px;
                margin-top: -80px;

        }
            .input-search::placeholder{
                color:rgba(255,255,255,.5);
                font-size: 18px;
                letter-spacing: 2px;
                font-weight: 100;
        }

            .btn-search{
                width: 40px;
                height: 40px;
                border-style: none;
                font-size: 20px;
                font-weight: bold;
                outline: none;
                cursor: pointer;
                border-radius: 50%;
                position: absolute;
                top: -7px;
                right: 6px;

                margin: 0 auto;
                
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




    <body>

    <div class="search-box">
        <form action = "/serplogin" method="POST" role="search">
        {{ csrf_field() }}
        
            <input type="text"  class="input-search" placeholder="Type to Search..."  name="p" required/>
            <button type="submit" class="btn-search"><i class="fa fa-search" ></i></button>
            
        </form>
    </div>

    </body>
    

</html>
    
</x-app-layout>








