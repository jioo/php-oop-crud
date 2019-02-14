<?php 
include 'Includes/header.php'; 
include 'Services/StudentService.php';
?>

<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-flex uk-flex-center uk-width-1-1">
                <form method="post">
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Login</legend>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
								<input class="uk-input uk-form-large" name="username" placeholder="Username" type="text">
							</div>
						</div>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
								<input class="uk-input uk-form-large" name="password" placeholder="Password" type="password">
							</div>
						</div>

						<div class="uk-margin">
							<button type="submit" name="btn-submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">LOG IN</button>
						</div>

                        <div class="uk-margin">
                            <a href="register" class="uk-text-meta uk-text-primary">Register here</a>
						</div>
					</fieldset>
				</form>
            </div>
        </div>
    </div>
</div>

<?php include 'Includes/footer.php' ?>