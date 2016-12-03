<?php
require_once('include/top_page.php');
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
                <h2 class="hidden">Thông báo</h2>
                <div class="panel-title"><span>Đăng ký... </span></div>
                <div class="div_ann_content">
                    <?php
                                if (empty($_POST['userreg']) || empty($_POST['emailreg']) 
                                    || empty($_POST['passreg']) || empty($_POST['passreg2']))
                                    // Check if addarea_name is empty or addarea_pos is not set or addarea_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $userreg = valid($myDb->dbc, $_POST['userreg']);
                                    $emailreg = valid($myDb->dbc, $_POST['emailreg']);
                                    $passreg = md5($_POST['passreg']);
                                    $nonamereg = changeTitleRandom($userreg);
                                    $datereg = date("Y-m-d H:i:s");
                                    $usercode = genUserCode();
                                    sendEmailToOne($emailreg, SITE_NAME, "Hãy nhấn vào đây để kích hoạt tài khoản<br />".$usercode, 0);
                                    $myDb->doQuery("INSERT INTO user (UserName, UserNoName, UserPass, UserDateReg, UserEmail, UserType, UserCode, UserValidate) VALUES ('$userreg', '$nonamereg', '$passreg', '$datereg', '$emailreg', 1, '$usercode', 0)");
                                    
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "<p class='p_ann'>Bạn đã đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản.<br />Hãy đăng nhập và tham quan website nhé.</p>";
                                    }
                                    else
                                        echo "<p class='p_ann'>Có lỗi xảy ra, không thể đăng ký, bạn vui lòng thử lại.</p>";
                                }
                    ?>
                </div>
            </section>
        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>