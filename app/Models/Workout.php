<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Workout extends Model
{
    protected $table = 'workouts';
    /**
     * Поля
     *
     * @var string[]
     */
    protected $fillable = ['status','comment', 'result'];

    protected $hidden = ['user_id','exercise_id'];
        /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}