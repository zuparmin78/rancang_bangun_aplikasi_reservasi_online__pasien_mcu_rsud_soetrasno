<?php
$itemno = array('0' => 'a', '1' => 'b', '2' => 'c');
// echo "<pre>";
// echo print_r($inputlayanan);
// echo "</pre>";
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<table>
    <tr>
        <form name="form1">
            <td>Item No:</td>
            <td>
                <select type="text" id="inventoryitemno" name="inventoryitemno"
                    onchange="javascript:set_to(this.value);">
                    <?php
                    foreach ($mcu as $key => $val) {
                        echo "<option id=" . $key . ">" . $val->kdpaket . "</option>";
                    }
                    ?>
                </select>
            </td>
    </tr>
    <tr>
        <td>Description:</td>
        <td><input type="text" id="idesc" name="idesc" /></td>
    </tr>
    <tr>
        <td>UOM:</td>
        <td><input type="text" id="inventoryuom" name="inventoryuom" /></td>
    </tr>

</table>
<script type="text/javascript">
    function set_to(id) {

        $('#idesc').val(id);
        $('#inventoryuom').val(id);
    }
</script>

<?php

/* To emulate a database lookup */
$dbtable = array(
    1 => (object) array('service' => 'wifi', 'rate' => 1000, 'unit' => 'mbps'),
    2 => (object) array('service' => 'fibre optic', 'rate' => 1500, 'unit' => 'km')
);

// echo "<pre>";
// echo print_r($mcu);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    ob_clean();

    $obj = array_key_exists($_POST['id'], $mcu) ? $mcu[$_POST['id']] : false;

    header('Content-Type: application/json');
    exit($obj ? json_encode($obj) : $obj);
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <title>Set Form field values based upon selected option</title>
    <script>

        const ajax = function (url, params, callback) {
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (this.status == 200 && this.readyState == 4) callback.call(this, this.response)
            };
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(params);
        };

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('select[id="service"]').addEventListener('change', function (e) {
                ajax(location.href, 'id=' + this.value, function (r) {
                    if (!r) {
                        swal('Bad foo!');
                        return;
                    }
                    let json = JSON.parse(r);
                    Object.keys(json).map(k => {
                        let field = document.querySelector('input[name="' + k + '"]');
                        if (field) field.value = json[k]
                    })

                });
            });
        });
    </script>
</head>

<body>
    <select class='form-control' id='service'>
        <option selected disabled hidden>Please select service
            <?php foreach ($mcu as $u) {
                $j = $u->no_urut - 1 ?>
            <option value="<?= $j ?>">
                <?= $u->namapaket ?>
            </option>
            <?php 
            } ?>
    </select>

    <table>
        <tr class='main'>
            <td></td>
            <td>
                <input type='text' name='kdpaket' class='form-control' placeholder='service' />
            </td>
            <td>
                <input type='text' name='namapaket' class='form-control' placeholder='Rate / Price' />
            </td>
            <td>
                <input type='text' name='id_paket' class='form-control' placeholder='Mbps/Km' />
            </td>
        </tr>
    </table>
</body>

</html>