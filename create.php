<?php 

include 'Includes/header.php'; 
include 'Services/StudentService.php';

$error_messages = array();
$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';
$course = $_POST['course'] ?? '';

if( isset($_POST['btn-submit']) ){

    // Input validations
    if (empty($name)) {
        array_push($error_messages, "Name field is required.");
    }

    if (empty($age)) {
        array_push($error_messages, "Age field is required.");
    }

    if (empty($course)) {
        array_push($error_messages, "Course field is required.");
    }
    
    // Execute service if Form is valid.
    if (empty($error_messages)) {
        try {
            // Initialize Student serivce
            $service = new Services\StudentService();
            $student = array(
                'name'   => $name,
                'age'    => $age,
                'course' => $course,
            );
            
            // Map form inputs into model
            $model = new Models\Student($student);

            // Execute service
            $result = $service->create($model);
                
            if ($result) {
                header('Location: index');
            }

        } catch (PDOException $err) {
            array_push($error_messages, $err->getMessage());
        }
    }
}
?>

<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-2">

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
                
                <!-- Form -->
                <form method="post">
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Create Student</legend>

                        <!-- Name Field -->
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="Name" name="name" value="<?php echo $name?>">
                        </div>

                        <!-- Age Field -->
                        <div class="uk-margin">
                            <input class="uk-input" type="number" placeholder="Age" name="age" value="<?php echo $age?>">
                        </div>

                        <!-- Course Field -->
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="Course" name="course" value="<?php echo $course?>">
                        </div>

                        <button type="submit" name="btn-submit" class="uk-button uk-button-primary">Submit</button>
                        <a href="index" name="btn-submit" class="uk-button uk-button-default">Cancel</a>
                    </fieldset>
                </form>
                <!-- ./Form -->

            </div>
        </div>
    </div>
</div>

<?php include 'Includes/footer.php' ?>