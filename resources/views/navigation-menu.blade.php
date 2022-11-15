<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


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
                flex-direction: column;
                align-items: center;
                background-color: palegoldenrod;
                border-radius: 15px;
                padding: 25px 10px;
                box-shadow: 0 0 15px rgb(80, 79, 79);
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

  </head>
    <body>

    <form method="POST" action="{{ route('logout') }}" x-data>
      @csrf
                          
      <ul>
                             
        <li><a class="active" href="/dashboard">Home </a></li>
        <li style="float:right"> <a href="{{ route('logout') }}" @click.prevent="$root.submit();"> {{ __('Log Out') }} </a> </li>
        <li style="float:right"><a href="/insert">Insert Data</a></li>
        <li style="float:right"><a href="/user/profile">Profile</a></li>
        
        
    </ul>

    </form>

        
        
    </body>
</html>
