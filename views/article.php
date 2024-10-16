<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
	<title>Trang chủ</title>
</head>

<body>
	<?php
	include '../config/databse.config.php';
	include "../partial/header.php"
	?>

	<div content-main>
		<div class="container">
			<div class="inner_wrap">
				<?php
				include "../mixins/sider.php"
				?>
				<main>
					<div class="inner_content">
						<div>
							<div>Bài viết</div>
						</div>
						<div product-new class="items-list">
							<?php
							$sql = "SELECT * FROM product";
							$result = mysqli_query($conn, $sql);
							if (mysqLi_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									// 		echo '<div product-new_item>
									// 	<div>
									// 		<img src=' .
									// 		$row['thumbnail'] . 
									// 		' alt="">
									// 	</div>
									// 	<div>
									// 		<div>' .
									// 		$row['title'] . 
									// 		'</div>
									// 		<div>' . 
									// 		$row['priceNew'] . 'đ' .
									// 		'</div>
									// 	</div>
									// </div> ';
									$thumbnail = $row['thumbnail'];
									$title = $row['title'];
									$priceNew = $row['priceNew'];
									echo <<<HTML
							
								<div product-new_item="">
									<div>
										<img src=$thumbnail alt="">
									</div>
									<div>
										<div>$title</div>
										<div>$priceNew đ</div>
									</div>
								</div>
								
							HTML;
								}
							}

							?>
						</div>

					</div>
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