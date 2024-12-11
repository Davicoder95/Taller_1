<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserFormRequest;
use App\Http\Requests\LoginUserFormRequest;
use App\Models\Country;
use App\Models\User;
use App\Http\Controllers\DiscordWebhookController;

class AuthController extends Controller
{
    public $discord;

    public function __construct(DiscordWebhookController $discord){
        $this->discord = $discord;
    }

    public function register (RegisterUserFormRequest $request){
        $request->validated();
       // Crear el nuevo usuario y guardarlo en la variable $user
    $user = User::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'gender' => $request->gender,
        'address' => $request->address,
        'phone' => $request->phone,
        'country_id' => $request->country_id,
    ]);

    // Enviar el mensaje al webhook de Discord con los datos del usuario
    $this->discord->sendNewUserMessage($user->name, $user->lastname, $user->email);
return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
    }

    public function ShowLogin(){
        return view('auth.login');
    }

    public function ShowRegister(){
        $countries= Country::all();
        return view('auth.register',compact('countries'));
    }

    public function Login(LoginUserFormRequest $request){
        $credentials=$request->validated();

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function Logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
