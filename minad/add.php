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
                        switch ($div) {
                            // Area
                            case 'area':
                    ?>
                    <form action="do_add-area.html" name="formAddArea" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input type="text" name="addarea_name" value="" />
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
                                        if ($i == ($num+1))
                                            echo "<option value=".$i." selected>".$i."</option>";
                                        else    
                                            echo "<option value=".$i.">".$i."</option>";
                                    }
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddarea" class="button" id="login-button" value="Add"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php
                                break;
                            // Category
                            case 'category';
                    ?>
                    <form action="do_add-category.html" name="formAddCategory" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input type="text" name="addcategory_name" value="" />
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
                                        if ($i == ($num+1))
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
                                    echo "<option value=".$area['AreaID'].">".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddcategory" class="button" id="login-button" value="Add"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php 
                                break;
                            // Type
                            case 'type';
                    ?>
                    <form action="do_add-type.html" name="formAddType" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input type="text" name="addtype_name" value="" />
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
                                        if ($i == ($num+1))
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
                                    echo "<option value=".$area['AreaID'].">".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Category</label></div>
                        <select class="admin-selection" name="addtype_category">
                            <?php
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = 1");
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$category['CategoryID'].">".$category['CategoryName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddtype" class="button" id="login-button" value="Add"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php             
                                break;
                            case 'user';
                                
                                break;
                            case 'news';
                    ?>
                    <form action="do_add-news.html" name="formAddNews" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input news="text" name="addnews_name" value="" />
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
                                        if ($i == ($num+1))
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
                                $myDb->doQuery("SELECT * FROM area WHERE AreaID != 3");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$area['AreaID'].">".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Category</label></div>
                        <select class="admin-selection" name="addnews_category">
                            <?php
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = 1");
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$category['CategoryID'].">".$category['CategoryName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Type</label></div>
                        <select class="admin-selection" name="addnews_type">
                            <?php
                                $myDb->doQuery("SELECT * FROM type WHERE TypeCategoryID = 1");
                                $r = $myDb->r;
                                while ($type = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$type['TypeID'].">".$type['TypeName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Content</label></div>
                        <textarea rows="4" class="ckeditor" name="addnews_content"></textarea><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Is Active</label></div>
                        <select class="admin-selection" name="addnews_isactive">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddnews" class="button" id="login-button" value="Add"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php                
                                break;
                            case 'product';
                    ?>
                    <form action="do_add-product.html" name="formAddProduct" method="post">
                        <div class="haft-left-panel"><label>Name</label></div>
                        <div class="haft-right-panel">
                            <input product="text" name="addproduct_name" value="" />
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
                                        if ($i == ($num+1))
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
                                $myDb->doQuery("SELECT * FROM area WHERE AreaID = 3");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$area['AreaID'].">".$area['AreaName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Category</label></div>
                        <select class="admin-selection" name="addproduct_category">
                            <?php
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = 3");
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$category['CategoryID'].">".$category['CategoryName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Belong to Type</label></div>
                        <select class="admin-selection" name="addproduct_type">
                            <?php
                                $myDb->doQuery("SELECT * FROM type WHERE TypeCategoryID = 6");
                                $r = $myDb->r;
                                while ($type = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$type['TypeID'].">".$type['TypeName']."</option>";
                                }
                            ?>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Content</label></div>
                        <textarea rows="4" class="ckeditor" name="addproduct_content"></textarea><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Price1</label></div>
                        <div class="haft-right-panel">
                            <input product="text" name="addproduct_price1" value="" />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Price2</label></div>
                        <div class="haft-right-panel">
                            <input product="text" name="addproduct_price2" value="0" />
                            <br class="clear"/><p class="email-validate-checking"></p><br />
                        </div>

                        <div class="haft-left-panel"><label>Is Hot</label></div>
                        <select class="admin-selection" name="addproduct_ishot">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel"><label>Is Active</label></div>
                        <select class="admin-selection" name="addproduct_isactive">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select><br class="clear"/><br />

                        <div class="haft-left-panel blank"></div>
                        <div class="haft-right-panel alone last">
                            <input type="submit" name="baddproduct" class="button" id="login-button" value="Add"/>
                            <p class="submit-validate-checking"></p>
                        </div><br class="clear"/>
                    </form>
                    <?php               
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