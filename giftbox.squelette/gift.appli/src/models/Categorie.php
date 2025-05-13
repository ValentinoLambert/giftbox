<?php

namespace gift\appli\models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categorie'; // Nom de la table dans la base de données
    public $timestamps = false; // Désactiver les timestamps si non utilisés
    protected $fillable = ['libelle', 'description'];
}