<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/nav1', function () {
    return view('nav1');
});

Route::get('/nav2', function () {
    return view('nav2');
});

Route::get('/footer', function () {
    return view('footer');
});

/* Menu 1, rejestracja, koszyk */

Route::get('/logowanie', 'LoginController@index');
Route::post('/logowanie/checklogin', 'LoginController@checklogin');
Route::get('/logowanie/odzyskaj_haslo', function () {
    return view('uzytkownik/getPassword');
});
Route::post('/logowanie/odzyskaj_haslo/getPassword', 'LoginController@getPassword');

Route::get('/panel_uzytkownika', 'LoginController@successlogin');
Route::get('/logout', 'LoginController@logout');

Route::get('/rejestracja', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


Route::get('/ulubione', function () {
    return view('uzytkownik/favorite');
});
Route::post('/ulubione/nie_lubie', 'FavoriteController@dislike');

Route::get('/koszyk', function () {
    return view('uzytkownik/shoppingCart');
});

Route::get('/zamowienie', function () {
    return view('uzytkownik/order');
});

/* Przegląd obuwia */

Route::get('/obuwie/{series}', function () {
    return view('wyszukiwanie/boots');
});

Route::get('/obuwie', function (Request $request) {
    session(['category' => request()->kategoria]);
    return view('wyszukiwanie/shoes');
});

Route::post('/obuwie/dodaj_koszyk', 'ShoesController@addToCart');
Route::post('/obuwie/dodaj_ulubione', 'ShoesController@addToFavorite');


/* Informacje */

Route::get('/o_nas', function () {
    return view('informacje/about');
});

Route::get('/polityka_prywatnosci', function () {
    return view('informacje/privacyPolicy');
});

Route::get('/oceny', function () {
    return view('informacje/reviews');
});

/* Obsługa klienta */

Route::get('/zwrot_wymiana_reklamacja', function () {
    return view('obsluga_klienta/returnChange');
});

Route::get('/pomoc', function () {
    return view('obsluga_klienta/contact');
});

Route::post('/email/wyslij', 'SendEmailController@sendEmail');

/* Panel użytkownika */
Route::get('/panel/historia_zakupow', function () {
    if (session()->get('email')) {
        return view('konto/shoppingHistory');
    } else {
        return view('uzytkownik/login');
    }
});

Route::get('/panel/zmiana_hasla', function () {
    if (session()->get('email')) {
        return view('konto/changePassword');
    } else {
        return view('uzytkownik/login');
    }
});

Route::get('/panel/dane_konta', function () {
    if (session()->get('email')) {
        return view('konto/accountData');
    } else {
        return view('uzytkownik/login');
    }
});

Route::get('/panel/adres_pomocniczy', function () {
    if (session()->get('email')) {
        return view('konto/secondaryAddress');
    } else {
        return view('uzytkownik/login');
    }
});

// Obsługa formularzy zmiany danych kont
Route::post('/panel/zmiana_danych', 'ChangeDataController@changeName');
Route::post('/panel/zmiana_hasla_formularz', 'ChangeDataController@changePassword');
Route::post('/panel/dodanie_maila', 'ChangeDataController@addEmail');
Route::post('/panel/zmiana_adresu_pomocniczego', 'ChangeDataController@changeAdditionalEmail');
Route::post('/panel/usun_email', 'ChangeDataController@deleteAddress');
Route::post('/panel/opinion', 'ChangeDataController@opinion');

// Zarządzanie koszykiem
Route::post('/koszyk/zmiana_rozmiaru', 'ShoppingCartController@changeSize');
Route::post('/koszyk/usuniecie_obuwia', 'ShoppingCartController@deleteShoes');

Route::post('/zamowienie/zmiana_danych', 'OrderController@changeName');
Route::post('/zamowienie/zamiana_adresow', 'OrderController@swapAddress');
Route::post('/zamowienie/zakup', 'OrderController@buy');


        // Admin
Route::get('/admin', function () {
    if (session()->get('email_admin')) {
        return redirect('admin/panel');
    } else {
        return redirect('admin/logowanie');
    }
});

// Admin panel
Route::get('/admin/panel', function () {
    if (session()->get('email_admin')) {
        return view('admin/panel');
    } else {
        return redirect('admin/logowanie');
    }
});
Route::post('/admin/panel/add', 'AdminController@newProduct');

Route::post('/admin/panel/image', 'AdminController@sendImage');


// Admin logowanie
Route::get('/admin/logowanie', function () {
    if (session()->get('email_admin')) {
        return redirect('admin/panel');
    } else {
        return view('admin/login');
    }
});
Route::post('/admin/login/log', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');


// Admin edycja
Route::get('/edytuj', function () {
    if (session()->get('email_admin')) {
        return view('admin/showShoes');
    } else {
        return redirect('admin/logowanie');
    }
});

Route::get('/edytuj/{series}', function () {
    if (session()->get('email_admin')) {
        return view('admin/edit');
    } else {
        return redirect('admin/logowanie');
    }
});

Route::post('/edytuj/update', 'AdminController@changeProduct');

// Admin zamówienia
Route::get('admin/zamowienia', function () {
    if (session()->get('email_admin')) {
        return view('admin/orders');
    } else {
        return redirect('admin/logowanie');
    }
});

Route::post('/admin/zamowienia/change', 'AdminController@changeStatus');


// Admin zestawienie sprzedaży
Route::get('admin/zestawienie', function () {
    if (session()->get('email_admin')) {
        return view('admin/summary');
    } else {
        return redirect('admin/logowanie');
    }
});


// Admin rejestracja
Route::get('/admin/rejestracja', function () {
    if (session()->get('email_admin')) {
        return view('admin/registration');
    } else {
        return redirect('admin/logowanie');
    }
});
Route::post('/admin/registration/add', 'AdminController@registration');

Route::get('/navAdmin', function () {
    return view('navAdmin');
});

Route::get('/nav2Admin', function () {
    return view('nav2Admin');
});
