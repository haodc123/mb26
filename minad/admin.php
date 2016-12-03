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
                                $title = 'List of '.$div;
                                break;
                            case 'category';
                                $div = "category";
                                $title = 'List of '.$div;
                                break;
                            case 'type';
                                $div = "type";
                                $title = 'List of '.$div;
                                break;
                            case 'user';
                                $div = "user";
                                $title = 'List of '.$div;
                                break;
                            case 'news';
                                $div = "news";
                                $title = 'List of '.$div;
                                break;
                            case 'product';
                                $div = "product";
                                $title = 'List of '.$div;
                                break;
                            case 'contact';
                                $div = "contact";
                                $title = 'List of '.$div;
                                break;
                            case 'comment';
                                $div = "comment";
                                $title = 'List of '.$div;
                                break;
                            default:
                                $title = 'Please select menu in left hand...';
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
                        switch ($div) {
                            case 'area':
                                echo "<a href='add-area.html'><img src='../img/icon_add.png' /></a>";
                                break;
                            case 'category';
                                echo "<a href='add-category.html'><img src='../img/icon_add.png' /></a>";
                                break;
                            case 'type';
                                echo "<a href='add-type.html'><img src='../img/icon_add.png' /></a>";
                                break;
                            case 'user';
                                break;
                            case 'news';
                                echo "<div class='sort-command'><a class='add-new' href='add-news.html'>Add new</a>";
                                echo " | Sort by <span id='area' class='unsort' onclick='checkSortArea()'>Area</span> - <span id='category' class='unsort' onclick='checkSortCategory()'>Category</span> - <span id='type' class='unsort' onclick='checkSortType()'>Type</span> - <span id='date' class='unsort' onclick='checkSortDate()'>Date</span></div>";
                                break;
                            case 'product';
                                echo "<div class='sort-command'><a class='add-new' href='add-product.html'>Add new</a>";
                                echo " | Sort by <span id='area' class='unsort' onclick='checkSortArea()'>Area</span> - <span id='category' class='unsort' onclick='checkSortCategory()'>Category</span> - <span id='type' class='unsort' onclick='checkSortType()'>Type</span> - <span id='date' class='unsort' onclick='checkSortDate()'>Date</span></div>";
                                break;
                            default:
                        }
                        ?>
                    
                </div>
                <div class="ad_main_box2">
                    <ul>
                    <?php
                        $onClick = "onclick='return confirm(\"Are you sure to delete this item?\")'";
                        switch ($div) {
                            case 'area':
                                $myDb->loadListDetailArea("AreaPos", "ASC");
                                $r = $myDb->r;
                                while ($area = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li class='single-line'><div><a href='detail-area-".$area['AreaNoName'].".html'>".$area['AreaName']."</a></div>";
                                    echo "<a ".$onClick." class='button-del' href='del-area-".$area['AreaNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                    echo "<a class='button-edit' href='edit-area-".$area['AreaNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                }
                                break;
                            case 'category';
                                $myDb->loadListDetailCategory("CategoryPos", "ASC");
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li><div><a href='detail-category-".$category['CategoryNoName'].".html'>".$category['CategoryName']."</a><br />";
                                    echo "<a class='small'  href='detail-area-".$category['AreaNoName'].".html'>".$category['AreaName']."</a></div>";
                                    echo "<a ".$onClick." class='button-del' href='del-category-".$category['CategoryNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                    echo "<a class='button-edit' href='edit-category-".$category['CategoryNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                }
                                break;
                            case 'type';
                                $myDb->loadListDetailType("TypePos", "ASC");
                                $r = $myDb->r;
                                while ($type = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li><div><a href='detail-type-".$type['TypeNoName'].".html'>".$type['TypeName']."</a><br />";
                                    echo "<a class='small' href='detail-area-".$type['AreaNoName'].".html'>".$type['AreaName']."</a> > ";
                                    echo "<a class='small' href='detail-category-".$type['CategoryNoName'].".html'>".$type['CategoryName']."</a></div>";
                                    echo "<a ".$onClick." class='button-del' href='del-type-".$type['TypeNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                    echo "<a class='button-edit' href='edit-type-".$type['TypeNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                }
                                break;
                            case 'user';
                                $myDb->loadListDetailUser();
                                $r = $myDb->r;
                                while ($user = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li class='single-line'><div><a href='detail-user-".$user['UserNoName'].".html'>".$user['UserName']."</a></div></li><br style='clear' />";
                                }
                                break;
                            case 'news';
                                $myDb->loadListDetailNews("NewsPos", "ASC");
                                $r = $myDb->r;
                                while ($news = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li class='hight-line'><div><p><a href='detail-news-".$news['NewsNoName'].".html'>".$news['NewsName']."</a></p>";
                                    echo "<a class='small2' href='detail-news-".$news['NewsNoName'].".html'>".substrInOneLine($news['NewsContent'])."</a><br />";
                                    echo "<a class='small' href='detail-area-".$news['AreaNoName'].".html'>".$news['AreaName']."</a> > ";
                                    echo "<a class='small' href='detail-category-".$news['CategoryNoName'].".html'>".$news['CategoryName']."</a> > ";
                                    echo "<a class='small' href='detail-type-".$news['TypeNoName'].".html'>".$news['TypeName']."</a> <br /> ";
                                    echo "<a class='small' href='detail-user-".$news['UserNoName'].".html'>".$news['UserName']."</a> | ";
                                    echo "<a class='small' href=''>".$news['NewsDate']."</a></div>";
                                    echo "<a ".$onClick." class='button-del' href='del-news-".$news['NewsNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                    echo "<a class='button-edit' href='edit-news-".$news['NewsNoName'].".html'><img src='../img/icon_edit.png'/></a><br style='clear' /></li>";
                                }
                                break;
                            case 'product';
                                $myDb->loadListDetailProduct("ProductPos", "ASC");
                                $r = $myDb->r;
                                while ($product = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li class='hight-line'><div><p><a href='detail-product-".$product['ProductNoName'].".html'>".$product['ProductName']."</a></p>";
                                    echo "<a class='small2' href='detail-product-".$product['ProductNoName'].".html'>Price1: ".$product['ProductPrice1']."đ/ Price2: ".$product['ProductPrice2']."đ</a><br />";
                                    echo "<a class='small' href='detail-area-".$product['AreaNoName'].".html'>".$product['AreaName']."</a> > ";
                                    echo "<a class='small' href='detail-category-".$product['CategoryNoName'].".html'>".$product['CategoryName']."</a> > ";
                                    echo "<a class='small' href='detail-type-".$product['TypeNoName'].".html'>".$product['TypeName']."</a> <br /> ";
                                    echo "<a class='small' href='detail-user-".$product['UserNoName'].".html'>".$product['UserName']."</a> | ";
                                    echo "<a class='small' href=''>".$product['ProductDate']."</a></div>";
                                    echo "<a ".$onClick." class='button-del' href='del-product-".$product['ProductNoName'].".html'><img src='../img/icon_delete.png'/></a>";
                                    echo "<a class='button-edit' href='edit-product-".$product['ProductNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                }
                                break;
                            case 'contact';
                                $myDb->loadListDetailContact("ContactDate", "ASC");
                                $r = $myDb->r;
                                while ($contact = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<li class='single-line'><div><a href='detail-contact-".$contact['ContactNoName'].".html'>".$contact['ContactName']."</a></div>";
                                    echo "<a ".$onClick." class='button-del' href='del-contact-".$contact['ContactNoName'].".html'><img src='../img/icon_delete.png'/></a></li><br style='clear' />";
                                }
                                break;
                            case 'comment';
                                break;
                            default:
                        }
                        ?>
                    </ul>
                </div>
                <div class="ad_main_box3">
                    <?php
                        switch ($div) {
                            case 'area':
                                
                                break;
                            case 'category';
                                
                                break;
                            case 'type';
                                $paging = "<div class='paging'><span id='first-page' class='page-item' onclick='onChangePageF()'><img src='../img/icon_go_first.png' /></span>";
                                $paging .= " <span id='prev-page' class='page-item' onclick='onChangePageP()'><img src='../img/icon_go_prev.png' /></span>";
                                $paging .= " <span id='current-page' class='page-item' onclick='onChangePageC()'>1</span>";
                                $paging .= " <span id='next-page' class='page-item' onclick='onChangePageN()'><img src='../img/icon_go_next.png' /></span>";
                                $paging .= " <span id='last-page' class='page-item' onclick='onChangePageL()'><img src='../img/icon_go_last.png' /></span></div>";
                                echo $paging;
                                break;
                            case 'user';
                                
                                break;
                            case 'news';
                                
                                break;
                            case 'product';
                                
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
        <?php
                    echo '<script type="text/javascript">';
                    echo     'function loadList(aSort) {';
                    echo        '$(\'div.ad_main_box2 ul\').load(\'update_list_'.$div.'\'.concat(aSort).concat(\'.html\'));';
                    echo     '}';
                    echo '</script>';
        ?>
                    <script type="text/javascript">
                        function onChangePageF() {
                            
                        }
                        function checkSortArea() {
                            var sortArray = ["0","0","0","0"];
                            var cArea = $('div.sort-command span#area').text();
                            var cCategory = $('div.sort-command span#category').text();
                            var cType = $('div.sort-command span#type').text();
                            var cDate = $('div.sort-command span#date').text();
                            if (cArea == 'Area') { // Not being set
                                sortArray[0] = "1"; // set Asc
                                $('div.sort-command span#area').text('Area↑');
                                $('div.sort-command span#area').attr('class', 'sorted');
                            } else if (cArea == 'Area↑') { // Being set Asc
                                sortArray[0] = "2"; // set desc
                                $('div.sort-command span#area').text('Area↓');
                            } else { // Being set desc
                                sortArray[0] = "0"; // set not sort
                                $('div.sort-command span#area').text('Area');
                                $('div.sort-command span#area').attr('class', 'unsort');
                            } //---------
                            if (cCategory == 'Category') { // Not being set
                                sortArray[1] = "0"; 
                            } else if (cCategory == 'Category&#8593') { // Being set Asc
                                sortArray[1] = "1"; 
                            } else { // Being set desc
                                sortArray[1] = "2"; 
                            } //---------
                            if (cType == 'Type') { // Not being set
                                sortArray[2] = "0"; 
                            } else if (cType == 'Type&#8593') { // Being set Asc
                                sortArray[2] = "1"; 
                            } else { // Being set desc
                                sortArray[2] = "2"; 
                            } //---------
                            if (cDate == 'Date') { // Not being set
                                sortArray[3] = "0"; 
                            } else if (cDate == 'Date&#8593') { // Being set Asc
                                sortArray[3] = "1"; 
                            } else { // Being set desc
                                sortArray[3] = "2"; 
                            } //---------
                            $('div.ad_main_box2 ul').empty();
                            $sort = "";
                            if (sortArray[0] == "1")
                                $sort = $sort.concat('-area1');
                            else if (sortArray[0] == "2")
                                $sort = $sort.concat('-area2');
                            if (sortArray[1] == "1")
                                $sort = $sort.concat('-category1');
                            else if (sortArray[1] == "2")
                                $sort = $sort.concat('-category2');
                            if (sortArray[2] == "1")
                                $sort = $sort.concat('-type1');
                            else if (sortArray[2] == "2")
                                $sort = $sort.concat('-type2');
                            if (sortArray[3] == "1")
                                $sort = $sort.concat('-date1');
                            else if (sortArray[3] == "2")
                                $sort = $sort.concat('-date2');

                            loadList($sort);
                        }
                        function checkSortCategory() {
                            var sortArray = ["0","0","0","0"];
                            var cArea = $('div.sort-command span#area').text();
                            var cCategory = $('div.sort-command span#category').text();
                            var cType = $('div.sort-command span#type').text();
                            var cDate = $('div.sort-command span#date').text();
                            if (cArea == 'Area') { // Not being set
                                sortArray[0] = "0"; // set Asc
                            } else if (cArea == 'Area↑') { // Being set Asc
                                sortArray[0] = "1"; // set desc
                            } else { // Being set desc
                                sortArray[0] = "2"; // set not sort
                            } //---------
                            if (cCategory == 'Category') { // Not being set
                                sortArray[1] = "1"; 
                                $('div.sort-command span#category').text('Category↑');
                                $('div.sort-command span#category').attr('class', 'sorted');
                            } else if (cCategory == 'Category↑') { // Being set Asc
                                sortArray[1] = "2"; 
                                $('div.sort-command span#category').text('Category↓');
                            } else { // Being set desc
                                sortArray[1] = "0"; 
                                $('div.sort-command span#category').text('Category');
                                $('div.sort-command span#category').attr('class', 'unsort');
                            } //---------
                            if (cType == 'Type') { // Not being set
                                sortArray[2] = "0"; 
                            } else if (cType == 'Type↑') { // Being set Asc
                                sortArray[2] = "1"; 
                            } else { // Being set desc
                                sortArray[2] = "2"; 
                            } //---------
                            if (cDate == 'Date') { // Not being set
                                sortArray[3] = "0"; 
                            } else if (cDate == 'Date↑') { // Being set Asc
                                sortArray[3] = "1"; 
                            } else { // Being set desc
                                sortArray[3] = "2"; 
                            } //---------
                            $('div.ad_main_box2 ul').empty();
                            $sort = "";
                            if (sortArray[0] == "1")
                                $sort = $sort.concat('-area1');
                            else if (sortArray[0] == "2")
                                $sort = $sort.concat('-area2');
                            if (sortArray[1] == "1")
                                $sort = $sort.concat('-category1');
                            else if (sortArray[1] == "2")
                                $sort = $sort.concat('-category2');
                            if (sortArray[2] == "1")
                                $sort = $sort.concat('-type1');
                            else if (sortArray[2] == "2")
                                $sort = $sort.concat('-type2');
                            if (sortArray[3] == "1")
                                $sort = $sort.concat('-date1');
                            else if (sortArray[3] == "2")
                                $sort = $sort.concat('-date2');

                            loadList($sort);
                        }
                        function checkSortType() {
                            var sortArray = ["0","0","0","0"];
                            var cArea = $('div.sort-command span#area').text();
                            var cCategory = $('div.sort-command span#category').text();
                            var cType = $('div.sort-command span#type').text();
                            var cDate = $('div.sort-command span#date').text();
                            if (cArea == 'Area') { // Not being set
                                sortArray[0] = "0"; // set Asc
                            } else if (cArea == 'Area↑') { // Being set Asc
                                sortArray[0] = "1"; // set desc
                            } else { // Being set desc
                                sortArray[0] = "2"; // set not sort
                            } //---------
                            if (cCategory == 'Category') { // Not being set
                                sortArray[1] = "0"; 
                            } else if (cCategory == 'Category↑') { // Being set Asc
                                sortArray[1] = "1"; 
                            } else { // Being set desc
                                sortArray[1] = "2"; 
                            } //---------
                            if (cType == 'Type') { // Not being set
                                sortArray[2] = "1"; 
                                $('div.sort-command span#type').text('Type↑');
                                $('div.sort-command span#type').attr('class', 'sorted');
                            } else if (cType == 'Type↑') { // Being set Asc
                                sortArray[2] = "2"; 
                                $('div.sort-command span#type').text('Type↓');
                            } else { // Being set desc
                                sortArray[2] = "0"; 
                                $('div.sort-command span#type').text('Type');
                                $('div.sort-command span#type').attr('class', 'unsort');
                            } //---------
                            if (cDate == 'Date') { // Not being set
                                sortArray[3] = "0"; 
                            } else if (cDate == 'Date↑') { // Being set Asc
                                sortArray[3] = "1"; 
                            } else { // Being set desc
                                sortArray[3] = "2"; 
                            } //---------
                            $('div.ad_main_box2 ul').empty();
                            $sort = "";
                            if (sortArray[0] == "1")
                                $sort = $sort.concat('-area1');
                            else if (sortArray[0] == "2")
                                $sort = $sort.concat('-area2');
                            if (sortArray[1] == "1")
                                $sort = $sort.concat('-category1');
                            else if (sortArray[1] == "2")
                                $sort = $sort.concat('-category2');
                            if (sortArray[2] == "1")
                                $sort = $sort.concat('-type1');
                            else if (sortArray[2] == "2")
                                $sort = $sort.concat('-type2');
                            if (sortArray[3] == "1")
                                $sort = $sort.concat('-date1');
                            else if (sortArray[3] == "2")
                                $sort = $sort.concat('-date2');

                            loadList($sort);
                        }
                        function checkSortDate() {
                            var sortArray = ["0","0","0","0"];
                            var cArea = $('div.sort-command span#area').text();
                            var cCategory = $('div.sort-command span#category').text();
                            var cType = $('div.sort-command span#type').text();
                            var cDate = $('div.sort-command span#date').text();
                            if (cArea == 'Area') { // Not being set
                                sortArray[0] = "0"; // set Asc
                            } else if (cArea == 'Area↑') { // Being set Asc
                                sortArray[0] = "1"; // set desc
                            } else { // Being set desc
                                sortArray[0] = "2"; // set not sort
                            } //---------
                            if (cCategory == 'Category') { // Not being set
                                sortArray[1] = "0"; 
                            } else if (cCategory == 'Category↑') { // Being set Asc
                                sortArray[1] = "1"; 
                            } else { // Being set desc
                                sortArray[1] = "2"; 
                            } //---------
                            if (cType == 'Type') { // Not being set
                                sortArray[2] = "0"; 
                            } else if (cType == 'Type↑') { // Being set Asc
                                sortArray[2] = "1"; 
                            } else { // Being set desc
                                sortArray[2] = "2"; 
                            } //---------
                            if (cDate == 'Date') { // Not being set
                                sortArray[3] = "1"; 
                                $('div.sort-command span#date').text('Date↑');
                                $('div.sort-command span#date').attr('class', 'sorted');
                            } else if (cDate == 'Date↑') { // Being set Asc
                                sortArray[3] = "2"; 
                                $('div.sort-command span#date').text('Date↓');
                            } else { // Being set desc
                                sortArray[3] = "0"; 
                                $('div.sort-command span#date').text('Date');
                                $('div.sort-command span#date').attr('class', 'unsort');
                            } //---------
                            $('div.ad_main_box2 ul').empty();
                            $sort = "";
                            if (sortArray[0] == "1")
                                $sort = $sort.concat('-area1');
                            else if (sortArray[0] == "2")
                                $sort = $sort.concat('-area2');
                            if (sortArray[1] == "1")
                                $sort = $sort.concat('-category1');
                            else if (sortArray[1] == "2")
                                $sort = $sort.concat('-category2');
                            if (sortArray[2] == "1")
                                $sort = $sort.concat('-type1');
                            else if (sortArray[2] == "2")
                                $sort = $sort.concat('-type2');
                            if (sortArray[3] == "1")
                                $sort = $sort.concat('-date1');
                            else if (sortArray[3] == "2")
                                $sort = $sort.concat('-date2');

                            loadList($sort);
                        }
                    </script>
	</body>
</html>