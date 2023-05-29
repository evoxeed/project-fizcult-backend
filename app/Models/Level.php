<?php

namespace App\Models;

use App\SkillInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model //implements LevelInterface
{
    use HasFactory;

    protected $table = 'levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'index',
        'description',
        'control_value_min',
        'control_value_max',
        'skill_id',
        'energy_type'
    ];

    protected $hidden = [
        'id',
        'skill_id'
    ];

    /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function skill(): array
    {
        return $this->belongsTo(Skill::class);
    }
}