<div class="container">
	<section class="img-gallery-magnific">
		<?php if($returns){ 
			foreach ($returns as $key => $value) {
		?>
		<div class="magnific-img">
			<img src="<?=get_image($value['file_name'], 'uploads/users/'); ?>" />
		</div>
		<?php } }else{ ?>
			<p>Gallery images did not upload</p>
		<?php } ?>
	</section>
	<div class="clear"></div>
</div>