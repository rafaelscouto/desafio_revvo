<section id="cursos">
    <div class="container">
        <div class="row justify-content-center align-items-center gap-4 g-0">
            <div class="col">
                <h3 class="title">Adicionar Curso</h3>
                <hr class="mb-4 pb-3">
            </div>
            <div class="col-auto me-auto">
                <a class="btn btn-outline-secondary rounded-1" href="<?= BASE_URL ?>">Voltar</a>
            </div>
        </div>
        <div class="row g-0">
            <form class="form" action="<?= BASE_URL . 'cursos/store' ?>" method="POST" enctype="multipart/form-data">
                <div class="bg-white rounded-1 mb-3 p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="title">Título:</label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Digite o título do curso">
                    </div>
                    <div class="form-check form-switch d-flex align-items-center gap-2 p-0 mb-3">
                        <label class="form-check-label fw-semibold" for="is_featured">Exibir no slideshow:</label>
                        <input class="form-check-input float-none m-0" type="checkbox" id="is_featured" value="1" role="switch">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="content">Conteúdo:</label>
                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Digite o conteúdo do curso"></textarea>
                    </div>
                    <div class="">
                        <label class="form-label fw-semibold" for="image_url">Imagem:</label>
                        <input class="form-control" type="file" id="image_url" name="image_url" accept="image/*">
                    </div>
                </div>
                <button class="btn btn-primary rounded-1" type="submit">Salvar</button>
            </form>
        </div>
    </div>
</section>
