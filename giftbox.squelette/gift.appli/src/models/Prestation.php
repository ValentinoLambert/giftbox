<?php

namespace gift\appli\models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    protected $table = 'prestation';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['libelle', 'description', 'tarif', 'unite', 'url', 'img', 'cat_id'];

    public function coffrets(){
        return $this->belongsToMany(
            CoffretType::class,
            'coffret2presta',
            'presta_id',
            'coffret_id'
        );
    }
}