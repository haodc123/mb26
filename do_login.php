<?php
require_once('include/top_page.php');
if ($_GET['do']=="logout") {
    $_SESSION['Username'] = "";   
    $_SESSION['UserID'] = "";  
    header ("Location: ".$_SESSION['url']);
    exit;
}
elseif (isset($_SESSION['Username']) && strcmp($_SESSION['Username'], "") != 0) {
    redirectToPage('home.html');
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?php require_once('include/title_p1.php'); ?></title>
		<!-- CSS -->
		<?php require_once('include/css.php'); ?>
        <!-- JS -->
        <?php require_once('include/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                
            });
        </script>
	</head>
	<body>
		<header>
            <?php require_once('include/header.php'); ?>
		</header>
            <section class="panel">
        <?php
            if ($_GET['do']=="login") {
                                if (empty($_POST['userlogin']) || empty($_POST['passlogin']))
                                    // Check if addarea_name is empty or addarea_pos is not set or addarea_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $user = valid($myDb->dbc, $_POST['userlogin']);
                                    $pass = md5($_POST['passlogin']);
                                    
                                    $myDb->doQuery("SELECT * FROM user WHERE UserName = '".$user."' AND UserPass = '".$pass."'");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        $r = $myDb->r;
                                        $user_detail = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                        $_SESSION["Username"] = $user_detail['UserName'];
                                        $_SESSION["UserID"] = $user_detail['UserID'];
            ?>
                <h2 class="hidden">Chuyển trang</h2>
                <div class="panel-title"><span>Chuyển trang... </span></div>
                <div class="div_ann_content">
                    <p class="p_ann">Chào mừng thành viên <B><?php echo $_SESSION['Username']; ?></b><br /><br />
                    Trình duyệt sẽ tự trở về trang chủ sau 3 giây !!!<br /><br />
                    Hoặc trở về <b><a href="<?php echo $_SESSION['url']; ?>">Trang trước</a></b></p>
                </div>
            <?php
                                    }
                                    else {
            ?>
                <h2 class="hidden">Thông báo</h2>
                <div class="panel-title"><span>Thông báo... </span></div>
                <div class="div_ann_content">
                    <p class="p_ann">Chúng tôi không thể tìm thấy user này.</b><br /><br />
                    Trình duyệt sẽ tự trở về trang chủ sau 3 giây !!!<br /><br />
                    Hoặc trở về <b><a href="<?php echo $_SESSION['url']; ?>">Trang trước</a></b></p>
                </div>
            <?php
                                    }
                                }
            ?>
        </section>
                <script language=javascript>
                    setTimeout("gopage('home.html')",3000);
                </script> 
            <?php
            }
        ?>

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>