<?php if( $show_result ) { ?>
	<div class="overlay"></div>
	<div class="smodal" id="result-security-modal">
		<div class="smodal-head">
			<div class="smodal-title">رمزعبور</div>
		</div>
		<div class="smodal-body">
			<form action="" method="post" id="result_security_form">
				<?php for( $i = 1; $i <= 4; $i++ ) { ?>
					<div class="field-container code-field-container">
						<input type="number" name="c<?php echo $i ?>" id="c<?php echo $i ?>" class="code-field" data-index="<?php echo $i ?>" autocomplete='off' required>
					</div>
				<?php } ?>
			</form>
		</div>
		<div class="smodal-footer">
			<button type="submit" class="smodal-submit" id="submit_code">
				<span>ادامه</span>
				<img src="<?php echo $base_url ?>assets/img/loading.svg" alt="loading" class='loading'>
			</button>
		</div>
	</div>
<?php } else { ?>
	<script>
		Swal.fire({
			title: 'خطا',
			icon: 'error',
			html: '<?php echo $msg ?>',
			confirmButtonText: 'بستن'
		});
	</script>
<?php } ?>