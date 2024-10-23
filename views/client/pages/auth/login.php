<style>
	[title] {
		font-size: 20px;
		font-weight: bolder;
		text-transform: uppercase;
		padding-top: 20px;
		padding-bottom: 20px;
	}

	input {
		outline: none;
		padding: 10px;
		border: 1px #ddd solid;
		border-radius: 8px;
	}

	[list-form-sigin] {
		display: flex;
		flex-direction: column;
		gap: 20px;
	}
</style>
<div class="inner_content">
	<div>
		<div title>đăng nhập</div>
	</div>
	<form action="/thoi-trang/views/client/pages/auth/login.php" method="post" form-sigin>
		<div list-form-sigin>
			<div>
				<label for="email">
					Email
					<span style="color: red"> *</span>
				</label>
				<input id="email" type="email" name="email" required placeholder="Email...">
			</div>
			<div>
				<label for="email">
					Mật khẩu
					<span style="color: red"> *</span>
				</label>
				<input type="password" name="password" required placeholder="Mật khẩu...">
			</div>
		</div>
		<button type="submit">Đăng nhập</button>

	</form>

</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include __DIR__ . "/../../layouts/config/databse.config.php"; // Đảm bảo đường dẫn chính xác
	// Lấy dữ liệu từ form
	$email = $_POST['email'];
	$password = $_POST['password'];
	if ($email  && $password) {
		$sql = "SELECT * FROM taikhoannguoidung";
		$result = mysqli_query($conn, $sql);
		// Kiểm tra xem email có tồn tại không
		$stmt = $pdo->prepare("SELECT * FROM taikhoannguoidung WHERE email = :email");
		if ($stmt) {
			$stmt->execute(['email' => $email]);
			// Nếu email đã tồn tại
			if ($stmt->rowCount() > 0) {
				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				// So sánh mật khẩu đã nhập với mật khẩu đã mã hóa trong cơ sở dữ liệu
				if (password_verify($password, $user['matKhau'])) {
					// Nếu mật khẩu khớp, lấy token từ cơ sở dữ liệu
					$token = $user['tokenUser']; // Giả sử bạn có một cột 'token' trong bảng

					// // Thiết lập cookie với token
					setcookie("tokenUserPhp", $token, time() + (24 * 60 * 60), "/"); // Cookie tồn tại 30 ngày

					// // Chuyển hướng đến trang bạn muốn sau khi đăng nhập thành công
					header("Location: /thoi-trang");
				}
			} else {

				// header("Location: /thoi-trang/views/client/pages/auth/login.php");
				//  exit(); // Dừng thực thi script sau khi chuyển hướng

			}
		}
	}
}
?>


<?php
$block_main = ob_get_clean(); // Lưu nội dung trang vào biến $block_main
include __DIR__ . "/../../layouts/default.php" // Chèn layout chung
?>