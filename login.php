<?php 
include 'Includes/header.php'; 
include 'Services/AuthService.php';

// Initialize Auth serivce
$service = new Services\AuthService();

$error_messages = array();
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ( isset($_POST['btn-submit']) ) {
	// Input validations
    if (empty($username)) {
        array_push($error_messages, "Username field is required.");
    }

    if (empty($password)) {
        array_push($error_messages, "Password field is required.");
	}
	
	if (!empty($username) && !empty($password) ) {
		
		$validate_result = $service->findByUsername($username);
		// Check if username exists
		if (empty($validate_result)) {
			array_push($error_messages, "Invalid username or password.");
		}
	}

	if (empty($error_messages)) {
		try {
			$credential = array(
				'username' => $username,
				'password' => $password,
			);

			$model = new Models\User($credential);

			$result = $service->login($model);
			if ($result) {
				
				unset($validate_result['password']);
				$_SESSION['current_user'] = $validate_result;

				header("Location: protected");
			} 

			array_push($error_messages, "Invalid username or password.");

		} catch (PDOException $err) {
			array_push($error_messages, $err->getMessages());
		}
	}
}
?>

<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div uk-grid>
			<div class="uk-width-1-1">
				<!-- Error Alert Box -->
				<?php
					// Show messages if `$error_messages` is not empty 
					if (!empty($error_messages)) { 
				?>

				<div class="uk-alert-danger" uk-alert>
					<a class="uk-alert-close" uk-close></a>
					<ul class="uk-list">
						<?php 
						foreach($error_messages as $message){
							echo "<li>{$message}</li>";
						}
						?>
					</ul>
				</div>

				<?php 
					} 
				?>
				<!-- ./Error Alert Box -->
			</div>

            <div class="uk-flex uk-flex-center uk-width-1-1">
                <form method="post">
					<fieldset class="uk-fieldset">
						<legend class="uk-legend">Login</legend>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
								<input class="uk-input uk-form-large" name="username" placeholder="Username" type="text" value="<?php echo $username ?>">
							</div>
						</div>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
								<input class="uk-input uk-form-large" name="password" placeholder="Password" type="password" value="<?php echo $password ?>">
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