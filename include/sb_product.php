<div class="box-sb">
                    <div class="box-sb-title"><span><a href="news.html">Tin tức</a></span></div>
                    <div class="box-sb-content">
                        <ul>
                            <?php
                                $myDb->loadLatestDetailTechNews(" ", "NewsPos", "ASC", 5);  
                                $sbr = $myDb->r;
                                while ($sbnews = mysqli_fetch_array($sbr, MYSQLI_ASSOC)) {
                                    echo '<li><a href="detail_technews-'.$sbnews['NewsNoName'].'.html">'.$sbnews['NewsName'].'</a></li>';
                                }                              
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="box-sb">
                    <div class="box-sb-title"><span><a href="app.html">Game hot</a></span></div>
                    <div class="box-sb-content">
                        <ul>
                            <?php
                                $myDb->loadLatestDetailApp(" ", "NewsPos", "ASC", 5);  
                                $sbr2 = $myDb->r;
                                while ($sbapp = mysqli_fetch_array($sbr2, MYSQLI_ASSOC)) {
                                    echo '<li><a href="detail_app-'.$sbapp['NewsNoName'].'.html">'.$sbapp['NewsName'].'</a></li>';
                                }                              
                            ?>
                        </ul>
                    </div>
                </div>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-like-box" data-href="https://www.facebook.com/fukisstore" style="margin-top:15px" data-width="245" data-height="300" data-show-faces="true" data-border-color="#ccc" data-stream="true" data-header="true"></div>