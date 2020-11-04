<?
    if(session()->get('email')){
        $email = session()->get('email');
        $user = DB::select("SELECT * FROM clients WHERE email=?", [$email]);
        $user = json_decode(json_encode($user[0]), true);

        $client_favorite = DB::table('clients_favorite')->where('User_Id', [$user["id_client"]])->count();
        $cartNumber = DB::table('clients_cart')->where('User_Id', [$user["id_client"]])->count();
    }
?>

<div class="col-md-1 col-lg-2 col-sm-0"></div>
<div id="logo" class="col-lg-2 col-md-4 col-12 text-center">
    <a href="{{ url('/')}}">
        <img src="{{ asset('public/graphics/main/logo2.jpg')}}" alt="logo new balance" height="60px">
    </a>
</div>
<div class="col-md-1 col-lg-2 col-sm-0"></div>
<div id="account" class="col-lg-2 col-md-2 col-4 text-center pt-1">
    <a href="{{ url('/logowanie')}}" class="nav-link text-body">
        <i class="far fa-user"></i> </br>
            Moje konto    
    </a>
</div>
<div id="favorite" class="col-lg-2 col-md-2 col-4 text-center pt-1">
    <a href="{{ url('/ulubione')}}" class="nav-link text-body">
        <i class="far fa-heart text-danger"></i> </br>
        Ulubione
        
        @if (session()->get('email'))
        @if ($client_favorite)
            <span class="badge badge-danger">{{ $client_favorite}}</span>    
        @endif
        @endif
    </a>
</div>
<div id="basket" class="col-lg-2 col-md-2 col-4 text-center pt-1">
    <a href="{{ url('/koszyk')}}" class="nav-link text-body">
        <i class="fas fa-shopping-basket text-secondary"></i> </br>
        Koszyk
        @if (session()->get('email'))
        @if ($cartNumber)
            <span class="badge badge-danger">{{ $cartNumber}}</span>    
        @endif
        @endif
    </a>
</div>