<?php


class Service {

	public static function renderHome($note) {
		$notes = $note->getNotes();
		include __DIR__ . '\\..\\..\\views\\home.view.php';
	}

	public static function renderEditPage($note) {
		$id = $_GET['id'];

		$target_note = $note->findNote($id);

		$title = $target_note['title'];
		$body= $target_note['body'];
		
		include __DIR__ . '\\..\\..\\views\\edit.view.php';
	}

	public static function createHandler($note) {
		$title = $_POST['title'];
		$body = $_POST['body'];

		$note->createNote($title, $body);

		redirect('/');
	}

	public static function deleteNote($note) {
		$id = $_POST['id'];

		$note->deleteNote($id);

		redirect('/');
	}

	public static function editHandler($note) {
		$id = $_POST['id'];

		redirect("/note?id=$id");
	}

	public static function updateHandler($note) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$body = $_POST['body'];

		$note->updateNote($id, $title, $body);

		redirect("/");
	}
}