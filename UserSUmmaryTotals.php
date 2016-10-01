<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserSUmmaryTotals
 *
 * @author khunga
 */
$files = glob("../Usersummary/*.csv");
foreach ($files as $file) {

    if (($handle = fopen($file, "r")) !== FALSE) {

        $total = array();
        echo "<b>Filename: " . basename($file) . "\n";
        $dateA = explode("_", $file);
        $date = str_replace(".csv", "", $dateA[1]);
        while (($data = fgetcsv($handle, 484096, ",")) !== FALSE) {

            $dice = array_slice($data, 2);
            if ($data[0] == "Total")
                continue;

            if (isset($dice)) {

                for ($index = 0; $index < count($dice); $index++) {

                    echo $dice[$index];
                    if (is_numeric($dice[$index])) {

                        if (isset($total[$index])) {

                            $total[$index] = $total[$index] + $dice[$index];
                        } else {
                            $total[$index] = $dice[$index];
                        }
                    }
                    echo "\t";
                }
                echo "\n";
            }
            echo "<br>";
        }
        echo "<br>";

        fclose($handle);
        print_r($total);
        writeToFile($total, $date);
    } else {
        
    }
}

function writeToFile($arrayTotals, $date) {

    $outFile = fopen('/home/khunga/outputSummary.csv', 'a');
    $data = array_merge(array($date), $arrayTotals);
    fputcsv($outFile, $data);
    echo 'In fileWriter!';

    fclose($outFile);
}
