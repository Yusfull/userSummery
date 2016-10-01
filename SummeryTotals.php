<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SummeryTotals
 *
 * @author khunga
 */
function getdir($path) {
    $files = array();

    /*
     * Get only the files with .csv extension
     * but this function returns the full file path
     */
    if ($path != null) {
        foreach (glob($path) as $file) {
            $files[] = $file;
        }
        // we extract the filename from the file path
        //$basename[] = preg_replace('/^.+[\\\\\\/]/', '', $files);
        array_unique($files);
        openReadFile($files);
    }

    return;
}

function openReadFile($filePath) {
$sum = 0;
$count=0;
$total = array();
    foreach ($filePath as $value) {
        $data = fopen($value, "r");
         print_r( $value);
         print_r("\n");
        while (!feof($data) &&($row = fgetcsv($data,22000)) !== FALSE){
            $len =count($row);
            print_r($len);
            if (isset($row[2])) {
                //print_r($row);
                for ($i=0;$i <= $len;$i++ ) {
                    if (is_numeric($row[$i]) && isset($row[$i])) 
                     $total[$i]+= $row[$i];
                 }
                 print_r("\n");
            }
           $sum =   $sum + $row;
     
        }
        print_r( $total);
        die("Done");
    }
    
    //print_r(array_values($file));
    return;
}

$userPath = '/home/khunga/Test/Usersummary/*.csv';
$strGet = getdir($userPath);
