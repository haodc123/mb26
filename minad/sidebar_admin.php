                <?php
                    $class_current = 'class="current-select"';
                ?>
                <div class="sbadmin box-sb">
                    <div class="box-sb-title"><span>Area - Cat - Type</span></div>
                    <div class="box-sb-content">
                        <ul>
                            <li <?php if ($div == "area") echo $class_current; ?>><a href="am-area.html">All Area</a></li>
                            <li <?php if ($div == "category") echo $class_current; ?>><a href="am-category.html">All Categories</a></li>
                            <li <?php if ($div == "type") echo $class_current; ?>><a href="am-type.html">All Types</a></li>
                        </ul>
                    </div>
                </div>

                <div class="sbadmin box-sb">
                    <div class="box-sb-title"><span>Post</span></div>
                    <div class="box-sb-content">
                        <ul>
                            <li <?php if ($div == "news") echo $class_current; ?>><a href="am-news.html">All News</a></li>
                            <li <?php if ($div == "product") echo $class_current; ?>><a href="am-product.html">All Products</a></li>
                        </ul>
                    </div>
                </div>

                <div class="sbadmin box-sb">
                    <div class="box-sb-title"><span>Contact & Comment</span></div>
                    <div class="box-sb-content">
                        <ul>
                            <li <?php if ($div == "contact") echo $class_current; ?>><a href="am-contact.html">All Contacts</a></li>
                            <li <?php if ($div == "comment") echo $class_current; ?>><a href="am-comment.html">All Comments</a></li>
                        </ul>
                    </div>
                </div>

                <div class="sbadmin box-sb">
                    <div class="box-sb-title"><span>User & Control</span></div>
                    <div class="box-sb-content">
                        <ul>
                            <li <?php if ($div == "user") echo $class_current; ?>><a href="am-user.html">All Users</a></li>
                        </ul>
                    </div>
                </div>