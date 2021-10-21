
    <header class="header ps-header--full-width">
        <div class="ps-header--center header--mobile">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left">
                        <button class="navbar-toggler"><i class="icon-menu"></i></button>
                    </div>
                    <div class="header-inner__center"><a class="logo open" href="<?= base_url(); ?>">JK<span class="text-black">Handicraft.</span></a></div>
                    <div class="header-inner__right">
                        <button class="button-icon icon-sm search-mobile"><i class="icon-magnifier"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <section class="ps-header--center header-desktop">
            <div class="container-fluid">
                <div class="header-inner">
                    <div class="header-inner__left"><a class="logo" href="<?= base_url(); ?>">JK<b class="text-black">Handicraft.</b></a></div>
                    <div class="header-inner__center">
                            <?= form_open('search/','method="get"'); ?>
                        <div class="input-group">       
                            <input class="form-control input-search" name="query" placeholder="I'm Searching for..." value="<?= $this->input->get('query'); ?>">
                            <div class="input-group-append">
                                <button class="btn">Search</button>
                            </div>
                        </div>
                            <?= form_close(); ?>
                        <!--<div class="result-search">
                            <ul class="list-result">
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html"><u>Organic</u> Large Green Bell Pepper</a>
                                            <p class="ps-product__rating">
                                                <select class="rating-stars">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3" selected="selected">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select><span>(5)</span>
                                            </p>
                                            <p class="ps-product__meta"> <span class="ps-product__price">$6.90</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Avocado <u>Organic</u> Hass Large</a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">$12.90</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_32a.jpg" alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Tailgater Ham <u>Organic</u> Sandwich</a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">$33.49</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_6a.jpg" alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                            <p class="ps-product__rating">
                                                <select class="rating-stars">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span>(16)</span>
                                            </p>
                                            <p class="ps-product__meta"> <span class="ps-product__price-sale">$4.99</span><span class="ps-product__is-sale">$8.99</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_22a.jpg" alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">$12.99</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                    <div class="header-inner__right"><a class="button-icon ps-top__phone" href="tel:9414371400"><i class="icon-phone-wave"></i>
                            <div class="ps-top__number">Call Now<span>94143-71400</span></div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navigation">
            <div class="container-fluid">
                <ul class="menu">
                    <?php
                        $menucatgories=getfeaturedcategories();
                        if(!empty($menucatgories) && is_array($menucatgories)){
                            foreach($menucatgories as $menu){
                                $active="";
                                if($menu['slug']==$this->uri->segment(2)){
                                    $active="active";
                                }
                                if(isset($menu['submenu']) && !empty($menu['submenu'])){
                    ?>
                    <li class="menu-item-has-children has-mega-menu">
                        <a class="nav-link" href="javascript:void(0);"><?= $menu['name']; ?></a>
                        <div class="mega-menu mega-shop">
                            <div class="mega-anchor"></div>
                            <?php
                                foreach($menu['submenu'] as $key=>$submenu){
                            ?>
                            <div class="mega-menu__column">
                                <h4><?= $key; ?><span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <?php
                                        foreach($submenu as $submenuitem){
                                    ?>
                                    <li><a href="<?= base_url('category/'.$submenuitem['slug']); ?>"><?= $submenuitem['name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </li>
                    <?php
                                }else{
                    ?>
					<li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="<?= base_url('category/'.$menu['slug']); ?>"><?= $menu['name']; ?></a></li>
                    <?php
                                }
                            }
                        }
                    ?>
                </ul>
                <ul class="menu d-none">
                    <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="javascript:void(0);">Jewellery & Accessories</a></span>
                        <div class="mega-menu mega-shop">
                            <div class="mega-anchor"></div>
                            <div class="mega-menu__column">
                                <h4>Accessories<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Hats & Caps</a></li>
									<li><a href="#">Hair Accessories</a></li>
									<li><a href="#">Sunglasses & Eyewear</a></li>
									<li><a href="#">Scarves & Wraps</a></li>
									<li><a href="#">Belts & Braces</a></li>
									<li><a href="#">Keychains & Lanyards</a></li>
									<li><a href="#">Gloves & Mittens</a></li>
									<li><a href="#">Umbrellas & Rain Accessories</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Bags & Purses<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Backpacks</a></li>
									<li><a href="#">Handbags</a></li>
									<li><a href="#">Clutches & Evening Bags</a></li>
									<li><a href="#">Shoulder Bags</a></li>
									<li><a href="#">Nappy Bags</a></li>
									<li><a href="#">Luggage & Duffel Bags</a></li>
									<li><a href="#">Phone Cases</a></li>
									<li><a href="#">All Bags & Purses </a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Necklaces<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Pendants</a></li>
									<li><a href="#">Chokers</a></li>
									<li><a href="#">Charm Necklaces</a></li>
									<li><a href="#">Crystal Necklaces</a></li>
									<li><a href="#">Monogram & Name Necklaces</a></li>
									<li><a href="#">Beaded Necklaces</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Rings<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Stackable Rings</a></li>
									<li><a href="#">Statement Rings</a></li>
									<li><a href="#">Bands</a></li>
									<li><a href="#">Signet Rings</a></li>
									<li><a href="#">Multi-Stone Rings</a></li>
									<li><a href="#">Solitaire Rings</a></li>
									<li><a href="#">Midi Rings</a></li>
									<li><a href="#">Wedding & Engagement</a></li>
									<li><a href="#">Bridal Sets</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="javascript:void(0);">Clothing & Shoes</a></span>
                        <div class="mega-menu mega-shop">
                            <div class="mega-anchor"></div>
                            <div class="mega-menu__column">
                                <h4>Women's<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Dresses</a></li>
									<li><a href="#">Tops & Tees</a></li>
									<li><a href="#">Skirts</a></li>
									<li><a href="#">Jackets & Coats</a></li>
									<li><a href="#">Trousers & Capris</a></li>
									<li><a href="#">Jumpers</a></li>
									<li><a href="#">Costumes</a></li>
									<li><a href="#">Shoes</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Men's<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Shirts</a></li>
									<li><a href="#">Jumpers</a></li>
									<li><a href="#">Costumes</a></li>
									<li><a href="#">Jackets & Coats</a></li>
									<li><a href="#">Shoes</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Kids' & Baby<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Baby Girls' Clothing</a></li>
									<li><a href="#">Jumpers</a></li>
									<li><a href="#">Tops</a></li>
									<li><a href="#">Costumes</a></li>
									<li><a href="#">Jackets & Coats</a></li>
									<li><a href="#">Girls' Shoes</a></li>
									<li><a href="#">Boys' Shoes</a></li>
									<li><a href="#">Boots</a></li>
									<li><a href="#">Skirts</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Bags & Purses<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Backpacks</a></li>
									<li><a href="#">Handbags</a></li>
									<li><a href="#">Clutches & Evening Bags</a></li>
									<li><a href="#">Shoulder Bags</a></li>
									<li><a href="#">Nappy Bags</a></li>
									<li><a href="#">Luggage & Duffel Bags</a></li>
									<li><a href="#">Phone Cases</a></li>
									<li><a href="#">All Bags & Purses </a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"><a class="nav-link" href="javascript:void(0);">Home & Living</a></span>
                        <div class="mega-menu mega-shop">
                            <div class="mega-anchor"></div>
                            <div class="mega-menu__column">
                                <h4>Home<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Home Decor</a></li>
												<li><a href="#">Wall Decor</a></li>
												<li><a href="#">Decorative Cushions</a></li>
												<li><a href="#">Picture Frames & Displays</a></li>
												<li><a href="#">Candles & Holders</a></li>
												<li><a href="#">Clocks</a></li>
												<li><a href="#">Vases</a></li>
												<li><a href="#">Christmas Wreaths</a></li>
												<li><a href="#">Christmas Decor</a></li>
												<li><a href="#">Christmas Trees</a></li>
												<li><a href="#">Menorahs</a></li>
												<li><a href="#">Rugs</a></li>
												<li><a href="#">Furniture</a></li>
												<li><a href="#">Bedding</a></li>
												<li><a href="#">Bathroom</a></li>
												<li><a href="#">Outdoor & Gardening</a></li>
												<li><a href="#">Storage & Organisation</a></li>
												<li><a href="#">Office</a></li>
												<li><a href="#">Lighting</a></li>
												<li><a href="#">Kitchen & Dining</a></li>
												<li><a href="#">Food & Drink</a></li>
												<li><a href="#">Spirituality & Religion</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Bath & Beauty<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Bath Accessories</a></li>
												<li><a href="#">Makeup & Cosmetics</a></li>
												<li><a href="#">Skin Care</a></li>
												<li><a href="#">Hair Care</a></li>
												<li><a href="#">Essential Oils</a></li>
												<li><a href="#">Fragrances</a></li>
												<li><a href="#">Soaps & Bath Bombs</a></li>
												<li><a href="#">Face Masks & Coverings</a></li>
                                </ul>
                            </div>
                            <div class="mega-menu__column">
                                <h4>Pet Supplies<span class="sub-toggle"></span></h4>
                                <ul class="sub-menu--mega">
                                    <li><a href="#">Pet Collars & Leashes</a></li>
												<li><a href="#">Pet Furniture</a></li>
												<li><a href="#">Pet Clothing & Shoes</a></li>
												<li><a href="#">Pet Costumes</a></li>
												<li><a href="#">Pet Hats & Wigs</a></li>
												<li><a href="#">Pet Jackets & Hoodies</a></li>
												<li><a href="#">Pet Bedding</a></li>
												<li><a href="#">Pet Carriers & Houses</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="#">Wedding & Party</a></li>
					<li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="#">Toys & Entertainment</a></li>
					<li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="#">Art & Collectibles</a></li>
					<li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="#">Craft Supplies & Tools</a></li>
					<li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="#">Vintage</a></li>
                </ul>
            </div>
        </nav>
        <div class="mobile-search--slidebar">
            <div class="mobile-search--content">
                <div class="mobile-search__header">
                    <div class="mobile-search-box">
                        <div class="input-group">
                            <input class="form-control" placeholder="I'm searching for..." id="inputSearchMobile">
                            <div class="input-group-append">
                                <button class="btn"> <i class="icon-magnifier"></i></button>
                            </div>
                        </div>
                        <button class="cancel-search"><i class="icon-cross"></i></button>
                    </div>
                </div>
                
                <!--<div class="mobile-search__result">
                    <h5> <span class="number-result">5</span>search result</h5>
                    <ul class="list-result">
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html"><u>Organic</u> Large Green Bell Pepper</a>
                                    <p class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" selected="selected">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select><span>(5)</span>
                                    </p>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$6.90</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Avocado <u>Organic</u> Hass Large</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$12.90</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_32a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Tailgater Ham <u>Organic</u> Sandwich</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$33.49</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_6a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                    <p class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span>(16)</span>
                                    </p>
                                    <p class="ps-product__meta"> <span class="ps-product__price-sale">$4.99</span><span class="ps-product__is-sale">$8.99</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="img/products/01-Fresh/01_22a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$12.99</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
    </header>

    <button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
    
    <nav class="navigation--mobile">
        <div class="navigation__header">
            <div class="navigation-title">
                <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>                
            </div>
        </div>
        <div class="navigation__content">
            <ul class="menu--mobile">
                <?php
                    $menucatgories=getfeaturedcategories();
                    if(!empty($menucatgories) && is_array($menucatgories)){
                        foreach($menucatgories as $menu){
                            $active="";
                            if($menu['slug']==$this->uri->segment(2)){
                                $active="active";
                            }
                            if(isset($menu['submenu']) && !empty($menu['submenu'])){
                ?>
                <li class="menu-item-has-children">
                    <a href="<?= base_url('category/'.$menu['slug']); ?>"><?= $menu['name']; ?></a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <?php
                            foreach($menu['submenu'] as $key=>$submenu){
                                foreach($submenu as $submenuitem){
                        ?>
                        <li><a href="<?= base_url('category/'.$submenuitem['slug']); ?>"><?= $submenuitem['name']; ?></a></li>
                        <?php }} ?>
                    </ul>
                </li>
                <?php
                            }else{
                ?>
                <li class="menu-item-has-children"> <a href="<?= base_url('category/'.$menu['slug']); ?>"><?= $menu['name']; ?></a></li>
                <?php
                            }
                        }
                    }
                ?>
            </ul>
            <ul class="menu--mobile d-none">
                <li class="menu-item-has-children"><a href="#">Jewellery & Accessories</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Hats & Caps</a></li>
						<li><a href="#">Hair Accessories</a></li>
						<li><a href="#">Sunglasses & Eyewear</a></li>
						<li><a href="#">Scarves & Wraps</a></li>
						<li><a href="#">Belts & Braces</a></li>
						<li><a href="#">Keychains & Lanyards</a></li>
						<li><a href="#">Gloves & Mittens</a></li>
						<li><a href="#">Umbrellas & Rain Accessories</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Clothing & Shoes</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Hats & Caps</a></li>
						<li><a href="#">Hair Accessories</a></li>
						<li><a href="#">Sunglasses & Eyewear</a></li>
						<li><a href="#">Scarves & Wraps</a></li>
						<li><a href="#">Belts & Braces</a></li>
						<li><a href="#">Keychains & Lanyards</a></li>
						<li><a href="#">Gloves & Mittens</a></li>
						<li><a href="#">Umbrellas & Rain Accessories</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Home & Living</a><span class="sub-toggle"><i class="icon-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Hats & Caps</a></li>
						<li><a href="#">Hair Accessories</a></li>
						<li><a href="#">Sunglasses & Eyewear</a></li>
						<li><a href="#">Scarves & Wraps</a></li>
						<li><a href="#">Belts & Braces</a></li>
						<li><a href="#">Keychains & Lanyards</a></li>
						<li><a href="#">Gloves & Mittens</a></li>
						<li><a href="#">Umbrellas & Rain Accessories</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"> <a href="#">Bath & Beauty</a></li>
				<li class="menu-item-has-children"> <a href="#">Toys & Entertainment</a></li>
            </ul>
        </div>
    </nav>