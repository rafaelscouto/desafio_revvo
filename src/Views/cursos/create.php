<main>
    <h2>Cadastrar Novo Curso</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($_SESSION['error']) ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php elseif(isset($_SESSION['success'])): ?>
        <p style="color: green;"><?= htmlspecialchars($_SESSION['success']) ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="<?= BASE_URL . 'cursos/store' ?>" method="POST" enctype="multipart/form-data">    
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" >

        <label>
            <input type="checkbox" name="is_featured" value="1"> Destacar no slideshow
        </label>

        <label for="content">Conteúdo:</label>
        <textarea id="content" name="content" rows="5"></textarea>

        <label for="image_url">Imagem:</label>
        <input type="file" id="image_url" name="image_url" accept="image/*">

        <button type="submit">Salvar</button>
    </form>
</main>
