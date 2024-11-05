<?php
//Escribe una funcion que se conecte a una API online y devuelva los datos en un array asociativo.

function fetchFromApi($url) {
    $response = file_get_contents($url);
    $array = json_decode($response, true);

    return $array;
}   

// Example usage
$url = "https://jsonplaceholder.typicode.com/posts";
$response = fetchFromApi($url);
//print_r($response);

//Crea una funcion para mostrar el array asociativo de fetchFromApi() en una tabla HTML.La tabla tendra una fila con los nombres de las columnas y una fila por cada elemento del array.

function arrayToHtmlTable($array) {
    $html = '<table border="1">';
    $html .= '<tr>';
    foreach ($array[0] as $key => $value) {
        $html .= '<th>' . $key . '</th>';
    }
    $html .= '</tr>';

    foreach ($array as $row) {
        $html .= '<tr>';
        foreach ($row as $cell) {
            $html .= '<td>' . $cell . '</td>';
        }
        $html .= '</tr>';
    }

    $html .= '</table>';

    return $html;
}


//echo arrayToHtmlTable($response);

//Crea una funcion que procese el resultado de arrayToHtmlTable y si detecta que hay valores numericos en la tabla, los reemplace por un texto que diga "ES NUMERICO".
function replaceNumericValues($array) {
    foreach ($array as $key => $row) {
        foreach ($row as $cellKey => $cellValue) {
            if (is_numeric($cellValue)) {
                $array[$key][$cellKey] = 'ES NUMERICO';
            }
        }
    }

    return $array;
}

 echo arrayToHtmlTable(replaceNumericValues($response));
?>