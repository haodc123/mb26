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
		<title>Đăng ký - <?php require_once('include/title_p1.php'); ?></title>
		<!-- CSS -->
		<?php require_once('include/css.php'); ?>
        <!-- JS -->
        <?php require_once('include/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('input[name="emailreg"]').on('input', function() {
                    var str = $('input[name="emailreg"]').attr("value");
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

                $('input[name="userreg"]').on('input',function() {
                    var str = $('input[name="userreg"]').attr("value");
                    if (str.length > 20) {
                        $('.username-validate-checking').text("Tên phải nhỏ hơn 20 ký tự!");
                        $('.username-validate-checking').attr("style", "color: #d00");
                    } else {
                        $('.username-validate-checking').text("");
                    }
                });

                $('input[name="passreg"]').on('input',function() {
                    var str = $('input[name="passreg"]').attr("value");
                    if (str.length < 6 && str.length > 0) {
                        $('.pass-validate-checking').text("Mật khẩu phải dài ít nhất 6 ký tự!");
                        $('.pass-validate-checking').attr("style", "color: #d00");
                    } else {
                        $('.pass-validate-checking').text("");
                    }
                });

                $('input[name="passreg2"]').on('input',function() {
                    var str = $('input[name="passreg"]').attr("value");
                    var str2 = $('input[name="passreg2"]').attr("value");
                    if (str2 != str) {
                        $('.pass2-validate-checking').text("Bạn nhập mật khẩu 2 lần khác nhau rồi!");
                        $('.pass2-validate-checking').attr("style", "color: #d00");
                    } else {
                        $('.pass2-validate-checking').text("");
                    }
                });

                $('input[name="breg"]').click(function() {
                    var s = $('input[name="userreg"]').attr("value");
                    var s2 = $('input[name="emailreg"]').attr("value");
                    var s3 = $('input[name="passreg"]').attr("value");
                    var s4 = $('input[name="passreg2"]').attr("value");
                    var str = $('.username-validate-checking').text();
                    var str2 = $('.email-validate-checking').text();
                    var str3 = $('.pass-validate-checking').text();
                    var str4 = $('.pass2-validate-checking').text();
                    if (str == "Tên phải nhỏ hơn 20 ký tự!" || str2 == "Email chưa Hợp lệ!" || str3 == "Bạn nhập mật khẩu 2 lần khác nhau rồi!" || str4 == "Mật khẩu phải dài ít nhất 6 ký tự!" || s == "" || s2 == "" || s3 == "" || s4 == "") {
                        $('.submit-validate-checking').text("Bạn cần nhập đúng và đủ các mục trên!");
                        $('.submit-validate-checking').attr("style", "color: #d00");
                        $('input[name="breg"]').prop("type", "button");
                    } else {
                        $('input[name="breg"]').prop("type", "submit");
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
        	<h2 class="hidden">Đăng ký</h2>
            <div class="panel-title"><span>Đăng ký</span></div>
            <form action="do_register.html" name="formReg" method="post">
                <div class="haft-left-panel"><label>Tên tài khoản (*)</label></div>
                <div class="haft-right-panel">
                    <input type="text" name="userreg" value="" /><br class="clear"/><p class="username-validate-checking"></p>
                </div>

                <div class="haft-left-panel"><label>Email (*)</label></div>
                <div class="haft-right-panel">
                    <input type="text" name="emailreg" value="" onblur='releaseEmailInput("emailreg","Email chưa Hợp lệ!")'/><br class="clear"/><p class="email-validate-checking"></p>
                </div>

                <div class="haft-left-panel"><label>Mật khẩu (*)</label></div>
                <div class="haft-right-panel">
                    <input type="password" name="passreg" value="" /><br class="clear"/><p class="pass-validate-checking"></p>
                </div>

                <div class="haft-left-panel"><label>Nhập lại Mật khẩu (*)</label></div>
                <div class="haft-right-panel">
                    <input type="password" name="passreg2" value="" /><br class="clear"/><p class="pass2-validate-checking"></p>
                </div>

                <div class="haft-left-panel blank"></div>
                <div class="haft-right-panel small alone last">
                    <input type="submit" name="breg" class="button" id="login-button" value="Đăng ký" />
                    <p class="submit-validate-checking"></p>
                </div><br class="clear"/>
            </form>
        </section>
        

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>