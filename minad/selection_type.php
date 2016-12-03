							<?php
								require_once("../global/func.php");
								$gCategoryID = valid($myDb->dbc, $_GET['categoryID']);
                                $myDb->doQuery("SELECT * FROM type WHERE TypeCategoryID = ".$gCategoryID);
                                $r = $myDb->r;
                                while ($type = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$type['TypeID'].">".$type['TypeName']."</option>";
                                }
                            ?>