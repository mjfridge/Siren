<?php if( $show_quiz ) { ?>
	<div class="row quiz-section-row">
		<div class="col-lg-1 hidden-xs"></div>
		<div class="col-lg-10 col-sm-12 col-xs-12 quiz-options-container">
			<p class='quiz-text'><?php echo $quiz['quiz'] ?></p>
			<form action="" method="post" id="submit_vote_form">
				<div class="row quiz-options-row">
					<?php foreach( $quiz['options'] as $option ) { ?>
						<div class="col-sm-4 col-xs-12 quiz-option-item">
							<label for="quiz_option_<?php echo $option['idoption'] ?>" class='quiz-option d-block'>
								<input type="checkbox" name="quiz_option[<?php echo $option['idoption'] ?>]" id="quiz_option_<?php echo $option['idoption'] ?>" value="<?php echo $option['idoption'] ?>">
								<span class='label'><?php echo $option['text'] ?></span>
								<span class="checkmark"></span>
							</label>
						</div>
					<?php } ?>
					<div class="row submit-vote-row">
						<div class="col-xs-12 submit-vote-col">
							<input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz_id ?>">
							<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
							<button type="submit" id="submit_vote">
								<span>ثبت رای</span>
								<img src="<?php echo $base_url ?>assets/img/loading.svg" alt="loading" class='loading'>
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-1 hidden-xs"></div>
	</div>
	<div class="overlay" style="display:none"></div>
	<div class="smodal" id="vote-code-modal" style="display:none">
		<div class="smodal-head">
			<div class="smodal-title">کد خود را وارد کنید</div>
		</div>
		<div class="smodal-body">
			<form action="" method="post" id="vote_code_form">
				<?php for( $i = 1; $i <= 4; $i++ ) { ?>
					<div class="field-container code-field-container">
						<input type="number" name="c<?php echo $i ?>" id="c<?php echo $i ?>" class="code-field" data-index="<?php echo $i ?>" autocomplete='off' required>
					</div>
				<?php } ?>
			</form>
		</div>
		<div class="smodal-footer">
			<button type="submit" class="smodal-submit" id="submit_vote_code">
				<span>تایید</span>
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