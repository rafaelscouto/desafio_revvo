<main>
    <h2>Detalhes do Curso</h2>
    <p><strong>ID:</strong> <?= htmlspecialchars($data['id']) ?></p>
    <p><strong>Título:</strong> <?= htmlspecialchars($data['title']) ?></p>
    <p><strong>Conteúdo:</strong> <?= nl2br(htmlspecialchars($data['content'])) ?></p>
    <p><strong>Imagem:</strong>
        <?= $data['image_url'] ? '<img src="'. BASE_URL . 'src' . $data['image_url'] . '" alt="' . $data['title'] . '" style="max-width: 200px;">' : '' ?>
        
    </p>
    <p><strong>Criado em:</strong> <?= htmlspecialchars($data['created_at']) ?></p>
    <p><strong>Atualizado em:</strong> <?= htmlspecialchars($data['modified_at']) ?></p>
</main>
