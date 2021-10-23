                        <div class="ps-shop--sidebar">
							<div class="sidebar__block open">
                                    <div class="sidebar__title">ALL CATEGORIES<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <div class="block__content">
                                        <ul>
                                            <?php
                                            if(!empty($categories) && is_array($categories)){
                                                foreach($categories as $category){
                                                    $checked="";
                                                    //if($category['parent_id']!=0){continue;}
                                                    if(!empty($cats) && strpos($cats,$category['slug'])!==false){ $checked="checked"; }
                                            ?>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input category" type="checkbox" id="sold<?= $category['slug']; ?>" value="<?= $category['slug']; ?>" <?= $checked; ?>>
                                                    <label for="sold<?= $category['slug']; ?>"><?= $category['name']; ?></label>
                                                </div>
                                            </li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
								<div class="sidebar__block open d-none">
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
								<div class="sidebar__block open d-none">
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
