<?php include 'src/View/layout/head.php';?>

<?php include 'src/View/layout/header.php';?>

    <main id="detailPage">

        <h1 id="championName"><?= htmlspecialchars($champion->name) ?></h1>
        
        <div>
            <img id="championImage" src="<?= htmlspecialchars($champion->image) ?>" alt="<?= htmlspecialchars($champion->name) ?>">
            <span>SPELLS :</span>
            <div id="spells">
                <?php for ($i=0 ; $i < 3 ; $i++): ?>
                    <div class="spell">
                        <img src="https://ddragon.leagueoflegends.com/cdn/13.6.1/img/spell/<?= $champion->spells[$i]['id']?>.png" >
                    </div>
                    <span id="superieurA">></span>
                <?php endfor; ?>
            </div>
        </div>
        
        <div id="random-items">

            <?php 

                $itemCounter = 1;
                foreach ($randomItems as $item): ?>

                    <div class="item">
                        <span>ITEM <?= $itemCounter ?>:</span>
                        <img src="<?= $item->image ?>" alt="<?= $item->name ?>">
                    </div>

            <?php 

            $itemCounter++;
            endforeach; ?>

        </div>

        <div id="runes">
            <img src="<?= $randomRunes[0]['image'] ?>" alt="<?= $randomRunes[0]['name'] ?>" title="<?= $randomRunes[0]['name'] ?>">
        </div>

    </main>

<?php include 'src/View/layout/footer.php';?>