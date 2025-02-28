<?php

namespace Rafaelscouto\DesafioRevvo\Core;

use PDO;
use PDOException;
use Rafaelscouto\DesafioRevvo\Core\View;

class Database
{
    private static ?PDO $instance = null;
    private $conn;

    private function __construct() {}

    public static function getInstance(): PDO
    {
        if(self::$instance === null) {
            try {
                $config = Config::get('database');
                self::$instance = new PDO(
                    "mysql:host={$config['host']};dbname={$config['name']};charset=utf8mb4",
                    $config['user'],
                    $config['pass'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
            } catch(PDOException $e) {
                error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
                die("Erro interno. Tente novamente mais tarde.");
            }
        }

        return self::$instance;
    }
}
