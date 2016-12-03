<?php
if (!$myDb->dbc)
    trigger_error("Can not connect to database ". mysqli_connect_error());
else
    mysqli_set_charset($myDb->dbc, 'utf-8');
?>
<!-- Mobile Menu -->
            
            <!-- Login -->
            <div id="login"
            <?php
                if ($_SESSION['Page'] == "login.html" || $_SESSION['Page'] == "login.php" 
                    || $_SESSION['Page'] == "do_login.html" || $_SESSION['Page'] == "do_login.php") {
                    echo ' style="display: none" ';
                }
            ?>
                >
            <?php
                if (isset($_SESSION['Username']) && strcmp($_SESSION['Username'], "") != 0) {
            ?>
                <div id="login-name"><a href="#">Chào <?php echo $_SESSION['Username'];?></a> | <a href="do_login.html?do=logout">Thoát</a></div>
            <?php
                } else {
            ?>
                <div id="login-tab"><a href="login.php">ĐĂNG NHẬP</a></div>

                <div id="login-box">
                    <form action="do_login.php?do=login" name="formLogin" method="post">
                        <input type="text" name="userlogin" value="Tên tài khoản" onfocus='clearText("userlogin")' />
                        <input type="password" name="passlogin" value="*****" onfocus='clearText("passlogin")' />
                        <a href="forgot_pass.php">Quên mật khẩu</a>
                        <a href="register.php">Đăng ký</a>
                        <input type="submit" name="blogin" class="button" id="login-button" value="Đăng nhập"/>
                        <input type="checkbox" name="clogin" id="login-checkbox" />
                        <label>Nhớ đăng nhập</label>
                    </form>
                </div>
            <?php
                }
            ?>
            </div>


			<h1><?php echo SITE_NAME; ?></h1>
            <p>Đi tìm Món hời Công nghệ...</p>
			<nav>
                <h2 class="hidden">Our navigation</h2>
				<ul>
					<li><a href="../home.html">Trang chủ</a></li>
					<li><a href="../app.html">Ứng dụng-Game</a></li>
					<li><a href="../news.html">Tin Công nghệ</a></li>
					<li><a href="../contact.html">Liên hệ</a></li>
				</ul>
			</nav>