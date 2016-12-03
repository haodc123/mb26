<?php
require_once('top_page.php');
if ($_GET['do']=="logout") {
    $_SESSION['Username'] = "";
    $_SESSION['UserID'] = "";
    redirectToPage("minad/login.html");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Admin - <?php require_once('../include/title_p1.php'); ?></title>
        <!-- CSS -->
        <?php require_once('css.php'); ?>
        <!-- JS -->
        <?php require_once('js.php'); ?>
        <script type="text/javascript" src="js/easy-ticker/jquery.easing.min.js"></script>
        <script type="text/javascript" src="js/easy-ticker/jquery.easy-ticker.js"></script>
        
    </head>
    <body>
        <header>
            <?php require_once('header.php'); ?>
        </header>
                    
        <div class="main-content">
            <section class="panel">
                <h2 class="hidden">Đăng nhập</h2>
                <div class="panel-title"><span>Đăng nhập CPanel</span></div>
                <?php
                if ($_GET['do'] == 'login') {
                                if (empty($_POST['userlogin']) || empty($_POST['passlogin']))
                                    // Check if addarea_name is empty or addarea_pos is not set or addarea_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $user = valid($myDb->dbc, $_POST['userlogin']);
                                    $pass = md5($_POST['passlogin']);
                                    
                                    $myDb->doQuery("SELECT * FROM user WHERE UserName = '".$user."' AND UserPass = '".$pass."' AND UserType = 0");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        $r = $myDb->r;
                                        $user_detail = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                        echo "<p style='margin-left: 20px'>Hello: ".$user. " come back!</p>";
                                        $_SESSION["Username"] = $user_detail['UserName'];
                                        $_SESSION["UserID"] = $user_detail['UserID'];
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'admin.html\')",1000);';
                                        echo '</script>'; 
                                    }
                                    else {
                                        echo "<p style='margin-left: 20px'>We ca not find user</p>";
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'login.html\')",3000);';
                                        echo '</script>'; 
                                    }
                                }
                }
                ?>
            </section>
        </div> <!-- Main-content -->
        
        <footer>
            <?php require_once('footer.php'); ?>
        </footer>
        
    </body>
</html>