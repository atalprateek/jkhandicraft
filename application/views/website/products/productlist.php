
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
                        <?php if($title=="Home"){?>
                        <div class="shop__banner">
                            <div class="row">
                                <div class="col-12 col-lg-4"><a href="#"><img src="<?= file_url('assets/img/banner1.jpg'); ?>" alt="alt" /></a></div>
                                <div class="col-12 col-lg-4"><a href="#"><img src="<?= file_url('assets/img/banner2.jpg'); ?>" alt="alt" /></a></div>
                                <div class="col-12 col-lg-4"><a href="#"><img src="<?= file_url('assets/img/banner3.jpg'); ?>" alt="alt" /></a></div>

                            </div>
                        </div>
                        <?php 
                            }
                            else{
                                if(isset($category['name'])){
                                    echo '<h3>'.$category['name'].'</h3>';
                                }
                                elseif(isset($products[0])){
                                    echo '<h3>'.$products[0]['category_name'].'</h3>';
                                }
                                
                            }
                        ?>
                        <div class="result__content mt-4">
                            <div class="section-shop--grid">
                                <div class="row m-0">
                                    <?php
                                        if(!empty($products) && is_array($products)){
                                            foreach($products as $product){
                                    ?>
                                    <div class="col-6 col-md-4 col-lg-3 p-0">
                                        <div class="ps-product--standard"><a href="<?= base_url('product/'.$product['slug']); ?>"><img class="ps-product__thumbnail" src="<?= $product['image']; ?>" alt="alt" /></a>
                                            <div class="ps-product__content">
                                                <p class="ps-product__type"><i class="icon-store"></i><?= $product['category_name']; ?></p>
                                                <h5><a class="ps-product__name" href="<?= base_url('product/'.$product['slug']); ?>"><?= $product['name']; ?></a></h5>
                                                <p class="ps-product-price-block"><span class="ps-product__sale">₹<?= $product['price']; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "No Record found!!";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="ps-pagination blog--pagination">
                                <?= $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </main>