<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword1 = $request->input("keyword1");
        $keyword2 = $request->input("keyword2");
        $keyword = $keyword1 . ", " . $keyword2;
        
        $endpoint = 'https://api.flickr.com/services/rest/?&method=flickr.photos.search&format=json&nojsoncallback=1';
        $tags = $keyword;
        $api_key = "57f694132e4714c29a64c9af890b124e";
        $per_page = 10;
        $url = $endpoint . "&api_key=" . $api_key . "&tags=" . $tags . "&per_page=" . $per_page;
        $client = new Client();
        $res = $client->post($url, [
                'headers' => [
                'Content-Type' => "application/x-www-form-urlencoded",
                'Accept' => "application/x-www-form-urlencoded",
                ]
        ]);
        $flickr_response = json_decode($res->getBody(), true);
        return view('home')->with(array('flickr_response' => $flickr_response));
    }

}
