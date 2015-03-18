<?php
require_once '../model/sqlCRUD.php';
$model = new sqlCRUD();

if ($_POST['flag'] == 0) {
    echo 'skapa';
    $model->createOne($_POST['regnr'], $_POST['tillverkare'], $_POST['modell'], $_POST['pris']);
}
else{
    echo $_POST['flag'];
    echo 'uppdatera';
    $model->updateOne($_POST['regnr'], $_POST['tillverkare'], $_POST['modell'], $_POST['pris']);
}