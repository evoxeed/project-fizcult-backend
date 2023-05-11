<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workouts';
    /**
     * Поля
     *
     * @var string[]
     */
    protected $fillable = ['name','description','video_url','level_id'];

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
}