<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}

if (isset($_POST['logout'])) {
    unset($_SESSION["user_id"]);
    unset($_SESSION["department"]);
    header('Location: ../../index.php');
    exit;
}

//Loading Autoload file
require '../vendor/autoload.php';

use Organogram\Department;
use Organogram\employee;
// Get All Departments
$dept = new Department();
$department = $dept->find($_SESSION['department']);


$employee = new Employee;
$data = $employee->getEmployeeUnerMe($_SESSION['user_id'], $department['id']);

include '../layouts/header.php';
?>

<div class="col-md-12 py-5">
    <div class="card">
        <div class="card-header text-center">
            <span class="float-left">Employee Organogram of <strong><?= $department['name'] ?></strong> Department</span>
            <form class="float-right" action="sample.php" method="POST">
                <div class="form-group">
                    <button class="btn btn-dark float-right" name="logout" type="submit">Logout</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h6>
                        <?= $data['myInfo']['name'] ?> |
                        <?php if ($data['myRole']) { ?>
                            <strong><?= $data['myRole']['name'] ?></strong>
                        <?php } else { ?>
                            <strong>You have no role in this department</strong>
                        <?php } ?>
                    </h6>
                    <hr>
                    <?php if (!$data['mySubordinates']) { ?>
                        <h6>You Have No Subordinates</h6>
                    <?php  } else {
                        echo $data['mySubordinates'];
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../layouts/footer.php'; ?>