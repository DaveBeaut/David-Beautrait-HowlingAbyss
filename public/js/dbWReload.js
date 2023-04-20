$(document).ready(function() {
    
    //  gestionnaire d'événements 'submit' sur'game-data-form'
    $("#game-data-form").on("submit", function(event) {
        // Empêche le rechargement immédiat
        event.preventDefault(); 

        // Récupère les données du formulaire et les convertit en chaîne de requête
        let formData = $(this).serialize(); 

        // Effectue une requête AJAX avec les paramètres suivants
        $.ajax({
            type: "POST", 
            url: "index.php?action=submitGameData",
            data: formData, // Données du formulaire envoyées avec la requête
            dataType: "text", // Type de données attendu en réponse
            success: function(response) {

                // Affiche une alerte disant que les données ont été enregistrées avec succès
                alert("Les données ont été enregistrées avec succès.");

                // Recharge la page pour actualiser l'historique
                location.reload();
            },
        });

    });

});