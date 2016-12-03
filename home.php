<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
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
            $(function() {
                $('#slides').slidesjs({
                    height: 235,
                    navigation: false,
                    pagination: false,
                    effect: {
                        fade: {
                            speed: 400
                        }
                    }, callback:
                    {
                        start: function(number)
                        {
                            $("#slider_content1,#slider_content2,#slider_content3").fadeOut(500);
                        },
                        complete: function(number)
                        {
                            $("#slider_content" + number).delay(500).fadeIn(1000);
                        }
                    },
                    play:
                    {
                        active: false,
                        auto: true,
                        interval: 6000,
                        pauseOnHover: false
                    }
                });
            });
        </script>
        <script type="text/javascript" src="js/easy-ticker/jquery.easing.min.js"></script>
        <script type="text/javascript" src="js/easy-ticker/jquery.easy-ticker.js"></script>
        <script type="text/javascript">
            $('document').ready(function() {
                $('.imgproductframe').each(function() {
                    var refRatio = 200/115; // width/height
                    var w = $(this).children("img").width();
                    var h = $(this).children("img").height();
                    if ((w/h) < refRatio) {
                        $(this).addClass("portrait");
                    } else {
                        $(this).addClass("landscape");
                    }
                });

                var dd = $('.ticker').easyTicker({
                    direction: 'up',
                    easing: 'easeInOutBack',
                    speed: 'slow',
                    interval: 2000,
                    height: 'auto',
                    visible: 1,
                    mousePause: 0,
                    controls: {
                        up: '.up',
                        down: '.down',
                        toggle: '.toggle',
                        stopText: 'Stop !!!'
                    }
                }).data('easyTicker');
            });
        </script>
	</head>
	<body>
		<header>
            <?php require_once('include/header.php'); ?>
		</header>

		<section class="container">
			<h2 class="hidden">Slide hình ảnh</h2>
            <article id="slider_content1">
                <!-- <h3>Bạn chưa có kinh nghiệm?</h3>
                <p>Chúng tôi muốn một học sinh tiểu học cũng có thể bán hàng được, vì vậy, bạn hãy yên tâm rằng chúng tôi sẽ hỗ trợ hết mình <a href="javascript:void(0)" class="responsive_button">Xem thêm...</a></p>
                <a class="button" href="javascript:void(0)">Xem thêm...</a> -->
            </article>
            <article id="slider_content2">
                <!-- <h3>Bạn bận rộn?</h3>
                <p>Bạn chỉ cần đăng tải 1 lần, nhiệm vụ quảng bá là của chúng tôi <a href="javascript:void(0)" class="responsive_button">Xem thêm...</a></p>
                <a class="button" href="javascript:void(0)">Xem thêm...</a> -->
            </article>
            <article id="slider_content3">
                <!-- <h3>Những ai có thể sử dụng?</h3>
                <p>Bất cứ ai có sản phẩm, dịch vụ muốn quảng bá <a href="javascript:void(0)" class="responsive_button">Xem thêm...</a></p>
                <a class="button" href="javascript:void(0)">Xem thêm...</a> -->
            </article>
			<div id="slides">
				<img style="background-size:cover" src="img/slide1.jpg" alt="">
				<img style="background-size:cover" src="img/slide2.jpg" alt="">
				<img style="background-size:cover" src="img/slide3.jpg" alt="">
			</div>
		</section>
		<section id="spacer">
        	<div class="ticker">
                <ul>
                    <?php
                    $myDb->loadLatestDetailTechNews("", "NewsDate", "ASC", 4);
                    $r4 = $myDb->r;
                    while ($n = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
                    ?>
                        <li><a <?php echo 'href="detail_technews-'.$n['NewsNoName'].'.html"'; ?> ><?php echo $n['NewsName']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="search">
                <form action="do_search.html" name="formSearch" method="get">
                	<input class="inputsearch" type="text" name="sitesearch" value="Enter a word..." onfocus='clearText("sitesearch")' />
                    <input type="submit" name="start_search" class="button" value="Search"/>
                </form>
            </div>
        </section>
        <!-- <section id="special-products">
        	<h2 class="hidden">Giới thiệu dịch vụ</h2>
            <article>            	               
                <img src="img/sp1.png" alt="Some alt text"/>                
                <h3><a href="app.php" class="title-special-product">Phần mềm di động</a></h3>
                <p>        	
                    Nơi cập nhật các phần mềm hay và tiện ích trên di động theo các chủ đề
                </p>
            </article>
            <article>            	     
                <img src="img/sp2.png" alt="Some alt text"/>              
                <h3><a href="product.php" class="title-special-product">Phụ kiện điện thoại</a></h3>
                <p>        	
                    Tập trung các sản phẩm tiện ích, mới mẻ giúp việc trải nghiệm điện thoại tuyệt vời hơn
                </p>
            </article>
            <article>            	    
                <img src="img/sp3.png" alt="Some alt text"/>                
                <h3><a href="news.php" class="title-special-product">Thông tin di động</a></h3>
                <p>        	
                    Những tin tức nóng hổi được cập nhật liên tục trong lĩnh vực công nghệ
                </p>
            </article>
            <br class="clear"/>
        </section> -->

        <section id="four_columns">
            <h2>
                Phụ kiện mới nhất
            </h2>    
            <?php
            $myDb->loadLatestProductIsHot("", "ProductDate", "ASC", 4, 0);
            $r1 = $myDb->r;
            while ($p1 = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
            ?>
                <article class="img-item">
                	<h3 class="hidden"><?php echo $p1['ProductName']; ?></h3>
                    <figure>  
                        <!-- <a href="img/iPhone6s.jpg" rel="lightbox" title="iPhone 6s vàng hồng đầy nữ tính..."> -->
                        <!-- <span class="thumb-screen"></span> -->
                        <div class="imgproductframe">
                        <?php
                            if ($p1['ProductImg'] != 'undefined') 
                                echo '<img src="'.$p1['ProductImg'].'"'; 
                            else 
                                echo '<img src="img/df_product.jpg"';
                            echo 'alt="'.$p1['ProductName'].'" />'; 
                        ?>
                        </div>
                        <!-- </a> -->
                        <figcaption>
                        <?php 
                            echo '<a href="detail_product-'.$p1['ProductNoName'].'.html" >';
                            echo $p1['ProductName'].'</a>';
                            echo clearPrice($p1['ProductPrice1']); 
                        ?>
                        </figcaption>
                    </figure>
                </article>
            <?php
            }
            ?>
            
            <br class="clear"/>
        </section>

        <section id="four_columns">
            <h2>
                Phụ kiện bán chạy nhất
            </h2>    
            <?php
            $myDb->loadLatestProductIsHot("", "ProductDate", "ASC", 4, 1);
            $r2 = $myDb->r;
            while ($p1 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
            ?>
                <article class="img-item">
                    <h3 class="hidden"><?php echo $p1['ProductName']; ?></h3>
                    <figure>  
                        <!-- <a href="img/iPhone6s.jpg" rel="lightbox" title="iPhone 6s vàng hồng đầy nữ tính..."> -->
                        <!-- <span class="thumb-screen"></span> -->
                        <div class="imgproductframe">
                        <?php
                            if ($p1['ProductImg'] != 'undefined') 
                                echo '<img src="'.$p1['ProductImg'].'"'; 
                            else 
                                echo '<img src="img/df_product.jpg"';
                            echo 'alt="'.$p1['ProductName'].'" />'; 
                        ?>
                        </div>
                        <!-- </a> -->
                        <figcaption>
                        <?php 
                            echo '<a href="detail_product-'.$p1['ProductNoName'].'.html" >';
                            echo $p1['ProductName'].'</a>';
                            echo clearPrice($p1['ProductPrice1']); 
                        ?>
                        </figcaption>
                    </figure>
                </article>
            <?php
            }
            ?>
            <br class="clear"/>
        </section>

        <section id="four_columns">
            <h2>
                Ứng dụng - game
            </h2>    
            <?php
            $myDb->loadLatestDetailApp("", "NewsDate", "ASC", 4);
            $r3 = $myDb->r;
            while ($a1 = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
            ?>
                <article class="img-item">
                    <h3 class="hidden"><?php echo $a1['NewsName']; ?></h3>
                    <figure>  
                        <!-- <a href="img/iPhone6s.jpg" rel="lightbox" title="iPhone 6s vàng hồng đầy nữ tính..."> -->
                        <!-- <span class="thumb-screen"></span> -->
                        <div class="imgproductframe">
                        <?php
                            if ($a1['NewsImg'] != 'undefined') 
                                echo '<img src="'.$a1['NewsImg'].'"'; 
                            else 
                                echo '<img src="img/df_News.jpg"';
                            echo 'alt="'.$a1['NewsName'].'" />'; 
                        ?>
                        </div>
                        <!-- </a> -->
                        <figcaption>
                        <?php 
                            echo '<a href="detail_app-'.$a1['NewsNoName'].'.html" >';
                            echo $a1['NewsName'].'</a>';
                        ?>
                        </figcaption>
                    </figure>
                </article>
            <?php
            }
            ?>
            <br class="clear"/>
        </section>

        <section id="four_columns">
            <h2>
                Tin tức
            </h2>    
            <?php
            $myDb->loadLatestDetailTechNews("", "NewsDate", "ASC", 4);
            $r4 = $myDb->r;
            while ($n1 = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
            ?>
                <article class="img-item">
                    <h3 class="hidden"><?php echo $n1['NewsName']; ?></h3>
                    <figure>  
                        <!-- <a href="img/iPhone6s.jpg" rel="lightbox" title="iPhone 6s vàng hồng đầy nữ tính..."> -->
                        <!-- <span class="thumb-screen"></span> -->
                        <div class="imgproductframe">
                        <?php
                            if ($n1['NewsImg'] != 'undefined') 
                                echo '<img src="'.$n1['NewsImg'].'"'; 
                            else 
                                echo '<img src="img/df_News.jpg"';
                            echo 'alt="'.$n1['NewsName'].'" />'; 
                        ?>
                        </div>
                        <!-- </a> -->
                        <figcaption>
                        <?php 
                            echo '<a href="detail_technews-'.$n1['NewsNoName'].'.html" >';
                            echo $n1['NewsName'].'</a>';
                        ?>
                        </figcaption>
                    </figure>
                </article>
            <?php
            }
            ?>
            <br class="clear"/>
        </section>

        <!-- <section id="text_columns">
        	<h2 class="hidden">Tại sao lại chọn No Problem</h2>
            <article class="column1">
                <h2>Tại sao lại chọn chúng tôi</h2>
                <p>Chúng tôi giúp bạn theo một cách thức hoàn toàn mới, chúng tôi biết rằng hầu hết khách hàng đều muốn liên kết đến facebook để quảng bá sản phẩm và dịch vụ. Chúng tôi cung cấp cho các bạn điều đó, đòng thời cho phép bạn quản lý dễ dàng chỉ với vài click chuột, điều mà nếu dùng fanpage facebook bạn không thể làm được.</p>
                <p>Chúng tôi cho bạn những thống kê về khách hàng, xu hướng biến đổi, hỗ trợ bạn cách thức quảng bá để có hiệu quả nhất, chúng tôi tư vấn cho các bạn kế hoạch bán hàng.</p>
            </article>
            <section class="column2">
            	<h2 class="hidden">Khách hàng nói về No Problem</h2>
                <article class="row">  
                	<h4 class="hidden">Anh Nguyễn Văn Hải</h4>                  
                    <img src="img/nvh.jpg" width="80" class="ttm1" alt="Khách hàng nói về chúng tôi"/>
                    <p>Đây là trang web rất có ích và đã hỗ trợ tôi rất nhiệt tình, tôi đã quảng bá rất tốt sản phẩm phần mềm của mình nhờ các bạn</p>
                </article> 
                <article class="row">
                	<h4 class="hidden">Chị Nguyễn Mai Phương</h4>                
                    <img src="img/nmp.jpg" width="80" class="ttm2" alt="Khách hàng nói về chúng tôi"/>
                    <p>Đây là trang web hỗ trợ tôi rất nhiệt tình và dễ sử dụng, tôi đã quảng bá rất tốt game của mình nhờ các bạn</p>
                </article>
            </section>
        </section> -->

        <!-- <svg style="width: 0; height: 0">
            <clipPath id="clipPolygon">
                <polygon points="0 115, 200 115, 200 0, 0 0">
                </polygon>
            </clipPath>
        </svg> -->
        <footer>
        	<?php require_once('include/footer.php'); ?>
        </footer>
	</body>
</html>