<main>
    <h2>Editar Curso</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($_SESSION['error']) ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php elseif(isset($_SESSION['success'])): ?>
        <p style="color: green;"><?= htmlspecialchars($_SESSION['success']) ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="<?= BASE_URL . 'cursos/' . $data['id'] ?>/update" method="POST" enctype="multipart/form-data">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($data['title']) ?>" >

        <label>
            <input type="checkbox" name="is_featured" value="1" <?= $data['is_featured'] ? 'checked' : '' ?>> Destacar no slideshow
        </label>

        <label for="content">Conteúdo:</label>
        <textarea id="content" name="content"><?= htmlspecialchars($data['content']) ?></textarea>

        <label for="image_url">Imagem:</label>
        <input type="file" id="image_url" name="image_url" accept="image/*">

        <?php if(!empty($data['image_url'])): ?>
            <p>Imagem Atual:</p>
            <img src="<?= BASE_URL . 'src' . $data['image_url'] ?>" alt="<?= $data['title'] ?>" style="max-width: 200px;">
        <?php endif; ?>

        <?php
            if(htmlspecialchars($data['image_url'])) {
                echo '<img src="" alt="" />';
            }
        ?>

        <button type="submit">Atualizar</button>
    </form>
</main>
