<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class ShoppingCartController extends Controller
{
    public function changeSize(Request $request)
    {
        if ($request->input('sizeOfBoots')) {
            $sizeOfBoots = $request->input('sizeOfBoots');
            $element = $request->input('element');

            DB::update("UPDATE clients_cart SET Size=? WHERE Shopping_Cart=?", [$sizeOfBoots, $element]);
        }
        return redirect('koszyk');
    }

    public function deleteShoes(Request $request)
    {
        if ($request->input('element')) {
            $element = $request->input('element');

            DB::delete("DELETE FROM clients_cart WHERE Shopping_Cart=?", [$element]);
        }
        return redirect('koszyk');
    }
}
