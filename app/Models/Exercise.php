<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';
    /**
     * Поля
     *
     * @var string[]
     */
    protected $fillable = ['number','name','description'];

    protected $hidden = ['level_id'];

        /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function workouts(){
        return $this->hasMany(Workout::class);
    }
}