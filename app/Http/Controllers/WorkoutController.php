<?php

namespace App\Http\Controllers;
use App\Models\Workout;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Attribute;
use Auth;

class WorkoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add($name){
        $workout = Workout::create(['name'=>$name]);
    }

    public function getWorkout($workoutId){
        if ($workoutId) {
            $workouts = Auth::user()->attributes();
        };
        return $workouts;
    }
}