<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        /*
        $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:6'
     ]);

        */
    
        $email = $request->input('email');
        $password = $request->input('password');
        $data = DB::select('SELECT email, password FROM admin_account WHERE email=?', [$email]);
        $data = json_decode(json_encode($data[0]), true);

        if (Hash::check($password, $data['password'])) {
            session(['email_admin' => $email]);
            return redirect('admin/panel');
        } else {
            return back()->with('error', 'Błędne dane');
        }
    }
            

    public function logout()
    {
        $email = session()->get('email_admin');

        session()->flush();
        return redirect('admin/logowanie');
    }

    public function registration(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6',
            'repeatPassword' => 'required|min:6|max:20|same:password',
           ]);

        $email = $request->input('email');
        $password = $request->input('password');

        DB::insert("INSERT INTO admin_account(email, password) values(?, ?)", [$email, Hash::make($password)]);

        return back()->with('success', 'Administrator został dodany.');
    }

    public function newProduct(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|min:2',
           ]);

        $series = $request->input('series');
        $price = $request->input('price');
        $description = $request->input('description');
        $category = $request->input('category');
        $seazon = $request->input('seazon');
        $for_who = $request->input('for_who');
        $size_min = $request->input('size_min');
        $size_max = $request->input('size_max');
        $image = $request->file('image');
        $image2 = $image3 = $image4 = "";

        // public_uploads skonfigurowane jest w config/filesystems.php
        $path = $series."_1.jpg";
        Storage::disk('public_uploads')->putFileAs('', $image, $path);

        if ($request->file('image2')) {
            $image2 = $request->file('image2');
            $path = $series."_2.jpg";
            Storage::disk('public_uploads')->putFileAs('', $image2, $path);
        }
        if ($request->file('image3')) {
            $image3 = $request->file('image3');
            $path = $series."_3.jpg";
            Storage::disk('public_uploads')->putFileAs('', $image3, $path);
        }
        if ($request->file('image4')) {
            $image4 = $request->file('image4');
            $path = $series."_4.jpg";
            Storage::disk('public_uploads')->putFileAs('', $image4, $path);
        }

        $image1_path = "public/graphics/main/".$series."_1.jpg";

        
        DB::insert("INSERT INTO Shoes(Series, Price, Description, Category, Seazon, For_who, Availability, Size_Min, Size_Max, Image)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$series, $price, $description, $category, $seazon, $for_who, 1, $size_min, $size_max, $image1_path]);


        if ($image2 != "") {
            $image2_path = "public/graphics/main/".$series."_2.jpg";
            if ($image3 != "") {
                $image3_path = "public/graphics/main/".$series."_3.jpg";
                if ($image4 != "") {
                    $image4_path = "public/graphics/main/".$series."_4.jpg";
                    DB::insert("INSERT INTO Shoes_Images(Image1, Image2, Image3, Image4)
                    values(?, ?, ?, ?)", [$image1_path, $image2_path, $image3_path, $image4_path]);
                } else {
                    DB::insert("INSERT INTO Shoes_Images(Image1, Image2, Image3)
                    values(?, ?, ?)", [$image1_path, $image2_path, $image3_path]);
                }
            } else {
                DB::insert("INSERT INTO Shoes_Images(Image1, Image2)
                values(?, ?)", [$image1_path, $image2_path]);
            }
        } else {
            DB::insert("INSERT INTO Shoes_Images(Image1)
            values(?)", [$image1_path]);
        }

        return back()->with('success', 'Produkt został dodany.');
    }

    public function changeProduct(Request $request)
    {
        $series = $request->input('series');
        $price = $request->input('price');
        $price_new = $request->input('price_new');
        $description = $request->input('description');
        $category = $request->input('category');
        $seazon = $request->input('seazon');
        $for_who = $request->input('for_who');
        $size_min = $request->input('size_min');
        $size_max = $request->input('size_max');
        $image = $request->file('image');
        $image2 = $image3 = $image4 = "";

        // public_uploads skonfigurowane jest w config/filesystems.php
        $path = $series."_1.jpg";
        Storage::disk('public_uploads')->putFileAs('', $image, $path);

        if ($request->file('image2')) {
            $image2 = $request->file('image2');
            $path = $series."_2.jpg";
            Storage::disk('public_uploads')->putFileAs('', $image2, $path);
        }
        if ($request->file('image3')) {
            $image3 = $request->file('image3');
            $path = $series."_3.jpg";
            Storage::disk('public_uploads')->putFileAs('', $image3, $path);
        }
        if ($request->file('image4')) {
            $image4 = $request->file('image4');
            $path = $series."_4.jpg";
            Storage::disk('public_uploads')->putFileAs('', $image4, $path);
        }

        $image1_path = "public/graphics/main/".$series."_1.jpg";

        
        DB::update(
            "UPDATE Shoes SET Price=?, Price_new=?, Description=?, Category=?, Seazon=?, For_who=?, Size_Min=?, Size_Max=?, Image=? WHERE Series=?",
            [$price, $price_new, $description, $category, $seazon, $for_who, $size_min, $size_max, $image1_path, $series]
        );

        $shoes = DB::select('SELECT Id_Shoes FROM Shoes WHERE Series=?', [$series]);
        $shoes = json_decode(json_encode($shoes[0]), true);

        if ($image2 != "") {
            $image2_path = "public/graphics/main/".$series."_2.jpg";
            if ($image3 != "") {
                $image3_path = "public/graphics/main/".$series."_3.jpg";
                if ($image4 != "") {
                    $image4_path = "public/graphics/main/".$series."_4.jpg";
                    DB::update(
                        "UPDATE Shoes_Images SET Image1=?, Image2=?, Image3=?, Image4=? WHERE Shoes_Id=?",
                        [$image1_path, $image2_path, $image3_path, $image4_path, $shoes['Id_Shoes']]
                    );
                } else {
                    DB::update(
                        "UPDATE Shoes_Images SET Image1=?, Image2=?, Image3=? WHERE Shoes_Id=?",
                        [$image1_path, $image2_path, $image3_path, $shoes['Id_Shoes']]
                    );
                }
            } else {
                DB::update(
                    "UPDATE Shoes_Images SET Image1=?, Image2=? WHERE Shoes_Id=?",
                    [$image1_path, $image2_path, $shoes['Id_Shoes']]
                );
            }
        } else {
            DB::update(
                "UPDATE Shoes_Images SET Image1=? WHERE Shoes_Id=?",
                [$image1_path, $shoes['Id_Shoes']]
            );
        }

        return back()->with('success', 'Produkt został zmodyfikowany.');
    }

    public function changeStatus(Request $request)
    {
        $elementNumber = $request->input('number');

        if (DB::update("UPDATE clients_order SET status=? WHERE order_number=?", [$request['button'], $elementNumber])) {
            return back()->with('success', 'Status zamówienia numer '.$elementNumber.' został zmieniony.');
        } else {
            return back()->with('lose', 'Nie udało się zmienić statusu zamówienia numer '.$elementNumber.'.');
        }
    }
}
