<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class ShoesController extends Controller
{
    public function addToCart(Request $request)
    {
        if (session()->get('email')) {
            $emailUser = session()->get('email');
            $data = DB::select('SELECT id_client FROM clients WHERE email=?', [$emailUser]);
            $data = json_decode(json_encode($data[0]), true);
    
            $series = $request->input('series');
            $size = $request->input('size');
            $price = $request->input('price');
    
            if ($size == '') {
                return back()->with('errorCart', 'Należy wybrać rozmiar obuwia.');
            } else {
                $image = DB::select("SELECT Image FROM Shoes WHERE Series=?", [$series]);
                $image = json_decode(json_encode($image[0]), true);
    
                DB::insert("INSERT INTO clients_cart(User_Id, Series, Size, Price, Image) 
                values(?, ?, ?, ?, ?)", [$data['id_client'], $series, $size, $price, $image['Image']]);
        
                return back()->with('addedCart', 'Produkt został dodany do koszyka.');
            }
        } else {
            return back()->with('errorCart', 'Należy być zalogowanym, aby móc dodać produkt do koszyka.');
        }
    }

    public function addToFavorite(Request $request)
    {
        if (session()->get('email')) {
            $emailUser = session()->get('email');
            $data = DB::select('SELECT id_client, number FROM clients WHERE email=?', [$emailUser]);
            $data = json_decode(json_encode($data[0]), true);
        
            $series = $request->input('series');

            //sprawdzenie, żeby nie dodawać ponownie tego samego obuwia do ulubionych
            $favorite = DB::select("SELECT Series FROM clients_favorite WHERE User_Id=?", [$data['id_client']]);
            for ($i=0; $i < sizeof($favorite); $i++) {
                $check = json_decode(json_encode($favorite[$i]), true);
                if ($check['Series'] == $series) {
                    return back()->with('errorFavorite', 'Wybrane obuwie znajduję się już na liscie ulubionych produtków.');
                }
            }

            DB::insert("INSERT INTO clients_favorite(User_Id, Series) values(?, ?)", [$data['id_client'], $series]);

            return back()->with('addedFavorite', 'Produkt został dodany do ulubionych.');
        } else {
            return back()->with('errorFavorite', 'Należy być zalogowanym, aby móc dodać produkt do ulubionych.');
        }
    }
}
