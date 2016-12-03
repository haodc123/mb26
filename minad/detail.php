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
        
	</head>
	<body>
		<header>
            <?php require_once('header.php'); ?>
		</header>
                    <?php
                        $gPage = valid($myDb->dbc, $_GET['page']);
                        $gName = valid($myDb->dbc, $_GET['name']);
                        switch ($gPage) {
                            case 'area':
                                $div = "area";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'category';
                                $div = "category";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'type';
                                $div = "type";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'user';
                                $div = "user";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'news';
                                $div = "news";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'product';
                                $div = "product";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'contact';
                                $div = "contact";
                                $title = "Detail ".$div." : ";
                                break;
                            case 'comment';
                                $div = "comment";
                                $title = "Detail ".$div." : ";
                                break;
                            default:;
                            $title = "";
                        }
                        
                    ?>
        <div class="main-content">
            <div class="sb-left">
                <?php require_once('sidebar_admin.php'); ?>    
            </div>
            <div class="main-right">
                <h3>
                    <?php
                        echo $title;
                    ?>
                </h2>
                <div class="ad_main_box1">
                    <?php
                        $onClick = "onclick='return confirm(\"Are you sure to delete this item?\")'";
                        switch ($div) {
                            case 'area':
                                $myDb->doQuery("SELECT * FROM area WHERE AreaNoName = '".$gName."'");
                                $r = $myDb->r;
                                $area = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                echo "<a class='button-del' ".$onClick." href='del-area-".$area['AreaNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                echo "<a class='button-edit' href='edit-area-".$area['AreaNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                break;
                            case 'category':
                                $myDb->doQuery("SELECT * FROM category AS c JOIN area AS a ON c.CategoryAreaID = a.AreaID WHERE CategoryNoName = '".$gName."'");
                                $r = $myDb->r;
                                $category = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                echo "<a class='button-del' ".$onClick." href='del-category-".$category['CategoryNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                echo "<a class='button-edit' href='edit-category-".$category['CategoryNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                break;
                            case 'type':
                                $q = "SELECT * FROM type AS t JOIN ";
                                $q .= " area AS a ON t.TypeAreaID = a.AreaID JOIN ";
                                $q .= " category AS c ON t.TypeCategoryID = c.CategoryID WHERE t.TypeNoName = '".$gName."'";
                                $myDb->doQuery($q);
                                $r = $myDb->r;
                                $type = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                echo "<a class='button-del' ".$onClick." href='del-type-".$type['TypeNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                echo "<a class='button-edit' href='edit-type-".$type['TypeNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                break;
                            case 'user':
                                $myDb->doQuery("SELECT * FROM user WHERE UserNoName = '".$gName."'");
                                $r = $myDb->r;
                                $user = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                break;
                            case 'news':
                                $q = "SELECT * FROM news AS n ";
                                $q .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
                                $q .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
                                $q .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
                                $q .= " JOIN user AS u ON n.NewsUserID = u.UserID WHERE n.NewsNoName = '".$gName."'";
                                $myDb->doQuery($q);
                                $r = $myDb->r;
                                $news = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                echo "<a class='button-del' ".$onClick." href='del-news-".$news['NewsNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                echo "<a class='button-edit' href='edit-news-".$news['NewsNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                break;
                            case 'product':
                                $q = "SELECT * FROM product AS n ";
                                $q .= " JOIN area AS a ON n.ProductAID = a.AreaID ";
                                $q .= " JOIN category AS c ON n.ProductCID = c.CategoryID ";
                                $q .= " JOIN type AS t ON n.ProductTID = t.TypeID ";
                                $q .= " JOIN user AS u ON n.ProductUserID = u.UserID WHERE n.ProductNoName = '".$gName."'";
                                $myDb->doQuery($q);
                                $r = $myDb->r;
                                $product = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                echo "<a class='button-del' ".$onClick." href='del-product-".$product['ProductNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                echo "<a class='button-edit' href='edit-product-".$product['ProductNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                break;
                            case 'contact':
                                $myDb->doQuery("SELECT * FROM contact WHERE ContactNoName = '".$gName."'");
                                $r = $myDb->r;
                                $contact = mysqli_fetch_array($r, MYSQLI_ASSOC);
                                echo "<a class='button-del' ".$onClick." href='del-contact-".$contact['ContactNoName'].".html'><img src='../img/icon_delete.png'/></a></li><br style='clear' />";
                                break;
                            case 'comment':
                                break;
                            default:
                        }
                        ?>
                </div>
                <div class="ad_main_box2">
                    <?php
                        switch ($div) {
                            case 'area':
                                    echo '<p class="single-line">Name: '.$area['AreaName'].'</p>';
                                    echo '<p class="single-line">Position: '.$area['AreaPos'].'</p>';
                                break;
                            case 'category':
                                    echo '<p class="single-line">Name: '.$category['CategoryName'].'</p>';
                                    echo '<p class="single-line">Belong to Area: '.$category['AreaName'].'</p>';
                                    echo '<p class="single-line">Position: '.$category['CategoryPos'].'</p>';  
                                break;
                            case 'type':
                                    echo '<p class="single-line">Name: '.$type['TypeName'].'</p>';
                                    echo '<p class="single-line">Belong to Area: '.$type['AreaName'].'</p>';
                                    echo '<p class="single-line">Belong to Category: '.$type['CategoryName'].'</p>';
                                    echo '<p class="single-line">Position: '.$type['TypePos'].'</p>';
                                break;
                            case 'user':
                                    echo '<p class="single-line">Name: '.$user['UserName'].'</p>';
                                    echo '<p class="single-line">Email: '.$user['UserEmail'].'</p>';
                                    echo '<p class="single-line">Tel: '.$user['UserTel'].'</p>';
                                    echo '<p class="single-line">Reg on: '.$user['UserDateReg'].'</p>';
                                    echo '<p class="single-line">Type: '.$user['UserType'].'</p>';
                                    echo '<p class="single-line">Position: '.$user['UserPos'].'</p>';
                                break;
                            case 'news':
                                    //echo getFirstImg($news['NewsContent']);
                                    echo '<p class="single-line">Name: '.$news['NewsName'].'</p>';
                                    echo '<p class="single-line">Content: '.$news['NewsContent'].'</p>';
                                    echo '<p class="single-line">Date: '.$news['NewsDate'].'</p>';
                                    echo '<p class="single-line">Belong to Area: '.$news['AreaName'].'</p>';
                                    echo '<p class="single-line">Belong to Category: '.$news['CategoryName'].'</p>';
                                    echo '<p class="single-line">Belong to Tyype: '.$news['TypeName'].'</p>';
                                    echo '<p class="single-line">User: '.$news['UserName'].'</p>';
                                    echo '<p class="single-line">Position: '.$news['NewsPos'].'</p>';
                                    echo '<p class="single-line">Is Active: '.$news['NewsIsActive'].'</p>';
                                break;
                            case 'product':
                                    echo '<p class="single-line">Name: '.$product['ProductName'].'</p>';
                                    echo '<p class="single-line">Content: '.$product['ProductContent'].'</p>';
                                    echo '<p class="single-line">Price1: '.$product['ProductPrice1'].'</p>';
                                    echo '<p class="single-line">Price2: '.$product['ProductPrice2'].'</p>';
                                    echo '<p class="single-line">Date: '.$product['ProductDate'].'</p>';
                                    echo '<p class="single-line">Belong to Area: '.$product['AreaName'].'</p>';
                                    echo '<p class="single-line">Belong to Category: '.$product['CategoryName'].'</p>';
                                    echo '<p class="single-line">Belong to Tyype: '.$product['TypeName'].'</p>';
                                    echo '<p class="single-line">User: '.$product['UserName'].'</p>';
                                    echo '<p class="single-line">Position: '.$product['ProductPos'].'</p>';
                                    echo '<p class="single-line">Is Active: '.$product['ProductIsActive'].'</p>';
                                    echo '<p class="single-line">Is Hot: '.$product['ProductIsHot'].'</p>';
                                break;
                            case 'contact';
                                    echo '<p class="single-line">Name: '.$contact['ContactName'].'</p>';
                                    echo '<p class="single-line">Email: '.$contact['ContactEmail'].'</p>';
                                    echo '<p class="single-line">Content: '.$contact['ContactContent'].'</p>';
                                    echo '<p class="single-line">Date: '.$contact['ContactDate'].'</p>';
                                break;
                            case 'comment';
                            default:
                        }
                        ?>
                </div>
                <div class="ad_main_box3">

                </div>
            </div>
            <br class="clear"/>
        </div> <!-- Main-content -->
		
        <footer>
        	<?php require_once('footer.php'); ?>
        </footer>
	</body>
</html>