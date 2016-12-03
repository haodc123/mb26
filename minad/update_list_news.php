<?php
require_once("../global/func.php");
$gSort = valid($myDb->dbc, $_GET['sort']);
$sort = "ORDER BY ";
if (strpos($gSort,'area1') !== false) {
    $sort .= 'NewsAID ASC, ';
} else if (strpos($gSort,'area2') !== false) {
    $sort .= 'NewsAID DESC, ';
}
if (strpos($gSort,'category1') !== false) {
    $sort .= 'NewsCID ASC, ';
} else if (strpos($gSort,'category2') !== false) {
    $sort .= 'NewsCID DESC, ';
}
if (strpos($gSort,'type1') !== false) {
    $sort .= 'NewsTID ASC, ';
} else if (strpos($gSort,'type2') !== false) {
    $sort .= 'NewsTID DESC, ';
}
if (strpos($gSort,'date1') !== false) {
    $sort .= 'NewsDate ASC, ';
} else if (strpos($gSort,'date2') !== false) {
    $sort .= 'NewsDate DESC, ';
}
$sort .= 'NewsPos ASC';

echo $sort;
$onClick = "onclick='return confirm(\"Are you sure to delete this item?\")'";
								$q = "SELECT * FROM news AS n ";
                                $q .= " JOIN area AS a ON n.NewsAID = a.AreaID ";
                                $q .= " JOIN category AS c ON n.NewsCID = c.CategoryID ";
                                $q .= " JOIN type AS t ON n.NewsTID = t.TypeID ";
                                $q .= " JOIN user AS u ON n.NewsUserID = u.UserID ";
                                $q .= $sort;
                                $myDb->doQuery($q);
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
                                    echo "<a class='button-edit' href='edit-news-".$news['NewsNoName'].".html'><img src='../img/icon_edit.png'/></a></li><br style='clear' />";
                                }
?>