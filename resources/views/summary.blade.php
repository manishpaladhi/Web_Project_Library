
<x-app-layout>

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

        

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>

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

                .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
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
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
       

   

</style>
</head>

<body>
    <br>

    <div class="container">   
    <?php
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
            <b>Abstract :</b> ".$abstract."
            <br>
            <br>
            </td>";
            echo"</tr>";
          }
      ?>
  </div>

  <!-- <button class="button button1" onclick="window.location.href='http://127.0.0.1:8000/serplogin';">Go Back</button> -->
 
  
  <form action="http://127.0.0.1:8000/serplogin" method="POST" target="_blank">
         <button type="submit">Click me</button>
        </form>

  <br>
</body>
</x-app-layout>







