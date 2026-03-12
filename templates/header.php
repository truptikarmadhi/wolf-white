<?php
$white_logo = get_field('white_logo', 'options');
$black_logo = get_field('black_logo', 'options');
$header_menus = get_field('header_menus', 'options');
$header_button = get_field('header_button', 'options');

$header_color = get_field('header_color');

$header_bg = "";
if ($header_color == "Default") {
    $header_bg = "";
} elseif ($header_color == "Dark Header") {
    $header_bg = "dark-header";
}
?>

<header class="header <?php echo $header_bg; ?> position-fixed top-0 start-0 w-100 tpt-0 tpb-0 dpt-30 dpb-30">
    <div class="container res-h-100 px-p-0">
        <div class="header-container d-flex flex-column flex-lg-row justify-content-lg-between align-items-lg-center">
            <div class="header-logo-menu res-w-100 d-flex align-items-center justify-content-between px-p-p tpt-25 tpb-25">
                <a href="<?php echo get_home_url(); ?>" class="header-logo">
                    <?php if(!empty($white_logo)):?>
                        <img src="<?php echo $white_logo['url']; ?>" class="white-logo h-100" alt="<?php echo $white_logo['alt']; ?>" />
                    <?php endif; ?>
                    <?php if(!empty($black_logo)):?>
                        <img src="<?php echo $black_logo['url']; ?>" class="black-logo h-100" alt="<?php echo $black_logo['alt']; ?>" />
                    <?php endif; ?>
                </a>
                <div class="burger-menu d-lg-none d-flex align-items-center justify-content-center">
                    <div class="menu-icon d-inline-flex">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-menu.svg" class="h-100 w-100 white-icon" alt="white-menu" />
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/black-menu.svg" class="h-100 w-100 black-icon" alt="black-menu" />
                    </div>
                    <div class="close-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/close-icon.svg" class="h-100 w-100" alt="close-icon" />
                    </div>
                </div>
            </div>
            <div class="header-menu d-none d-lg-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-start align-items-lg-center px-p-p tpt-120 tpb-90">
                <ul class="d-flex flex-column flex-lg-row align-items-lg-center list-none ps-0 mb-0">
                    <?php if(!empty($header_menus)):
                        foreach($header_menus as $menus):
                            $link_or_submenu = $menus['link_or_submenu'];
                            $menu_link = $menus['menu_link'];
                            $menu_title = $menus['menu_title'];
                            $sub_menu_items = $menus['sub_menu_items'];
                        ?>
                            <?php if(!empty($link_or_submenu) && $link_or_submenu == "Link"):?>
                                <li class="menu-item mx-lg-3 tmb-35 position-relative">
                                    <?php if(!empty($menu_link['url']) && !empty($menu_link['title'])):?>
                                        <a href="<?php echo $menu_link['url']; ?>" target="<?php echo $menu_link['target'] == '_blank' ? "_blank" : ""; ?>" class="montserrat font15 leading18 res-font24 res-leading30 text-F0EBE2 fw-normal text-decoration-none text-nowrap text-uppercase">
                                            <?php echo $menu_link['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </li>   
                            <?php else:?>
                                <li class="menu-item mx-lg-3 tmb-35 position-relative">
                                    <?php if(!empty($menu_title)):?>
                                        <div class="montserrat font15 leading18 res-font24 res-leading30 text-F0EBE2 fw-normal text-decoration-none text-nowrap text-uppercase d-flex align-items-center">
                                            <?php echo $menu_title; ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/select-arrow.svg" alt="select-arrow" class="white-select ms-2">
                                            <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/dark-arrow.svg" alt="dark-arrow" class="dark-select ms-2">
                                        </div>
                                    <?php endif; ?>
                                    <div class="mega-menus border border-black bg-white position-absolute p-initial top-100 start-0 tmt-10 dmt-30 dpt-25 dpb-25 px-4 d-none">
                                        <ul class="list-none ps-0 mb-0">
                                            <?php if(!empty($sub_menu_items)):
                                                foreach($sub_menu_items as $menu_items):
                                                    $sub_menu_link = $menu_items['sub_menu_link'];
                                                ?>
                                                    <li class="dmb-15">
                                                        <a href="<?php echo $sub_menu_link['url']; ?>" target="<?php echo $sub_menu_link['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none montserrat font16 leading24 text-black fw-normal">
                                                            <?php echo $sub_menu_link['title']; ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach;
                                            endif; ?>
                                        </ul>
                                    </div>
                                </li>   
                            <?php endif; ?>
                        <?php endforeach;
                    endif; ?>
                </ul>
                <div class="header-btn d-flex ps-lg-4 ms-lg-2">
                    <?php if(!empty($header_button['url']) && !empty($header_button['title'])):?>
                        <a href="<?php echo $header_button['url']; ?>" target="<?php echo $header_button['target'] == '_blank' ? "_blank" : ""; ?>"
                            class="text-decoration-none btnA border-F0EBE2-btn montserrat font15 leading18 fw-normal text-uppercase text-nowrap rounded-pill d-inline-flex align-items-center transition">
                            <?php echo $header_button['title']; ?>
                        </a>
                     <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>