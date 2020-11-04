<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->get('email')) {
            return view('konto/main');
        } else {
            return view('uzytkownik/login');
        }
    }

    public function checklogin(Request $request)
    {
        //switch ($request['button']) {
        //case 'login':
    
        $email = $request->input('email');
        $password = $request->input('password');
        $data = DB::select('SELECT email, password FROM clients WHERE email=? AND password=?', [$email, $password]);
        if ($data) {
            $data = json_decode(json_encode($data[0]), true);

            if ($password == $data['password']) {
                DB::update("UPDATE clients SET login=1 WHERE email=? AND password=?", [$email, $password]);

                session(['email' => $email]);
                return redirect('panel_uzytkownika');
            } else {
                return back()->with('error', 'Błędne dane');
            }
        } else {
            return back()->with('error', 'Błędne dane');
        }
    }

    public function getPassword(Request $request)
    {
        $email = $request->input('email');
        $data = DB::select('SELECT * FROM clients WHERE email=?', [$email]);
        if ($data) {
            $data = json_decode(json_encode($data[0]), true);

            // Generowanie hasła
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }

            $password = implode($pass); //turn the array into a string

            $subject = "Odzyskanie hasła";
            $name = $data['name'];
            $surname = $data['surname'];
            $text = "Powyższe hasło zostało wygenerowane automatycznie i będzie przypisane do dane emaila, dopóki nie zostanie zmienione przez właściciela konta. 
            W celu zmiany hasła należy zalogować się na konto za pomocą nowego hasła, a następnie w panelu użytkownika przejść do zakładki Biezpieczeństwo / Zmiana hasła.<br><br>
            Z poważaniem,<br> Serwis New Bou";
            
            $email_title = $subject;
            $email_from = "newbou@bohun.vot.pl";
            $email_message = "Email skierowany do ".$name." ".$surname.", osoby posiadającej konto w serwisie New Bou, próbującej odzyskać hasło do konta.<br>
            <br>Nowe wygenerowane hasło: ".$password."<br><br>".$text;

            $email_from_header = "Content-Type: text/html; charset=UTF-8";
            $to = $email;
            mail($to, $email_title, $email_message, $email_from_header);

            DB::update("UPDATE clients SET password=? WHERE email=?", [$password, $email]);
        
            return redirect('logowanie')->with('passwordSended', 'Nowe hasło zostało przesłane na podany email.');
        } else {
            return back()->with('error', 'Nie udało się wysłac hasła na podany email.');
        }
    }

    public function successlogin()
    {
        return view('konto/main');
    }

    public function logout()
    {
        $email = session()->get('email');
        DB::update("UPDATE clients SET login=0 WHERE email=?", [$email]);

        session()->flush();
        return redirect('logowanie');
    }
}
