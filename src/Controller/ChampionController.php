<?php

    namespace HApp\Controller;

    use HApp\Controller\ErrorController;

    class ChampionController
    {

        private function getChampionByName($championName)
        {
            // Récupére les données des champions depuis l'API
            $version = "13.6.1";
            $championsData = json_decode(file_get_contents("https://ddragon.leagueoflegends.com/cdn/{$version}/data/en_GB/champion.json"), true)['data'];

            // Trouve le champion correspondant au nom du champion
            foreach ($championsData as $championData) {
                if ($championData['name'] === $championName) {
                    // Ajoute l'image du champion
                    $championData['image'] = "https://ddragon.leagueoflegends.com/cdn/{$version}/img/champion/{$championData['image']['full']}";

                    // Récupére les sorts du champion
                    $championSpells = json_decode(file_get_contents("https://ddragon.leagueoflegends.com/cdn/{$version}/data/fr_FR/champion/{$championData['id']}.json"), true)['data'][$championData['id']]['spells'];
                    
                    $championData['spells'] = $championSpells;

                    return (object) $championData;
                }
            }

            return null;
        }

        // Affiche les détails d'un champion selon son nom
        public function show($championName)
        {
            // Appel de la méthode getChampionByName()
            $champion = $this->getChampionByName($championName);

            // Vérifie si le champion existe
            if ($champion) {
                $version = "13.6.1";
                
                // Récupère 6 éléments aléatoires 
                $randomItems = $this->getRandomItems($version, 6);
                
                // Récupère une rune aléatoires )
                $randomRunes = $this->getRandomRunes();

                // Appelle la vue de detail du champion
                require_once __DIR__ . '/../View/champion/detail.php';
            } else {
                // Si le champion n'existe pas : 404
                $errorController = new ErrorController();
                $errorController->notFound();
            }
        }

        // Fonction pour afficher des items aléatoires (provisoire)
        public function getRandomItems($version, $count)
        {
            $itemsData = json_decode(file_get_contents("https://ddragon.leagueoflegends.com/cdn/{$version}/data/en_GB/item.json"), true)['data'];

            $randomItems = [];
            $itemsKeys = array_keys($itemsData);

            for ($i = 0; $i < $count; $i++) {
                $randomKey = $itemsKeys[array_rand($itemsKeys)];
                $randomItem = $itemsData[$randomKey];

                $randomItem['image'] = "https://ddragon.leagueoflegends.com/cdn/{$version}/img/item/{$randomItem['image']['full']}";

                $randomItems[] = (object) $randomItem;
            }

            return $randomItems;
        }

        // Fonction pour afficher une rune (provisoire)
        public function getRandomRunes()
        {
            $version = "13.6.1";
            $runesData = json_decode(file_get_contents("https://ddragon.leagueoflegends.com/cdn/{$version}/data/en_GB/runesReforged.json"), true);

            $randomRunes = [];

            foreach ($runesData as $path) {
                $randomPrimaryRune = $path['slots'][0]['runes'][array_rand($path['slots'][0]['runes'])];
                $randomPrimaryRune['image'] = "https://ddragon.leagueoflegends.com/cdn/img/{$randomPrimaryRune['icon']}";

                $randomRunes[] = $randomPrimaryRune;

                for ($i = 1; $i < count($path['slots']); $i++) {
                    $randomRune = $path['slots'][$i]['runes'][array_rand($path['slots'][$i]['runes'])];
                    $randomRune['image'] = "https://ddragon.leagueoflegends.com/cdn/img/{$randomRune['icon']}";

                    $randomRunes[] = $randomRune;
                }
            }

            return $randomRunes;
        }

    }

?>
