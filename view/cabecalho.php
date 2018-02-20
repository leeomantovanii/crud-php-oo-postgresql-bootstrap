<?php 
header('Content-type: text/html; charset=ISO-8859-1');
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD - MVC</title>
	<link rel="stylesheet" type="text/css" href="/26-01-crud/view/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
<!-- 			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
				<ul class="nav navbar-nav">
					<li><a href="/26-01-crud/view/index.php"> Inicio</a></li>
					<li><a href="/26-01-crud/view/adiciona-pessoa.php"> <span class="glyphicon glyphicon-plus"></span> Adicionar Pessoa</a></li>
					<li><a href="/26-01-crud/view/adiciona-profissao.php"> <span class="glyphicon glyphicon-plus"></span> Adicionar Profissao</a></li>
					<li><a href="/26-01-crud/view/lista-pessoa.php"> <span class="glyphicon glyphicon-th-list"></span> Lista de Pessoas</a></li>
					<li><a href="/26-01-crud/view/lista-profissao.php"> <span class="glyphicon glyphicon-th-list"></span> Lista de Profissões</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		