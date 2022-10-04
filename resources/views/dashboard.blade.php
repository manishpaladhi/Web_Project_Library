
<x-app-layout>

<!DOCTYPE html>
<html>
    <head>
        <title>Main Page</title>
    </head>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <style>
        body{
  margin: 0px;
  padding: 0px;
  width: 100vw;
  height: 100vh;
  justify-content: center;
  align-items: center;
  background-color: rgb(48, 46, 46);
  font-family:'Courier New', Courier, monospace;
}
.search-box{
  width: fit-content;
  margin-top: 250px;
  margin-left:600px;
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
  border-radius: 25px;
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
  width: 50px;
  height: 50px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  color:pink ;
  
}
.btn-search:focus ~ .input-search{
  width: 300px;
  border-radius: 0px;
  background-color: black;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.input-search:focus{
  width: 300px;
  border-radius: 0px;
  background-color: black;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
    </style>



<body>
    <div class="search-box">
    <button class="btn-search"><i class="fa fa-search"></i></button>
    <input type="text" class="input-search" placeholder="Type to Search...">
  </div>


</body>
</html>
    
</x-app-layout>





