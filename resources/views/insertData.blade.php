<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="icon" href="/download.png">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>

        <style>
            body {
                background-color: rgb(48, 46, 46) ;
                width: 100vw;
                height: 100vh;
                justify-content: center;
                align-items: center;
                font-family:'Courier New', Courier, monospace;

        }
            .container{
                width: 500px;
                /* display: flex; */
                align-items: center;
                background-color: palegoldenrod;
                border-radius: 15px;
                padding: 25px 10px;
                box-shadow: 0 0 15px rgb(80, 79, 79);
                margin-bottom : 200px;
                margin-top: 5px;
                color: black;
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

.display{
    content: center;
}

.alert alert-success{
    padding: 14px 16px;
}
   

</style>

    </head>
    <body>


<ul>
  <li><a class="active" href="/dashboard">Back to Dashboard Page</a></li>
  <li style="float:right"><a href="{{ route('logout') }}" @click.prevent="$root.submit();"> {{ __('Log Out') }} </a></li>
  <li style="float:right"><a href="/user/profile">Profile</a></li>
 
</ul>


        
        
    </body>
</html>
<br>
<br>
<form action="/upload_data" method="POST" role="add">
  {{ csrf_field() }}
  <div class="container">

     <br>
     <label>Title</label>
     <input type="text" name="title" class="form-control" />
     <br>
     <label>Name of the Degree</label>
     <input type="text" name="degree" class="form-control" />
     <br>
     <label>Name of the Program</label>
     <input type="text" name="program" class="form-control" />
     <br>
     <label>Advisor</label>
     <input type="text" name="advisor" class="form-control" />
     <br>
     <label>University</label>
     <input type="text" name="university" class="form-control" />
     <br>
     <label>Author</label>
     <input type="text" name="author" class="form-control" />
     <br>
     <label>Year</label>
     <input type="text" name="year" class="form-control" />
     <br>
     <label>Abstract</label>
     <input type="text" name="abstract" class="form-control" />
     <br>
     <input type = "submit"name="Submit" class="btn btn-primary" value="Submit" style="font-weight:bold" />
     <br>

</form>
<br>

    
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">ATTACH YOUR PDF BELOW</h3>
    
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Click the button to upload.
            </button>
        </form>
    </div>
    @include('footer')

