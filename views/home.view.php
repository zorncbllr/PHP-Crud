<html lang="en">

<head>
	<title>Notes</title>
</head>

<style>
	<?php include 'css/styles.css' ?>
</style>

<body>
	<h2 class="notes-text">Notes</h2>

	<form class="create-form" action="/create" method="post">
		<input required type="text" name="title" placeholder="title">
		<input class="body" required type="text" name="body" placeholder="body">
		<button type="submit">create</button>
	</form>

	<div class="notes-container">
		<?php foreach ($notes as $nt): ?>
			<div class="note">
				<div class="note-content">
					<p><b><?= $nt['title'] ?></b></p>
					<p><?= $nt['body'] ?></p>
				</div>

				<div class="note-buttons">
					<form action="/edit" method="post">
						<input
							type="hidden"
							name="id"
							value="<?= $nt['id'] ?>">
						<input
							type="hidden"
							name="title"
							value="<?= $nt['title'] ?>">
						<input
							type="hidden"
							name="body"
							value="<?= $nt['body'] ?>">
						<button class="edit" type="submit">edit</button>
					</form>
					<form action="/delete" method="post">
						<input
							type="hidden"
							name="id"
							value="<?= $nt['id'] ?>">

						<button class="delete" type="submit">delete</button>
					</form>
				</div>
			</div>

		<?php endforeach ?>
	</div>
</body>

</html>