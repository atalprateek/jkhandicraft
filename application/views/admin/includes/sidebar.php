                
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">

                        <nav class="pcoded-navbar">
                            <div class="nav-list">
                                <div class="pcoded-inner-navbar main-menu">
                                    <div class="pcoded-navigation-label">Navigation</div>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="<?= activate_menu('home'); ?>">
                                            <a href="<?=  admin_url(); ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-home"></i>
                                                </span>
                                                <span class="pcoded-mtext">Home</span>
                                            </a>
                                        </li>
                                        <li class="pcoded-hasmenu <?= activate_dropdown('products'); ?>">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                                                <span class="pcoded-mtext">Products</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="<?= activate_menu('products/addproduct'); ?>">
                                                    <a href="<?=  admin_url('products/addproduct/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Add Product</span>
                                                    </a>
                                                </li>
                                                <li class="<?= activate_menu('products'); ?>">
                                                    <a href="<?=  admin_url('products/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Product List</span>
                                                    </a>
                                                </li>
                                                <li class="<?= activate_menu('products/category'); ?>">
                                                    <a href="<?=  admin_url('products/category/'); ?>" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Category</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="<?= activate_menu('enquiry'); ?>">
                                            <a href="<?=  admin_url('enquiry/'); ?>" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="fa fa-list"></i>
                                                </span>
                                                <span class="pcoded-mtext">Enquiry</span>
                                            </a>
                                        </li>
                                        <li class="pcoded-hasmenu active pcoded-trigger d-none">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                                <span class="pcoded-mtext">Dashboard</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="active">
                                                    <a href="index.html" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Default</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="dashboard-crm.html" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">CRM</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="dashboard-analytics.html" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Analytics</span>
                                                        <span class="pcoded-badge label label-info ">NEW</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="d-none">
                                            <a href="navbar-light.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-menu"></i>
                                                </span>
                                                <span class="pcoded-mtext">Navigation</span>
                                            </a>
                                        </li>
                                    </ul>    
                                </div>
                            </div>
                        </nav>
                        <div class="pcoded-content">
                            
