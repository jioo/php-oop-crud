<?php 
include 'Includes/header.php'; 
include 'Services/StudentService.php';
?>

<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-flex uk-flex-center uk-width-1-1">
                <form action="login.html">
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Register</legend>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
								<input class="uk-input uk-form-large" placeholder="Username" type="text">
							</div>
						</div>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
								<input class="uk-input uk-form-large" placeholder="Password" type="password">
							</div>
						</div>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
								<input class="uk-input uk-form-large" placeholder="Confirm Password" type="password">
							</div>
						</div>

						<div class="uk-margin">
							<button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">Submit</button>
						</div>

                        <div class="uk-margin">
							<a href="login" class="uk-button uk-button-default uk-button-large uk-width-1-1">Cancel</a>
                        </div>
					</fieldset>
				</form>
            </div>
        </div>
    </div>
</div>

<?php include 'Includes/footer.php' ?>