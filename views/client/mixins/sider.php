<aside>
	<div class="inner_wrap">
		<?php
		$sql = "SELECT * FROM productcategory";
		$result = mysqli_query($conn, $sql);
		if (mysqLi_num_rows($result) > 0) {
			echo '<ul>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<li>' . $row['title'] . '</li>';
			}
			echo '</ul>';
		}

		?>
	</div>
</aside>