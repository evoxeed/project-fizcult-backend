<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    /**
     * Поля
     *
     * @var string[]
     */
    protected $fillable = ['level','name','value'];

    protected $hidden = ['program_id'];

        /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function exercises(){
        return $this->hasMany(Exercise::class);
    }

    public function addExercise($name,$description){
        $this->exercises()->create([
            'name' => $name,
            'description' => $description,
            'number' => $this->exercises->count()+1
        ]);
    }
}