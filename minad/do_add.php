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
                        switch ($gPage) {
                            case 'area':
                                $div = "area";
                                $title = 'Add new '.$div;
                                break;
                            case 'category';
                                $div = "category";
                                $title = 'Add new '.$div;
                                break;
                            case 'type';
                                $div = "type";
                                $title = 'Add new '.$div;
                                break;
                            case 'user';
                                $div = "user";
                                $title = 'Add new '.$div;
                                break;
                            case 'news';
                                $div = "news";
                                $title = 'Add new '.$div;
                                break;
                            case 'product';
                                $div = "product";
                                $title = 'Add new '.$div;
                                break;
                            default:
                                $title = "You need select left menu item to add.";
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
                <div id="empty" class="ad_main_box1">
                    
                </div>
                <div class="ad_main_box2">
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            switch ($div) {
                            // Area
                            case 'area':
                                if (empty($_POST['addarea_name']) || !isNumeric($_POST['addarea_pos'], 1))
                                    // Check if addarea_name is empty or addarea_pos is not set or addarea_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $area_name = valid($myDb->dbc, $_POST['addarea_name']);
                                    $area_pos = $_POST['addarea_pos'];
                                    $area_noname = changeTitle($area_name);
                                    $myDb->doQuery("INSERT INTO area (AreaName, AreaNoName, AreaPos) VALUES ('$area_name', '$area_noname', $area_pos)");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "Area: ".$area_name. " was added to database at position ".$area_pos." successfully!";
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                        echo '</script>'; 
                                    }
                                    else
                                        echo "Something wrong, we can not add this item, please try again.";
                                }
                                break;
                            // Category
                            case 'category';
                                if (empty($_POST['addcategory_name']) 
                                    || !isNumeric($_POST['addcategory_pos'], 1) 
                                    || !isNumeric($_POST['addcategory_area'], 1))
                                    // Check if addcategory_name is empty or addcategory_pos is not set or addcategory_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $category_name = valid($myDb->dbc, $_POST['addcategory_name']);
                                    $category_pos = $_POST['addcategory_pos'];
                                    $category_area = $_POST['addcategory_area'];
                                    $category_noname = changeTitle($category_name);
                                    $myDb->doQuery("INSERT INTO category (CategoryName, CategoryNoName, CategoryPos, CategoryAreaID) VALUES ('$category_name', '$category_noname', $category_pos, $category_area)");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "category: ".$category_name. " was added to database at position ".$category_pos." successfully!";
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                        echo '</script>'; 
                                    }
                                    else
                                        echo "Something wrong, we can not add this item, please try again.";
                                }  
                                break;
                            // Type
                            case 'type';
                                if (empty($_POST['addtype_name']) 
                                    || !isNumeric($_POST['addtype_pos'], 1) 
                                    || !isNumeric($_POST['addtype_area'], 1) 
                                    || !isNumeric($_POST['addtype_category'], 1))
                                    // Check if addtype_name is empty or addtype_pos is not set or addtype_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $type_name = valid($myDb->dbc, $_POST['addtype_name']);
                                    $type_pos = $_POST['addtype_pos'];
                                    $type_area = $_POST['addtype_area'];
                                    $type_category = $_POST['addtype_category'];
                                    $type_noname = changeTitle($type_name);
                                    $myDb->doQuery("INSERT INTO type (TypeName, TypeNoName, TypePos, TypeAreaID, TypeCategoryID) VALUES ('$type_name', '$type_noname', $type_pos, $type_area, $type_category)");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "type: ".$type_name. " was added to database at position ".$type_pos." successfully!";
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                        echo '</script>'; 
                                    }
                                    else
                                        echo "Something wrong, we can not add this item, please try again.";
                                }   
                                break;
                            case 'user';
                                
                                break;
                            case 'news';
                                if (empty($_POST['addnews_name']) || empty($_POST['addnews_content']) 
                                    || !isNumeric($_POST['addnews_pos'], 1)
                                    || !isNumeric($_POST['addnews_area'], 1) 
                                    || !isNumeric($_POST['addnews_category'], 1)
                                    || !isNumeric($_POST['addnews_type'], 1)
                                    || !isset($_POST['addnews_isactive']))
                                    // Check if addnews_name is empty or addnews_pos is not set or addnews_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $news_name = valid($myDb->dbc, $_POST['addnews_name']);
                                    $news_content = $_POST['addnews_content'];
                                    $news_img = getFirstImg($news_content);
                                    $news_pos = $_POST['addnews_pos'];
                                    $news_area = $_POST['addnews_area'];
                                    $news_category = $_POST['addnews_category'];
                                    $news_type = $_POST['addnews_type'];
                                    $news_isactive = $_POST['addnews_isactive'];
                                    $news_noname = changeTitleRandom($news_name);
                                    $news_date = date("Y-m-d H:i:s");
                                    $news_user = $_SESSION['UserID'];
                                    echo $news_img;
                                    $myDb->doQuery("INSERT INTO news (NewsName, NewsNoName, NewsContent, NewsImg, NewsDate, NewsPos, NewsAID, NewsCID, NewsTID, NewsIsActive, NewsUserID) VALUES ('$news_name', '$news_noname', '$news_content', '$news_img', '$news_date', $news_pos, $news_area, $news_category, $news_type, $news_isactive, $news_user)");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "news: ".$news_name. " was added to database at position ".$news_pos." successfully!";
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                        echo '</script>'; 
                                    }
                                    else
                                        echo "Something wrong, we can not add this item, please try again.";
                                }  
                                break;
                            case 'product';
                                if (empty($_POST['addproduct_name']) || empty($_POST['addproduct_content']) 
                                    || !isNumeric($_POST['addproduct_pos'], 1)
                                    || !isNumeric($_POST['addproduct_price1'], 1)
                                    || !isNumeric($_POST['addproduct_area'], 1) 
                                    || !isNumeric($_POST['addproduct_category'], 1)
                                    || !isNumeric($_POST['addproduct_type'], 1)
                                    || !isset($_POST['addproduct_isactive'])
                                    || !isset($_POST['addproduct_ishot']))
                                    // Check if addproduct_name is empty or addproduct_pos is not set or addproduct_pos not a integer more than 1
                                    echo "You must fill out all of field in previour step legally.";
                                else {
                                    $product_name = valid($myDb->dbc, $_POST['addproduct_name']);
                                    $product_content = $_POST['addproduct_content'];
                                    $product_img = getFirstImg($product_content);
                                    $product_pos = $_POST['addproduct_pos'];
                                    $product_price1 = $_POST['addproduct_price1'];
                                    $product_price2 = $_POST['addproduct_price2'];
                                    $product_area = $_POST['addproduct_area'];
                                    $product_category = $_POST['addproduct_category'];
                                    $product_type = $_POST['addproduct_type'];
                                    $product_isactive = $_POST['addproduct_isactive'];
                                    $product_ishot = $_POST['addproduct_ishot'];
                                    $product_noname = changeTitleRandom($product_name);
                                    $product_date = date("Y-m-d H:i:s");
                                    $product_user = $_SESSION['UserID'];
                                    $myDb->doQuery("INSERT INTO product (ProductName, ProductNoName, ProductContent, ProductImg, ProductDate, ProductPrice1, ProductPrice2, ProductPos, ProductAID, ProductCID, ProductTID, ProductIsActive, ProductIsHot, ProductUserID) VALUES ('$product_name', '$product_noname', '$product_content', '$product_img', '$product_date', $product_price1, $product_price2, $product_pos, $product_area, $product_category, $product_type, $product_isactive, $product_ishot, $product_user)");
                                    if (mysqli_affected_rows($myDb->dbc) == 1) {
                                        echo "product: ".$product_name. " was added to database at position ".$product_pos." successfully!";
                                        echo '<script language=javascript>';
                                        echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                        echo '</script>'; 
                                    }
                                    else
                                        echo "Something wrong, we can not add this item, please try again.";
                                }
                                break;
                            default:
                            }
                        }
                        
                    ?>
                </div>
            </div>
            <br class="clear"/>
        </div> <!-- Main-content -->
		
        <footer>
        	<?php require_once('footer.php'); ?>
        </footer>
	</body>
</html>