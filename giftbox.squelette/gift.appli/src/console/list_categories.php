<?php
// File: gift.appli/src/console/list_categories.php

require_once __DIR__ . '/../vendor/autoload.php';

use gift\appli\utils\Eloquent;
use gift\appli\models\Categorie;

// Initialisation de la connexion à la base de données
Eloquent::init(__DIR__ . '/../conf/gift.db.conf.ini');

// Récupération et affichage des catégories
$categories = Categorie::all();

foreach ($categories as $categorie) {
    echo "ID: {$categorie->id}\n";
    echo "Libellé: {$categorie->libelle}\n";
    echo "Description: {$categorie->description}\n";
    echo "-------------------------\n";
}