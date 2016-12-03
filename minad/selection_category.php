							<?php
								require_once("../global/func.php");
								$gAreaID = valid($myDb->dbc, $_GET['areaID']);
                                $myDb->doQuery("SELECT * FROM category WHERE CategoryAreaID = ".$gAreaID);
                                $r = $myDb->r;
                                while ($category = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<option value=".$category['CategoryID'].">".$category['CategoryName']."</option>";
                                }
                            ?>