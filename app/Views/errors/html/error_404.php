<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<meta content="" name="description">
  	<meta content="" name="keywords">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">

		<section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
			<h1>404</h1>
			<h2>The page you are looking for doesn't exist.</h2>
			<a class="btn" href="/">Back to home</a>
			<img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
			<p>
				<?php if (! empty($message) && $message !== '(null)') : ?>
					<?= nl2br(esc($message)) ?>
				<?php else : ?>
					Sorry! Cannot seem to find the page you were looking for.
				<?php endif ?>
			</p>
		</section>
	</div>
</body>
</html>
<script src="assets/js/main.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>