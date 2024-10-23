<style>
	[section-1] {
		display: flex;
		gap: 10px;
		align-items: center;
	}

	[parent-section-1] {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		align-items: center;
	}

	nav {
		padding-top: 15px;
		padding-bottom: 15px;
	}
</style>
<header>
	<div class="container">
		<nav>
			<div parent-section-1>
				<div section-1>
					<a href="/thoi-trang">Trang chủ</a>
					<a href="/thoi-trang/views/client/pages/product/index.php">Sản phẩm</a>
				</div>
				<div>
					<div>
						<form action="" method="get" form-search>
							<input type="text" name="key">
							<button type="submit">Tìm</button>
						</form>
					</div>
					<div section-1>
						<?php
						if(isset($_COOKIE['tokenUserPhp']) ){
							echo <<<HTML
								<a href="/thoi-trang/views/client/pages/auth/logout.php">Đăng xuất</a>
							HTML;
						}
						else{
							echo <<<HTML
							<a href="/thoi-trang/views/client/pages/auth/login.php">Đăng nhập</a>
							<a href="/thoi-trang/views/client/pages/auth/register.php">Đăng ký</a>
							HTML;
						}
						?>
						
						

					</div>
				</div>

			</div>

		</nav>

	</div>
</header>