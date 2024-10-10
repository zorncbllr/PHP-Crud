<?php

$note = new Note();


Router::get('/', fn($note) => Service::renderHome($note));

Router::get('/index.php', fn($note) => Service::renderHome($note));

Router::get('/note', fn($note) => Service::renderEditPage($note));

Router::post('/create', fn($note) => Service::createHandler($note));

Router::post('/delete', fn($note) => Service::deleteNote($note));

Router::post('/edit', fn($note) => Service::editHandler($note));

Router::post('/update', fn($note) => Service::updateHandler($note));
