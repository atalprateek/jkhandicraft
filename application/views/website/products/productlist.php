
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
                            <?php $this->load->view('website/products/filters'); ?>
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
                                    if(isset($searchtitle)){
                                        echo '<h3>'.$searchtitle.'</h3>';
                                    }
                                    elseif(isset($category['name'])){
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

    <script>
        $('body').on('change','.category',function(){
            var category=[];
            $('.category').each(function(){
                if($(this).is(':checked')){
                   category.push($(this).val());
                }
            });
            if(category.length==0){
               window.location='<?= base_url('search/'); ?>';
            }
            else{
                
                $.ajax({
                    type:"get",
                    url:"<?= base_url('products/getfilteredproducts/search'); ?>",
                    data:{cats:category},
                    success:function(data){
                        $('.no-main').replaceWith(data);
                    }
                });
            }
        });
    </script>