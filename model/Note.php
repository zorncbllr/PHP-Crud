<?php


class Note {

private $dsn = 'mysql:host=localhost;port=3306;dbname=mock_db;user=root;password=;charset=utf8mb4';

private $pdo;

	public function __construct() {
		try {
			$this->pdo = new PDO($this->dsn);	
		} catch (PDOException $e) {
			echo 'Connection failed: '. $e->getMessage();
		}		
	}

	public function createNote($title, $body) {
		try {
			$query = "INSERT INTO `notes` (`title`, `body`) VALUES (:title, :body)";
		
			$stmt = $this->pdo->prepare($query);
			$stmt->execute(['title' => $title, 'body' => $body]);

			return true;
		} catch (PDOException $_) {
			return false;
		}
	}

	public function getNotes() {
		try {
			$query = "SELECT * FROM `notes`";
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $_) {
			return [];
		}
	}

	public function findNote($id) {
		try {
			$query = "SELECT * FROM `notes` WHERE `notes`.`id` = :id";
			$stmt = $this->pdo->prepare($query);
			$stmt->execute(['id' => $id]);

			$note =  $stmt->fetchAll(PDO::FETCH_ASSOC);
				
			return $note[0];
		} catch (PDOException $_) {
			return null;
		}
	}

	public function updateNote($id, $title, $body) {
		try {
			$query = "UPDATE `notes` SET `title` = :title, `body` = :body WHERE `notes`.`id` = :id";

			$stmt = $this->pdo->prepare($query);
			$stmt->execute([
				'title' => $title,
				'body' => $body,
				'id' => $id
			]);	

			return true;
		} catch (PDOException $_) {
			return false;
		}
	}

	public function deleteNote($id) {
		try {
			$query = "DELETE FROM `notes` WHERE `notes`.`id` = :id";
			
			$stmt = $this->pdo->prepare($query);
			$stmt->execute(['id' => $id]);

			return true;
		} catch (PDOException $_) {
			return false;
		}
	}
}



