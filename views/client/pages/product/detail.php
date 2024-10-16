<style>
	img {
		width: 100%;
		aspect-ratio: 1/1;
		height: auto;
		object-fit: cover;
		object-position: top;
		border-radius: 8px;
	}

	[title] {
		font-size: 20px;
		font-weight: 900;
		padding-top: 10px;
		padding-bottom: 10px;
	}
</style>
<?php
include __DIR__ . "/../../layouts/config/databse.config.php"; // Đảm bảo đường dẫn chính xác
// Kiểm tra nếu tham số id có trong URL
if (isset($_GET['id'])) {
	// Lấy giá trị id từ URL
	$id = $_GET['id'];

	// Thực hiện các xử lý khác như truy vấn sản phẩm dựa trên id
	// echo "ID của sản phẩm là: " . $id;
} else {
	echo "Không có ID nào được truyền vào.";
}
$sql = "SELECT * FROM product where id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
$title = $product['title'];
$thumbnail = $product['thumbnail'];
$price = $product['priceNew'];
if ($product) {
	echo <<<HTML

		<div class="inner_content">
			<div>
				<div style="font-weight: bold; font-size: 30px;">Chi tiết sản phẩm</div>
			</div>
			<div product-new class="items-list">
				<div style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 20px;">
					<div style="grid-column: span 5;">
						<img src=$thumbnail>
					</div>
					<div style="grid-column: span 7;">
						<div title>$title </div>
						<div style="display: flex; gap: 10px;">
							<div>Tình trạng: </div>
							<div style="font-weight: 900;">Còn hàng</div>
						</div>
						<div style="display: flex; gap: 10px; padding-top: 20px;">
							<div>Giá: </div>
							<div style="font-weight: 900;">$price đ</div>
						</div>
						<div style="display: flex; gap: 10px; padding-top: 20px;">
							<div>Số lượng: </div>
							<input type="number" value="1" style="text-align: center;">
						</div>
						<div style="display: flex; gap: 10px; padding-top: 20px;">
							<a href="">Mua ngay</a>
						</div>

					</div>
				</div>
				<div>
					<div style="font-weight: 900;">Mô tả sản phẩm</div>
					<div>Sản phẩm thân thiện với môi trường</div>
				</div>
			</div>

		</div>
	HTML;
}
else{
	echo "Sản phẩm không tồn tại!";
}
?>




<?php
$block_main = ob_get_clean(); // Lưu nội dung trang vào biến $block_main
include __DIR__ . "/../../layouts/default.php" // Chèn layout chung
?>