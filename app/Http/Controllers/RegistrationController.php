<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('uzytkownik.registration');
    }
    
    public function store(Request $request)
    {
        $day = $request->input('day');
        $year = $request->input('year');
        $month = $request->month;
        $date = $year."-".$month."-".$day;

        DB::insert(
            "INSERT INTO clients(name, surname, email, password, number, date_of_birth, login) values(?, ?, ?, ?, ?, ?, ?)",
            [$request->input('name'), $request->input('surname'), $request->input('email'), $request->input('password'), $request->input('tel'),
        $date, '0']
        );

        $id = DB::select("SELECT id_client FROM clients WHERE email=?", [$request->input('email')]);
        $id = json_decode(json_encode($id[0]), true);

        DB::insert("INSERT INTO clients_address(User_Id) values(?)", [$id['id_client']]);

        DB::insert("INSERT INTO clients_add_address(User_Id) values(?)", [$id['id_client']]);

        
        return redirect()->to('/logowanie');

        /*
        $user = Clients::create(request(['name', 'surname', 'email', 'password', 'number', 'day', 'month', 'year', 'send']));
        auth()->login($user);
        */
    }
}
