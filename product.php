<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Phụ kiện ĐT - <?php require_once('include/title_p1.php'); ?></title>
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
            $gPage = valid($myDb->dbc, $_GET['page']);
            if ($gPage == '') {
                $title = "Tất cả sản phẩm hiện hành:";
            } else {}
                        
            if ($gPage == '') {
                $myDb->loadListDetailProduct("ProductPos", "ASC");
                $r = $myDb->r;
                while ($product = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        ?>
                    <section class="listitem">
                        <div class="listitem-title"><a <?php echo 'href="detail_product-'.$product['ProductNoName'].'.html"'; ?> ><?php echo $product['ProductName']; ?></a></div>
                        <div class="listitem-content">
                            <div class="thumbnail"><img <?php if ($product['ProductImg'] != 'undefined') echo 'src="'.$product['ProductImg'].'"'; else echo 'src="img/df_product.jpg"' ?> /></div>
                            <div class="info-right">
                                <span><?php echo substr($product['ProductDate'], 0, 10); ?></span> | 
                                <span><?php echo $product['TypeName']; ?></span>
                                <p><?php echo substrIn3Line($product['ProductContent']); ?></p>
                                <p><?php echo clearPrice($product['ProductPrice1']); ?></p>
                                <a <?php echo 'href="detail_product-'.$product['ProductNoName'].'.html"'; ?> >Xem thêm</a>
                            </div>
                            <br class="clear"/>
                        </div>
                    </section>

        <?php
                }
            } else {
                $myDb->loadListDetailProductByType($gPage, "ProductPos", "ASC");
                $r = $myDb->r;
                if (mysqli_num_rows($r) > 0) {
                    while ($product = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        ?>
                        <section class="listitem">
                            <div class="listitem-title"><a <?php echo 'href="detail_product-'.$product['ProductNoName'].'.html"'; ?> ><?php echo $product['ProductName']; ?></a></div>
                            <div class="listitem-content">
                                <div class="thumbnail"><img <?php if ($product['ProductImg'] != 'undefined') echo 'src="'.$product['ProductImg'].'"'; else echo 'src="img/df_product.jpg"' ?> /></div>
                                <div class="info-right">
                                    <span><?php echo substr($product['ProductDate'], 0, 10); ?></span>
                                    <p><?php echo substrIn3Line($product['ProductContent']); ?></p>
                                    <p><?php echo clearPrice($product['ProductPrice1']); ?></p>
                                    <a <?php echo 'href="detail_product-'.$product['ProductNoName'].'.html"'; ?> >Xem thêm</a>
                                </div>
                                <br class="clear"/>
                            </div>
                        </section>
        <?php
                    }
                } else {
        ?>
                    <section class="listitem">
                            <div class="listitem-title">Không tìm thấy chủng loại này!</div>
                    </section>
        <?php
                }
            }
        ?>

            </div> <!-- Main-left -->
            
            <div class="sb-right">
                <?php require_once('include/sb_product.php'); ?>    
            </div>
            <br class="clear"/>
        </div> <!-- Main-content -->

        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>