<?php 

class EShop {
    public $name;
    public $partIva;
    public $products= [];
    // mettiamo una lista di prodotti
    
     // Metodo dello Shop
     public function addproduct(Product $nameProduct) {
        $this->products[] = $nameProduct;
    }
    // Metodo dello shop
    public function getproducts() {
        return $this->products;
    }
    // Metodo dello shop
    public function removeproduct(Product $nameProduct) {
        // dovremmo fare l'unset di una gallina nell'array
        // a partire dalla sua key -> primo step, trovare la key della gallina 

        // Sviluppare il remove attraverso l'oggetto che riceve il metodo.

        
        // unset($array[$key])
        $keyproductToRemove = array_search($nameProduct, $this->products);

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

// ---------------------------------------------

class Product {
    protected $label; 
    protected $productClass;
    protected $price;
    protected $thumb;
   
    public function __construct($label, $marca,$price , $thumb ) {
        $this->label = $label;
        $this->productClass = $marca;
        $this->price = $price;
        $this->thumb = $thumb;
       
    }

    public function getLabel() {
        return $this->label;
    }

    public function getproductClass() {
        return $this->productClass;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getThumb(){
        return $this->thumb;
    }

    
}

class TechProduct extends Product {
    public $ram;
    public $hardDisk;
    public $processore;
    
   
    public function __construct($label, $marca, $price, $thumb)
    {
        parent::__construct($label, $marca,$price, $thumb);
        $this->ram = $ram;
        $this->hardDisk = $hardDisk;
        $this->processore = $processore;
    }
}


class BeautyProduct extends Product {
    public $materiale;
    public $dimensioni;
    public $imbottitura;
    
   
    public function __construct($label, $marca, $price, $thumb)
    {
        parent::__construct($label, $marca,$price, $thumb);
        $this->materiale = $materiale;
        $this->dimensioni = $dimensioni;
        $this->imbottitura = $imbottitura;
    }
}

// ---------------------------------------------

class User {
    protected $sconto=0;
    protected $name; 
    protected $lastname;
    protected $card;
    protected $dataCard;
    protected $plane;
    
    public function __construct($name, $lastname,$card , $dataCard, $plane ) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->card = $card;
        $this->dataCard = $dataCard;
       $this->plane = $plane;
    }

    public function getUser() {
        return $this->name ;        
    }

    public function getLastname() {
        return $this->lastname;
    }
    public function getCard() {
        return $this->card;
    }
    public function getDatacard(){
        return  $this->dataCard;
    }
    public function getPlane(){
        return $this->plane;
    }
}

class PremiumUser {

    // qui dentro potrebbe avere la definizione di una percentuale di 
    // sconto per ogni prodotto.
    public $sconto = 50;
    protected $name; 
    protected $lastname;
    protected $card;
    protected $dataCard;
    protected $plane;
    
    public function __construct($name, $lastname,$card , $dataCard, $plane ) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->card = $card;
        $this->dataCard = $dataCard;
       $this->plane = $plane;
    }

    public function getUser() {
        return $this->name ;        
    }

    public function getLastname() {
        return $this->lastname;
    }
    public function getCard() {
        return $this->card;
    }
    public function getDatacard(){
        return  $this->dataCard;
    }
    public function getPlane(){
        return $this->plane;
    }
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
$productBeauty = new BeautyProduct("Borsa Asus Vivobook","Carpisa", "3,99$", "./borsaVivoBook.jpg");
echo $productBeauty->getlabel().' - '.$productBeauty->getproductClass().'<br> Prezzo: '.$productBeauty->getPrice()."<img width='250px' src='{$productBeauty->getThumb()}' alt='error'><br>";

// var_dump($product); 
$productTech = new TechProduct("Asus Vivobook","asus", "399$", "./asusVivoBook.jpg");
echo $productTech->getlabel().' - '.$productTech->getproductClass().'<br> Prezzo: '.$productTech->getPrice()."<img width='250px' src='{$productTech->getThumb()}' alt='error'><br>";
$user = new User ("Mario","Rossi","4986-8381-6736-1982","07/2030", "Base");
echo $user->getUser().' - '.$user->getLastname().'<br> Numero carta : '.$user->getCard()."   Scadenza carta : ".$user->getDatacard()."<br> Piano:{$user->getPlane()} <br>";
$usera = new PremiumUser ("Luigi","Brambilla","4986-8381-6736-1982","07/2030", "Pro");
echo $usera->getUser().' - '.$usera->getLastname().'<br> Numero carta : '.$usera->getCard()."   Scadenza carta : ".$usera->getDatacard()."<br> Piano:{$usera->getPlane()} <br>";

?>
