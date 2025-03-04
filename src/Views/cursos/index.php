<section id="cursos">
    <div class="container">
        <div class="row gap-4 mb-4 g-0">
            <div class="col">
                <h3 class="title">Todos os Cursos</h3>
                <hr class="mb-4 pb-3">
            </div>
            <div class="col-auto me-auto">
                <a class="btn btn-link btn-custom-create rounded-1" href="<?= BASE_URL ?>cursos/create">
                    <p class="text-add">Adicionar<br /><span>Curso</span></p>
                </a>
            </div>
        </div>
        <div class="row g-0 <?= ($totalPages > 1) ? 'mb-4' : '' ?>">
            <div class="table-responsive bg-white rounded-1 g-0 p-4">
                <table class="table table-striped table-hover align-middle m-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Última Atualização</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach($data as $item): ?>
                        <tr>
                            <th style="width: 5%;" class="text-center" scope="row"><?= htmlspecialchars($item['id']) ?></th>
                            <td style="width: 65%;"><?= htmlspecialchars($item['title']) ?></td>
                            <td style="width: 15%;" class="column-date"><?= $item['modified_at'] ? date('d/m/Y H', strtotime($item['modified_at'])) . 'h' . date('i', strtotime($item['modified_at'])) . 'm' : '' ?></td>
                            <td style="width: 15%;" class="text-center">
                                <a class="btn p-1" href="<?= BASE_URL . 'cursos/' . $item['id'] ?>" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn p-1" href="<?= BASE_URL . 'cursos/' . $item['id'] ?>/edit" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button
                                    class="btn btn-link btn-delete p-1"
                                    type="button"
                                    title="Excluir"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-id="<?= $item['id'] ?>"
                                    data-title="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row g-0">
            <nav aria-label="Page navigation">
                <ul class="pagination m-0">
                    <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                        <a class='page-link rounded-start-1' href="<?= $currentPage != 1 ? '?page=' . ($currentPage - 1) : '#' ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                        <a class='page-link rounded-end-1' href="<?= $currentPage != $totalPages ? '?page=' . ($currentPage + 1) : '#' ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
