<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Kết quả tìm kiếm - <?php require_once('include/title_p1.php'); ?></title>
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
                <?php $kw = valid($myDb->dbc, $_GET['sitesearch']); ?>
                <h4 style="font-weight:bold; margin: 10px 0 10px 0"></h4>
                <?php
                $myDb->loadListNewsByKW($kw, "NewsPos", "ASC");
                $r = $myDb->r;
                if (mysqli_num_rows($r) > 0)
                    $hasRecord1 = true;
                else
                    $hasRecord1 = false;
                while ($s = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    if ($s['NewsAID'] == 1)
                        $div = "technews";
                    elseif ($s['NewsAID'] == 2)
                        $div = "app";
                    else
                        $div = "product";
                ?>
                    <section class="listitem">
                        <div class="listitem-title"><a <?php echo 'href="detail_'.$div.'-'.$s['NewsNoName'].'.html"'; ?> ><?php echo $s['NewsName']; ?></a></div>
                        <div class="listitem-content">
                            <div class="thumbnail"><img <?php if ($s['NewsImg'] != 'undefined') echo 'src="'.$s['NewsImg'].'"'; else echo 'src="img/df_app.png"' ?> /></div>
                            <div class="info-right">
                                <span><?php echo substr($s['NewsDate'], 0, 10); ?></span> |
                                <span><?php echo $s['TypeName']; ?></span>
                                <p><?php echo substrIn3Line($s['NewsContent']); ?></p>
                                <a <?php echo 'href="detail_'.$div.'-'.$s['NewsNoName'].'.html"'; ?> >Xem thêm</a>
                            </div>
                            <br class="clear"/>
                        </div>
                    </section>
                <?php
                }

                $myDb->loadListProductByKW($kw, "ProductPos", "ASC");
                $r = $myDb->r;
                if (mysqli_num_rows($r) > 0)
                    $hasRecord2 = true;
                else
                    $hasRecord2 = false;
                while ($s = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    $div = "product";
                ?>
                    <section class="listitem">
                        <div class="listitem-title"><a <?php echo 'href="detail_'.$div.'-'.$s['ProductNoName'].'.html"'; ?> ><?php echo $s['ProductName']; ?></a></div>
                        <div class="listitem-content">
                            <div class="thumbnail"><img <?php if ($s['ProductImg'] != 'undefined') echo 'src="'.$s['ProductImg'].'"'; else echo 'src="img/df_app.png"' ?> /></div>
                            <div class="info-right">
                                <span><?php echo substr($s['ProductDate'], 0, 10); ?></span> |
                                <span><?php echo $s['TypeName']; ?></span>
                                <p><?php echo substrIn3Line($s['ProductContent']); ?></p>
                                <a <?php echo 'href="detail_'.$div.'-'.$s['ProductNoName'].'.html"'; ?> >Xem thêm</a>
                            </div>
                            <br class="clear"/>
                        </div>
                    </section>
                <?php
                }
                if ($hasRecord1 == false && $hasRecord2 == false) {
                ?>
                    <section class="listitem">
                        <div class="listitem-title">Không tìm thấy kết quả nào</div>
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