<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="/favicon.ico">


        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

                body {
                    background-color: rgb(48, 46, 46);
                    font-family:'Courier New', Courier, monospace;
                }


                .container{
                    align-items: center;
                    background-color: palegoldenrod;
                    border-radius: 15px;
                    padding: 25px 10px;
                    box-shadow: 0 0 15px rgb(80, 79, 79);
                    margin: 0 auto;
           

                }

                .search-box{
                    margin: 20px 0px auto;
                }

                .input-search{
                    height: 50px;
                    width: 250px;
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
                    margin:0 auto;

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

                ul {
                    list-style-type: none;
                    /* margin: 0 auto; */
                    /* padding: 0; */
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


                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    box-sizing: border-box;
                    display: inline-block;
                    /* min-width: 99em; */
                    padding: 0.5em 1em;
                    margin-left: 20px;
                    text-align: center;
                    text-decoration: none !important;
                    cursor: pointer;
                    cursor: hand;
                    color: black;
                    background-color: palegoldenrod;
                    margin: 0 auto;
                    
                }

                .dataTables_wrapper 
                .dataTables_length select {
                    border: 5px solid #aaa;
                    border-radius: 300px;
                    background-color: black;
                    color: palegoldenrod;
                    margin:0 auto;
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
                        margin: 0 auto;
                
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
                <li><a class="active" href="/dashboard">Back to Dashboard Page</a></li>
                <li style="float:right"><a href="{{ route('logout') }}" @click.prevent="$root.submit();"> {{ __('Log Out') }} </a></li>
                <li style="float:right"><a href="/insert">Insert Data</a></li>
                <li style="float:right"><a href="/user/profile">Profile</a></li>
            
            </ul>
        
</body>

</html>

</br>
<?php
            require '/Users/manish/test_2/vendor/autoload.php';
            $p = preg_replace('/[^A-Za-z0-9 ]/', '', $query_string);
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
                            'fields' => ['$etd_file_id','author','$year','university','degree','program','abstract','title','advisor','wiki_terms']

                            ]
                        ]
                    ]
                ];

            $response = $client->search($params);
            $total = $response['hits']['total']['value'];
?>

<div class="container">

    <div class="search-box">
        <form action = "/serplogin" method="POST" role="search">
        {{ csrf_field() }}
        
            <label for="name">SEARCH HERE: </label>
            <input type="text"  class="input-search" placeholder="Type to Search..."  name="p" value="<?php echo $p?>" required/>
            <button type="submit" class="btn-search"><i class="fa fa-search" ></i></button>

        </form>
    </div>  

<br>



<?php
            if ($total == 0){
                echo'<div style="text-align:center;" class="alert alert-danger success-block">';
                echo '<h5>No Results Found..!</h5>';
                echo '<script>alert("Not a valid Search")</script>';
                }

                else{
                        $score = $response['hits']['hits'][0]['_score'];
                        echo
                        "<div>
                        <h3><b><i>$total search results for $p</b></i><h3>
                        </div>";
                        echo 
                        '<table class="table table-stripped" id="dt1">
                        <thead>
                        <th></th>
                        </thead>
                        <tbody>';


             foreach( $response['hits']['hits'] as $source){
      
            $year= (isset($source['_source']['year'])? $source['_source']['year'] : "");
            $title = (isset($source['_source']['title']) ? $source['_source']['title'] : ""); 
            $degree = (isset($source['_source']['degree']) ? $source['_source']['degree'] : "");
            $advisor = (isset($source['_source']['advisor']) ? $source['_source']['advisor'] : ""); 
            $pdf = (isset($source['_source']['pdf']) ? $source['_source']['pdf'] : ""); 
            $wiki_terms = (isset($source['_source']['wiki_terms']) ? $source['_source']['wiki_terms'] : ""); 
            $author= (isset($source['_source']['author'])? $source['_source']['author'] : "");
            $university = (isset($source['_source']['university']) ? $source['_source']['university'] : "");
            $etd_file_id = (isset($source['_source']['etd_file_id'])? $source['_source']['etd_file_id'] : "");
            $program = (isset($source['_source']['program']) ? $source['_source']['program'] : ""); 
            $abstract = (isset($source['_source']['abstract']) ? $source['_source']['abstract'] : ""); 
            $abstract = ltrim($abstract,"[ ");
            $abstract = rtrim($abstract, " ]");
            $link = asset('/Users/manish/test_2/storage/app/public/PDF/'.$pdf.'');
            $title = strtoupper($title);
            $author = strtoupper($author);
            $university = strtoupper($university);
            $abstract = substr(strip_tags($abstract),0,1000);
            $abstract .= "....";
    
            echo "<tr>
            <td>
                            <b><i>Title:</b></i> ".$title." <br> <br>
                            <b><i>Author's:</b></i> ".$author." <br> <br>
                            <b><i>University:</b></i> ".$university." <br> <br>
                            <b><i>Year:</b></i> ".$year." <br> <br>
                            <b><i>Abstract:</b></i>  ".$abstract." <br> <br>
                            <b><i>PDF:</b></i>  ".$pdf." <br> <br>
                            <h4><b><a href='/openpdf/".$pdf."' target='_blank' >View PDF</a></h4></b><br>
                            <form action='/etd_summary' method='GET' role='summary'>
                                <input type='hidden' name='p' value= '".$pdf."'>
                                <input type='submit' class='btn btn-primary' value='Summary'>
                            </form>
                            </td>";
            
                            echo"</tr>";
        }
                            echo "</tbody></table>";
    }

    ?>

</div>
<br>
@include('footer')

<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>

<script>

            $(document).ready( function () 
            {
                var table = $('#dt1').DataTable( 
                    {
                        "initComplete": function( settings, json ) 
                        {
                            $("body").unmark().mark("{{$p}}"); 
                        }
                    });

                table.on( 'draw.dt', function () 
                    {
                        $("body").unmark().mark("{{$p}}");
                    }); 
            });
</script>







  