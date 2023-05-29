<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $table = 'workouts';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'workout_type_id',
        'level_id',
        'description'
    ];

    protected $hidden = [
        'id',
        'level_id',
        'workout_type_id'
    ];

    /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function level(): array{
        return $this->belongsTo(Level::class);
    }

    public function workoutType(){
        return $this->belongsTo(WorkoutType::class);
    }
}