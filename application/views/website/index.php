<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.html" rel="apple-touch-icon">
    <link href="favicon.html" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>JK Handicrafts</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="<?= file_url('assets/fonts/Linearicons/Font/demo-files/demo.css'); ?>">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/Dogfalo/materialize%40master/extras/noUiSlider/nouislider.css">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/select2/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/owl-carousel/assets/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/slick/slick.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/plugins/lightGallery/dist/css/lightgallery.min.css'); ?>">
    <link rel="stylesheet" href="<?= file_url('assets/css/style.css'); ?>">
</head>

<body>
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
                        <div class="input-group">                            
                            <input class="form-control input-search" placeholder="I'm searchching for...">
                            <div class="input-group-append">
                                <button class="btn">Search</button>
                            </div>
                        </div>
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
    <main class="no-main">
        <div class="ps-home--full-width">
			<div class="ps-breadcrumb">
				<div class="container">
					<ul class="ps-breadcrumb__list">
						<li class="active"><a href="<?= base_url(); ?>">Jk Handicraft</a></li>
						<li class="active"><a href="<?= base_url(); ?>">Shop</a></li>
					</ul>
				</div>
			</div>
			<section class="section-shop shop-categories--default">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="ps-shop--sidebar">
							<div class="sidebar__block open">
                                    <div class="sidebar__title">ALL CATEGORIES<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <div class="block__content">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold0" value="">
                                                    <label for="sold0">Jewellery & Accessories</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Clothing & Shoes</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Home & Living</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Wedding & Party</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Toys & Entertainment</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Art & Collectibles</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Toys & Entertainment</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Craft Supplies & Tools</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
								<div class="sidebar__block open">
                                    <div class="sidebar__title">Colour<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <div class="block__content">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold0" value="">
                                                    <label for="sold0">Beige</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Black</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Blue</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Bronze</label>
                                                </div>
                                            </li>
											<li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Brown</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
								<div class="sidebar__block open">
                                    <div class="sidebar__title">Item type<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <div class="block__content">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold0" value="">
                                                    <label for="sold0">Handmade</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">Vintage</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="shop__banner">
                            <div class="row">
                                <div class="col-12 col-lg-4"><a href="#"><img src="<?= file_url('assets/img/banner1.jpg'); ?>" alt="alt" /></a></div>
                                <div class="col-12 col-lg-4"><a href="#"><img src="<?= file_url('assets/img/banner2.jpg'); ?>" alt="alt" /></a></div>
                                <div class="col-12 col-lg-4"><a href="#"><img src="<?= file_url('assets/img/banner3.jpg'); ?>" alt="alt" /></a></div>

                            </div>
                        </div>
                        <div class="result__content mt-4">
                            <div class="section-shop--grid">
                                <div class="row m-0">
                                    <div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img1.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img2.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img3.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img4.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img5.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img6.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img7.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img7.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img1.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div><div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img2.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img3.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="#"><img class="ps-product__thumbnail" src="<?= file_url('assets/img/products/img4.jpg'); ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i>Arts</p>
                                                <h5><a class="ps-product__name" href="#">Earthy palette, Original Nordic...</a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹564.49</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-pagination blog--pagination">
                                <ul class="pagination">
                                    <li class="chevron"><a href="#"><i class="icon-chevron-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="chevron"><a href="#"><i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </main>
    <footer class="ps-footer">
        <div class="container">
            <div class="ps-footer--contact">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <p class="contact__title">About Us</p>
                        <p>Your search for finest Indian handlooms and handcrafted products from skilled artisans across India, ends at WeaverStory.com. Started as an initiative to preserve & promote Indian handloom, and bring timeless treasures from the heart of the country.</p>
                        
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <p class="contact__title">Help & Info<span class="footer-toggle"><i class="icon-chevron-down"></i></span></p>
                                <ul class="footer-list">
                                    <li> <a href="#">About Us</a></li>
                                    <li> <a href="#">Contact Us</a></li>
                                    <li> <a href="#">Terms of Use</a></li>
                                    <li> <a href="#">Policy</a></li>
                                    <li> <a href="#">FAQs</a></li>
                                </ul>
                                <hr>
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="contact__title">Categories<span class="footer-toggle"><i class="icon-chevron-down"></i></span></p>
                                <ul class="footer-list">
                                    <li> <a href="#">Jewellery & Accessories</a></li>
                                    <li> <a href="#">Clothing & Shoes</a></li>
                                    <li> <a href="#">Home & Living</a></li>
                                    <li> <a href="#">Wedding & Party</a></li>
                                    <li> <a href="#">Toys & Entertainment</a></li>
                                    <li> <a href="#">Art & Collectibles</a></li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <p class="contact__title">Contact Us</p>
                        <p class="telephone"><b>Phone: </b> +91 94143-71400</p>
                        <p> <b>Location: </b>B2, New Ramgarh Rd, Krishna Colony, Karbala, Jaipur, Rajasthan 302002</p>
                        <p> <b>Email: </b><a href="#" class="__cf_email__">info@jkhandicraft.com</a></p>
                    </div>
                </div>
            </div>
            <div class="row ps-footer__copyright">
                <div class="col-12 col-lg-6 ps-footer__text">&copy; 2021 JK Handicraft. All Rights Reversed.</div>
                <div class="col-12 col-lg-6 ps-footer__social"> <a class="icon_social facebook" href="#"><i class="fa fa-facebook-f"></i></a><a class="icon_social twitter" href="#"><i class="fa fa-twitter"></i></a><a class="icon_social google" href="#"><i class="fa fa-google-plus"></i></a><a class="icon_social youtube" href="#"><i class="fa fa-youtube"></i></a><a class="icon_social wifi" href="#"><i class="fa fa-wifi"></i></a></div>
            </div>
        </div>
    </footer>
    <button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
    
    <nav class="navigation--mobile">
        <div class="navigation__header">
            <div class="navigation-title">
                <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>                
            </div>
        </div>
        <div class="navigation__content">
            <ul class="menu--mobile">
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
    <script src="plugins/jquery.min.js"></script>
    <script src="plugins/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="plugins/jquery.matchHeight-min.js"></script>
    <script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="plugins/select2/dist/js/select2.min.js"></script>
    <script src="plugins/slick/slick.js"></script>
    <script src="plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>