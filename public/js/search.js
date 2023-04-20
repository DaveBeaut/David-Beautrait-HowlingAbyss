// Déclaration des constantes pour la clé API et la version des APIs
const VERSION = "13.6.1";

// Variables pour stocker les données des champions des objets des runes et des sorts d'invocateurs
let championsData;

// Exécute cette fonction lorsque le DOM est prêt
$(document).ready(function () {

    // Récupère les données des CHAMPIONS à l'aide de l'API Riot Games
    $.get(`https://ddragon.leagueoflegends.com/cdn/${VERSION}/data/en_GB/champion.json`, function (data) {
        championsData = data.data;
    });

    // Attache un événement "input" à l'élément de recherche
    $("#search").on("input", function () {
        let query = $(this).val();

        if (query.length > 0) {
            let filteredChampions = filterChampions(championsData, query);
            displayChampions(filteredChampions);
        } else {
            $("#championList").empty();
        }
    });

    // Attache un événement "click" aux éléments de la liste des champions
    $("#championList").on("click", "input", function () {
        let championImageUrl = `https://ddragon.leagueoflegends.com/cdn/${VERSION}/img/champion/${championKey}.png`;
        let championPortrait = $("<img>").attr("src", championImageUrl).attr("id", "championPortrait");
        $("#search").after(championPortrait);
    });
});

// Fonction pour filtrer les champions en fonction de la requête de recherche
function filterChampions(champions, query) {
    let filteredChampions = [];

    // Parcoure tous les champions et ajoute ceux dont le nom commence par la requête à la liste des champions filtrés
    for (const key in champions) {
        if (champions[key].name.toLowerCase().startsWith(query.toLowerCase())) {
            filteredChampions.push(champions[key]);
        }
    }

    // Renvoie la liste des champions filtrés
    return filteredChampions;
}

// Fonction pour afficher les champions filtrés dans la liste des champions
function displayChampions(champions) {
    // Vide d'abord la liste des champions
    $("#championList").empty();

    // Parcoure les champions et crée 1 élément div pour chaque champion dans une limite de 3.
    for (let i = 0; i < Math.min(champions.length, 3); i++) {
        let champion = champions[i];

        // Crée l'image du champion
        let championImageUrl = `https://ddragon.leagueoflegends.com/cdn/${VERSION}/img/champion/${champion.image.full}`;
        let championImage = $("<img>").attr("src", championImageUrl).addClass("championImage");

        // Crée l'élément input pour le nom du champion, en y ajoutant l'attribut data-id
        let inputItem = $("<input>").attr("type", "text").attr("readonly", true).attr("data-champion", champion.name).val(champion.name);
        
        let championLink = $("<a>").attr("href", `index.php?action=championDetail&champion=${champion.name}`);
        championLink.append(inputItem);

        // Crée un élément div contenant l'image du champion et l'élément input
        let championDiv = $("<div>").addClass("championDiv");
        championDiv.append(championImage, championLink);

        // Ajoute l'élément div au conteneur de la liste des champions
        $("#championList").append(championDiv);

    }
    
}









