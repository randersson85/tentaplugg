<script src="/tentaplugg/bower_components/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="../../bower_components/normalize.css/normalize.css">
<link rel="stylesheet" href="/tentaplugg/view/css/main.css">
<link rel="stylesheet" href="/tentaplugg/bower_components/font-awesome/css/font-awesome.css">
<h2>Administration</h2>
<div class="adminForm">
    <form>
        <fieldset>
            <legend>Skapa/Uppdatera</legend>
            <span>Registreringsnummer:</span> <i class="fa fa-lock" style="display:none;" title="Regnr låst, vänligen spara produkten först"></i><br>
            <input id="reg" name="regnr" type="text" placeholder="Registreringsnummer" required><br>
            <input id="flag" name="flag" type="hidden" value="0">
            <span>Tillverkare: </span><br>
            <input id="manufacturer" name="tillverkare" type="text" placeholder="Tillverkare" required><br>
            <span>Modell: </span><br>
            <input id="model" name="modell" type="text" placeholder="Produktmodell" required><br>
            <span>Pris</span><br>
            <input id="price" name="pris" type="tel" placeholder="Pris" required=""><br>
            <button type="submit"><i class="fa fa-floppy-o"></i> Spara</button>
        </fieldset>
    </form>
</div>

<div class="adminTable">
    <table>
        <tr>
            <th>Edit</th>
            <th>Regnr</th>
            <th>Tillverkare</th>
            <th>Modell</th>
            <th>Pris</th>
            <th>Delete</th>
        </tr>
    </table>

    <script>
        var data;
        $(document).ready(function () {
            $.ajax({
                method: "GET",
                url: "/tentaplugg/controller/Controller.php",
                success: function (data, err) {
                    data = JSON.parse(data);

                    for (i = 0; i < data.length; i++) {
                        $('table').append('<tr>' +
                        '<td>' + '<i class="fa fa-pencil" id="' + data[i]['regnr'] + '"></i>' +
                        '<td id ="regnr">' + data[i]['regnr'] + '</td>' +
                        '<td id ="tillverkare">' + data[i]['tillverkare'] + '</td>' +
                        '<td id ="modell">' + data[i]['modell'] + '</td>' +
                        '<td id ="pris">' + data[i]['pris'] + '</td>' +
                        '<td>' + '<i class="fa fa-trash-o" id="' + data[i]['regnr'] + '"></i>'
                        + '</td>' +
                        '</tr>')
                    }
                }
            })
        });

        $(document).on('click', 'i.fa-trash-o', function () {
            $.ajax({
                method: "POST",
                url: "/tentaplugg/controller/deleteController.php",
                data: "regnr=" + $(this).attr('id'),
                success: function (success) {
                    console.log(success);
                }
            });
            $(this).closest("tr").remove();
        });

        $(document).on('click', 'i.fa-pencil', function () {
            $("#reg").val($(this).closest('tr').children('td#regnr').text());
            $("#reg").prop('disabled', true);
            $("i.fa-lock").show();
            $("#manufacturer").val($(this).closest('tr').children('td#tillverkare').text());
            $("#model").val($(this).closest('tr').children('td#modell').text());
            $("#price").val($(this).closest('tr').children('td#pris').text());
            $("#flag").val(1);
        });

        $("form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "/tentaplugg/controller/saveController.php",
                data: $("form").serialize(),
                success: function (success, err) {
                    console.log(success);
                    console.log(err);

                }
            })
            return false;
        });
    </script>
</div>
