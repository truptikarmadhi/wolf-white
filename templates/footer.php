<?php
$footer_logo = get_field('footer_logo', 'options');
$footer_information = get_field('footer_information', 'options');
$footer_menu_items = get_field('footer_menu_items', 'options');
$newsletter_form = get_field('newsletter_form', 'options');
$copyright = get_field('copyright', 'options');
$footer_menus = get_field('footer_menus', 'options');
?>

<!-- footer -->
<footer class="footer bg-303E3D tpt-75 tpb-35 dpt-80 dpb-80">
    <div class="container container2">
        <div class="row tmb-30 dmb-105">
            <div class="col-lg-2 pe-lg-3 tmb-60">
                <div class="footer-logo">
                    <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" class="h-100">
                </div>
            </div>
            <div class="col-lg-4 tmb-60">
                <div class="col-lg-9 mx-lg-auto">
                    <?php if(!empty($footer_information)):
                        $title = $footer_information['title'];
                        $contact_info = $footer_information['contact_info'];
                        $social_icons = $footer_information['social_icons'];
                        ?>
                        <div class="">
                            <div class="montserrat font16 leading24 text-F0EBE2 fw-medium tmb-20 dmb-25"><?php echo $title; ?></div>
                            <div class="contact-information tmb-30 dmb-40">
                                <?php if(!empty($contact_info)):
                                    foreach($contact_info as $info):
                                        $icon = $info['icon'];
                                        $link = $info['link'];
                                    ?>
                                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] == '_blank' ? "_blank" : ""; ?>" class="d-flex align-items-center text-F0EBE2 dmb-15">
                                            <div class="contact-info d-inline-flex align-items-center justify-content-center">
                                                <?php if(!empty($icon)):?>
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="h-100">
                                                <?php endif; ?>
                                            </div>
                                            <div class="montserrat font16 leading24 text-F0EBE2 fw-normal ps-3">
                                                <?php echo $link['title']; ?>
                                            </div>
                                        </a>
                                    <?php endforeach; 
                                endif; ?>
                            </div>
                            <div class="social-icons">
                                <?php if(!empty($social_icons)):
                                    foreach($social_icons as $media):
                                        $icon = $media['icon'];
                                        $url = $media['url'];
                                    ?>
                                        <a href="<?php echo $url; ?>" target="_blank" class="social-icon text-decoration-none d-inline-flex align-items-center justify-content-center rounded-pill me-2">
                                            <div class="social-img d-inline-flex">
                                                <?php if(!empty($icon)):?>
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="h-100">
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    <?php endforeach; 
                                endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 tmb-60">
                <?php if(!empty($footer_menu_items)):
                    $menu_heading = $footer_menu_items['menu_heading'];
                    $menu_links = $footer_menu_items['menu_links'];
                ?>
                    <div class="montserrat font16 leading24 text-F0EBE2 fw-medium dmb-25"><?php echo $menu_heading; ?></div>
                    <ul class="list-none ps-0 mb-0">
                        <?php if(!empty($menu_links)):
                            foreach($menu_links as $link):
                                $menu_link = $link['menu_link'];
                            ?>
                            <li class="dmb-15">
                                <a href="<?php echo $menu_link['url']; ?>" target="<?php echo $menu_link['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none montserrat font14 leading20 text-F0EBE2 fw-normal">
                                    <?php echo $menu_link['title']; ?>
                                </a>
                            </li>
                            <?php endforeach;
                        endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 ps-lg-3">
                <?php if(!empty($newsletter_form)):
                    $heading = $newsletter_form['heading'];
                    $description = $newsletter_form['description']; 
                ?>
                    <div class="playfair-regular font32 leading34 res-font28 res-leading35 text-F0EBE2 dmb-10">
                        <?php echo $heading; ?>
                    </div>
                    <div class="montserrat font16 leading20 text-F0EBE2 fw-normal tmb-35 dmb-25">
                        <?php echo $description; ?>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="1b92a06" title="Newsletter Form"]'); ?>
                    <div class="montserrat font13 leading18 res-font12 text-F0EBE2 opacity-25 fw-normal">By subscribing, you consent to our Privacy Policy and agree to receive updates.</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="divider"></div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between tpt-20 dpt-30">
            <div class="montserrat font14 leading20 res-font12 res-leading18 text-F0EBE2 fw-normal">
                © <?php echo current_time('Y'); ?> <?php echo $copyright; ?>
            </div>
            <ul class="footer-menu list-none ps-0 mb-0 d-flex">
                <?php if(!empty($footer_menus)):
                    foreach($footer_menus as $link):
                        $menu_link = $link['menu_link'];
                    ?>
                        <li class="ps-4">
                            <a href="<?php echo $menu_link['url']; ?>" target="<?php echo $menu_link['target'] == '_blank' ? "_blank" : ""; ?>" class="montserrat font14 leading20 res-font12 res-leading18  text-F0EBE2 fw-normal text-nowrap">
                                <?php echo $menu_link['title']; ?>
                            </a>
                        </li>
                    <?php endforeach;
                endif; ?>
            </ul>
        </div>
    </div>
</footer>