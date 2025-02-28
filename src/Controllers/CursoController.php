<?php

namespace Rafaelscouto\DesafioRevvo\Controllers;

use Rafaelscouto\DesafioRevvo\Core\View;
use Rafaelscouto\DesafioRevvo\Models\Curso;
use Rafaelscouto\DesafioRevvo\Helpers\UploadHelper;

class CursoController
{
    private Curso $model;

    public function __construct()
    {
        $this->model = new Curso();
    }

    /**
     * Exibe a página de listagem dos itens
     */
    public function index(): void
    {
        $data = $this->model->getAll() ?? [];
        !empty($data) ? View::render('cursos/index', $data) : View::render('layouts/content-not-found');
    }

    /**
     * Exibe a página de um único item
     */
    public function show(int $id): void
    {
        $data = $this->model->getById($id) ?? [];
        !empty($data) ? View::render('cursos/show', $data) : View::render('layouts/content-not-found');
    }

    /**
     * Exibe o formulário de criação de itens
     */
    public function create(): void
    {
        View::render('cursos/create');
    }

    /**
     * Ação para criação de um item
     */
    public function store(): void
    {
        $title = htmlspecialchars(trim($_POST['title'] ?? ''));
        $content = htmlspecialchars(trim($_POST['content'] ?? ''));
        $image_url = isset($_FILES['image_url']) ? UploadHelper::uploadImage($_FILES['image_url']) : null;
        $is_featured = isset($_POST['is_featured']) ? 1 : 0;

        if(empty($title)) {
            $_SESSION['error'] = "O título é obrigatório!";
            header('Location: ' . BASE_URL . 'cursos/create');
            exit;
        }

        if($this->model->create(['title' => $title, 'content' => $content, 'image_url' => $image_url, 'is_featured' => $is_featured])) {
            $_SESSION['success'] = "Curso criado com sucesso!";
            header('Location: ' . BASE_URL . 'cursos/create');
            exit;
        }

        $_SESSION['error'] = "Erro ao criar curso.";
        header('Location: ' . BASE_URL . 'cursos/create');
        exit;
    }

    /**
     * Exibe o formulário de edição de um item
     */
    public function edit(int $id): void
    {
        $data = $this->model->getById($id);
        !empty($data) ? View::render('cursos/edit', $data) : View::render('layouts/content-not-found');
    }

    /**
     * Ação para atualização de um item
     */
    public function update(int $id): void
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $is_featured = isset($_POST['is_featured']) ? 1 : 0;

        if(empty($title)) {
            $_SESSION['error'] = "O título é obrigatório!";
            header('Location: ' . BASE_URL . 'cursos/'. $id .'/edit');
            exit;
        }

        $item = $this->model->getById($id);

        if(empty($item)) {
            $_SESSION['error'] = "Curso não encontrado.";
            header('Location: ' . BASE_URL . 'cursos');
            exit;
        }

        $image_url = isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK ? UploadHelper::uploadImage($_FILES['image_url']) : $item['image_url'];

        if($this->model->update($id, ['title' => $title, 'content' => $content, 'image_url' => $image_url, 'is_featured' => $is_featured])) {
            $_SESSION['success'] = "Curso atualizado com sucesso!";
            header('Location: ' . BASE_URL . 'cursos/' . $id . '/edit');
            exit;
        }

        $_SESSION['error'] = "Erro ao atualizar curso.";
        header('Location: ' . BASE_URL . 'cursos/' . $id . '/edit');
        exit;
    }

    /**
     * Ação para exclusão de um item
     */
    public function delete(int $id): void
    {
        if(empty($id)) {
            $_SESSION['error'] = "Curso não encontrado.";
            header('Location: ' . BASE_URL . 'cursos');
            exit;
        }

        if($this->model->delete($id)) {
            $_SESSION['success'] = "Curso deletado com sucesso!";
            header('Location: ' . BASE_URL . 'cursos');
            exit;
        }

        $_SESSION['error'] = "Erro ao deletar curso.";
        header('Location: ' . BASE_URL . 'cursos');
        exit;
    }
}
