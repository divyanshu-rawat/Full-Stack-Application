<div class="widget">

	<h2>Users</h2>

	<div class="inner">
	<?php
		$user_count = user_count($connect);
		$suffix = ($user_count !== 1) ? 's':'';
	?>
		we current,have <?php echo $user_count; ?> registered user<?php echo $suffix?>.
	</div>
</div>