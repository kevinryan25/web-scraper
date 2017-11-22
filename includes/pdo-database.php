<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Get the PDO Database object. An equivalent to the <code>PDO</code> constructor instead of this function includes error catching and show exceptions.
 * @param string $dns The dns description including the database name you would to use. e.g. : <code> mysql:host=localhost;dbname=mydb </code>
 * @param string $user The username. Default is <code>root</code>
 * @param string $pass The password. 
 */
function getDatabase($dns, $user, $pass){
    try{
        $output = new PDO($dns, $user, $pass);
        return $output;
    } catch (Exception $ex) {
        echo "<pre>Error : " . $ex . "</pre>";
        return false;
    }
}