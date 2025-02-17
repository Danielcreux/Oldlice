<?php

function damePais($ip) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Convertir IP a entero
    function ipToInt($ip) {
        return sprintf('%u', ip2long($ip));
    }

    // Verificar si la base de datos existe
    $dbFile = 'geoloc.sqlite';
    if (!file_exists($dbFile)) {
        die("Error: La base de datos no existe.");
    }

    // Conectar a SQLite
    $db = new SQLite3($dbFile);
    if (!$db) {
        die("Error al conectar a la base de datos.");
    }

    // Convertir la IP ingresada
    $inputIpInt = ipToInt($ip);

    // Consulta SQL
    $query = "SELECT range_start, range_end, country_name 
              FROM ipv4
              LEFT JOIN paises ON ipv4.registered_country_geoname_id = paises.geoname_id";
    
    $results = $db->query($query);
    if (!$results) {
        die("Error en la consulta SQL: " . $db->lastErrorMsg());
    }

    // Buscar coincidencias
    $countryCode = null;
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        if (!isset($row['range_start']) || !isset($row['range_end'])) {
            continue;
        }

        $rangeStartInt = ipToInt($row['range_start']);
        $rangeEndInt = ipToInt($row['range_end']);

        if ($inputIpInt >= $rangeStartInt && $inputIpInt <= $rangeEndInt) {
            $countryCode = $row['country_name'];
            break;
        }
    }

    // Cerrar conexión
    $db->close();

    return $countryCode ?? "No encontrado";
}

// Llamar a la función y mostrar el resultado
$ip = '84.123.87.83';
echo "El país de la IP $ip es: " . damePais($ip);

?>
