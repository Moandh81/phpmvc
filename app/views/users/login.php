<?php

require APPROOT. '/views/inc/header.php';

?>

<div class="row">
	
	<div class="col-md-6 mx-auto">
		
	<div class="card card-body bg-light mt-5">
		
	<h2 class="mx-auto">Log in your account</h2>
	
	<?php flash('register_success') ; ?>

	<form action="<?php echo URLROOT ; ?>/users/register" method="post">
		


	

		<div class="form-group">
			<label for="email">Email : <sup >*</sup></label>
			<input type="email" name="email" class="form-control form-control-lg <?php 
			echo (!empty($data['email_errors'])) ? 'is-invalid' : '' ; ?> " value=<?= $data["email"]  ?>	>

			<span class="invalid-feedback"><?php echo $data['email_error'] ; ?></span>
		</div>



		<div class="form-group">
			<label for="password">Password : <sup >*</sup></label>
			<input type="password" name="password" class="form-control form-control-lg <?php 
			echo (!empty($data['password_errors'])) ? 'is-invalid' : '' ; ?> " value=<?= $data["password"]  ?>	>

			<span class="invalid-feedback"><?php echo $data['password_error'] ; ?></span>
		</div>
	

		
		


		<div class="row">
			
			<div class="col">
				
				<input type="submit" value="Log in" class="btn btn-success btn-block">
			</div>

	<div class="col">
		
		<div class="col">
				
				<a href="<?=  URLROOT ; ?>/users/register" class="btn btn-light btn-block" > No account ? Register </a>	
			</div>
	</div>
				
		</div>

	</form>


	</div>

	</div>

</div>



<?php

require APPROOT. '/views/inc/footer.php';

?>