<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected $users;

    private $salt = 'd033e22ae348aeb5660fc2140aec35850c4da997';

    public function __construct(Auth $auth)
    {
        $this->middleware('answer');
    }

    public function registration(Request $request){
        $validatedData = $this->validate($request,[
            'login' => 'required|string|unique:users|exists:users',
            'password' => 'required|string',
            'name' => 'required|string'
        ]);
        $user = new User;
        $user->login = $validatedData['login'];
        $user->name = $validatedData['name'];
        $user->password = Crypt::encrypt(Hash::make($validatedData['password'] . $this->salt));
        $user->save();
        return true;
    }

    public function login(Request $request){
        $validatedData = $this->validate($request,[
            'login' => 'required|string|exists:users',
            'password' => 'required|string',
        ]);
        $login = $validatedData['login'];
        $password = $validatedData['password'];
        $user = User::where('login', $login)->first();
        if (Hash::check($password . $this->salt, Crypt::decrypt($user->password))){
            $token = Hash::make(random_bytes(32));
            $user->token = $token;
            $user->save();
            return['token' => $token];
        }
        return new JsonResponse('Неверный пароль',422);
    }
}