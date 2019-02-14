<?php 

include 'Includes/header.php'; 
include 'Services/StudentService.php';

?>

<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-1">
                <h4 class="uk-heading-line uk-text-bold"><span>Student List</span></h4>
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <table class="uk-table uk-table-striped">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $service = new Services\StudentService();
                                $result = $service->getAll();

                                foreach ($result as $item) {
                                    extract($item)
                            ?>

                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $age ?></td>
                                    <td><?php echo $course ?></td>
                                    <td>
                                        <a href="update?id=<?php echo $id ?>" class="uk-button uk-button-primary uk-button-small">Update</a>
                                        <a href="delete?id=<?php echo $id ?>" class="uk-button uk-button-danger uk-button-small">Delete</a>
                                    </td>
                                </tr>

                            <?php 
                                } 
                            ?>
                        </tbody>
                    </table>
                </article>
            </div>
        </div>
    </div>
</div>

<?php include 'Includes/footer.php' ?>