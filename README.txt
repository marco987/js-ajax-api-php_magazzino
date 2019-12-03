Progetto Magazzino

Sviluppa una mini web app che gestisca la logistica di alcuni magazzini, con l’obiettivo di poter effettuare il ristoccaggio di determinati articoli nei vari magazzini.

La web app è composta da 3 step:
●	Pagina di ricerca dei prodotti
●	Pagina di selezione del magazzino
●	Thank you page

Per il primo step hai a disposizione un elenco di prodotti in un file JSON (file items.json) che dovrai utilizzare come database di sola lettura. Al caricamento della pagina dovrai mostrare tutti i prodotti ordinati alfabeticamente per nome. Per ogni prodotto dovrai inserire un box con nome, descrizione e CTA (il bottone sulla destra), seguendo le indicazioni grafiche e di layout del template.
Digitando un testo nella barra di ricerca dovrai filtrare dinamicamente (lato front-end, via Javascript) i risultati, mostrando solo quelli il cui testo o la cui descrizione contengono il testo digitato.
Al click sulla CTA del prodotto si passa al secondo step.
In questo step, partendo dal database JSON contenente l’elenco dei magazzini (file stores.json), dovrai implementare lato server un algoritmo per mostrare tutti i magazzini che hanno una quantità di quel prodotto al di sotto della soglia minima ammessa, ovvero store.items[i].qty < store.items[i].minQty.
Sempre nel medesimo algoritmo, l’elenco dei magazzini dovrà essere ordinato per distanza (store.distance) in maniera crescente; a parità di distanza dovrà essere ordinato per quantità residua dell’oggetto selezionato (store.items[i].qty).
Al click sulla CTA del magazzino si passa al terzo step, da realizzare in overlay.
In questo step dovrai mostrare, nel messaggio di conferma, il numero di articoli inviati al magazzino selezionato. Tale numero è calcolato come la differenza tra la quantità disponibile e la soglia minima (store.items[i].minQty - store.items[i].qty).
