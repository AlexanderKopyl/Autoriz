<?php
/**
 * Created by PhpStorm.
 * User: PC-Maus
 * Date: 12.03.2018
 * Time: 08:55
 */
function db_connect(){
    static $db;
    if( $db === null){
        $db = new PDO('mysql:host=localhost;dbname=WMI TEst','root','');
        $db ->exec('SET NAMES UTF8');
        return $db;
    }

}



?>