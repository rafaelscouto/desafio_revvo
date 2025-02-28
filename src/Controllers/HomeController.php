<?php

namespace Rafaelscouto\DesafioRevvo\Controllers;

use Rafaelscouto\DesafioRevvo\Core\View;
use Rafaelscouto\DesafioRevvo\Models\Curso;

class HomeController
{
    private Curso $cursoModel;

    public function __construct()
    {
        $this->cursoModel = new Curso();
    }

    public function index(): void
    {
        $featured = $this->cursoModel->getFeatured();
        $cursos = $this->cursoModel->getAll(7, true);

        View::render('home', [
            'featured' => $featured,
            'cursos' => $cursos
        ]);
    }

    public function notfound(): void
    {
        View::render('404');
    }
}
