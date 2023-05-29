<?php

namespace App\Models;

//use App\SkillInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model //implements SkillInterface
{
    use HasFactory;

    protected $table = 'skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'control_value_name'
    ];

    /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function levels(){
        return $this->hasMany(Level::class);
    }
}