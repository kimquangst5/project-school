<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href='/thoi-trang/css/style.css'>
	<title></title>
</head>

<body>
	<?php
	include __DIR__ . "/config/databse.config.php";
	include __DIR__ . '/../partials/header.php';
	?>

	<div content-main>
		<div class="container">
			<div class="inner_wrap">

				<?php
				include __DIR__ . "/../mixins/sider.php";
				?>
				<main>
					<?php echo $block_main; ?>
				</main>
			</div>

		</div>

	</div>
	</div>
	<footer>
		<div class="container">
			<div class="inner_wrap">
				Footer
			</div>
		</div>
	</footer>
</body>

</html>