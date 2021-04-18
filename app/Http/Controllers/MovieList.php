<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MovieList extends Controller
{
    public function addtolist(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta");
        $title = $request->input('title');
        $imdb = $request->input('imdb');
        $type = $request->input('type');
        // return $add . " and " . $remove;
        if ($type == "add" && !empty($title) && !empty($imdb)) {
            $date = date('d-m-Y, h:i A');
            $username = session('uid');
            $table = DB::table('list')
                ->insert(['title' => $title, 'imdb' => $imdb, 'datetime' => $date, 'username' => $username]);
            if ($table) {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

        // if(!empty($title) && !empty($imdb) && $add)
        // $date = date('d-m-Y, h:i A');
        // $username = session('uid');
        // $table = DB::table('list')
        //     ->insert(['title' => $title, 'imdb' => $imdb, 'datetime' => $date, 'username' => $username]);
        // if ($table) {
        //     return redirect()->back();
        // }
    }
    public function showList($user)
    {

        $table = DB::table('users')->select()->where('username', $user)->get();
        if (count($table)) {
            $table = DB::table('list')
                ->select('imdb', 'title', 'datetime')
                ->where('username', $user)
                ->reorder('datetime', 'desc')
                ->get();
            $table = json_decode(json_encode($table), true);

            return view('list', ['data' => $table]);
        } else {
            return response('User doesn\'t exist', 404)->header('Content-Type', 'text/plain');
        }
    }
}
