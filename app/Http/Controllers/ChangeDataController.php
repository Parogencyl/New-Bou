<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class ChangeDataController extends Controller
{
    public function changeName(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT email FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);

        if ($request->input('name')) {
            $name = $request->input('name');
            $surname = $request->input('surname');
            DB::update("UPDATE clients SET name=?, surname=? WHERE email=?", [$name, $surname, $data['email']]);
        } elseif ($request->input('email')) {
            $email = $request->input('email');
            DB::update("UPDATE clients SET email=? WHERE email=?", [$email, $data['email']]);
            session(['email' => $email]);
        } elseif ($request->input('phone')) {
            $phone = $request->input('phone');
            DB::update("UPDATE clients SET number=? WHERE email=?", [$phone, $data['email']]);
        } elseif ($request->input('address')) {
            $name = $request->input('address');
            $surname = $request->input('surname');
            $province = $request->input('province');
            $country = $request->input('country');

            $local_number = strrpos($name, ' ', -1);
            $length = $local_number;
            $local_number = substr($name, $length);
            $street = substr($name, 0, $length);

            $location = strrpos($surname, ' ', -1);
            $length = $location;
            $location = substr($surname, $length);
            $zip = substr($surname, 0, $length);

            DB::update("UPDATE clients_address INNER JOIN clients ON clients_address.User_Id=clients.id_client SET Local_number=?, Street=?, Location=?, Zip=?, Voivodeship=?, Country=? WHERE email=?", [$local_number, $street, $location, $zip, $province, $country, $data['email']]);
        } else {
            $name = $request->input('additionalAddress');
            $surname = $request->input('surname');
            $province = $request->input('province');
            $country = $request->input('country');

            $local_number = strrpos($name, ' ', -1);
            $length = $local_number;
            $local_number = substr($name, $length);
            $street = substr($name, 0, $length);

            $location = strrpos($surname, ' ', -1);
            $length = $location;
            $location = substr($surname, $length);
            $zip = substr($surname, 0, $length);

            DB::update("UPDATE clients_add_address INNER JOIN clients ON clients_add_address.User_Id=clients.id_client SET Local_Number=?, Street=?, Location=?, Zip=?, Voivodeship=?, Country=? WHERE email=?", [$local_number, $street, $location, $zip, $province, $country, $data['email']]);
        }

        return redirect('panel/dane_konta');
    }

    public function changePassword(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT email FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);

        if ($request->input('currentPassword')) {
            $currentPassword = $request->input('currentPassword');
            $passwordDb =  DB::select("SELECT password FROM clients WHERE email=?", [$data['email']]);
            $passwordDb = json_decode(json_encode($passwordDb[0]), true);

            if ($passwordDb['password'] == $currentPassword) {
                $newPassword = $request->input('newPassword');
                $repeatPassword = $request->input('repeatPassword');
                if ($newPassword == $repeatPassword) {
                    DB::update("UPDATE clients SET password=? WHERE email=?", [$newPassword, $data['email']]);
                } else {
                    return back()->with('error', 'Błędne dane.');
                }
            } else {
                return back()->with('error', 'Błędne dane.');
            }
        } else {
            return back()->with('error', 'Błędne dane.');
        }
        return back()->with('success', 'Hasło zostało zmienione.');
    }

    public function addEmail(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT email FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);

        if ($request->input('email')) {
            $email = $request->input('email');
            DB::update("UPDATE clients SET email_additional=? WHERE email=?", [$email, $data['email']]);
        }
        return redirect('panel/adres_pomocniczy');
    }

    public function changeAdditionalEmail(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT email FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);

        if ($request->input('emailChange')) {
            $emailChange = $request->input('emailChange');
            DB::update("UPDATE clients SET email_additional=? WHERE email=?", [$emailChange, $data['email']]);
        }
        return redirect('panel/adres_pomocniczy');
    }

    public function deleteAddress(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT email FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);
            
        DB::update("UPDATE clients SET email_additional='' WHERE email=?", [$data['email']]);

        return redirect('panel/adres_pomocniczy');
    }

    
    public function opinion(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT email, id_client FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);
            

        if ($request->input('stars')) {
            $stars = $request->input('stars');
            $element = $request->input('element');
            $text = $request->input('text');
            $element -= 1;

            $date = date("Y-m-d H:i:s", strtotime('+2 hours'));

            $numbe_of_element = DB::select('SELECT User_history FROM clients_shop_history WHERE User_Id=? LIMIT '.$element.',1', [$data['id_client']]);
            $numbe_of_element = json_decode(json_encode($numbe_of_element[0]), true);

            DB::update("UPDATE clients_shop_history SET Opinion=1, Opinion_stars=?, Opinion_description=?, Opinion_date=? WHERE User_history=?", [$stars, $text, $date, $numbe_of_element['User_history']]);
        }
        return redirect('panel/historia_zakupow');
    }
}
