<div class="inner_content">
	<div>
		<div>Danh sách sản phẩm</div>
	</div>
	<div product-new class="items-list">
		<?php
		include __DIR__ . "/../../layouts/config/databse.config.php"; // Đảm bảo đường dẫn chính xác
		$sql = "SELECT * FROM product";
		$result = mysqli_query($conn, $sql);
		if (mysqLi_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$thumbnail = $row['thumbnail'];
				$title = $row['title'];
				$priceNew = $row['priceNew'];
				$id = $row['id'];
				echo <<<HTML
							
										<div product-new_item="">
											<div>
												<img src=$thumbnail alt="">
											</div>
											<div>
												<a href=/thoi-trang/views/client/pages/product/detail.php?id=$id>$title</a>
												<div>$priceNew đ</div>
											</div>
										</div>
								
									HTML;
			}
		}
		?>
	</div>

</div>

<?php
$block_main = ob_get_clean(); // Lưu nội dung trang vào biến $block_main
include __DIR__ . "/../../layouts/default.php" // Chèn layout chung
?>