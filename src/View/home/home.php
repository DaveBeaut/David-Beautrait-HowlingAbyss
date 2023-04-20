<?php include 'src/View/layout/head.php';?>

<?php include 'src/View/layout/header.php';?>

    <!---------- MAIN ---------->
    <main id="homepage">

        <div id="logoSearch">
            
            <h1>HOWLING ABYSS</h1>

            <!-- barre de recherche de champion et la place pour les inputscréés par la recherche -->
            <input type="text" id="search" class="form-control"placeholder="search for a champion ...">
                
            <!-- place pour les inputs des champions (3) -->
            <div id="championList" class="list-group"></div>

        </div>

    </main>
        
<?php include 'src/View/layout/footer.php';?>
    