<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Tin tức - <?php require_once('include/title_p1.php'); ?></title>
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
                                $myDb->loadListDetailTechNews("NewsPos", "ASC");
                                $r = $myDb->r;
                                while ($technews = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                ?>
                <section class="listitem">
                    <div class="listitem-title"><a <?php echo 'href="detail_technews-'.$technews['NewsNoName'].'.html"'; ?> ><?php echo $technews['NewsName']; ?></a></div>
                    <div class="listitem-content">
                        <div class="thumbnail"><img <?php if ($technews['NewsImg'] != 'undefined') echo 'src="'.$technews['NewsImg'].'"'; else echo 'src="img/df_news.jpg"' ?> /></div>
                        <div class="info-right">
                            <span><?php echo substr($technews['NewsDate'], 0, 10); ?></span> |
                            <span><?php echo $technews['TypeName']; ?></span>
                            <p><?php echo substrIn3Line($technews['NewsContent']); ?></p>
                            <a <?php echo 'href="detail_technews-'.$technews['NewsNoName'].'.html"'; ?> >Xem thêm</a>
                        </div>
                        <br class="clear"/>
                    </div>
                </section>

                <?php
                                }
                ?>

                
            </div> <!-- Main-left -->
            
            <div class="sb-right">
                <?php require_once('include/sb_news.php'); ?>    
            </div>
            <br class="clear"/>
        </div> <!-- Main-content -->

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>