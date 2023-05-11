<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    /**
     * Поля
     *
     * @var string[]
     */
    protected $fillable = ['name'];

        /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function programs(){
        return $this->hasMany(Program::class);
    }
}