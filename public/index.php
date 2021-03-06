<?php

use ThatChrisR\TechDocs\DocumentationLoader\FilesystemDocumentationLoader;
use ThatChrisR\TechDocs\DirIterator\DirIterator;
use ThatChrisR\TechDocs\Router;

require '../vendor/autoload.php';

// satisfy the dependencies for the router
$file = new FilesystemDocumentationLoader();
$router = new Router($file);

// load in some documentation
$query_params = false;

if (!empty($_GET['vars'])) {
	if ($_GET['vars'][0] == '/') $_GET['vars'] = ltrim($_GET['vars'], '/');
	$query_params = explode('/', $_GET['vars']);
}

$router->load_route($query_params);
