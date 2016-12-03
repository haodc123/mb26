<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Liên hệ - <?php require_once('include/title_p1.php'); ?></title>
		<!-- CSS -->
		<?php require_once('include/css.php'); ?>
        <!-- JS -->
        <?php require_once('include/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('input[name="emailcontact"]').on('input', function() {
                    var str = $('input[name="emailcontact"]').attr("value");
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

                $('input[name="bcontact"]').click(function() {
                    var s = $('input[name="emailcontact"]').attr("value");
                    var s2 = $('textarea[name="contentcontact"]').attr("value");
                    var str = $('.email-validate-checking').text();
                    if (str == "Email chưa Hợp lệ!" || s == "" || s2 == "") {
                        $('.submit-validate-checking').text("Bạn cần nhập đúng và đủ các mục trên!");
                        $('.submit-validate-checking').attr("style", "color: #d00");
                        $('input[name="bcontact"]').prop("type", "button");
                    } else {
                        $('input[name="bcontact"]').prop("type", "submit");
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
        	<h2 class="hidden">Liên hệ</h2>
            <div class="panel-title"><span>Liên hệ</span></div>
            <p class="panel-p">
                Chúng tôi mang đến những sản phẩm tốt, hiệu quả, mang lại lợi ích cho mọi người.<br />
                Có 1 vấn đề mà phần đông mọi người ít thấy, đó là : 
                Không phải lúc nào giá cả cũng tỉ lệ thuận với chất lượng, bởi hàng hóa đến từ nhiều nguồn, nhiều kênh phân phối khác nhau,
                Vậy nên, nếu bạn biết cách, sẽ tìm thấy NHỮNG MÓN HỜI CÔNG NGHỆ.<br />
                Chúng tôi sẽ tìm, và mang đến cho bạn điều đó.<br />
                Chúng tôi không chỉ bán hàng, mà còn hướng dẫn, giới thiệu, cập nhật tin tức nữa.
                Hãy cùng đóng góp, và giúp chúng tôi có thể hiểu các bạn hơn, qua việc liên hệ.
                
            </p>
            <form action="do_contact.html" name="formContact" method="post">
                <div class="haft-left-panel"><label>Email</label></div>
                <div class="haft-right-panel">
                    <input type="text" name="emailcontact" value="" onblur='releaseEmailInput("emailcontact","Email chưa Hợp lệ!")'/>
                    <br class="clear"/><p class="email-validate-checking"></p>
                </div>

                <div class="haft-left-panel"><label>Nội dung liên hệ</label></div>
                <textarea rows="4" name="contentcontact"></textarea><br class="clear"/>

                <div class="haft-left-panel blank"></div>
                <div class="haft-right-panel alone last">
                    <input type="submit" name="bcontact" class="button" id="login-button" value="Gửi"/>
                    <p class="submit-validate-checking"></p>
                </div><br class="clear"/>
            </form>
        </section>

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>