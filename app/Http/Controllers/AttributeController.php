<?php

namespace App\Http\Controllers;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Auth;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('answer');
    }

    public function addAttribute(Request $request){
        $validatedData = $this->validate($request,[
            'name' => 'required|unique:attributes|max:30'
        ]);
        Attribute::create(['name' => $validatedData['name']]);
        return true;
    }

    public function getAttributes(){
        $attributes = Attribute::all();
        return $attributes;
    }

    public function getAttribute(Request $request){
        $validatedData = $this->validate($request,[
            'id' => 'required|numeric|exists:attributes'
        ]);
        return Attribute::find($validatedData['id']);
    }

    public function setAttributeName(Request $request){
        $validatedData = $this->validate($request,[
            'id' => 'required|numeric|exists:attributes',
            'name' => 'required|unique:attributes|max:30'
        ]);
        $id = $validatedData['id'];
        $name = $validatedData['name'];
        $attribute = Attribute::find($id);
        $attribute->name = $name;
        $attribute->save();
        return true;
    }

    public function deleteAttribute(Request $request){
        $validatedData = $this->validate($request,[
            'id' => 'required|numeric|exists:attributes'
        ]);
        $attribute = Attribute::find($validatedData['id']);
        $attribute->delete();
        return true;
    }

    public function addProgram(){
        
    }
}