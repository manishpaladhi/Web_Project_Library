<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
        
</head>

<style>

        body{
        margin:0;
        overflow-x:hidden;
        }

        .footer{
        background:#000;
        padding:5px 100px;
        font-family: 'Play', sans-serif;
        text-align:center;
        /* margin-top: 390px; */
        position: relative;
        }

        .footer .row{
        width:100%;
        margin:1% 0%;
        /* padding:0.6% 0%; */
        color:gray;
        font-size:0.8em;
        }

        .footer .row a{
        text-decoration:none;
        color:gray;
        transition:0.5s;
        
        }

        .footer .row a:hover{
        color:#fff;
        }

        .footer .row ul{
        width:100%;
        }

        .footer .row ul li{
        display:inline-block;
        margin:0px 30px;
        }

        .footer .row a i{
        font-size:2em;
        margin:0% 1%;
        }

        @media (max-width:720px){
        .footer{
        text-align:left;
        padding:5%;
        }
        .footer .row ul li{
        display:block;
        margin:10px 0px;
        text-align:center;
        }
        .footer .row a i{
        margin:0% 3%;
        }
        }

</style>

<body>

    <footer>
            <div class="footer">
                <div class="row">
                    <a href="https://www.linkedin.com/in/manishpaladhi1998/"><i class="fa fa-linkedin"></i></a>
                    <a href="https://github.com/manishpaladhi"><i class="fa fa-github"></i></a>
                    
                </div>

            <div class="row">
                
            </div>

                <div class="row">
                    Copyright © 2022 - All rights reserved || Designed By: Manish Kumar Paladhi 
                </div>
            </div>
    </footer>

</html>