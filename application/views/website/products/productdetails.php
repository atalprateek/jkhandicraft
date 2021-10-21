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
                    <div class="col-md-5">
                        <img src="<?= $product['image'] ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-7">
                        <h2><?= $product['name']; ?></h2>
                        <p><?= $product['short_description']; ?></p>
                        <div>
                            <?= $product['price']; ?>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12">
                        <h3>Description</h3>
                        <p><?= $product['description']; ?></p>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-info btn-lg" onClick="$('#enquiryform').toggle();">Submit Enquiry</button>
                    </div>
                </div><br>
                <div class="row" id="enquiryform">
                    <div class="col-md-6">
                        <?= form_open('products/addenquiry'); ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Enquiry For</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $product['name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mobile" id="mobile" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Query</label>
                                <div class="col-sm-9">
                                    <textarea name="query" id="query" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                    <button type="submit" name="addenquiry" class="btn btn-lg btn-success"> Save Enquiry</button>
                                </div>   
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </main>