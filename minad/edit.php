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
        <script type="text/javascript">
            $(document).ready(function() {
                $('input[name="baddarea"]').click(function() {
                        var name = $('input[name="addarea_name"]').attr("value");
                        
                        if (name == "") {
                            $('.submit-validate-checking').text("You need fill out area name");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('input[name="baddarea"]').prop("type", "button");
                        } else {
                            $('input[name="baddarea"]').prop("type", "submit");
                        }
                });
                $('input[name="baddcategory"]').click(function() {
                        var name = $('input[name="addcategory_name"]').attr("value");
                        var area = $('select[name="addcategory_area"] option:selected').attr("value");
                        if (name == "" || !area) {
                            $('.submit-validate-checking').text("You need fill out category name");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('input[name="baddcategory"]').prop("type", "button");
                        } else {
                            $('input[name="baddcategory"]').prop("type", "submit");
                        }
                });
                $('input[name="baddtype"]').click(function() {
                        var name = $('input[name="addtype_name"]').attr("value");
                        var area = $('select[name="addtype_area"] option:selected').attr("value");
                        var category = $('select[name="addtype_category"] option:selected').attr("value");
                        if (name == "" || !area || !category) {
                            $('.submit-validate-checking').text("You need fill all field");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('input[name="baddtype"]').prop("type", "button");
                        } else {
                            $('input[name="baddtype"]').prop("type", "submit");
                        }
                });
                $('input[name="baddnews"]').click(function() {
                        var name = $('input[name="addnews_name"]').attr("value");
                        var area = $('select[name="addnews_area"] option:selected').attr("value");
                        var category = $('select[name="addnews_category"] option:selected').attr("value");
                        var type = $('select[name="addnews_type"] option:selected').attr("value");
                        if (name == "" || !area || !category || !type) {
                            $('.submit-validate-checking').text("You need fill all field");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('input[name="baddnews"]').prop("type", "button");
                        } else {
                            $('input[name="baddnews"]').prop("type", "submit");
                        }
                });
                $('select[name="addtype_area"]').change(function() {
                        var s = $('select[name="addtype_area"] option:selected').attr("value");
                        $('select[name="addtype_category"]').empty();
                        $('select[name="addtype_category"]').load('selectionc-'.concat(s).concat('.html')); 
                        return false; 
                });
                $('select[name="addnews_area"]').change(function() {
                        var s = $('select[name="addnews_area"] option:selected').attr("value");
                        $('select[name="addnews_category"]').empty();
                        $('select[name="addnews_category"]').load('selectionc-'.concat(s).concat('.html')); 
                        var s2 = $('select[name="addnews_category"]').attr("value");
                        $('select[name="addnews_type"]').empty();
                        $('select[name="addnews_type"]').load('selectiont-'.concat(s2).concat('.html')); 
                        return false; 
                });
                $('select[name="addnews_category"]').change(function() {
                        var s = $('select[name="addnews_category"] option:selected').attr("value");
                        $('select[name="addnews_type"]').empty();
                        $('select[name="addnews_type"]').load('selectiont-'.concat(s).concat('.html')); 
                        return false; 
                });
                $('select[name="addproduct_area"]').change(function() {
                        var s = $('select[name="addproduct_area"] option:selected').attr("value");
                        $('select[name="addproduct_category"]').empty();
                        $('select[name="addproduct_category"]').load('selectionc-'.concat(s).concat('.html')); 
                        var s2 = $('select[name="addproduct_category"]').attr("value");
                        $('select[name="addproduct_type"]').empty();
                        $('select[name="addproduct_type"]').load('selectiont-'.concat(s2).concat('.html')); 
                        return false; 
                });
                $('select[name="addproduct_category"]').change(function() {
                        var s = $('select[name="addproduct_category"] option:selected').attr("value");
                        $('select[name="addproduct_type"]').empty();
                        $('select[name="addproduct_type"]').load('selectiont-'.concat(s).concat('.html')); 
                        return false; 
                });
                $('input[name="baddnews"]').click(function() {
                        var name = $('input[name="addnews_name"]').attr("value");
                        var content = $('textarea[name="addnews_content"]').attr("value");
                        var area = $('select[name="addnews_area"] option:selected').attr("value");
                        var category = $('select[name="addnews_category"] option:selected').attr("value");
                        var type = $('select[name="addnews_type"] option:selected').attr("value");
                        var isactive = $('select[name="addnews_isactive"] option:selected').attr("value");
                        if (name == "" || !area || !category || !type || !isactive) {
                            $('.submit-validate-checking').text("You need fill all field");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('input[name="baddnews"]').prop("type", "button");
                        } else {
                            $('input[name="baddnews"]').prop("type", "submit");
                        }
                });
                $('input[name="baddproduct"]').click(function() {
                        var name = $('input[name="addproduct_name"]').attr("value");
                        var content = $('textarea[name="addproduct_content"]').attr("value");
                        var price1 = $('input[name="addproduct_price1"]').attr("value");
                        var price2 = $('input[name="addproduct_price2"]').attr("value");
                        var area = $('select[name="addproduct_area"] option:selected').attr("value");
                        var category = $('select[name="addproduct_category"] option:selected').attr("value");
                        var type = $('select[name="addproduct_type"] option:selected').attr("value");
                        var isactive = $('select[name="addproduct_isactive"] option:selected').attr("value");
                        var ishot = $('select[name="addproduct_ishot"] option:selected').attr("value");
                        if (name == "" || !area || price1 == "" || price2 == "" || !category || !type || !isactive || !ishot) {
                            $('.submit-validate-checking').text("You need fill all field");
                            $('.submit-validate-checking').attr("style", "color: #d00");
                            $('input[name="baddproduct"]').prop("type", "button");
                        } else {
                            $('input[name="baddproduct"]').prop("type", "submit");
                        }
                });
            });
        </script>
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
                                $title = "Edit ".$div." : ";
                                break;
                            case 'category';
                                $div = "category";
                                $title = "Edit ".$div." : ";
                                break;
                            case 'type';
                                $div = "type";
                                $title = "Edit ".$div." : ";
                                break;
                            case 'user';
                                $div = "user";
                                $title = "Edit ".$div." : ";
                                break;
                            case 'news';
                                $div = "news";
                                $title = "Edit ".$div." : ";
                                break;
                            case 'product';
                                $div = "product";
                                $title = "Edit ".$div." : ";
                                break;
                            default:;
                                $title = "You need determine item to edit.";
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
                        switch ($div) {
                            // Area
                            case 'area':
                                $myDb->doQuery("SELECT * FROM ".$gPage." WHERE AreaNoName = '".$gName."'");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    $area = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    ?>
                    <form action="do_edit-area.html" name="formAddArea" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input type="text" name="addarea_name" <?php echo 'value="'.$area['AreaName'].'"'; ?> />
                            <input type="hidden" name="addarea_id" <?php echo 'value="'.$area['AreaID'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Position</label></div>
                        <select class="admin-selection" name="addarea_pos">
                            <?php
                                $myDb->doQuery("SELECT count(AreaID) AS count FROM area");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for ($i = 1; $i <= $num+1; $i++) {
                                        if ($i == $area['AreaPos'])
                                            echo "<option value=".$i." selected>".$i."</option>";
                                        else    
                                            echo "<option value=".$i.">".$i."</option>";
                                    }
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddarea" class="button" id="login-button" value="Save"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php
                    } else {
                        echo "Item you input not found.";
                    }
                                break;
                            // Category
                            case 'category':
                                $myDb->doQuery("SELECT * FROM ".$gPage." WHERE CategoryNoName = '".$gName."'");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    $category = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    ?>
                    <form action="do_edit-category.html" name="formAddCategory" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input type="text" name="addcategory_name" <?php echo 'value="'.$category['CategoryName'].'"'; ?> />
                            <input type="hidden" name="addcategory_id" <?php echo 'value="'.$category['CategoryID'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Position</label></div>
                        <select class="admin-selection" name="addcategory_pos">
                            <?php
                                $myDb->doQuery("SELECT count(CategoryID) AS count FROM category");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for ($i = 1; $i <= $num+1; $i++) {
                                        if ($i == $category['CategoryPos'])
                                            echo "<option value=".$i." selected>".$i."</option>";
                                        else    
                                            echo "<option value=".$i.">".$i."</option>";
                                    }
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Area</label></div>
                        <select class="admin-selection" name="addcategory_area">
                            <?php
                                $myDb->doQuery("SELECT * FROM area");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($area['AreaID'] == $category['CategoryAreaID'])
                                        echo "<option value=".$area['AreaID']." selected>".$area['AreaName']."</option>";
                                    else
                                        echo "<option value=".$area['AreaID']." >".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddcategory" class="button" id="login-button" value="Save"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php 
                    } else {
                        echo "Item you input not found.";
                    }
                                break;
                            // Type
                            case 'type':
                                $myDb->doQuery("SELECT * FROM ".$gPage." WHERE TypeNoName = '".$gName."'");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    $type = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    ?>
                    <form action="do_edit-type.html" name="formAddType" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input type="text" name="addtype_name" <?php echo 'value="'.$type['TypeName'].'"'; ?> />
                            <input type="hidden" name="addtype_id" <?php echo 'value="'.$type['TypeID'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Position</label></div>
                        <select class="admin-selection" name="addtype_pos">
                            <?php
                                $myDb->doQuery("SELECT count(TypeID) AS count FROM type");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for ($i = 1; $i <= $num+1; $i++) {
                                        if ($i == $type['TypePos'])
                                            echo "<option value=".$i." selected>".$i."</option>";
                                        else    
                                            echo "<option value=".$i.">".$i."</option>";
                                    }
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Area</label></div>
                        <select class="admin-selection" name="addtype_area">
                            <?php
                                $myDb->doQuery("SELECT * FROM area");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($area['AreaID'] == $type['TypeAreaID'])
                                        echo "<option value=".$area['AreaID']." selected>".$area['AreaName']."</option>";
                                    else
                                        echo "<option value=".$area['AreaID']." >".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Category</label></div>
                        <select class="admin-selection" name="addtype_category">
                            <?php
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = ".$type['TypeAreaID']);
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($category['CategoryID'] == $type['TypeCategoryID'])
                                        echo "<option value=".$category['CategoryID']." selected>".$category['CategoryName']."</option>";
                                    else
                                        echo "<option value=".$category['CategoryID']." >".$category['CategoryName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddtype" class="button" id="login-button" value="Save"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php     
                    } else {
                        echo "Item you input not found.";
                    }        
                                break;
                            case 'user':
                                
                                break;
                            case 'news':
                            $myDb->doQuery("SELECT * FROM ".$gPage." WHERE NewsNoName = '".$gName."'");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    $news = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    ?>
                    <form action="do_edit-news.html" name="formAddNews" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input news="text" name="addnews_name" <?php echo 'value="'.$news['NewsName'].'"'; ?> />
                            <input type="hidden" name="addnews_id" <?php echo 'value="'.$news['NewsID'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Position</label></div>
                        <select class="admin-selection" name="addnews_pos">
                            <?php
                                $myDb->doQuery("SELECT count(NewsID) AS count FROM news");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for ($i = 1; $i <= $num+1; $i++) {
                                        if ($i == $news['NewsPos'])
                                            echo "<option value=".$i." selected>".$i."</option>";
                                        else    
                                            echo "<option value=".$i.">".$i."</option>";
                                    }
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Area</label></div>
                        <select class="admin-selection" name="addnews_area">
                            <?php
                                $myDb->doQuery("SELECT * FROM area");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($area['AreaID'] == $news['NewsAID'])
                                        echo "<option value=".$area['AreaID']." selected>".$area['AreaName']."</option>";
                                    else
                                        echo "<option value=".$area['AreaID'].">".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Category</label></div>
                        <select class="admin-selection" name="addnews_category">
                            <?php
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = ".$news['NewsAID']);
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($category['CategoryID'] == $news['NewsCID'])
                                        echo "<option value=".$category['CategoryID']." selected>".$category['CategoryName']."</option>";
                                    else
                                        echo "<option value=".$category['CategoryID'].">".$category['CategoryName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Type</label></div>
                        <select class="admin-selection" name="addnews_type">
                            <?php
                                $myDb->doQuery("SELECT * FROM type WHERE TypeCategoryID = ".$news['NewsCID']);
                                $r = $myDb->r;
                                while ($type = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($type['TypeID'] == $news['NewsTID'])
                                        echo "<option value=".$type['TypeID']." selected>".$type['TypeName']."</option>";
                                    else
                                        echo "<option value=".$type['TypeID'].">".$type['TypeName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Content</label></div>
                        <textarea rows="4" class="ckeditor" name="addnews_content"><?php echo sanitized($news['NewsContent']); ?></textarea><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Is Active</label></div>
                        <select class="admin-selection" name="addnews_isactive">
                            <option value="1" <?php if ($news['NewsIsActive'] == 1) echo 'selected'; ?> >Yes</option>
                            <option value="0" <?php if ($news['NewsIsActive'] == 0) echo 'selected'; ?> >No</option>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddnews" class="button" id="login-button" value="Save"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php 
                    } else {
                        echo "Item you input not found.";
                    }        
                                break;
                            case 'product':
                            $myDb->doQuery("SELECT * FROM ".$gPage." WHERE ProductNoName = '".$gName."'");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    $product = mysqli_fetch_array($r, MYSQLI_ASSOC);
                    ?>
                    <form action="do_edit-product.html" name="formAddProduct" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input product="text" name="addproduct_name" <?php echo 'value="'.$product['ProductName'].'"'; ?> />
                            <input type="hidden" name="addproduct_id" <?php echo 'value="'.$product['ProductID'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Position</label></div>
                        <select class="admin-selection" name="addproduct_pos">
                            <?php
                                $myDb->doQuery("SELECT count(ProductID) AS count FROM product");
                                $r = $myDb->r;
                                if (mysqli_num_rows($r) == 1) {
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for ($i = 1; $i <= $num+1; $i++) {
                                        if ($i == $product['ProductPos'])
                                            echo "<option value=".$i." selected>".$i."</option>";
                                        else    
                                            echo "<option value=".$i.">".$i."</option>";
                                    }
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Area</label></div>
                        <select class="admin-selection" name="addproduct_area">
                            <?php
                                $myDb->doQuery("SELECT * FROM area");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($area['AreaID'] == $product['ProductAID'])
                                        echo "<option value=".$area['AreaID']." selected>".$area['AreaName']."</option>";
                                    else
                                        echo "<option value=".$area['AreaID'].">".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Category</label></div>
                        <select class="admin-selection" name="addproduct_category">
                            <?php
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = ".$product['ProductAID']);
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($category['CategoryID'] == $product['ProductCID'])
                                        echo "<option value=".$category['CategoryID']." selected>".$category['CategoryName']."</option>";
                                    else
                                        echo "<option value=".$category['CategoryID'].">".$category['CategoryName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Type</label></div>
                        <select class="admin-selection" name="addproduct_type">
                            <?php
                                $myDb->doQuery("SELECT * FROM type WHERE TypeCategoryID = ".$product['ProductCID']);
                                $r = $myDb->r;
                                while ($type = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    if ($type['TypeID'] == $product['ProductTID'])
                                        echo "<option value=".$type['TypeID']." selected>".$type['TypeName']."</option>";
                                    else
                                        echo "<option value=".$type['TypeID'].">".$type['TypeName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Content</label></div>
                        <textarea rows="4" class="ckeditor" name="addproduct_content"><?php echo sanitized($product['ProductContent']); ?></textarea><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Price1</label></div>
                        <div class="haft-right-panel">
                            <input product="text" name="addproduct_price1" <?php echo 'value="'.$product['ProductPrice1'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Price2</label></div>
                        <div class="haft-right-panel">
                            <input product="text" name="addproduct_price2" <?php echo 'value="'.$product['ProductPrice2'].'"'; ?> />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Is Hot</label></div>
                        <select class="admin-selection" name="addproduct_ishot">
                            <option value="0" <?php if ($product['ProductIsHot'] == 0) echo 'selected'; ?> >No</option>
                            <option value="1" <?php if ($product['ProductIsHot'] == 1) echo 'selected'; ?> >Yes</option>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Is Active</label></div>
                        <select class="admin-selection" name="addproduct_isactive">
                            <option value="1" <?php if ($product['ProductIsActive'] == 1) echo 'selected'; ?> >Yes</option>
                            <option value="0" <?php if ($product['ProductIsActive'] == 0) echo 'selected'; ?> >No</option>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddproduct" class="button" id="login-button" value="Save"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php 
                    } else {
                        echo "Item you input not found.";
                    }     
                                break;
                            default:
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