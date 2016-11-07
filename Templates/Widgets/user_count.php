



	<div class="container">
			<h4>Our Users !</h4>
	<?php
		$user_count = user_count($connect);
		$suffix = ($user_count !== 1) ? 's':'';
	?>
		<p>We Currently Have <?php echo $user_count; ?> Registered User<?php echo $suffix?>.</p>
	</div>