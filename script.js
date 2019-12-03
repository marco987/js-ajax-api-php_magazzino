$(document).ready(function(){
    
var prodotti = [];
var magazzini = [];

function getItems() {
    $.ajax({
        url: "items.json",
        method: "GET",
        success: function(data){
            prodotti.push(data);
            printItems(data);
        },
        error: function(){
            alert("Errore");
        }
    });
}
    
function printItems(data) {

    // Handlebars
    var source   = document.getElementById("item-template").innerHTML;
    var template = Handlebars.compile(source);

    // Ordinamento in base alla chiave "name"
    data.sort(dynamicSort("name"));

    for (var i = 0; i < data.length; i++) {
        var item = data[i];      
        var context = {
            id: item.id,
            name_prodotto: item.name,
            description: item.description
        };
        var html = template(context);
        $("#web-app").append(html);
    }   
}

// Funzione ordinamento array di oggetti by key
function dynamicSort(property) {
    var sortOrder = 1;
    
    if(property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    
    return function (a,b) {
        if(sortOrder == -1){
            return b[property].localeCompare(a[property]);
        }else{
            return a[property].localeCompare(b[property]);
        }        
    }
}

// Processo di ricerca
$("#search-button").click(function () {

    var allItems = prodotti[0];    
    
    for (var i = 0; i < allItems.length; i++) {
        
        var item = allItems[i];        
        var id = item.id;        
        var boxSelezionato = $("div[id_prodotto='" + id + "']");
        var valore = $("#search-input").val().toLowerCase();
        var name = item.name.toLowerCase();        
        var description = item.description.toLowerCase();
        var paragrafo = name + " " + description;
        var ricerca = paragrafo.indexOf(valore);
        
        // Se la parola cercata non è presente in nessun punto
        // del paragrafo quest'ultimo viene nascosto
        if (ricerca < 0) {
            boxSelezionato.addClass("display-none");
        }   
    }
});

$(document).on("click", ".box-prodotto button", function(){

    // id del prodotto selezionato
    var id = $(this).attr("id_prodotto");
    // nome del prodotto selezionato
    var name = $(this).attr("name_prodotto");
    
    // id e nome del prodotto selezionato che viene
    // inviato al backend
    var richiesta = {"id": id, "name": name};

    function getStore() {
        $.ajax({
            url: "api.php",
            method: "GET",
            data: richiesta,
            success: function(data){
                magazzini.push(data);
                printStores(data);
            },
            error: function(){
                alert("Prodotto in magazzino");
            }
        });
    }

    getStore();
    
    function printStores(data) {

        // Handlebars
        var source   = document.getElementById("store-template").innerHTML;
        var template = Handlebars.compile(source);

        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            
            var context = {
                name_magazzino: item[0],
                distance: item[1],
                qty: item[2],
                minqty: item[3],
                name_prodotto: item[4]
            };
            var html = template(context);
            $("#web-app").append(html);
            
            // Eliminazione di tutti i box-prodotto
            $(".box-prodotto").html("").removeClass("border-box").css("display", "none");
            // Eliminazione della search-bar
            $("#search-bar").html("").removeClass("border-box").css("display", "none");
        }
    }
});

$(document).on("click", ".box-magazzino button", function(){

    // name del prodotto in questione
    var prodotto = $(this).attr("name_prodotto");
    // name del magazzino selezionato
    var magazzino = $(this).attr("name_magazzino");
    // qty del prodotto selezionato
    var qty = $(this).attr("qty_prodotto");
    // minQty del prodotto selezionato
    var minQty = $(this).attr("minqty_prodotto");
    // numero articoli inviati
    var diff = minQty - qty;
    
    // Handlebars
    var source   = document.getElementById("alert-template").innerHTML;
    var template = Handlebars.compile(source);
    var context = {
        prodotto: prodotto,
        magazzino: magazzino,
        diff: diff
    };
    var html = template(context);
    $("body").append(html);
    
});

$(document).on("click", "#alert-conferma button", function(){

    window.location.reload();
});


// Richiamo prima funzione
getItems();



// Chiusura funzione riga 1
// $(document).ready(function(){
});