<?php
require_once 'sqlConnection.php';

class sqlCRUD
{

    private $pdo;

    public function __construct()
    {
        $sqlConnection = new sqlConnection();
        $this->pdo = $sqlConnection->getConnection();
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getAll()
    {
        $result = ($this->pdo->query('SELECT * FROM bilar')->fetchAll(pdo::FETCH_BOTH));
        print_r(json_encode($result));
        return $result;

    }

    public function getOne($regnr)
    {
        $sql = 'SELECT * FROM bilar WHERE regnr = :regnr';
        $statement = $this->pdo->prepare($sql);
        $inputParameters = $this->parseRegToArray($regnr);
        $statement->execute($inputParameters);
        return json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
    }

    public function updateOne($regnr, $tillverkare, $modell, $pris)
    {
        $pdoStatement = $this->pdo->prepare('UPDATE bilar SET tillverkare = :tillverkare, modell = :modell, pris = :pris WHERE regnr = :regnr');
        $inputParameters = $this->parseAllValuesToArray($regnr, $tillverkare, $modell, $pris);
        $pdoStatement->execute($inputParameters);

    }

    public function deleteOne($regnr)
    {
        $pdoStatement = $this->pdo->prepare('DELETE FROM bilar WHERE regnr = :regnr');
        $inputParameters = $this->parseRegToArray($regnr);
        $pdoStatement->execute($inputParameters);
    }

    public function createOne($regnr, $tillverkare, $modell, $pris)
    {
        $pdoStatement = $this->pdo->prepare('INSERT INTO bilar VALUES (:regnr,:tillverkare,:modell,:pris)');
        $inputParameters = $this->parseAllValuesToArray($regnr, $tillverkare, $modell, $pris);
        $pdoStatement->execute($inputParameters);

    }

    private function parseRegToArray($regnr)
    {
        $inputParams = array(':regnr' => $regnr);
        return $inputParams;
    }

    private function parseAllValuesToArray($regnr, $tillverkare, $modell, $pris)
    {
        $inputParameters = array(
            ':regnr' => $regnr,
            'tillverkare' => $tillverkare,
            'modell' => $modell,
            'pris' => $pris);
        return $inputParameters;
    }
}