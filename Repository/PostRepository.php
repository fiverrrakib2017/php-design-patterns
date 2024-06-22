<?php 
class PostRepository  implements PostRepositoryInterface{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function findAll() {
        $stmt = $this->pdo->query('SELECT * FROM posts');
        $posts = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($row['id'], $row['details'], $row['client']);
        }

        return $posts;
    }

    public function find($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM posts WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Post($row['id'], $row['title'], $row['content']);
        }

        return null;
    }

    public function save(Post $post) {
        if ($post->getId()) {
            $stmt = $this->pdo->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
            $stmt->execute([
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'content' => $post->getContent()
            ]);
        } else {
            $stmt = $this->pdo->prepare('INSERT INTO posts (title, content) VALUES (:title, :content)');
            $stmt->execute([
                'title' => $post->getTitle(),
                'content' => $post->getContent()
            ]);
            $post->setId($this->pdo->lastInsertId());
        }
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM posts WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
?>