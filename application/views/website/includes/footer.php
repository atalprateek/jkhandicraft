
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
                                    <?php
                                        $menucatgories=getfeaturedcategories();
                                        if(!empty($menucatgories) && is_array($menucatgories)){
                                            foreach($menucatgories as $menu){
                                    ?>
                                    <li> <a href="#"><?= $menu['name'] ?></a></li>
                                    <?php
                                            }
                                        }
                                    ?>
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