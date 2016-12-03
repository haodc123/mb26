<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Ứng dụng, game hay - <?php require_once('include/title_p1.php'); ?></title>
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

        <div class="main-content">
            <div class="main-left">

                <?php
                                $myDb->loadListDetailApp("NewsPos", "ASC");
                                $r = $myDb->r;
                                while ($app = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                ?>
                <section class="listitem">
                    <div class="listitem-title"><a <?php echo 'href="detail_app-'.$app['NewsNoName'].'.html"'; ?> ><?php echo $app['NewsName']; ?></a></div>
                    <div class="listitem-content">
                        <div class="thumbnail"><img <?php if ($app['NewsImg'] != 'undefined') echo 'src="'.$app['NewsImg'].'"'; else echo 'src="img/df_app.png"' ?> /></div>
                        <div class="info-right">
                            <span><?php echo substr($app['NewsDate'], 0, 10); ?></span> |
                            <span><?php echo $app['TypeName']; ?></span>
                            <p><?php echo substrIn3Line($app['NewsContent']); ?></p>
                            <a <?php echo 'href="detail_app-'.$app['NewsNoName'].'.html"'; ?> >Xem thêm</a>
                        </div>
                        <br class="clear"/>
                    </div>
                </section>

                <?php
                                }
                ?>

                
            </div> <!-- Main-left -->
            
            <div class="sb-right">
                <?php require_once('include/sb_app.php'); ?>    
            </div>
            <br class="clear"/>
        </div> <!-- Main-content -->

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>