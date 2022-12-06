<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elastic\Elasticsearch;
use Elastic\Elasticsearch\ClientBuilder;
use Auth;
use DB;
use Illuminate\Support\Str;


use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class MainController extends Controller
{
    public function serp(Request $request)
    {   
       $query_string = $request->get("p");
       $p = preg_replace('/[^A-Za-z0-9 ]/', '', $query_string);
       if ($query_string != "") {
              $searchParams = [
                'index' => 'metadata',
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
        $p = preg_replace('/[^A-Za-z0-9 ]/', '', $query_string);
        if ($query_string != "") {
                $searchParams = [
                    'index' => 'metadata',
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
      $file_path = "/Users/manish/test_2/storage/app/public/PDF/"."$idvalue";

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
            'index' => 'metadata',
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
        $link_address = "/insert";
        echo "<h1> <a href='$link_address'>Go Back</a></h1>";

    }


    public function etd_summary(Request $request)
    {

        $query_string = $request->get("p");

        
        $p = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $query_string);
      
          if ($query_string != "") {
              $searchParams = [
              'index' => 'metadata',
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

      function logout()
    {
        Auth::logout();
        return redirect('/welcome');
    }
    

    public function getTokenapi()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $users = Auth::user();
            if ($users->getRememberToken() == NULL) 
            {
                $token = Str::random(15);
                $users->setRememberToken($token);
                $users->save();
            }

            return response()->json(
              ['Key Generated' => $users->getRememberToken()], 200);
        }

        else
        {
            return response()->json(
              ['error'=>'Unauthorised'], 401);
        }
        
    }
    

    public function apisearch()
    {
      $collected_token = (array)DB::select('select remember_token from users');
      $token_json = json_encode($collected_token);
      $words = request('query');
      $limit = request('l');
      $key = request('key');
      $client =  ClientBuilder::create()->build();
      $users = Auth::user();

      if ((str_contains($token_json, $key)) && $key != NULL) 
      {

                  $searchParams = [
                    'index' => 'metadata',
                    'from' => 0,
                    'size' => $limit,
                    'type' => '_doc',
                    'body' => [
                      'query' => [
                            'multi_match' => [
                                'query' => $words,
                                'fields' => ['author','university','degree','program','title','$etd_file_id','$year','abstract','advisor','wiki_terms'],
    
                            ]
                            ]
                            ]
                            ];

          $test_page = 1;
          $results = $client->search($searchParams);
          $count = $results['hits']['total']['value'];
          $result_store = $results['hits']['hits'];


          
         foreach( $result_store as $store)
          {       
              
              $json_format[$test_page]['abstract'] = $results['hits']['hits'][$test_page-1]['_source']['abstract'];
              // $json_format[$test_page]['advisor'] = $results['hits']['hits'][$test_page-1]['_source']['advisor'];
              $json_format[$test_page]['wiki_terms'] = $results['hits']['hits'][$test_page-1]['_source']['wiki_terms'];
              $json_format[$test_page]['etd_file_id'] = $results['hits']['hits'][$test_page-1]['_source']['etd_file_id'];
              $json_format[$test_page]['year'] = $results['hits']['hits'][$test_page-1]['_source']['year'];
              $json_format[$test_page]['title'] = $results['hits']['hits'][$test_page-1]['_source']['title'];
              $json_format[$test_page]['author'] = $results['hits']['hits'][$test_page-1]['_source']['author'];
              $json_format[$test_page]['program'] = $results['hits']['hits'][$test_page-1]['_source']['program'];
              $json_format[$test_page]['university'] = $results['hits']['hits'][$test_page-1]['_source']['university'];
              $json_format[$test_page]['degree'] = $results['hits']['hits'][$test_page-1]['_source']['degree'];
              
              $test_page+=1;
              // if( empty($title) || empty($author) || empty($etd) || empty($year) || empty($univ) || empty($deg) || empty($prog) || empty($abs) || empty($wiki) )
              // {
              //   echo " Either of the fields are missing !";
              // }
          }

          return response()->json(
            ['response' => $json_format], 200);

      } 
      
      else 
      {
          return response()->json(
            ['error' => 'You are not Authorised to Access query'.$words.',since there is no key.'], 401);
      }
  }

}
