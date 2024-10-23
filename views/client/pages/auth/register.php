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
		<div title>đăng ký</div>
	</div>
	<form action="/thoi-trang/views/client/pages/auth/register.php" method="post" form-sigin>
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
		<button type="submit">Đăng ký</button>

	</form>

</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Lấy dữ liệu từ form
	include __DIR__ . "/../../layouts/config/databse.config.php"; // Đảm bảo đường dẫn chính xác
	$email = $_POST['email'];
	$password = $_POST['password'];
	echo $email;
	echo $password;
	if ($email  && $password) {
		$sql = "SELECT * FROM taikhoannguoidung";
		$result = mysqli_query($conn, $sql);
		// Kiểm tra xem email có tồn tại không
		$stmt = $pdo->prepare("SELECT * FROM taikhoannguoidung WHERE email = :email");
		if ($stmt) {
			$stmt->execute(['email' => $email]);
			// Nếu email đã tồn tại
			if ($stmt->rowCount() > 0) {
				echo "Email đã tồn tại. Vui lòng chọn email khác.";
			} else {
				function generateUniqueToken($length) {
					return bin2hex(random_bytes($length));
				 }
				 
				 // Sử dụng hàm
				 $tokenUser = generateUniqueToken(100);
				 setcookie("tokenUserPhp", $tokenUser, time() + (24 * 60 * 60), "/"); // Cookie tồn tại 30 ngày
				//     Nếu email chưa tồn tại, bạn có thể lưu người dùng mới
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
				$insertStmt = $pdo->prepare("INSERT INTO taikhoannguoidung(email, matKhau, tokenUser) VALUES(:email, :password, :tokenUser)");

				$insertStmt->execute([
					// 'hoTen' => $hoTen,
					'email' => $email,
					'password' => $hashedPassword,
					'tokenUser' => $tokenUser,
				]);

				echo "Đăng ký thành công!";
				header("Location: /thoi-trang/views/client/pages/product/index.php");
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