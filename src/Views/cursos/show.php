<section id="cursos">
    <div class="container">
        <div class="row justify-content-center align-items-center gap-4 g-0">
            <div class="col">
                <h3 class="title">Detalhes do Curso - #<?= $data['id'] ?></h3>
                <hr class="mb-4 pb-3">
            </div>
            <div class="col-auto me-auto">
                <a class="btn btn-outline-secondary rounded-1" href="<?= BASE_URL ?>cursos">Voltar</a>
            </div>
        </div>
        <div class="row g-0">
            <div class="bg-white rounded-1 w-50 m-auto p-4">
                <h2 class="fw-bolder text-center mt-0 mb-4"><?= htmlspecialchars($data['title']) ?></h2>
                <?php if(!empty($data['image_url'])): ?>
                    <img class="img-fluid rounded-1 mb-3" src="<?= BASE_URL . 'src' . $data['image_url'] ?>" alt="<?= $data['title'] ?>">
                <?php endif; ?>
                <div class="d-flex flex-column mb-1">
                    <small class="text-dark text-opacity-50">Publicado em: <?= date('d/m/Y H:i', strtotime($data['created_at'])) ?></small>
                    <?= $data['modified_at'] ? '<small class="text-dark text-opacity-50">Atualizado em: ' . date('d/m/Y H:i', strtotime($data['modified_at'])) . '</small>' : '' ?>
                </div>
                <p class="m-0"><?= nl2br(htmlspecialchars($data['content'])) ?></p>
            </div>
        </div>
    </div>
</section>
