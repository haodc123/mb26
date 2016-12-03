<?php
require_once('include/top_page.php');
if (isset($_SESSION['Username']) && strcmp($_SESSION['Username'], "") != 0) {
    header ('Location: home.php');
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Đăng nhập - <?php require_once('include/title_p1.php'); ?></title>
		<!-- CSS -->
		<?php require_once('include/css.php'); ?>
        <!-- JS -->
        <?php require_once('include/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('input:radio[name="ishaveacc"]').change(function() {
                    if ($(this).val() == "No") {
                        $('.panel input[name="passlogin"]').prop('disabled', true);
                        $('.panel input[name="passlogin"]').attr("style", "background: #ccc");
                        $('.panel input[name="blogin"]').attr("value","Đăng ký");
                        $('.panel form[name="formLogin"]').attr("action", "register.php");
                    } else {
                        $('.panel input[name="passlogin"]').prop('disabled', false);
                        $('.panel input[name="passlogin"]').attr("style", "background: #e9eaea");
                        $('.panel input[name="blogin"]').attr("value","Đăng nhập");
                        $('.panel form[name="formLogin"]').attr("action", "do_login.php?do=login");
                    }
                });
                $('.panel input[name="blogin"]').click(function() {
                    if ($('.panel form[name="formLogin"]').attr("action") == "do_login.php?do=login") {
                        var s = $('.panel input[name="userlogin"]').attr("value");
                        var s2 = $('.panel input[name="passlogin"]').attr("value");
                        if (s == "" || s2 == "") {
                            $('.submit-validate-checking').text("Bạn cần nhập đủ các mục trên!");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('.panel input[name="blogin"]').prop("type", "button");
                        } else {
                            $('.panel input[name="blogin"]').prop("type", "submit");
                        }
                    } else {
                        $('.panel input[name="blogin"]').prop("type", "submit");
                    }
                });
            });
        </script>
	</head>
	<body>
		<header>
            <?php require_once('include/header.php'); ?>
		</header>

        <section class="panel">
        	<h2 class="hidden">Đăng nhập</h2>
            <div class="panel-title"><span>Đăng nhập / Đăng ký</span></div>
            <form action="do_login.html?do=login" name="formLogin" method="post">
                <div class="haft-left-panel"><label>Tên tài khoản</label></div>
                <div class="haft-right-panel">
                    <input type="text" name="userlogin" value=""/><br class="clear"/>
                </div>

                <div class="haft-left-panel"><label>Bạn đã có tài khoản?</label></div>
                <div class="haft-right-panel">
                    <input type="radio" name="ishaveacc" value="No" /><label>Chưa, tạo tài khoản</label><br class="clear"/>
                    <input type="radio" name="ishaveacc" value="Yes" checked /><label>Có rồi</label><br class="clear"/>
                </div>

                <div class="haft-left-panel"><label>Mật khẩu</label></div>
                <div class="haft-right-panel">
                    <input type="password" name="passlogin" value="" />
                </div><br class="clear"/>

                <div class="haft-left-panel blank"></div>
                <div class="haft-right-panel small alone">
                    <a href="forgot_pass.php">Quên mật khẩu</a>
                </div><br class="clear"/>

                <div class="haft-left-panel blank"></div>
                <div class="haft-right-panel small alone">
                    <input type="submit" name="blogin" class="button" id="login-button" value="Đăng nhập"/>
                    <p class="submit-validate-checking"></p>
                </div><br class="clear"/>

                <div class="haft-left-panel blank"></div>
                <div class="haft-right-panel small alone">
                    <input type="checkbox" name="clogin" id="login-checkbox" />
                    <label id="login-checkbox-label">Nhớ đăng nhập</label>
                </div>
                <br class="clear"/>
            </form>
        </section>
        

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>