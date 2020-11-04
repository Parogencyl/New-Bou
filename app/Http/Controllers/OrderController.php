<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class OrderController extends Controller
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
            $location = substr($surname, 7);
            $zip = substr($surname, 0, 6);

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

        return redirect('zamowienie');
    }

    public function swapAddress(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT id_client FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);

        $userAddress = DB::select('SELECT * FROM clients_address WHERE User_Id=?', [$data['id_client']]);
        $userAddress = json_decode(json_encode($userAddress[0]), true);

        $userAddressAdd = DB::select('SELECT * FROM clients_add_address WHERE User_Id=?', [$data['id_client']]);
        $userAddressAdd = json_decode(json_encode($userAddressAdd[0]), true);

        $local_number = $userAddress['Local_number'];
        $street = $userAddress['Street'];
        $location = $userAddress['Location'];
        $zip = $userAddress['Zip'];
        $voivodeship = $userAddress['Voivodeship'];
        $country = $userAddress['Country'];

        $local_number2 = $userAddressAdd['Local_Number'];
        $street2 = $userAddressAdd['Street'];
        $location2 = $userAddressAdd['Location'];
        $zip2 = $userAddressAdd['Zip'];
        $voivodeship2 = $userAddressAdd['Voivodeship'];
        $country2 = $userAddressAdd['Country'];

        DB::update("UPDATE clients_address SET Local_Number=?, Street=?, Location=?, Zip=?, Voivodeship=?, Country=? WHERE User_Id=?", [$local_number2, $street2, $location2, $zip2, $voivodeship2, $country2, $data['id_client']]);

        DB::update("UPDATE clients_add_address SET Local_Number=?, Street=?, Location=?, Zip=?, Voivodeship=?, Country=? WHERE User_Id=?", [$local_number, $street, $location, $zip, $voivodeship, $country, $data['id_client']]);
   
        return redirect('zamowienie');
    }

    public function buy(Request $request)
    {
        $emailUser = session()->get('email');
        $data = DB::select('SELECT id_client, number, name FROM clients WHERE email=?', [$emailUser]);
        $data = json_decode(json_encode($data[0]), true);

        $client_cart = DB::select("SELECT * FROM clients_cart WHERE User_Id=?", [$data['id_client']]);
        for ($i=0; $i < sizeof($client_cart); $i++) {
            ${'client_cart'.$i} = json_decode(json_encode($client_cart[$i]), true);
        }

        $userAddress = DB::select('SELECT * FROM clients_address WHERE User_Id=?', [$data['id_client']]);
        $userAddress = json_decode(json_encode($userAddress[0]), true);



        // Dodawanie do tabeli zamówienia

        if (DB::select("SELECT order_number FROM `clients_order` ORDER BY order_number DESC LIMIT 1")) {
            $orderNumber = DB::select("SELECT order_number FROM `clients_order` ORDER BY order_number DESC LIMIT 1");
            $orderNumber = json_decode(json_encode($orderNumber[0]), true);
            $orderNumber = $orderNumber['order_number'];
        } else {
            $orderNumber = 0;
        }

        $orderNumber += 1;

        $list = "";
        $price = 0;
        for ($i=0; $i < sizeof($client_cart); $i++) {
            $list .= ${'client_cart'.$i}['Series']." - ".${'client_cart'.$i}['Size'];
            if (sizeof($client_cart) > $i+1) {
                $list .= " / ";
            }
            $price += ${'client_cart'.$i}['Price'];
        }

        DB::insert(
            "INSERT INTO clients_order(user_id, order_list, price, order_number) values(?, ?, ?, ?)",
            [$data['id_client'], $list, $price, $orderNumber]
        );
        


        // Dodawanie do historii zakupów
        
        for ($i=0; $i < sizeof($client_cart); $i++) {
            DB::insert(
                "INSERT INTO clients_shop_history(User_Id, Price, Series, Image, 
            Location, Zip, Street, Local_number, Voivodeship, Country, Number) 
            values(?, ? ,? ,? ,? ,? ,?, ?, ?, ?, ?)",
                [$data['id_client'], ${'client_cart'.$i}['Price'],
            ${'client_cart'.$i}['Series'], ${'client_cart'.$i}['Image'], $userAddress['Location'], $userAddress['Zip'],
            $userAddress['Street'], $userAddress['Local_number'], $userAddress['Voivodeship'], $userAddress['Country'], $data['number']]
            );

            DB::delete("DELETE FROM clients_cart WHERE Shopping_Cart=?", [${'client_cart'.$i}['Shopping_Cart']]);
        }



        /*

        $email_title = "Dziękujemy za zakup obuwia - New Bou";
        $email_from = "newbou@nbshop.pl";
        $email_message = "Dziękujemy bardzo za dokonanie zakupu w naszym serwisie New Bou. Mamy nadzieję, że zakupiony towar spełni swoją rolę i da dużo satysfakcji podczas użytkowania. W razie pytań, bądź jakich kolwiek problemów posimy pisać do Nas na email newbou@nbshop.pl. Jeszcze raz dziękujemy i pozdrawiamy. New Bou";

        $email_from_header = "Email wysłany przez ".$email_from;
        $to = $emailUser;
        mail($to, $email_title, $email_message, $email_from_header);

        */

        // Multiple recipients
        $to = $emailUser; // note the comma

        // Subject
        $subject = 'Dziękujemy za zakup w serwisie New Bou.';

        $mailTable = "";
        for ($i=0; $i < sizeof($client_cart); $i++) {
            $mailTable .= '<tr>
            <td>'.${'client_cart'.$i}['Series'].'</td><td>'.${'client_cart'.$i}['Size'].'</td><td>'.${'client_cart'.$i}['Price'].' zł</td></tr>';
        }

        // Message
        $message = '
        <html>
        <head>
        <title>Serwis New Bou dziękuje za dokonanie zakupu.</title>
        </head>
        <body>
        <p> Mamy nadzieję, że zakupiony towar spełni swoją rolę i da dużo satysfakcji podczas użytkowania.</p>
        <table>
            <tr>
            <th>Seria obuwia</th><th>Rozmiar</th><th>Cena</th>
            </tr>'.$mailTable.'
        </table>
        <p> W razie pytań, bądź jakich kolwiek problemów posimy pisać do Nas na email newbou@bohun.vot.pl. </p>
        <p> Jeszcze raz dziękujemy i pozdrawiamy. </p>
        <p> New Bou </p>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-Type: text/html; charset=UTF-8';

        // Additional headers
        $headers[] = 'To: '.$data['name'].' <'.$emailUser.'>';
        $headers[] = 'From: New Bou <newbou@bohun.vot.pl>';

        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));
    
        
        return redirect('/')->with('bought', 'Dziękujemy za zakup');
    }
}
