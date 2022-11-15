
<x-app-layout>

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

           .summary{
             margin-left: 20px;
           }
       

   

</style>




  </head>
    <body>


<div class="summary">   
<?php
  require '/Users/manish/Desktop/Web_Project_Library/vendor/autoload.php';
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
</x-app-layout>







