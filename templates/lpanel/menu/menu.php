<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo STATIC_COMPANY_NAME;?> Admin</a>
            </div>
            <!-- Top Menu Items -->
            <?php if(!$fw->users()->isLogin() == FALSE){?>
            <ul class="nav navbar-right top-nav">
			   <li>
                        <a href="/lpanel/add-order.html"><i class="fa fa-fw fa-print"></i> Add Order</a>
               </li>
			   <li>
                        <a href="/lpanel/add-product.html"><i class="fa fa-fw fa-folder-o"></i> Add Product</a>
               </li>
		       <li>
                        <a href="/lpanel/search-order.html"><i class="fa fa-fw fa-search"></i> Order Search</a>
               </li>
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ($_SESSION['SUSERNAME']!="") ? $_SESSION['SUSERNAME'] : 'Login';?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/lpanel/logout.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php }?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="/lpanel/index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="/lpanel/users.html"><i class="fa fa-fw fa-user"></i> Users Manage</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pro"><i class="fa fa-fw fa-arrows-v"></i> Product <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pro" class="collapse">

                        	<li>
                                <a href="/lpanel/add-product.html"><i class="fa fa-fw fa-search"></i> Add Product</a>
                            </li>
                            <li>
                                <a href="/lpanel/search-product.html"><i class="fa fa-fw fa-keyboard-o"></i> Search Product</a>
                            </li>
                        </ul>    
                     </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#travel"><i class="fa fa-fw fa-arrows-v"></i> Gallery <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="travel" class="collapse">
                            <li>
                                <a href="/lpanel/add-gallery.html"><i class="fa fa-fw fa-folder-o"></i> Add Gallery</a>
                            </li>
                            <li>
                                <a href="/lpanel/search-gallery.html"><i class="fa fa-fw fa-search"></i> Search Gallery</a>
                            </li>
                             
                		</ul>
                    </li>
                     
                    </li>
                    <li>
                         <a href="/lpanel/meta-management.html"><i class="fa fa-fw fa-keyboard-o"></i> Add Meta Data</a>
                     </li>
                    <li>
                        <a href="/lpanel/logout.html"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>