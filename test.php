<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author khunga
 */
function getData() {
    $dir = glob("../Usersummary/*.csv");
    var_dump($dir);
    $files[] = scandir($dir);
    foreach ($files as $value) {
        if ($value) {
            
        }
        print_r($value);
    }
    
    echo "<br/>";
}

getData();

