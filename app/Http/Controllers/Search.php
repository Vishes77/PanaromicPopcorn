<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Search extends Controller
{
    public function searchquery(Request $req)
    {
        $q = $req->input('q');
        $page = 1;
        $pageno = $req->input('pageNo');
        if (!isset($pageno) || $pageno <= 0 || !is_numeric($pageno)) {
            $page = 1;
        } else {
            $page = $pageno;
        }
        $response = Http::get('http://www.omdbapi.com/?apikey=26fbcb11&s=' . $q . '&page=' . $page);
        $responseBody = $response->body();
        $responseBody = json_decode($responseBody, true);
        if ($responseBody['Response'] == "True")
            // return $responseBody;
            return view('searchResult', ['data' => $responseBody, 'result' => 1]);
        else
            return view('searchResult', ['result' => 0]);
    }
}
