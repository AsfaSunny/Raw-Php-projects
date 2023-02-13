<?php 
include "config.php";

session_start();

if (isset($_SESSION['user_Name'])) {
    header("Location: {$host_namelink}/admin/post.php");
}

?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                    <?php 
                        $setting_query = "SELECT * FROM `settings`";
                        $setting_result = mysqli_query($db_connect, $setting_query) or die("Query Failed: Settings.");

                        if (mysqli_num_rows($setting_result) > 0) {
                            while ($settings_row = mysqli_fetch_assoc($setting_result)) {
                                if ($settings_row['logo'] == "") {
                                echo '<a href="index.php"><h1>' . $settings_row["website_name"] . '</h1></a>';
                                } else {
                                    echo '<a href="index.php" id="logo"><img src="images/' . $settings_row['logo'] . '"></a>';
                                }
                            }
                        }
                    ?>
                        <h3 class="heading">Admin</h3>

                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->

                        <?php 
                            if (isset($_POST['login'])) {

                                if (empty($_POST['username']) || empty($_POST['password'])) {
                                    echo "<div class='alert alert-danger'>All Field Must be entered</div>";
                                    die();
                                } else {
                                    
                                    $user_name = mysqli_real_escape_string($db_connect, $_POST['username']);
                                    $password = md5($_POST['password']);

                                    $login_query = "SELECT `user_id`, `username`, `role` FROM `user` WHERE `username` = '$user_name' AND `password` = '$password'";
                                    $login_RESULT = mysqli_query($db_connect, $login_query) or die("Query Failed");

                                    if (mysqli_num_rows($login_RESULT) > 0) {
                                        while ($row = mysqli_fetch_assoc($login_RESULT)) {
                                            session_start();
                                            $_SESSION['user_Name'] = $row['username'];
                                            $_SESSION['userID'] = $row['user_id'];
                                            $_SESSION['user_Role'] = $row['role'];

                                            header("Location: {$host_namelink}/admin/post.php");
                                        }
                                    } else {
                                    echo "<div class='alert alert-danger'>Such User Doesn't exist or inputed password/username incorrect</div>";
                                    }
                                }
                                
                            }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
