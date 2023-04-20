<?php

namespace HApp\Controller;

session_start();

use HApp\Model\ChampionModel;
use HApp\Model\PartieModel;
use HApp\Model\EquipementModel;
use HApp\Model\AcheterModel;

class GameDataController {

    private $championModel;
    private $partieModel;
    private $equipementModel;
    private $acheterModel;

    public function __construct() {
        $this->championModel = new ChampionModel();
        $this->partieModel = new PartieModel();
        $this->equipementModel = new EquipementModel();
        $this->acheterModel = new AcheterModel();
    }

    // Soumet les données du formulaire
    public function submitGameData($formData) {
        // Récupération des données du formulaire
        $nomChampion = $formData['idchampion'];
        $resultatPartie = $formData['resultatpartie'];
        $equipements = [
            $formData['equipement1'],
            $formData['equipement2'],
            $formData['equipement3'],
            $formData['equipement4'],
            $formData['equipement5'],
            $formData['equipement6'],
        ];

        // Insertion du champion et récupération de son ID
        $idChampion = $this->championModel->insertChampion($nomChampion);

        // Récupération de l'ID utilisateur et de la date de la partie
        $idUtilisateur = $_SESSION['user_id'];
        $datePartie = date('Y-m-d');

        // Insertion de la partie et récupération de son ID
        $idPartie = $this->partieModel->insertPartie($idChampion, $idUtilisateur, $datePartie, $resultatPartie);

        // Parcours des équipements et insertion
        foreach ($equipements as $equipement) {
            if (!empty($equipement)) {
                // Insertion de l'équipement et récupération de son ID
                $idEquipement = $this->equipementModel->insertEquipement($equipement);

                // Insertion des relations entre la partie et l'équipement
                $this->acheterModel->insertAcheter($idPartie, $idEquipement);
            }
        }

        // Retourne "success" en cas de succès
        return "success";
        
    }

}
