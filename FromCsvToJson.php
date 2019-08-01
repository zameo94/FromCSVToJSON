<?php

$key1 = readline('Inserisci la prima chiave: ');
$val1 = readline('Inserisci il suo value correlato: ');
$key2 = readline('Inserisci la seconda chiave: ');
$fileInput = readline('Inserisci il percorso del file (con estensione): ');
$file = fopen($fileInput,'r');
$isFirstTime = true;

function dropDouble($x){
    $num = count($x);

    for($i = 0; $i < $num; $i++){
        $x[$i] = array_unique($x[$i]);
    }

    return $x;
}

function dropNull($x){

    $num = count($x);

    for($i = 0; $i < $num; $i++){
        $x[$i] = array_filter($x[$i], 'strlen');
    }

    return $x;
}

function modifyArray($arr, $k1, $value1, $k2)
{
    $num = count($arr);

    for($i = 0; $i < $num; $i++){
        $arr[$i] = [ $k1 => $value1, $k2 => array_values($arr[$i])];
    }

    return $arr;
}

function createJSON($arr)
{
    try{
        $fileName = readline('Inserisci il nome del nuovo file JSON (senza estensione): ');
        $fileName = $fileName.'.json';
        $fp = fopen($fileName, 'w');
        fwrite($fp, json_encode($arr,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        fclose($fp);

        echo "The JSON file was create corretly.".PHP_EOL;
    }
    catch(Exception $e){
        echo "There is issue with the creation of JSON file:".PHP_EOL.$e;
    }

}

if(!$file){
    echo "Could not open the file.".PHP_EOL;
}
else{
    while($array = fgetcsv($file)){
        //skip the first line
        if($isFirstTime){
            $isFirstTime = false;
            continue;
        }

        $csvData[] = $array;
    }

    fclose($file);
}

$csvData = dropDouble(dropNull($csvData));
$csvData = modifyArray($csvData, $key1,$val1, $key2);

createJSON($csvData);