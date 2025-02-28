<?php

namespace Rafaelscouto\DesafioRevvo\Core;

class View
{
    public static function render(string $view, array $data = []): void
    {
        // $viewPath = __DIR__ . "/../Views/{$view}.php";
        $viewPath = __DIR__ . "/../Views/{$view}.php";

        if(!file_exists($viewPath)) {
            http_response_code(500);
            echo "Erro interno: View {$view} não encontrada.";
            return;
        }

        extract($data);
        ob_start();
        include __DIR__ . '/../Views/layouts/header.php';
        include $viewPath;
        include __DIR__ . '/../Views/layouts/footer.php';
        $output = ob_get_clean();

        echo $output;
    }
}
