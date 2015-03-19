<html>
    <head>
        <title>OMG! Cars!</title>
        <script src="/tentaplugg/bower_components/jquery/dist/jquery.min.js"></script>
    </head>
<body>


<table class="productList">


</table>
<div class="products">


</div>
<script>
    var data;
    $(document).ready(function () {
        $.ajax({
            method: "GET",
            url: "/tentaplugg/controller/Controller.php",
            success: function (data, err) {
                data = JSON.parse(data);

                for (i = 0; i < data.length; i++) {
                    $('.products').append('<div>' +
                        '<h3 class="regno">'+ data[i]['regnr']+'</h3>'+
                        '<span class="manufacturer">' + data[i]['tillverkare']+'</span>'+'<br>'+
                        '<span class="model">' + data[i]['modell']+'</span>'+'<br>'+
                        '<span class="price">' + data[i]['pris']+'</span>'+'<br>'+
                        '<button>'

                    '</div>');
                }
                console.log(err);
                console.log(data);
            }
        })
    });





</script>
</body>
</html>