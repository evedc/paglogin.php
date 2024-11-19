<?php
require_once('config.php');

class DB{
    private static $pdo;
    public static function instanciar() {
        if(!isset(self::$pdo)) {
            try{
self::$pdo = new PDO('mysql:host='.SERVIDOR.';dbname='.BANCO,USUARIO,SENHA);
self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPETION);
self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }catch() {

            }
        }
    }
}