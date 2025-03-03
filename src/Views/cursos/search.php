<?php $searchParam = htmlspecialchars($_GET['s']) ?>
<section id="cursos">
    <div class="container">
        <div class="row justify-content-center align-items-center gap-4 g-0">
            <div class="col">
                <h3 class="title">Você Pesquisou por: <span class="fw-bolder"><?= $searchParam ?></span></h3>
                <hr class="mb-4 pb-3">
            </div>
            <div class="col-auto me-auto">
                <a class="btn btn-outline-secondary rounded-1" href="<?= BASE_URL ?>">Voltar</a>
            </div>
        </div>
        <div class="row g-0 <?= ($totalPages > 1) ? 'mb-4' : '' ?>">
            <div class="bg-white rounded-1 m-0 p-4">
                <h5 class="fw-bold mb-3">Resultados da busca:</h5>
                <?php if(isset($data) && count($data) > 0): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($data as $item): ?>
                            <li class="list-group-item d-flex flex-column justify-content-between align-items-start p-0 pb-3 mb-3">
                                <h6 class="fw-semibold m-0"><?= htmlspecialchars($item['title']) ?></h6>
                                <p class="text-dark text-opacity-50 mb-2"><?= htmlspecialchars(substr($item['content'], 0, 100)) ?>...</p>
                                <a class="link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?= BASE_URL ?>cursos/<?= $item['id'] ?>">Ver mais</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="m-0 p-0">Nenhum resultado encontrado para "<span class="fw-bold"><?= $searchParam ?></span>".</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if($totalPages > 1): ?>
        <div class="row g-0">
            <nav aria-label="Page navigation">
                <ul class="pagination m-0">
                    <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                        <a class='page-link rounded-start-1' href="?s=<?= $searchParam ?><?= $currentPage != 1 ? '&page=' . ($currentPage - 1) : '#' ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                            <a class="page-link" href="?s=<?= $searchParam ?>&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                        <a class='page-link rounded-end-1' href="?s=<?= $searchParam ?><?= $currentPage != $totalPages ? '&page=' . ($currentPage + 1) : '#' ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
    </div>
</section>
