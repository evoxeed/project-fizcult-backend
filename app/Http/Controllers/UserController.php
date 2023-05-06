<?php

namespace App\Http\Controllers;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('answer');
    }

    public function setPassword(){

    }

    public function setName(){

    }

    public function addProgram(){

    }

    public function getFullAttributesData(){
        return Auth::user()->getUserAttributesData();
    }

}