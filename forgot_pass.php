<?php
require_once('include/top_page.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Quên mật khẩu - <?php require_once('include/title_p1.php'); ?></title>
		<!-- CSS -->
		<?php require_once('include/css.php'); ?>
        <!-- JS -->
        <?php require_once('include/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('input[name="emailforgot"]').on('input', function() {
                    var str = $('input[name="emailforgot"]').attr("value");
                    if (str == "") {
                        $('.email-validate-checking').text("");
                    } else {
                        if (validateEmail(str)) {
                            $('.email-validate-checking').text("Email Hợp lệ!");
                            $('.email-validate-checking').attr("style", "color: #007d50");
                        } else {
                            $('.email-validate-checking').text("Email chưa Hợp lệ!");
                            $('.email-validate-checking').attr("style", "color: #d00");
                        }
                    }
                });

                $('input[name="bforgot"]').click(function() {
                    var s = $('input[name="emailforgot"]').attr("value");
                    var str = $('.email-validate-checking').text();
                    if (str == "Email chưa Hợp lệ!" || s == "") {
                        $('.submit-validate-checking').text("Bạn cần nhập email hợp lệ!");
                        $('.submit-validate-checking').attr("style", "color: #d00");
                        $('input[name="bforgot"]').prop("type", "button");
                    } else {
                        $('input[name="bforgot"]').prop("type", "submit");
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
            <div class="panel-title"><span>Quên mật khẩu</span></div>
            <p class="panel-p">
                Nhập email của bạn và chúng tôi sẽ gửi link lấy lại mật khẩu qua email cho bạn
            </p>
            <form action="do_forgot_pass.php" name="formForgot" method="post">
                <div class="haft-left-panel"><label>Email</label></div>
                <div class="haft-right-panel">
                    <input type="text" name="emailforgot" value="" onblur='releaseEmailInput("emailforgot","Email chưa Hợp lệ!")'/>
                    <br class="clear"/><p class="email-validate-checking"></p>
                </div>

                <div class="haft-left-panel blank"></div>
                <div class="haft-right-panel alone last">
                    <input type="submit" name="bforgot" class="button" id="login-button" value="Gửi"/>
                    <p class="submit-validate-checking"></p>
                </div><br class="clear"/>
            </form>
        </section>
        

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>