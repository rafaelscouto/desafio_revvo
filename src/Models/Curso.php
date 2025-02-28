<?php

namespace Rafaelscouto\DesafioRevvo\Models;

use Rafaelscouto\DesafioRevvo\Core\Database;
use PDO;
use PDOException;

class Curso
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAll(int $limit = null, bool $is_featured = false): array
    {
        try {
            $query = "SELECT * FROM cursos";

            if($is_featured) $query .= " WHERE is_featured = 0";

            $query .= " ORDER BY created_at DESC";

            if($limit) $query .= " LIMIT :limit";

            $stmt = $this->pdo->prepare($query);

            if ($limit) $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            error_log("Erro ao buscar cursos: " . $e->getMessage());
            return [];
        }
    }

    public function getById(int $id): ?array
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM cursos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch();
            return $data ?: null;
        } catch(PDOException $e) {
            error_log("Erro ao buscar curso: " . $e->getMessage());
            return null;
        }
    }

    public function getFeatured(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM cursos WHERE is_featured = 1 ORDER BY created_at DESC LIMIT 3");
        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO cursos (title, content, image_url, is_featured, created_at) VALUES (:title, :content, :image_url, :is_featured, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':title' => $data['title'],
            ':content' => $data['content'],
            ':image_url' => $data['image_url'],
            ':is_featured' => $data['is_featured'] ?? 0
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE cursos SET title = :title, content = :content, image_url = :image_url, is_featured = :is_featured, modified_at = NOW() WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'content' => $data['content'],
            'image_url' => $data['image_url'],
            'is_featured' => $data['is_featured'] ?? 0
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM cursos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
