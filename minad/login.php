<?php
require_once('top_page.php');
require_once('../include/se_url.php');
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('.panel input[name="blogin"]').click(function() {
                    if ($('.panel form[name="formLogin"]').attr("action") == "do_login.html?do=login") {
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
            <?php require_once('header.php'); ?>
        </header>
                    
        <div class="main-content">
            <section class="panel">
                <h2 class="hidden">Đăng nhập</h2>
                <div class="panel-title"><span>Đăng nhập CPanel</span></div>
                <form action="do_login.html?do=login" name="formLogin" method="post">
                    <div class="haft-left-panel"><label>Tên tài khoản</label></div>
                    <div class="haft-right-panel">
                        <input type="text" name="userlogin" value=""/><br class="clear"/>
                    </div>

                    <div class="haft-left-panel"><label>Mật khẩu</label></div>
                    <div class="haft-right-panel">
                        <input type="password" name="passlogin" value="" />
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
        </div> <!-- Main-content -->
        
        <footer>
            <?php require_once('footer.php'); ?>
        </footer>
        
    </body>
</html>