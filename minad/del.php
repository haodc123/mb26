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
                                $title = "Delete ".$div." : ";
                                break;
                            case 'category';
                                $div = "category";
                                $title = "Delete ".$div." : ";
                                break;
                            case 'type';
                                $div = "type";
                                $title = "Delete ".$div." : ";
                                break;
                            case 'user';
                                $div = "user";
                                $title = "Delete ".$div." : ";
                                break;
                            case 'news';
                                $div = "news";
                                $title = "Delete ".$div." : ";
                                break;
                            case 'product';
                                $div = "product";
                                $title = "Delete ".$div." : ";
                                break;
                            case 'contact';
                                $div = "contact";
                                $title = "Delete ".$div." : ";
                                break;
                            case 'comment';
                                $div = "comment";
                                $title = "Delete ".$div." : ";
                                break;
                            default:;
                                $title = "You need determine item to delete.";
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
                    
                </div>
                <div class="ad_main_box2">
                    <?php
                        switch ($div) {
                            // Area
                            case 'area':
                                $myDb->doQuery("DELETE FROM ".$div." WHERE AreaNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            // Category
                            case 'category';
                                $myDb->doQuery("DELETE FROM ".$div." WHERE CategoryNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            // Type
                            case 'type';          
                                $myDb->doQuery("DELETE FROM ".$div." WHERE TypeNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            case 'user';
                                $myDb->doQuery("DELETE FROM ".$div." WHERE UserNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            case 'news';
                                $myDb->doQuery("DELETE FROM ".$div." WHERE NewsNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            case 'product';
                                $myDb->doQuery("DELETE FROM ".$div." WHERE ProductNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            case 'contact';
                                $myDb->doQuery("DELETE FROM ".$div." WHERE ContactNoName = '".$gName."'"); 
                                if (mysqli_affected_rows($myDb->dbc) == 1) {
                                    echo "Delete successfully";
                                    echo '<script language=javascript>';
                                    echo 'setTimeout("gopage(\'am-'.$div.'.html\')",1000);';
                                    echo '</script>'; 
                                }
                                else
                                    echo "Something wrong, we can not delete this item, please try again.";
                                break;
                            case 'comment';
                                break;
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