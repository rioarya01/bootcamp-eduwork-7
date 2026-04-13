<?php
require_once __DIR__ . '/navbar.php';

function renderTemplate(
	string $title,
	string $content,
	string $activeMenu = 'home',
	string $basePath = '',
	string $extraHead = '',
	string $extraScript = ''
): void
{
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
		<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<?php echo $extraHead; ?>
		<style>
			* {
				font-family: 'Montserrat', sans-serif;
			}
			
			:root {
				--bs-primary: #FD6F00; /* Mengubah warna primary bawaan */
			}

			.btn-primary {
				background-color: var(--bs-primary) !important;
				border-color: var(--bs-primary) !important;
			}

			.btn-primary:hover {
				background-color: #e65c00 !important; /* Warna hover yang lebih gelap */
				border-color: #e65c00 !important;
			}

			.btn-outline-primary {
				color: var(--bs-primary) !important;
				border-color: var(--bs-primary) !important;
			}

			.btn-outline-primary:hover {
				color: #fff !important;
				background-color: var(--bs-primary) !important;
				border-color: var(--bs-primary) !important;
			}

			.navbar-nav .nav-link.active {
				font-weight: bold;
				color: var(--bs-primary) !important;
			}

			.navbar-nav .nav-link {
				color: #333 !important;
			}

			.navbar-nav .nav-link:hover {
				color: var(--bs-primary) !important;
			}

			.text-primary {
				color: var(--bs-primary) !important;
			}

		</style>
	</head>
	<body class="bg-light">
		<?php renderNavbar($activeMenu, $basePath); ?>

		<main class="container py-4">
			<?php echo $content; ?>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
		<?php echo $extraScript; ?>
	</body>
	</html>
	<?php
}

