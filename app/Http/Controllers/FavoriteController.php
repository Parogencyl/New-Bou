<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class FavoriteController extends Controller
{
    public function dislike(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT id_client FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);
    
        $series = $request->input('series');

        DB::delete("DELETE FROM clients_favorite WHERE User_Id=? AND Series=?", [$data['id_client'], $series]);
    
        return back();
    }
}
