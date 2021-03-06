<?php
require_once('include/top_page.php');
require_once('include/se_url.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
        <?php
            $gName = valid($myDb->dbc, $_GET['name']);
            $q = "SELECT * FROM news AS n ";
            $q .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
            $q .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
            $q .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
            $q .= " JOIN user AS u ON n.NewsUserID = u.UserID WHERE n.NewsNoName = '".$gName."'";
            $myDb->doQuery($q);
            $r = $myDb->r;
            if (mysqli_num_rows($r) > 0)
                $hasRecord = true;
            else
                $hasRecord = false;
            $technews = mysqli_fetch_array($r, MYSQLI_ASSOC);
        ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?php if ($hasRecord == true) echo $technews['NewsName']; else echo 'Tin công nghệ'; ?> - <?php require_once('include/title_p1.php'); ?></title>
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
                    if ($hasRecord == true) {
                ?>
                <h3 class="detail-title"><?php echo $technews['NewsName']; ?></h3>
                <p class="detail-date"><?php echo substr($technews['NewsDate'], 0, 10); ?> | <?php echo $technews['TypeName']; ?></p>
                <p class="detail-summary">
                    <?php substrIn3Line($technews['NewsContent']); ?>
                </p>
                <p class="detail-content">

                <?php echo $technews['NewsContent']; ?>

                <div class="detail-related">
                    <h3>Các tin khác</h3>
                    <ul>
                        <?php
                            $myDb->loadLatestDetailTechNews($gName, "NewsDate", "ASC", 5);
                            $r2 = $myDb->r;
                            while ($technews2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
                                echo '<li>'.substr($technews2['NewsDate'], 0, 10).'&nbsp&nbsp&nbsp<a href="detail_technews-'.$technews2['NewsNoName'].'.html">'.$technews2['NewsName'].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <?php
                    } else {
                ?>
                    <section class="listitem">
                            <div class="listitem-title">Không tìm thấy mục này!</div>
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