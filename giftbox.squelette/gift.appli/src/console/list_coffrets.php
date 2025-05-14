<?php
require_once __DIR__ . '/../vendor/autoload.php';

use gift\appli\utils\Eloquent;
use gift\appli\models\CoffretType;
use gift\appli\models\Prestation;

Eloquent::init(__DIR__ . '/../conf/gift.db.conf.ini');

echo "Exercice 5. a)</br></br>";
try {
    // Récupération de tous les coffrets types avec leurs prestations
    $coffrets = CoffretType::with('prestations')->get();

    echo "--- LISTE DES COFFRETS TYPES ---</br>";

    foreach ($coffrets as $coffret) {
        echo "ID: {$coffret->id}</br>";
        echo "Libellé: {$coffret->libelle}</br>";
        echo "Description: {$coffret->description}</br>";
        echo "-------------------------</br>";
    }

    echo "Total: " . count($coffrets) . " coffrets types trouvés</br></br></br>";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "</br>";
    exit(1);
}

echo "Exercice 5. b)</br>";
// Test avec le premier coffret trouvé
$coffret = CoffretType::with('prestations')->first();

if ($coffret) {
    echo "--- COFFRET: {$coffret->libelle} ---</br>";
    foreach ($coffret->prestations as $prestation) {
        echo "- {$prestation->libelle}</br>";
    }
} else {
    echo "Aucun coffret trouvé</br>";
}

// Test avec la première prestation trouvée
$prestation = Prestation::with('coffrets')->first();

if ($prestation) {
    echo "--- PRESTATION: {$prestation->libelle} ---</br>";
    foreach ($prestation->coffrets as $coffret) {
        echo "- {$coffret->libelle}</br></br></br>";
    }
} else {
    echo "Aucune prestation trouvée</br>";
}


echo "Exercice 5. c)</br>";
try {
    // Récupération de tous les coffrets types avec leurs prestations
    $coffrets = CoffretType::with('prestations')->get();

    echo "---LISTE COMPLÈTE DES COFFRETS TYPES--- </br></br>";

    foreach ($coffrets as $coffret) {
        echo "</br>COFFRET #{$coffret->id}</br>";
        echo "Libellé: {$coffret->libelle}</br>";
        echo "Description: {$coffret->description}</br>";

        // Affichage des prestations incluses
        if ($coffret->prestations->isNotEmpty()) {
            echo "</br>PRESTATIONS INCLUSES:</br>";
            echo str_repeat("-", 50) . "</br>";

            foreach ($coffret->prestations as $prestation) {
                echo sprintf(
                    "%-30s | %-8.2f€ | %-8s</br>",
                    $prestation->libelle,
                    $prestation->tarif,
                    $prestation->unite ?? 'N/A'
                );
            }
        } else {
            echo "</br>Aucune prestation associée à ce coffret</br>";
        }
    }

    echo "</br>RÉCAPITULATIF: " . count($coffrets) . " coffrets types trouvés</br>";

} catch (Exception $e) {
    echo "ERREUR: " . $e->getMessage() . "</br>";
    exit(1);
}