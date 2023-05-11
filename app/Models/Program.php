<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    /**
     * Поля
     *
     * @var string[]
     */
    protected $fillable = ['name, skill_id'];

    protected $hidden = ['skill_id'];

        /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    public function levels(){
        return $this->hasMany(Level::class);
    }
}