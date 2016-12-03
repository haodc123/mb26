<?php
require_once("../global/func.php");
$gSort = valid($myDb->dbc, $_GET['sort']);
$sort = "ORDER BY ";
if (strpos($gSort,'area1') !== false) {
    $sort .= 'ProductAID ASC, ';
} else if (strpos($gSort,'area2') !== false) {
    $sort .= 'ProductAID DESC, ';
}
if (strpos($gSort,'category1') !== false) {
    $sort .= 'ProductCID ASC, ';
} else if (strpos($gSort,'category2') !== false) {
    $sort .= 'ProductCID DESC, ';
}
if (strpos($gSort,'type1') !== false) {
    $sort .= 'ProductTID ASC, ';
} else if (strpos($gSort,'type2') !== false) {
    $sort .= 'ProductTID DESC, ';
}
if (strpos($gSort,'date1') !== false) {
    $sort .= 'ProductDate ASC, ';
} else if (strpos($gSort,'date2') !== false) {
    $sort .= 'ProductDate DESC, ';
}
$sort .= 'ProductPos ASC';

echo $sort;
$onClick = "onclick='return confirm(\"Are you sure to delete this item?\")'";
                                $q = "SELECT * FROM product AS n ";
                                $q .= " JOIN area AS a ON n.ProductAID = a.AreaID ";
                                $q .= " JOIN category AS c ON n.ProductCID = c.CategoryID ";
                                $q .= " JOIN type AS t ON n.ProductTID = t.TypeID ";
                                $q .= " JOIN user AS u ON n.ProductUserID = u.UserID ";
                                $q .= $sort;
                                $myDb->doQuery($q);
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
?>