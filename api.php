<?php

header('Content-type: application/json');

// id del prodotto selezionato
$id = $_GET["id"];
// nome del prodotto selezionato
$name = $_GET["name"];

// Importazione "stores.json" e decodifica 
$json = file_get_contents("stores.json");
$storesJson = json_decode($json);

// Ciclo negli stores per ottenere informazioni
foreach ($storesJson as $allStores => $stores) {

    $storeName = $stores -> name;
    $storeDistance = $stores -> distance;
    $items = $stores -> items;

    foreach ($items as $item) {
        
        $itemId = $item -> id;
        $itemQty = $item -> qty;
        $itemMinQty = $item -> minQty;

        // Verifica corrispondenza fra l'id
        // del prodotto selezionato e l'id
        // trovato fra gli stores
        if ($itemId == $id) {
            // Condizione dettata dal committente
            if ($itemQty < $itemMinQty) {
                
                // Push nel $res delle info necessarie
                $res[] = [
                    $storeName,
                    $storeDistance,
                    $itemQty,
                    $itemMinQty,
                    $name
                ];

            } else if (!$res){
                
                $res[] = [];
            }
            
            // Nel caso lo stesso prodotto è presente
            // in più di un magazzino
            if (count($res) > 1) {
                // Ordinamento prima in base alla colonna 1 (distance)
                // e poi in base alla colonna 2 (qty)
                array_multisort(array_column($res, 1), SORT_ASC, array_column($res, 2), SORT_ASC, $res);
            }
        }
    }
}

echo json_encode($res);

?>