<style>
	a{
		display: block;
		text-decoration: none;
		color: black;
		padding-top: 10px;
		padding-bottom: 10px;
	}
</style>
<aside>
	<div class="inner_wrap">
		<?php
		$sql = "SELECT * FROM productcategory";
		$result = mysqli_query($conn, $sql);
		if (mysqLi_num_rows($result) > 0) {
			echo '<ul>';
			while ($row = mysqli_fetch_assoc($result)) {
				$title = $row['title'];
				$id = $row['id'];
				echo <<<HTML
					<a href=/thoi-trang/views/client/pages/product-category/index.php?id=$id>$title</a>
					HTML;
				// echo '<li>' . $row['title'] . '</li>';
			}
			echo '</ul>';
		}

		?>
	</div>
</aside>