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

    public function getAll(int $limit = 10, bool $is_featured = false, int $page = 1): array
    {
        try {
            $offset = ($page - 1) * $limit;

            $sql = "SELECT * FROM cursos";
            if($is_featured) $sql .= " WHERE is_featured = 0";
            $sql .= " ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

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

    public function search(string $query, int $limit = 5, int $page = 1): array
    {
        try {
            $offset = ($page - 1) * $limit;

            $sql = "SELECT * FROM cursos WHERE title LIKE :title_query OR content LIKE :content_query ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':title_query', '%' . $query . '%', PDO::PARAM_STR);
            $stmt->bindValue(':content_query', '%' . $query . '%', PDO::PARAM_STR);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            error_log("Erro ao buscar curso: " . $e->getMessage());
            return null;
        }
    }

    public function countAllItems(): int
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM cursos";
            return $this->pdo->query($sql)->fetch()['total'];
        } catch(PDOException $e) {
            error_log("Erro ao buscar curso: " . $e->getMessage());
            return null;
        }
    }

    public function countAllItemsSearch(string $query): int
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM cursos WHERE title LIKE :title_query OR content LIKE :content_query";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':title_query', '%' . $query . '%', PDO::PARAM_STR);
            $stmt->bindValue(':content_query', '%' . $query . '%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch()['total'];
        } catch(PDOException $e) {
            error_log("Erro ao buscar curso: " . $e->getMessage());
            return null;
        }
    }
}
