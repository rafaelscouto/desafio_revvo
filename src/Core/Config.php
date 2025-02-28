<?php

namespace Rafaelscouto\DesafioRevvo\Core;

class Config
{
    private static $settings = [
        'app' => [
            'base_url' => 'http://php-puro.local:10115/desafio_revvo/'
        ],
        'database' => [
            'host' => 'localhost:10114',
            'name' => 'local',
            'user' => 'root',
            'pass' => 'root'
        ]
    ];

    public static function get($key)
    {
        $keys = explode('.', $key);
        $value = self::$settings;
        foreach($keys as $key) {
            if(isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }
        return $value;
    }
}
