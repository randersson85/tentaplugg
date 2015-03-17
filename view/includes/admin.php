<link rel="stylesheet" href="/tentaplugg/view/css/main.css">
<link rel="stylesheet" href="/tentaplugg/bower_components/font-awesome/css/font-awesome.css">
<script src="/tentaplugg/bower_components/jquery/dist/jquery.js"></script>
<h2>Administration</h2>
<div class="adminForm">
    <form>
        <fieldset>
            <legend>Skapa/Uppdatera</legend>
                <span>Registreringsnummer:</span><br>
                    <input name="reg" type="text" placeholder="Registreringsnummer" required><br>
                <span>Tillverkare: </span><br>
                    <input name="tillverkare" type="text" placeholder="Tillverkare"required><br>
                <span>Modell: </span><br>
                    <input name="modell" type="text" placeholder="Produktmodell" required><br>
                <span>Pris</span><br>
                    <input name="pris" type="tel" placeholder="Pris" required=""><br>
                <button type="submit"><i class="fa fa-floppy-o"></i> Spara</button>
        </fieldset>
    </form>

<table>

</table>
    <script>
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: "/tentaplugg/controller/Controller.php",
                success : function(data, err) {
                    var data = JSON.parse(data);
                    for (i = 0; data.length; i++) {
                        $('table').append('<tr>' +
                        '<td>' + data[i]['regnr'] + '</td>' +
                        '<td>' + data[i]['tillverkare'] + '</td>' +
                        '<td>' + data[i]['modell'] + '</td>' +
                        '<td>' + data[i]['pris'] + '</td>' +
                        '</tr>')
                    }
                }
            })
        });

    </script>
</div>

