
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

$files = glob("../Usersummary/*.{csv}",GLOB_BRACE);
foreach ($files as $filepath[]) {
    print_r($filepath);
    
}