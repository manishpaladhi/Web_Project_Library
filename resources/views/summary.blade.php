
@include('navigation-menu')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="icon" href="/download.png">

        <title>Digital Library</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>
        <link rel="stylesheet" href="style.css">



        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>

        <style>
           

           body {
                

                background-color: palegoldenrod;
                font-family:'Courier New', Courier, monospace;
           }

           
/* 
           .container{
                    align-items: center;
                    background-color: palegoldenrod;
                    border-radius: 15px;
                    padding: 25px 10px;
                    box-shadow: 0 0 15px rgb(80, 79, 79);
                    margin: 0 auto;
                   

                    
                } */

                .button {
  background-color: palegoldenrod;
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 70px 20px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}

.button1:hover {
  background-color: palegoldenrod;
  color: black;
}
       
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: max-content;
    background-color: white;
    color: black;
    text-align: center;
    border-radius: 6px;
    padding: .5rem;
    position: absolute;
    z-index: 1;
    bottom: 95%;
    left: 0px;
    margin-left: -60px;
    visibility: hidden;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;

}
   

</style>
</head>

<body>
    <br> 
       

    <div class="container">   
    <?php
        
        $p = preg_replace('/[^A-Za-z0-9 ]/', '', $query_string);

        require '/Users/manish/test_2/vendor/autoload.php';
        $client =  Elastic\Elasticsearch\ClientBuilder::create()->build();
        $params = [
            'index' => 'project_index',
            'from' => 0,
            'size' => 501,
            'type' => '_doc',
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' => $p ?? '',
                        'fields' => ['$etd_file_id','author','$year','university','degree','program','abstract','title','advisor','wiki_terms','pdf']

                        ]
                    ]
                ]
            ];

            function highlightWords($t,$word,$l) {
                $get = $l;
                $t = preg_replace('#'. preg_quote($word) .'#i', 
                '<div class="tooltip"> 
                    <span style="background-color: white;">\\0</span> 
                    <span class="tooltiptext"><a href = '.$get.'>'.$get.'</a></span>
                </div> ', $t);
             
                return $t;
          }


        $response = $client->search($query);
        
    
        foreach( $response['hits']['hits'] as $source){
          $etd_file_id = (isset($source['_source']['etd_file_id'])? $source['_source']['etd_file_id'] : "");
          $year= (isset($source['_source']['year'])? $source['_source']['year'] : "");
          $author= (isset($source['_source']['author'])? $source['_source']['author'] : "");
          $university = (isset($source['_source']['university']) ? $source['_source']['university'] : "");
          $degree = (isset($source['_source']['degree']) ? $source['_source']['degree'] : "");
          $program = (isset($source['_source']['program']) ? $source['_source']['program'] : ""); 
          $abstract = (isset($source['_source']['abstract']) ? $source['_source']['abstract'] : ""); 
          $abstract = ltrim($abstract,"[ ");
          $abstract = rtrim($abstract, " ]");
          $title = (isset($source['_source']['title']) ? $source['_source']['title'] : ""); 
          $advisor = (isset($source['_source']['advisor']) ? $source['_source']['advisor'] : ""); 
          $pdf = (isset($source['_source']['pdf']) ? $source['_source']['pdf'] : ""); 
          $wiki_terms = (isset($source['_source']['wiki_terms']) ? $source['_source']['wiki_terms'] : ""); 
?>
 

<?php
            echo "<tr>
            <td>
            <br>
            <b>Title :</b> ".$title."
            <br>
            <br>
            <b>Author :</b> ".$author."
            <br>
            <br>
            <b>University :</b> ".$university."
            <br>
            <br>
            <b>etd file id :</b> ".$etd_file_id."
            <br>
            <br>
            <b>Program :</b>  ".$program."
            <br> 
            <br>
            <b>Year :</b>  ".$year."
            <br>
            <br>
            <b>Degree :</b>  ".$degree."
            <br>
            <br>
            <b>advisor :</b> ".$advisor."
            <br>
            <br>
            </td>";

            $decode_array = json_decode($wiki_terms, true);

            $terms_array = array();

            if($decode_array!=null)
            {
                foreach ($decode_array as $generate)
            {
                $terms_array[]= $generate['term'];
                $url_array[]=$generate['url'];
            }
                $counter = count ($terms_array);

            for( $m = 0; $m < $counter; $m++)
            {
                $abstract= highlightWords($abstract, $terms_array[$m],$url_array[$m]);
            }

    
  }
    echo "<b>Abstract :</b> ".$abstract."";
  }   
      ?>
  </div>

<br>  
  <button onclick="history.back()" class="button button1" >Go Back</button>
  <br>
</body>
@include('footer')












