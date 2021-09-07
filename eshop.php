<?php 

class EShop {
    public $name;
    public $partIva;
    public $product= [];
    // mettiamo una lista di prodotti
    
    
}

// ---------------------------------------------

class Product {
    protected $label = 'prodotto generico'; 

    protected $productClass;
    public function getLabel() {
        return $this->label;
    }

    public function getproductClass() {
        return $this->productClass;
    }

    public function addproduct(product $nomeProduct) {
        $this->products[] = $nomeProduct;
    }

    public function getproducts() {
        return $this->products;
    }

    public function removeproduct(product $nomeProduct) {
        // dovremmo fare l'unset di una gallina nell'array
        // a partire dalla sua key -> primo step, trovare la key della gallina 

        // Sviluppare il remove attraverso l'oggetto che riceve il metodo.

        
        // unset($array[$key])
        $keyproductToRemove = array_search($nomeProduct, $this->products);

        // verifichiamo che l'producte già esista all'interno dell'array
        // quindi, in parole povere, che $keyproductToRemove non sia false.
        // se non lo trova, non proseguiamo e lanciamo un eccezione.

        if($keyproductToRemove === false) {
            throw new Exception("il prodotto non è presente nella fattoria");
        }

        unset($this->products[$keyproductToRemove]);

        // array_values prende solo i valori da un array
        // e "ricalcola"/riposiziona i valori in un array posizionale
        // $this->products = array_values($this->products);
        

    }
}

class TechProduct extends Product {
    public $ram = '8GB';
    public $ssd = '512GB SSD';
    public $processore = 'i7 hakuna matata';

    public function __construct()
    {
        $this->label = 'asus vivobook';
        $this->productClass = 'asus';
    }
}

class BeautyProduct extends Product {

    public $materiale = 'stoffa';
    public $dimensioni = '40cmx30cm';
    public $imbottitura = 'gomma';

    public function __construct()
    {
        $this->label = 'cover asus vivobook';
        $this->productClass = 'carpisa';
    }
}

// ---------------------------------------------

class User {

    public $sconto = 0;

}

class PremiumUser {

    // qui dentro potrebbe avere la definizione di una percentuale di 
    // sconto per ogni prodotto.
    public $sconto = 50;


}



// ----------------------------------------------


/*

1. creiamo l'eshop
2. creiamo diversi prodotti
3. aggiungiamoli all'eshop
4. creaiamo l'utente normale
5. creiamo un utente premium
6. inseriamo le carte di credito per ciascun utente
6. l'utente normale acquista un prodotto
7. l'utente premium acquista un altro prodotto (e riceve lo sconto)


*/ 
$productPrint = new BeautyProduct("materiale","label" );
echo $productPrint;
