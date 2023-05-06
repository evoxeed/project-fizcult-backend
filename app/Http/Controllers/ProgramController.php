<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;
use Auth;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('answer');
    }

    public function getProgram(){

    }

    public function setProgramName(){

    }

    public function deleteProgram(){
        
    }

    public function addLevel(Request $request){
        $validatedData = $this->validate($request,[
            'id' => 'required|numeric|exists:programs',
            'name' => 'required|string|max:30',
            'value' => 'required|numeric'
        ]);
        $id = $validatedData['id'];
        $name = $validatedData['name'];
        $value = $validatedData['value'];
        $program = Program::find($id);
        $program->addLevel($name,$value);
        return true;
    }
}