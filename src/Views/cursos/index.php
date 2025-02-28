<main>
    <h2>Lista de Cursos</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($_SESSION['error']) ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php elseif(isset($_SESSION['success'])): ?>
        <p style="color: green;"><?= htmlspecialchars($_SESSION['success']) ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $item): ?>
            <tr>
                <th scope="row"><?= htmlspecialchars($item['id']) ?></th>
                <td><?= htmlspecialchars($item['title']); ?></td>
                <td>
                    <a href="<?= BASE_URL . 'cursos/' . $item['id'] ?>">Ver</a>
                    <a href="<?= BASE_URL . 'cursos/' . $item['id'] ?>/edit">Editar</a>
                    <form action="<?= BASE_URL . 'cursos/' . $item['id'] ?>/delete" method="POST" style="display:inline;">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
