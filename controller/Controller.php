<?php
require_once '../model/sqlCRUD.php';

$ctrl = new Controller();
echo json_encode($ctrl->getAll());

class Controller
{

    function __construct()
    {
        $this->model = new sqlCRUD();
    }

    /**
     * @return array:array              Returnerar en array med samtliga produkter från databasen
     */
    public function getAll()
    {
        $products = $this->model->getAll();
        return $products;
    }

    /**
     * @param $regnr:String              Ange registreringsnummer som du vill hämta
     * @return array:array               Returnerar en array med resultatet
     */
    public function getOne($regnr)
    {
        $products = $this->model->getOne($regnr);
        return $products;
    }

    /**
     * @param $regnr:String              Registreringsnummer på produkt som ska uppdateras
     * @param $tillverkare:string        Ange ny tillverkare
     * @param $modell:String             Ange ny modell
     * @param $pris:Int                  Ange nytt pris
     */
    public function updateOne($regnr, $tillverkare, $modell, $pris){
    $this->model->updateOne($regnr,$tillverkare,$modell,$pris);
    }

    /**
     * @param $regnr:String             Registreringsnummer på bilen
     * @param $tillverkare:String       Namn på tillverkare
     * @param $modell:String            Namn på modellen
     * @param $pris:Int                 Pris
     */
    public function createOne ($regnr, $tillverkare, $modell, $pris){
        $this->model->createOne($regnr, $tillverkare, $modell, $pris);
    }

}