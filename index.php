<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: organogram/examples/sample.php');
    exit;
}

//Loading Autoload file 
require 'organogram/vendor/autoload.php';


use Organogram\Department;
use Organogram\Auth;

// Get All Departments
$department = new Department();
$allDepartments = $department->getAll();
$loginError = false;
if (isset($_POST['login'])) {
    $auth = new Auth();
    $authentic = $auth->login($_POST['email'], $_POST['password']);
    if ($authentic) {
        $_SESSION['user_id'] = $authentic;
        $_SESSION['department'] = $_POST['department'];
        header('Location: organogram/examples/sample.php');
    } else {
        $loginError = true;
    }
}

include 'organogram/layouts/header.php';
?>

<div class="col-md-5 mx-auto py-5">
    <div class="card">
        <div class="card-header text-center">
            Employee Login
        </div>
        <div class="card-body">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
                </div>
                <div class="form-group">
                    <select name="department" class="form-control">
                        <?php foreach ($allDepartments as $department) { ?>
                            <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if ($loginError) { ?>
                    <p class="text-danger">Please Provide Valid Email and Password</p>
                <?php } ?>
                <div class="form-group">
                    <button class="btn btn-dark" name="login" type="submit">Login</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php include 'organogram/layouts/footer.php'; ?>