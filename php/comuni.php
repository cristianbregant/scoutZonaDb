<?php

// recupero vaolori delle select
$provincia = $_REQUEST['provincia'];
$comune = $_REQUEST['comune'];
// mi connetto al database
$sql = new mysqli("localhost", "root", "", "gestionale");

    $query = "SELECT * FROM province ORDER BY siglaProvincia";
    $result = $sql->query($query);
    // svuoto la select provincia
    echo "$('select[name=\"provincia\"]').empty();";
    // aggiungo una option vuota
    echo "$('select[name=\"provincia\"]').append('<option value=\"\"></option>');";
    // ciclo i risultati della query
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        // imposto il selected sull'eventuale provincia scelta
        $selected = "";
        if ($row['siglaProvincia'] == $provincia) {
            $selected = "selected=\"selected\"";
        }
        // popolo la select
        echo "$('select[name=\"provincia\"]').append('<option $selected value=\"" . $row['siglaProvincia'] . "\">" . addslashes($row['nomeProvincia']) . "</option>');";
    }

// se è stata scelta una provincia
if (!empty($provincia)) {
    // estraggo i comuni della provincia scelta
    $query = "SELECT * FROM comuni WHERE provincia ='$provincia'";
    $result = $sql->query($query);
    // svuoto la select comune
    echo "$('select[name=\"comune\"]').empty();";
    // aggiungo una option vuota
    echo "$('select[name=\"comune\"]').append('<option value=\"\"></option>');";
    // ciclo i risultati della query
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        // imposto il selected sull'eventuale comune scelto
        $selected = "";
        if ($row['Istat'] == $comune) {
            $selected = "selected=\"selected\"";
        }
        // popolo la select
        echo "$('select[name=\"comune\"]').append('<option $selected value=\"" . $row['Istat'] . "\">" . utf8_encode(addslashes($row['Comune'])) . "</option>');";
    }
}
?>