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
    protected $fillable = ['name'];

    protected $hidden = ['attribute_id'];

        /**
     * Следует ли обрабатывать временные метки модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function levels(){
        return $this->hasMany(Level::class);
    }

    public function addLevel($name,$value){
        $this->levels()->create([
            'name' => $name,
            'value' => $value,
            'level' => $this->levels->count()+1
        ]);
    }
}