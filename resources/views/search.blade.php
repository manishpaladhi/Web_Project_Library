<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Library</title>

        <!-- Links & Scripts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>
        


        <!-- Styles -->
       

        <style>

body {
                background-color: rgb(48, 46, 46);
                width: 100vw;
                height: 100vh;
                justify-content: center;
                align-items: center;
                font-family:'Courier New', Courier, monospace;
        }

              .dataTables_wrapper .dataTables_paginate .paginate_button {
                    box-sizing: border-box;
                    display: inline-block;
                    min-width: 99em;
                    padding: 0.5em 1em;
                    margin-left: 20px;
                    text-align: center;
                    text-decoration: none !important;
                    cursor: pointer;
                    cursor: hand;
                    color: black;
                    background-color: palegoldenrod;
                   
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
                height: 60px;
                width: 60px;
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

            .table>tbody>tr>td, 
            .table>tbody>tr>th, 
            .table>tfoot>tr>td, 
            .table>tfoot>tr>th, 
            .table>thead>tr>td, 
            .table>thead>tr>th {
              vertical-align: bottom;
              border-top: 10px solid black;
              background-color: palegoldenrod;
              padding: 60px;
              line-height: 20px;
              
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
                top: -10px;
                right: 10px;
                
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

            .dataTables_wrapper 
            .dataTables_length select {
                border: 5px solid #aaa;
                border-radius: 300px;
                padding: 5px;
                background-color: black;
                color: palegoldenrod;
                padding: 4px;
                margin-left: 9px;
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


                .dataTables_wrapper .dataTables_length, 
                .dataTables_wrapper .dataTables_filter, 
                .dataTables_wrapper .dataTables_info, 
                .dataTables_wrapper .dataTables_processing, 
                .dataTables_wrapper .dataTables_paginate {
                    color: black;
                  }

        </style>

</head>
    <body>

        <ul>
            <li><a class="active" href="/">Back to Welcome Page</a></li>
            <li style="float:right"><a href="/register">Register</a></li>
            <li style="float:right"><a href="/login">Login</a></li>
        </ul>


        <div class="search-box">
            <form action = "/serp" method="POST" role="search">
            {{ csrf_field() }}
            
                <input type="text"  class="input-search" placeholder="Type to Search..."  name="p" value="<?php echo $query_string?>" required/>
                <button type="submit" class="btn-search"><i class="fa fa-search" ></i></button>

            </form>
        </div>


        
        
    </body>
</html>

<br>

<div class="container box">

<?php
            require '/Users/manish/Desktop/Web_Project_Library/vendor/autoload.php';
            $p = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
            $client =  Elastic\Elasticsearch\ClientBuilder::create()->build();
            $word = strip_tags($_POST['p']);
            $params = [
                'index' => 'project_index',
                'from' => 0,
                'size' => 501,
                'type' => '_doc',
                'body' => [
                    'query' => [
                        'multi_match' => [
                            'query' => $p,
                            'fields' => ['author','$year','university','degree','program','abstract','title','advisor','wiki_terms']

                            ]
                        ]
                    ]
                ];

            $response = $client->search($params);
            $total = $response['hits']['total']['value'];
            if ($total == 0){
                echo'<div style="text-align:center;" class="alert alert-danger success-block">';
                echo '<h5>No Results Found..!</h5>';
                echo '<script>alert("Not a valid Search")</script>';
            }

            else{
                $score = $response['hits']['hits'][0]['_score'];
                echo
                    "<div>
                    <h3><b><i>$total search results for $word</b></i><h3>
                    </div>";
                echo 
                    '<table class="table table-stripped" id="dt1">
                    <thead>
                    <th></th>
                    </thead>
                    <tbody>';

            foreach( $response['hits']['hits'] as $source){
                    $etd_file_id = (isset($source['etd_file_id'])? $source['etd_file_id'] : "");
                    $year= (isset($source['_source']['year'])? $source['_source']['year'] : "");
                    $author= (isset($source['_source']['author'])? $source['_source']['author'] : "");
                    $university = (isset($source['_source']['university']) ? $source['_source']['university'] : "");
                    $degree = (isset($source['_source']['degree']) ? $source['_source']['degree'] : "");
                    $program = (isset($source['_source']['program']) ? $source['_source']['program'] : ""); 
                    $abstract = (isset($source['_source']['abstract']) ? $source['_source']['abstract'] : ""); 
                    $title = (isset($source['_source']['title']) ? $source['_source']['title'] : ""); 
                    $advisor = (isset($source['_source']['advisor']) ? $source['_source']['advisor'] : ""); 
                    $pdf = (isset($source['_source']['relation_haspart']) ? $source['_source']['relation_haspart'] : ""); 
                    $wiki_terms = (isset($source['_source']['wiki_terms']) ? $source['_source']['wiki_terms'] : ""); 


                    $title = strtoupper($title);
                    $author = strtoupper($author);
                    $university = strtoupper($university);
                    $abstract = substr(strip_tags($abstract),0,1000);
                    $abstract .= "....";
                    


                    // $abstract = trim();
                    $abstract = ltrim($abstract,"[ ");
                    $abstract = rtrim($abstract, " ]");






                echo "<tr>
                    <td>
                    <b><i>Title:</b></i> ".$title." <br> <br>
                    <b><i>Author's:</b></i> ".$author." <br> <br>
                    <b><i>University:</b></i> ".$university." <br> <br>
                    <b><i>Year:</b></i> ".$year." <br> <br>
                    <b><i>Abstract:</b></i>  ".$abstract." <br> <br>
                    </td>
                    </form>
                    </td>";
    
                echo"</tr>";
        }
                echo "</tbody></table>";
}

?>

<script>
        $(document).ready( function () {
            var table = $('#dt1').DataTable( {
            "initComplete": function( settings, json ) {
            $("body").unmark().mark("{{$query_string}}"); 
        }
    });
        table.on( 'draw.dt', function () {
        $("body").unmark().mark("{{$query_string}}");
    }); 
});
</script>






  