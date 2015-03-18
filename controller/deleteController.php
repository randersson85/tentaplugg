<?php
require_once '../model/sqlCRUD.php';
$model = new sqlCRUD();
$model->deleteOne($_POST['regnr']);
