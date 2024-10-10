<html lang="en">
<head>
	<title>Edit Note</title>
</head>

<style>
	<?php include 'css/styles.css' ?>
</style>

<body>
	<form class="create-form" action="/update" method="post">
		<input 
		type="hidden" 
		name="id" 
		value="<?= $id ?>"  
		>

		<input 
		type="text" 
		name="title" 
		value="<?= $title ?>" 
		placeholder="title" 
		>

		<input 
		class="body" 
		required 
		type="text" 
		value="<?= $body ?>" 
		name="body" 
		placeholder="body" 
		>

		<button type="submit">update</button>
	</form>
</body>

</html>