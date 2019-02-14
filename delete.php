<?php 

include 'Includes/header.php'; 
include 'Services/StudentService.php';

// Initialize Student serivce
$service = new Services\StudentService();
$id = $_GET['id'];

// Check if model exists
$model = $service->findById($id);
if( empty($model) ) {
    die("
        <div class='uk-container'>
            <h2 class='uk-text-lead uk-text-danger'>Student does not exists.</h2>
            <a href='index' name='btn-submit' class='uk-button uk-button-default'>Back to list</a>
        </div>
    ");
}

extract($model);

if( isset($_POST['btn-submit']) ){
    
    // Execute service if Form is valid.
    if (empty($error_messages)) {
        try {
            $result = $service->delete($id);
                
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
                <h2 class="uk-text-lead uk-text-danger">Are you sure you want to Delete this?</h2>
                <dl class="uk-description-list">
                    <dt>Name:</dt>
                    <dd><?php echo $name ?></dd>

                    <dt>Age:</dt>
                    <dd><?php echo $age ?></dd>

                    <dt>Course:</dt>
                    <dd><?php echo $course ?></dd>
                </dl>

                <form method="post">
                    <button type="submit" name="btn-submit" class="uk-button uk-button-danger">Yes</button>
                    <a href="index" name="btn-submit" class="uk-button uk-button-default">No</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'Includes/footer.php' ?>