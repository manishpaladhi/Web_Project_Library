<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elastic\Elasticsearch;
use Elastic\Elasticsearch\ClientBuilder;
use Auth;


class MainController extends Controller
{
    public function serp(Request $request)
    {   
       $query_string = $request->get("p");
       $p = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
          if ($query_string != "") {
              $searchParams = [
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

        return view('search',["query_string"=>$query_string])->withquery($searchParams);      
        
    }
}

    public function serplogin(Request $request)
        {   
        $query_string = $request->get("p");
        $p = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
            if ($query_string != "") {
                $searchParams = [
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

            return view('searchlogin',["query_string"=>$query_string])->withquery($searchParams);      
            
        }

    }

    public function insert(){
        return view ('insertData');
    }

    public function openpdf($idvalue)
  {
      $file_path = "/Users/manish/Desktop/Web_Project_Library/storage/app/public/PDF/"."$idvalue";

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file_path . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file_path);
  }

    public function upload_data(Request $request)
    {
        $client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();
        
        $title                 = $request->input("title");
        $author                = $request->input('author');
        $degree                = $request->input('degree');
        $program               = $request->input('program');
        $university            = $request->input('university');
        $year                  = $request->input('year');
        $pdf                   = rand(500,1000).".pdf";
        $abstract              = $request->input('abstract');
        $advisor               = $request->input('advisor');

        $params = [
            'index' => 'project_index',
            'type' => '_doc',
            'body'  => [
                    'title' => $title,
                    'author' => $author,
                    'degree' => $degree,
                    'program' => $program,
                    'university' => $university,
                    'year'=> $year,
                    'pdf'=> $pdf,
                    'abstract'=> $abstract,
                    'advisor'=> $advisor
            ]
        ];
        $response = $client->index($params);
        echo "<h3>You have successfully indexed the data.</h3>";
        echo "<h3>Now attach a PDF(if any) with the file name $pdf.</h3>";

    }


    public function etd_summary(Request $request)
    {

        $query_string = $request->get("p");

        
        $p = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
      
          if ($query_string != "") {
              $searchParams = [
              'index' => 'project_index',
              'body' => [
                'query' => [
                  'bool' =>[
                    'must' =>[
                      'multi_match' =>[
                      'query' => $p,
                      'fields' => ['pdf']
                        ]
                      ]
                    ]
                    ],
              'size'=>1000
              ]
            ];
            // dd($searchParams);
        return view('summary',["query_string"=>$query_string])->withquery($searchParams);
    }
  }

  

}
