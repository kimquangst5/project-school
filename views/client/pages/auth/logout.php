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
		<div title>đăng xuất</div>
	</div>
	<!-- <form action="/thoi-trang/views/client/pages/auth/register.php" method="post" form-sigin>
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

	</form> -->

</div>


<?php
setcookie("tokenUserPhp", "", time() - 3600, "/");
header("Location: /thoi-trang/views/client/pages/product/index.php");
?>

<?php
$block_main = ob_get_clean(); // Lưu nội dung trang vào biến $block_main
include __DIR__ . "/../../layouts/default.php" // Chèn layout chung
?>