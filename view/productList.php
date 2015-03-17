<html>
    <head>
        <title>OMG! Cars!</title>
    </head>
<body>

<ul>
    <?php
    include_once '../controller/Controller.php';
    $crud = new Controller();
    $products = $crud->getOne('ABC123');

    foreach ($products as $bil) {
            echo '<li>',$bil['regnr'],',',$bil['tillverkare'],',',$bil['modell'],'</li>';
    }

    $crud->updateOne('ABC123','Saab','9000',15000);

    $products = $crud->getOne('ABC123');
    foreach ($products as $bil) {
        echo '<li>',$bil['regnr'],',',$bil['tillverkare'],',',$bil['modell'],'</li>';
    }

    ?>
</ul>
</body>
</html>