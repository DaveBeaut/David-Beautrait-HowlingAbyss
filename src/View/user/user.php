<?php include 'src/View/layout/head.php';?>

<?php include 'src/View/layout/header.php';?>

    <main id="userPage">

        <div id="history">

            <p id="yourHistory">YOUR HISTORY :</p>

            <!-- Boucle sur les 5 dernières parties -->
            <?php foreach ($lastFiveGames as $game): ?>

                <!-- Crée un élément "game" et lui ajoute une classe -->
                <div class="game <?= ($game['resultatpartie'] == 'victoire') ? 'gameVictory' : 'gameDefeat' ?>">

                    <!-- Résultat de la partie -->
                    <div class="gameInfo">
                        <p class="resultat"><?= strtoupper($game['resultatpartie']) ?></p>
                        <p class="championName"><?= htmlspecialchars($game['nomchampion']) ?></p>
                    </div>

                    <!-- Appel à l'API pour affichier les portraits des champions -->
                    <?php
                    
                        $championData = file_get_contents('https://ddragon.leagueoflegends.com/cdn/13.6.1/data/fr_FR/champion.json');
                        $championData = json_decode($championData, true);

                        // Supprime les espaces dans les noms de champion pour correspondre à l'API
                        $championNameWithoutSpaces = str_replace(' ', '', $game['nomchampion']);

                        // Vérifie si le champion existe 
                        if (isset($championData['data'][$championNameWithoutSpaces]['id'])) {
                            // Construit le nom de fichier du portrait du champion et l'affiche
                            $portraitFileName = $championData['data'][$championNameWithoutSpaces]['id'].'_0.jpg';
                            echo '<div class="championPortraitWrapper"><img src="https://ddragon.leagueoflegends.com/cdn/img/champion/loading/'.$portraitFileName.'" alt="'.$game['nomchampion'].'" class="championPortrait" /></div>';
                        } else {
                            echo 'Portrait not loading';
                        }
                    ?>

                </div>

            <?php endforeach; ?>

        </div>

        <!-- Game Data Form -->
        <form id="game-data-form" method="POST" action="index.php?action=submitGameData">

        <p id="register">REGISTER YOUR GAME :</p>  

            <!-- nom du champion joué -->
            <label for="idchampion" class="userIndication">CHAMPION :</label><br>
            
            <?php

                // Réduction du code en donnant au select de champion des options via l'API
                $championsUrl = 'https://ddragon.leagueoflegends.com/cdn/13.6.1/data/en_GB/champion.json';
                $championsJson = file_get_contents($championsUrl);
                $championsData = json_decode($championsJson, true);
                $championOptions = '';

                foreach ($championsData['data'] as $championKey => $champion) {
                    $championName = $champion['name'];
                    $championOptions .= "<option value=\"$championKey\">$championName</option>";
                }

            ?>

            <!-- select pour le champion joué -->
            <select name="idchampion" id="idchampion">
                <option value="">-- SELECT A CHAMPION --</option>
                <?php echo $championOptions; ?>
            </select>

            <!-- boutons radio victoire / défaite -->
            <label for="resultatpartie" class="userIndication">RESULT :</label><br>

            <div id="result-container">
                
                <input type="radio" name="resultatpartie" id="victory" value="victoire" class="button" required>
                <label for="victory" class="button" id="victoryButton">VICTORY</label>

                
                <input type="radio" name="resultatpartie" id="defeat" value="defaite" class="button">
                <label for="defeat" class="button" id="defeatButton">DEFEAT</label>

            </div>
            
            <?php

                //Réduction du code en donnant aux select des options par l'API
                $itemsUrl = 'https://ddragon.leagueoflegends.com/cdn/13.6.1/data/en_GB/item.json';
                $itemsJson = file_get_contents($itemsUrl);
                $itemsData = json_decode($itemsJson, true);

                // Génére les options pour la balise <select>
                $options = '';
                foreach ($itemsData['data'] as $itemId => $item) {
                    $itemName = ($item['name']);
                    $options .= "<option value=\"$itemId\">$itemName</option>";
                }
                
                //check comment factoriser

            ?>

            <!-- Opdtions d'équipement -->
            <label for="resultatpartie" class="userIndication">ITEMS :</label>
            <div class="slotRow">
                <!-- Item 1 -->
                <select name="equipement1" class="equipement">
                    <option value="">-- 1ST SLOT --</option>
                    <?php echo $options; ?>
                </select>

                <!-- Item 2 -->
                <select name="equipement1" class="equipement">
                    <option value="">-- 2ND SLOT --</option>
                    <?php echo $options; ?>
                </select>
            </div>
            
            <div class="slotRow">
                <!-- Item 3 -->
                <select name="equipement1" class="equipement">
                    <option value="">-- 3RD SLOT --</option>
                    <?php echo $options; ?>
                </select>

                <!-- Item 4 -->
                <select name="equipement1" class="equipement">
                    <option value="">-- 4TH SLOT --</option>
                    <?php echo $options; ?>
                </select>
            </div>

            <div class="slotRow">
                <!-- Item 5 -->
                <select name="equipement1" class="equipement">
                    <option value="">-- 5TH SLOT --</option>
                    <?php echo $options; ?>
                </select>

                <!-- Item 6 -->
                <select name="equipement1" class="equipement">
                    <option value="">-- 6TH SLOT --</option>
                    <?php echo $options; ?>
                </select>
            </div>

            <!-- bouton d'envoi -->
            <button type="submit" id="sendFGT">SEND</button>
                        
        </form>
        
    </main>
    
<?php include 'src/View/layout/footer.php';?>

