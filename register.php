<?php 
include 'Includes/header.php'; 
include 'Services/AuthService.php';

$service = new Services\AuthService();

$error_messages = array();
$name = $_POST['name'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if ( isset($_POST['btn-submit']) ) {
	// Input validations
	if (empty($name)) {
        array_push($error_messages, "Name field is required.");
    }

    if (empty($username)) {
        array_push($error_messages, "Username field is required.");
	}

    if (empty($password)) {
        array_push($error_messages, "Password field is required.");
	}

	if (empty($confirm_password)) {
        array_push($error_messages, "Confirm Password field is required.");
	}

	if ( strcmp($password, $confirm_password) && !empty($password) && !empty($confirm_password) ) {
		array_push($error_messages, "Password and Confirm Password does not match.");
	}

	$is_username_exists = $service->findByUsername($username);
	if ( !empty($is_username_exists) ) {
        array_push($error_messages, "Username is already taken.");
	}

	if ( empty($error_messages) ) {
		try {
			$new_user = array(
				'name' => $name,
				'username' => $username,
				'password' => $password,
			);
			$model = new Models\User($new_user);
			var_dump($model);

			$result = $service->register($model);

			if ($result) {
				header("Location: login");
			}
			
			array_push($error_messages, "Unable to create data.");

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
						<legend class="uk-legend">Register</legend>

						<div class="uk-margin">
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
								<input class="uk-input uk-form-large" name="name" placeholder="Name" type="text" value="<?php echo $name ?>">
							</div>
						</div>

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
							<div class="uk-inline uk-width-1-1">
								<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
								<input class="uk-input uk-form-large" name="confirm_password" placeholder="Confirm Password" type="password" value="<?php echo $confirm_password ?>">
							</div>
						</div>

						<div class="uk-margin">
							<button type="submit" name="btn-submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">Submit</button>
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