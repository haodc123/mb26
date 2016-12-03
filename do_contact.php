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
                <div class="panel-title"><span>Gửi liên hệ... </span></div>
                <div class="div_ann_content">
                    <?php
                                if (empty($_POST['emailcontact']) || empty($_POST['contentcontact']))
                                    // Check if addarea_name is empty or addarea_pos is not set or addarea_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $emailcontact = valid($myDb->dbc, $_POST['emailcontact']);
                                    $contentcontact = valid($myDb->dbc, $_POST['contentcontact']);
                                    $namecontact = substr($contentcontact, 0, 10);
                                    $nonamecontact = changeTitleRandom($namecontact);
                                    $datecontact = date("Y-m-d H:i:s");
                                    $myDb->doQuery("INSERT INTO contact (ContactName, ContactNoName, ContactContent, ContactDate, ContactEmail) VALUES ('$namecontact', '$nonamecontact', '$contentcontact', '$datecontact', '$emailcontact')");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "<p class='p_ann'>Liên hệ: đã được gởi thành công</p>";
                                    }
                                    else
                                        echo "<p class='p_ann'>Có lỗi xảy ra, không thể gởi liên hệ, bạn vui lòng thử lại.</p>";
                                }
                    ?>
                </div>
            </section>
        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>