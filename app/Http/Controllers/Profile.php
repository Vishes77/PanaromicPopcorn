<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Profile extends Controller
{
    public function profile($user)
    {
        $table = DB::table('users')
            ->select()
            ->where('username', $user)
            ->get();
        $list = DB::table('list')
            ->select('imdb', 'title', 'datetime')
            ->where('username', $user)
            ->reorder('datetime', 'desc')
            ->get();
        $table = json_decode(json_encode($table), true);
        $list = json_decode(json_encode($list), true);
        if (count($table)) {
            return view("profile", ["data" => $table, "list" => $list]);
        } else {
            return response('User doesn\'t exist', 404)->header('Content-Type', 'text/plain');
        }
    }
}
