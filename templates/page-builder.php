<?php

/* Template Name: Page Builder */

?>
<?php if (have_rows("flexible_content")):
    while (have_rows("flexible_content")):
        the_row();
        if (get_row_layout() == 'hero_section'):
            $background_image = get_sub_field('background_image');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $youtube = get_sub_field('youtube');
            $vimeo = get_sub_field('vimeo');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
?>
            <!-- hero-section -->
            <section class="hero-section h-vh position-relative overflow-hidden">
                <?php if (!empty($background_image) && $background_image == "Image" && !empty($image)): ?>
                    <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 h-100 object-cover">
                <?php elseif (!empty($background_image) && $background_image == "Video" && !empty($video)): ?>
                    <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                        class="w-100 h-100 object-cover" data-object-fit="cover">
                        <source src="<?php echo $video['url'] ?>" data-wf-ignore="true" />
                    </video>
                <?php elseif (!empty($background_image) && $background_image == "Youtube" && !empty($youtube)): ?>
                    <?php if ($youtube) :
                        $video_id = get_youtube_video_id($youtube);
                        $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1&loop=1&playlist={$video_id}&mute=1&controls=0&rel=0&modestbranding=1&disablekb=1&fs=0&iv_load_policy=3";
                    ?>
                        <iframe class="w-100 h-100 object-cover"
                            src="<?php echo esc_url($embed_url); ?>"
                            frameborder="0"
                            allow="autoplay; encrypted-media; clipboard-write; accelerometer; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    <?php endif; ?>
                <?php elseif (!empty($background_image) && $background_image == "Vimeo" && !empty($vimeo)): ?>
                    <?php if ($vimeo):
                        $embed_url = convert_vimeo_to_embed($vimeo);
                        $video_id = get_vimeo_video_id($vimeo_url);
                    ?>
                        <iframe class="w-100 h-100 object-cover" src="<?php echo esc_url($embed_url); ?>?autoplay=1&loop=1&muted=1&background=1&controls=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50 z-1"></div>
                <div class="position-absolute bottom-0 start-0 w-100 z-2 dpb-55 tpb-45">
                    <div class="container container2">
                        <?php if (!empty($heading)): ?>
                            <div class="col-lg-8 main-title playfair-regular font64 leading68 res-font35 res-leading40 text-F0EBE2 dmb-45 tmb-30">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="divider"></div>
                        <div class="dmt-40 d-lg-flex align-items-center justify-content-between tmt-20">
                            <?php if (!empty($description)): ?>
                                <div class="col-lg-4 montserrat font16 leading24 res-font14 res-leading20 text-F0EBE2 fw-normal pe-lg-5 pe-3 tmb-25">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-F0EBE2-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                    <?php echo $button['title']; ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/polygon.svg" alt="polygon" class="ms-2 play-icon">
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left_right_content_section'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
        ?>
            <!-- left-right-content-section -->
            <section class="left-right-content-section">
                <div class="container container2">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <?php if (!empty($heading)): ?>
                                <div class="main-title playfair-regular font48 leading52 res-font35 res-leding40 text-black dmb-25 tmb-15">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-lg-inline-flex d-none">
                                <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                        <?php echo $button['title']; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="divider divider-black-11 d-lg-block d-none"></div>
                            <div class="dmt-30 tmt-0">
                                <?php if (!empty($description)): ?>
                                    <div class="montserrat font14 leading21 text-black fw-normal pe-lg-4 tmb-25">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="d-lg-none d-inline-flex">
                                    <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                        <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                            <?php echo $button['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'showcase_slider_section'):
            $main_heading = get_sub_field('main_heading');
            $button = get_sub_field('button');
            $all_or_select = get_sub_field('all_or_select');
            $case_study_object = get_sub_field('case_study_object');
        ?>
            <!-- showcase-slider-section -->
            <section class="showcase-slider-section marquee-section position-relative overflow-hidden">
                <div class="container container2">
                    <div class="d-lg-flex align-items-center justify-content-between tmb-35 dmb-55">
                        <?php if (!empty($main_heading)): ?>
                            <div class="playfair-regular font48 leading52 res-font36 res-leading45 text-black">
                                <?php echo $main_heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="d-lg-inline-flex d-none">
                            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="marquee-wrapper marquee-left position-relative overflow-hidden w-100 dmb-15">
                    <div class="marquee d-flex" id="caseContainer">
                        <?php if (!empty($all_or_select) && $all_or_select == "All"): ?>

                        <?php else: ?>
                            <?php if (!empty($case_study_object)):
                                foreach ($case_study_object as $object):
                                    $case_id = $object->ID;
                                    $image = get_the_post_thumbnail_url($case_id, 'medium');
                                    $heading = get_the_title($case_id);
                                    $description = get_the_excerpt($case_id);
                            ?>
                                    <div class="marquee-item px-lg-2">
                                        <div class="member position-relative radius5 overflow-hidden d-flex align-items-center justify-content-center w-100 h-100">
                                            <a class="member-link d-block w-100 h-100" href="<?php echo get_the_permalink($case_id); ?>">
                                                <?php if (!empty($image)): ?>
                                                    <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
                                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity35 z-1"></div>
                                                    <div class="member-details position-absolute start-0 bottom-0 w-100 d-flex flex-column justify-content-end tpb-25 dpb-40 z-3">
                                                        <?php if (!empty($heading)): ?>
                                                            <div class="montserrat font28 leading34 res-font22 res-leading30 text-F0EBE2 fw-normal dmb-10">
                                                                <?php echo $heading; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($description)): ?>
                                                            <div class="montserrat font16 leading24 res-font14 res-leading20 text-F0EBE2 fw-normal">
                                                                <?php echo $description; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                            <?php endforeach;
                                wp_reset_postdata();
                            endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="marquee-wrapper marquee-right position-relative overflow-hidden w-100 dmb-15">
                    <div class="marquee d-flex" id="caseRightContainer">
                        <?php if (!empty($all_or_select) && $all_or_select == "All"): ?>

                        <?php else: ?>
                            <?php if (!empty($case_study_object)):
                                foreach ($case_study_object as $object):
                                    $case_id = $object->ID;
                                    $image = get_the_post_thumbnail_url($case_id, 'medium');
                                    $heading = get_the_title($case_id);
                                    $description = get_the_excerpt($case_id);
                            ?>
                                    <div class="marquee-item px-lg-2">
                                        <div class="member position-relative radius5 overflow-hidden d-flex align-items-center justify-content-center w-100 h-100">
                                            <a class="member-link d-block w-100 h-100" href="<?php echo get_the_permalink($case_id); ?>">
                                                <?php if (!empty($image)): ?>
                                                    <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
                                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity35 z-1"></div>
                                                    <div class="member-details position-absolute start-0 bottom-0 w-100 d-flex flex-column justify-content-end tpb-25 dpb-40 z-3">
                                                        <?php if (!empty($heading)): ?>
                                                            <div class="montserrat font28 leading34 res-font22 res-leading30 text-F0EBE2 fw-normal dmb-10">
                                                                <?php echo $heading; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($description)): ?>
                                                            <div class="montserrat font16 leading24 res-font14 res-leading20 text-F0EBE2 fw-normal">
                                                                <?php echo $description; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                            <?php endforeach;
                                wp_reset_postdata();
                            endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-inline-flex d-lg-none justify-content-center w-100 tmt-45">
                    <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                        <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                            <?php echo $button['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </section>

            <script id="case-template" type="text/x-handlebars-template">
                {{#each posts}}
                    <div class="marquee-item px-lg-2">
                        <div class="member position-relative radius5 overflow-hidden d-flex align-items-center justify-content-center w-100 h-100">
                            <a class="member-link d-block w-100 h-100" href="{{link}}">
                                <img src="{{image}}" alt="{{title}}" class="w-100 h-100 object-cover">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity35 z-1"></div>
                                <div class="member-details position-absolute start-0 bottom-0 w-100 d-flex flex-column justify-content-end tpb-25 dpb-40 z-3">
                                    <div class="montserrat font28 leading34 res-font22 res-leading30 text-F0EBE2 fw-normal dmb-10">
                                        {{title}}
                                    </div>
                                    <div class="montserrat font16 leading24 res-font14 res-leading20 text-F0EBE2 fw-normal">
                                        {{content}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                {{/each}}
            </script>

        <?php elseif (get_row_layout() == 'service_section'):
            $background_color = get_sub_field('background_color');
            $main_heading = get_sub_field('main_heading');
            $button = get_sub_field('button');
            $all_or_select = get_sub_field('all_or_select');
            $service_object = get_sub_field('service_object');

            $bg_color = "";
            if ($background_color == "Default") {
                $bg_color = "";
            } elseif ($background_color == "Pink") {
                $bg_color = "bg-AF9DA3";
            } elseif ($background_color == "Green") {
                $bg_color = "bg-303E3D";
            }
        ?>
            <!-- services-section -->
            <section class="services-section <?php echo $bg_color; ?> position-relative overflow-hidden">
                <div class="container container2">
                    <div class="d-lg-flex align-items-center justify-content-between dmb-70 tmb-35">
                        <?php if (!empty($main_heading)): ?>
                            <div class="playfair-regular font48 leading52 res-font34 res-leading45 text-F0EBE2">
                                <?php echo $main_heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="d-lg-inline-flex d-none">
                            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-DEE5DA-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (!empty($all_or_select) && $all_or_select == "All"): ?>
                        <div class="service-container" id="serviceContainer">

                        </div>

                        <script id="service-template" type="text/x-handlebars-template">
                            <div class="service-images position-relative">
                                    {{#each posts}}
                                        <img src="{{image}}" alt="{{title}}" data-image="{{title}}" class="position-absolute">
                                    {{/each}}
                                </div>
                                    <div class="services-wrapper">
                                        {{#each posts}}
                                            <a href="{{link}}" class="service-cards d-block text-decoration-none">
                                                <div class="service-card dpt-25 dpb-25 tpt-20 tpb-20" data-label="{{title}}">
                                                    <div class="service-title montserrat font40 leading45 res-font26 res-leading34 fw-medium text-F0EBE2 position-relative d-flex align-items-center">
                                                        <div class="service-number text-AB985F me-lg-4">{{inc @index}}.0</div>
                                                        {{title}}
                                                    </div>
                                                </div>
                                            </a>
                                        {{/each}}
                                    </div> 
                                </script>
                    <?php else: ?>
                        <div class="service-container">
                            <div class="service-images position-relative">
                                <?php if (!empty($service_object)):
                                    foreach ($service_object as $key => $service):
                                        $service_id = $service->ID;
                                        $image = get_the_post_thumbnail_url($service_id, 'medium');
                                        $heading = get_the_title($service_id);
                                ?>
                                        <?php if (!empty($image)): ?>
                                            <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>" data-image="<?php echo $heading; ?>" class="position-absolute">
                                        <?php endif; ?>
                                <?php endforeach;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>

                            <div class="services-wrapper">
                                <?php if (!empty($service_object)):
                                    foreach ($service_object as $key => $service):
                                        $service_id = $service->ID;
                                        $link = get_the_permalink($service_id);
                                        $heading = get_the_title($service_id);
                                ?>
                                        <a href="<?php echo $link; ?>" class="service-cards d-block text-decoration-none">
                                            <div class="service-card dpt-25 dpb-25" data-label="<?php echo $heading; ?>">
                                                <?php if (!empty($heading)): ?>
                                                    <div class="service-title montserrat font40 leading45 fw-medium text-F0EBE2 position-relative d-flex align-items-center">
                                                        <div class="service-number text-AB985F me-4"> <?php echo ($key + 1) . '.0'; ?></div>
                                                        <?php echo $heading; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                <?php endforeach;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'blog_slider_section'):
            $main_heading = get_sub_field('main_heading');
            $button = get_sub_field('button');
            $all_or_select = get_sub_field('all_or_select');
            $blog_post = get_sub_field('blog_post');
        ?>
            <!-- blog-slider-section -->
            <section class="blog-slider-section position-relative overflow-hidden">
                <div class="container container2">
                    <div class="d-lg-flex align-items-center justify-content-between tmb-35 dmb-50">
                        <?php if (!empty($main_heading)): ?>
                            <div class="playfair-regular font48 leading52 res-font36 res-leading45 text-black">
                                <?php echo $main_heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="d-lg-flex d-none align-items-center">
                            <div class="blog-dots me-4"></div>
                            <div class="d-lg-inline-flex d-none">
                                <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                        <?php echo $button['title']; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($all_or_select) && $all_or_select == "All"): ?>
                        <div class="col-lg-12 col-11 pe-3 pe-lg-0" id="blogContainer"></div>

                        <script id="post-template" type="text/x-handlebars-template">
                            {{#each posts}}
                                {{#if (lt @index 6)}}
                                    <div class="blog-cards">
                                        <div class="blog-img radius5 overflow-hidden dmb-25">
                                            <img src="{{image}}" alt="{{title}}" class="w-100 h-100 object-cover">
                                        </div>
                                        <div class="d-flex justify-content-between dmb-25 tmb-20">
                                            {{#each categories}}
                                                <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                                    {{name}}
                                                </div>
                                            {{/each}}
                                            {{#if reading_time}}
                                                <div class="post-time position-relative montserrat font12 leading21 fw-normal text-black">
                                                    {{reading_time}} min read
                                                </div>
                                            {{/if}}
                                        </div>
                                        <div class="pe-4">
                                            <div class="montserrat font24 leading34 res-font20 res-leading28 text-black fw-medium dmb-10">
                                                {{title}}
                                            </div>
                                            <div class="montserrat font14 leading20 text-black fw-normal pe-3">
                                                {{content}}
                                            </div>
                                            <a href="{{link}}" class="montserrat font15 leading20 text-black fw-normal d-inline-flex dmt-25 tmt-20">
                                                Read more
                                            </a>
                                        </div>
                                    </div>
                                {{/if}}
                            {{/each}}
                        </script>
                    <?php else: ?>
                        <div class="blog-slider col-lg-12 col-11 pe-3 pe-lg-0">
                            <?php if (!empty($blog_post)):
                                foreach ($blog_post as $blog):
                                    $blog_id = $blog->ID;
                                    $link = get_the_permalink($blog_id);
                                    $image = get_the_post_thumbnail_url($blog_id, 'medium');
                                    $heading = get_the_title($blog_id);
                                    $description = get_the_excerpt($blog_id);
                                    $category = get_the_category($blog_id);

                                    $news_group = get_field('news_group', $blog_id);
                            ?>
                                    <div class="blog-cards">
                                        <div class="blog-img radius5 overflow-hidden dmb-25">
                                            <?php if (!empty($image)): ?>
                                                <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-between dmb-25 tmb-20">
                                            <?php if (!empty($category)):
                                                foreach ($category as $cat): ?>
                                                    <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                                        <?php echo $cat->name; ?>
                                                    </div>
                                            <?php endforeach;
                                            endif; ?>
                                            <?php if (!empty($news_group)):
                                                $reading_time = get_full_group_reading_time($news_group);
                                            ?>
                                                <div class="post-time position-relative montserrat font12 leading21 fw-normal text-black">
                                                    <?php echo $reading_time; ?> min read
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pe-4">
                                            <?php if (!empty($heading)): ?>
                                                <div class="montserrat font24 leading34 text-black res-font20 res-leading28 fw-medium dmb-10">
                                                    <?php echo $heading; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($description)): ?>
                                                <div class="montserrat font14 leading20 text-black fw-normal pe-3">
                                                    <?php echo $description; ?>
                                                </div>
                                            <?php endif; ?>
                                            <a href="<?php echo $link; ?>" class="montserrat font15 leading20 text-black fw-normal d-inline-flex dmt-25 tmt-20">
                                                Read more
                                            </a>
                                        </div>
                                    </div>
                            <?php endforeach;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="d-lg-none d-flex flex-column align-items-center justify-content-center tmt-40">
                        <div class="blog-dots me-4"></div>
                        <div class="d-inline-flex tmt-35">
                            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
            </section>


        <?php elseif (get_row_layout() == 'banner_section'):
            $image = get_sub_field('image');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
        ?>
            <!-- banner-section -->
            <section class="banner-section position-relative overflow-hidden">
                <?php if (!empty($image)): ?>
                    <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
                <?php endif; ?>
                <div class="position-absolute bottom-0 start-0 w-100 dpb-85 tpb-35">
                    <div class="container container2">
                        <div class="d-lg-flex align-items-end justify-content-between">
                            <div class="col-lg-6">
                                <?php if (!empty($heading)): ?>
                                    <div class="playfair-regular font48 leading48 res-font36 res-leading42 text-white dmb-25 ">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($description)): ?>
                                    <div class="montserrat font18 leading27 res-font16 text-white fw-normal tmb-25">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-DEE5DA-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'sub_hero_section'):
            $background_color = get_sub_field('background_color');
            $prefix = get_sub_field('prefix');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
            $background_image = get_sub_field('background_image');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $youtube = get_sub_field('youtube');
            $vimeo = get_sub_field('vimeo');
        ?>
            <!-- sub-hero-section -->
            <section class="sub-hero-section <?php echo $bg_color; ?> position-relative overflow-hidden">
                <div class="container">
                    <div class="d-lg-flex dmb-45">
                        <div class="col-lg-6 col-8">
                            <?php if (!empty($prefix)): ?>
                                <div class="">
                                    <?php echo $prefix; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($heading)): ?>
                                <div class="playfair-regular font56 leading68 res-font36 res-leading45 text-F0EBE2">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <?php if (!empty($description)): ?>
                                <div class="montserrat font18 leading27 text-F0EBE2 fw-normal">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="sub-hero-img">
                    <?php if (!empty($background_image) && $background_image == "Image" && !empty($image)): ?>
                        <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 h-100 object-cover">
                    <?php elseif (!empty($background_image) && $background_image == "Video" && !empty($video)): ?>
                        <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                            class="w-100 h-100 object-cover" data-object-fit="cover">
                            <source src="<?php echo $video['url'] ?>" data-wf-ignore="true" />
                        </video>
                    <?php elseif (!empty($background_image) && $background_image == "Youtube" && !empty($youtube)): ?>
                        <?php if ($youtube) :
                            $video_id = get_youtube_video_id($youtube);
                            $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1&loop=1&playlist={$video_id}&mute=1&controls=0&rel=0&modestbranding=1&disablekb=1&fs=0&iv_load_policy=3";
                        ?>
                            <iframe class="w-100 h-100 object-cover"
                                src="<?php echo esc_url($embed_url); ?>"
                                frameborder="0"
                                allow="autoplay; encrypted-media; clipboard-write; accelerometer; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        <?php endif; ?>
                    <?php elseif (!empty($background_image) && $background_image == "Vimeo" && !empty($vimeo)): ?>
                        <?php if ($vimeo):
                            $embed_url = convert_vimeo_to_embed($vimeo);
                            $video_id = get_vimeo_video_id($vimeo_url);
                        ?>
                            <iframe class="w-100 h-100 object-cover" src="<?php echo esc_url($embed_url); ?>?autoplay=1&loop=1&muted=1&background=1&controls=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'about_left_right_section'):
            $background_color = get_sub_field('background_color');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');

            $bg_color = "";
            if ($background_color == "Default") {
                $bg_color = "";
            } elseif ($background_color == "Pink") {
                $bg_color = "bg-AF9DA3";
            } elseif ($background_color == "Green") {
                $bg_color = "bg-303E3D";
            }
        ?>
            <!-- about-left-right-section -->
            <section class="about-left-right-section <?php echo $bg_color; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-lg-9">
                                <?php if (!empty($heading)): ?>
                                    <div class="playfair-regular font48 leading52 res-font35 res-leading42 text-F0EBE2 dmb-30 tmb-15">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="d-lg-inline-flex d-none">
                                    <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                        <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-F0EBE2-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                            <?php echo $button['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if (!empty($description)): ?>
                                <div class="montserrat font14 leading21 text-F0EBE2 fw-normal pe-lg-4 pe-3">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-lg-none d-inline-flex tpt-30">
                                <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-F0EBE2-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                        <?php echo $button['title']; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'our_team_section'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');

            $args = array(
                'post_type' => 'teams', // your CPT name
                'posts_per_page' => -1
            );

            $query = new WP_Query($args);
        ?>
            <!-- our-team-section -->
            <section class="our-team-section position-relative">
                <div class="container">
                    <div class="col-lg-6 dmb-45 tmb-35">
                        <?php if (!empty($heading)): ?>
                            <div class="playfair-regular font48 leading52 res-font36 res-leading45 text-black dmb-10 tmb-15">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <div class="montserrat font18 leading27 res-font16 text-black fw-normal">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row row14 res-row5">
                        <?php if ($query->have_posts()):
                            while ($query->have_posts()):
                                $query->the_post();
                                $team_id = get_the_ID();

                                $image = get_the_post_thumbnail_url($team_id, 'medium_large');
                                $member_name = get_the_title();
                                $member_position = get_the_excerpt();
                        ?>
                                <div class="col-xl-3 col-md-4 col-6 team-card tmt-30 dmt-45">
                                    <?php if (!empty($image)): ?>
                                        <div class="team-img dmb-15">
                                            <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>" class="w-100 h-100 object-cover">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($member_name)): ?>
                                        <div class="montserrat font20 leading28 res-font18 text-303E3D fw-medium">
                                            <?php echo $member_name; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($member_position)): ?>
                                        <div class="montserrat font18 leading28 res-font14 text-black opacity30 fw-normal">
                                            <?php echo $member_position; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                        <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'expertise_section'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
            $expertise_cards = get_sub_field('expertise_cards');
        ?>
            <!-- expertise-section -->
            <section class="expertise-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-lg-10 pe-3">
                                <?php if (!empty($heading)): ?>
                                    <div class="playfair-regular font48 leading48 res-font36 res-leading40 text-black dmb-15 tpb-60 tmb-0">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($description)): ?>
                                    <div class="montserrat font18 leading27 text-black fw-normal">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="dmt-30 d-lg-inline-flex d-none">
                                    <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                        <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                            <?php echo $button['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-5">
                            <?php if (!empty($expertise_cards)):
                                foreach ($expertise_cards as $cards):
                                    $heading = $cards['heading'];
                                    $description = $cards['description'];
                            ?>
                                    <div class="expertise-card dpt-45 dpb-45 tpb-35">
                                        <?php if (!empty($heading)): ?>
                                            <div class="montserrat font32 leading34 res-font22 res-leading27 text-303E3D fw-medium dmb-15 tmb-10">
                                                <?php echo $heading; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($description)): ?>
                                            <div class="montserrat font16 leading24 res-font14 res-leading21 text-303E3D fw-normal pe-3">
                                                <?php echo $description; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'creative_showcase_section'):
            $background_color = get_sub_field('background_color');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');

            $bg_color = "";
            if ($background_color == "Default") {
                $bg_color = "";
            } elseif ($background_color == "Pink") {
                $bg_color = "bg-AF9DA3";
            } elseif ($background_color == "Green") {
                $bg_color = "bg-303E3D";
            }
        ?>
            <!-- creative-showcase-section -->
            <section class="creative-showcase-section <?php echo $bg_color; ?> overflow-hidden">
                <div class="container">
                    <div class="dmb-35 ">
                        <?php if (!empty($heading)): ?>
                            <div class="playfair-regular font56 leading68 res-font36 res-leading45 text-F0EBE2 tmb-15">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <div class="montserrat font18 leading27 res-font16 text-F0EBE2 fw-normal pe-lg-0 pe-3">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="case-wrapper position-relative" id="caseCardContainer"></div>

                    <script id="case-template" type="text/x-handlebars-template">
                        {{#each posts}}
                            <div class="showcase-cards position-relative w-100 <?php echo $bg_color; ?>  dpt-50 dpb-50 tpt-25 tpb-45">
                                <div class="showcase-card d-flex flex-lg-row flex-column">
                                    <div class="col-lg-6 pe-lg-5">
                                        <div class="showcase-img w-100">
                                            <img src="{{image}}" alt="" class="w-100 h-100 object-cover">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ps-lg-5">
                                        <div class="h-100 d-flex flex-column justify-content-between dpt-25 dpb-35 tpb-0">
                                            <div class="d-flex flex-wrap align-items-center tmb-30">
                                                {{#each categories}}
                                                    <div class="montserrat font13 leading20 text-F0EBE2 fw-normal border-F0EBE2-25 text-capitalize rounded-pill px-4 py-1 me-2 tmb-10">
                                                        {{name}}
                                                    </div>
                                                {{/each}}
                                            </div>
                                            <div class="">
                                                <div class="montserrat font32 leading42 res-font24 res-leading30 text-F0EBE2 fw-normal dmb-10">
                                                    {{title}}
                                                </div>
                                                <div class="montserrat font16 leading24 res-font14 res-leading20 text-F0EBE2 fw-normal dmb-25">
                                                    {{content}}
                                                </div>
                                                <a href="{{link}}" class="text-decoration-none btnA bg-DEE5DA-btn montserrat fw-medium font15 leading18 text-uppercase d-inline-flex align-items-center rounded-pill">
                                                    View PROJECT
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{/each}}
                    </script>

                </div>
            </section>


        <?php elseif (get_row_layout() == 'latest_blog_section'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
        ?>
            <!-- latest-blog-section -->
            <section class="latest-blog-section">
                <div class="container">
                    <div class="dmb-55 tmb-40">
                        <?php if (!empty($heading)): ?>
                            <div class="playfair-regular font56 leading68 res-font40 res-leading48 text-black text-capitalize dmb-10 tmb-15">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <div class="montserrat font18 leading27 res-font16 text-black fw-normal">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="" id="postContainer">
                    </div>

                    <script id="post-template" type="text/x-handlebars-template">
                        <div class="row row16">
                                {{#each posts}}
                                    {{#if (eq @index 0)}}
                                        <div class="col-lg-6 left-blog-cards">
                                            <div class="post-cards">
                                                <div class="post-img radius5 overflow-hidden dmb-25">
                                                    <img src="{{image}}" alt="{{title}}" class="w-100 h-100 object-cover">
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between tmb-25 dmb-15">
                                                    {{#each categories}}
                                                        <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                                            {{name}}
                                                        </div>
                                                    {{/each}}
                                                    {{#if reading_time}}
                                                        <div class="post-time position-relative montserrat font12 leading21 fw-normal text-black">
                                                            {{reading_time}} min read
                                                        </div>
                                                    {{/if}}
                                                </div>
                                                <div class="pe-4">
                                                    <div class="montserrat font24 leading34 res-font22 res-leading30 text-black fw-medium dmb-10">
                                                        {{title}}
                                                    </div>
                                                    <div class="col-lg-9 montserrat font14 leading20 text-black fw-normal pe-lg-3">
                                                        {{content}}
                                                    </div>
                                                    <a href="{{link}}" class="montserrat font15 leading20 text-black fw-normal d-inline-flex tmt-5 dmt-10">
                                                        Read more
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {{/if}}
                                {{/each}}
                                <div class="col-lg-6 right-blog-cards">
                                    {{#each posts}}
                                        {{#if (and (gt @index 0) (lt @index 4))}}
                                        <div class="post-cards d-flex flex-column flex-lg-row align-items-center tmt-45 dmt-30">
                                            <div class="col-12 col-lg-6 pe-lg-4">
                                                <div class="post-img w-100 radius5 overflow-hidden tmb-25">
                                                    <img src="{{image}}" alt="{{title}}" class="w-100 h-100 object-cover">
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="d-flex align-items-center justify-content-between tmb-25 dmb-15">
                                                    {{#each categories}}
                                                        <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                                            {{name}}
                                                        </div>
                                                    {{/each}}
                                                    {{#if reading_time}}
                                                        <div class="post-time position-relative montserrat font12 leading21 fw-normal text-black">
                                                            {{reading_time}} min read
                                                        </div>
                                                    {{/if}}
                                                </div>
                                                <div class="pe-4">
                                                    <div class="montserrat font24 leading34 res-font22 res-leading30 text-black fw-medium tmb-10 dmb-15">
                                                        {{title}}
                                                    </div>
                                                    <div class="col-lg-9 montserrat font14 leading20 text-black fw-normal pe-lg-3 d-lg-none d-block">
                                                        {{content}}
                                                    </div>
                                                    <a href="{{link}}" class="montserrat font15 leading20 text-black fw-normal d-inline-flex tmt-5 dmt-10">
                                                        Read more
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        {{/if}}
                                    {{/each}}
                                </div>
                            </div>
                            <div class="row row16">
                                {{#each posts}}
                                    {{#if (gt @index 3)}}
                                        <div class="col-lg-4 post-cards tmt-45 dmt-55">
                                            <div class="post-img radius5 overflow-hidden dmb-25">
                                                <img src="{{image}}" alt="{{title}}" class="w-100 h-100 object-cover">
                                            </div>
                                            <div class="d-flex justify-content-between dmb-25">
                                                {{#each categories}}
                                                    <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                                        {{name}}
                                                    </div>
                                                {{/each}}
                                                {{#if reading_time}}
                                                    <div class="post-time position-relative montserrat font12 leading21 fw-normal text-black">
                                                        {{reading_time}} min read
                                                    </div>
                                                {{/if}}
                                            </div>
                                            <div class="pe-4">
                                                <div class="montserrat font24 leading34 res-font22 res-leading30 text-black fw-medium dmb-10">
                                                    {{title}}
                                                </div>
                                                <div class="montserrat font14 leading20 text-black fw-normal pe-lg-3">
                                                    {{content}}
                                                </div>
                                                <a href="{{link}}" class="montserrat font15 leading20 text-black fw-normal d-inline-flex tmt-5 dmt-25">
                                                    Read more
                                                </a>
                                            </div>
                                        </div>
                                    {{/if}}
                                {{/each}}
                            </div>
                        </script>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'recent_service_section'):
            $heading = get_sub_field('heading');
            $button = get_sub_field('button');

            $current_post_id = get_the_ID();

            $args = array(
                'post_type'      => 'services',
                'posts_per_page' => -1,
                'post__not_in'   => array($current_post_id),
            );

            $query = new WP_Query($args);
        ?>
            <!-- recent-slider-section -->
            <section class="recent-slider-section position-relative overflow-hidden">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between dmb-50">
                        <?php if (!empty($heading)): ?>
                            <div class="playfair-regular font48 leading52 text-black">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex align-items-center">
                            <div class="service-dots me-4"></div>
                            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-transparent-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                    <?php echo $button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-10 pe-5">
                        <div class="col-12 pe-4 recent-service-slider">
                            <?php if ($query->have_posts()):
                                while ($query->have_posts()): $query->the_post();
                                    $service_id = get_the_ID();
                                    $link = get_the_permalink($service_id);
                                    $image = get_the_post_thumbnail_url($service_id, 'medium');
                            ?>
                                    <a href="<?php echo $link; ?>" class="service-image h-100">
                                        <?php if (!empty($image)): ?>
                                            <img src="<?php echo $image; ?>" alt="" class="w-100 h-100 object-cover">
                                        <?php endif; ?>
                                    </a>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'contact_form_section'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $contact_information = get_sub_field('contact_information');
            $social_media = get_sub_field('social_media');
        ?>
            <!-- contact-section -->
            <section class="contact-section bg-303E3D position-relative overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if (!empty($heading)): ?>
                                <div class="playfair-regular font56 leading68 text-F0EBE2 text-capitalize dmb-10">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($description)): ?>
                                <div class="montserrat font18 leading27 text-F0EBE2 fw-normal dmb-40">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                            <div class="contact-information dmb-40">
                                <?php if (!empty($contact_information)):
                                    foreach ($contact_information as $info):
                                        $icon = $info['icon'];
                                        $link = $info['link'];
                                ?>
                                        <a href="<?php echo $link['url']; ?>" class="d-flex align-items-center text-F0EBE2 dmb-15">
                                            <div class="contact-info d-inline-flex align-items-center justify-content-center">
                                                <?php if (!empty($icon)): ?>
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="h-100">
                                                <?php endif; ?>
                                            </div>
                                            <div class="montserrat font16 leading24 res-font14 res-leading20 text-F0EBE2 fw-normal ps-3">
                                                <?php echo $link['title']; ?>
                                            </div>
                                        </a>
                                <?php endforeach;
                                endif; ?>
                            </div>
                            <div class="social-icons">
                                <?php if (!empty($social_media)):
                                    foreach ($social_media as $media):
                                        $icon = $media['icon'];
                                        $url = $media['url'];
                                ?>
                                        <a href="<?php echo $url; ?>" target="_blank" class="social-icon text-decoration-none d-inline-flex align-items-center justify-content-center rounded-pill me-2">
                                            <div class="social-img d-inline-flex">
                                                <?php if (!empty($icon)): ?>
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="h-100">
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo do_shortcode('[contact-form-7 id="a487ced" title="Contact form"]'); ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'privacy_policy_section'):
            $privacy_group = get_sub_field('privacy_group');
        ?>
            <section class="privacy-section">
                <div class="container px-p-0">
                    <div class="row justify-content-between">
                        <div class="col-lg-3 tmb-85 ps-p-p">
                            <div class="position-sticky top-0">
                                <ul class="privacy-links list-none ps-0 mb-0 list-none d-flex flex-lg-column flex-row " id="privacy-links">
                                    <?php if (!empty($privacy_group)):
                                        foreach ($privacy_group as $key => $group):
                                            $heading = $group['heading'];
                                            $description = $group['description'];
                                    ?>
                                            <li class="dmb-5 dpt-10 dpb-10 mx-4 mx-lg-0">
                                                <?php if (!empty($heading)): ?>
                                                    <a href="#<?php echo sanitize_title($heading); ?>" class="menu-item montserrat font18 leading27 text-black fw-normal text-nowrap text-decoration-none">
                                                        <?php echo $heading; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </li>
                                    <?php endforeach;
                                    endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 ps-lg-3 px-p-p">
                            <div class="col-lg-11 ms-auto">
                                <?php if (!empty($privacy_group)):
                                    foreach ($privacy_group as $key => $group):
                                        $heading = $group['heading'];
                                        $description = $group['description'];
                                ?>
                                        <div class="privacy-content dmb-40" id="<?php echo sanitize_title($heading); ?>">
                                            <?php if (!empty($heading)): ?>
                                                <div class="playfair-regular font48 leading48 res-font40 text-black dmb-15 tmb-25">
                                                    <?php echo $heading; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($description)): ?>
                                                <div class="montserrat font16 leading24 res-font14 res-leading20 text-black fw-normal dmb-20 tmb-25 pe-lg-0 pe-3">
                                                    <?php echo $description; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'divider'): ?>
            <section class="divider divider-808080-25"></section>

        <?php elseif (get_row_layout() == 'spacing'):
            $background_color = get_sub_field('background_color');
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');
            $desktop_mb = $desktop['margin_bottom'];
            $desktop_mb_main = !empty($desktop['margin_bottom']) ? " dpb-" : "";
            $tablet_mb = $tablet['margin_bottom'];
            $tablet_mb_main = !empty($tablet['margin_bottom']) ? " tpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = !empty($mobile['margin_bottom']) ? " mpb-" : "";

            $bg_color = "";
            if ($background_color == "Default") {
                $bg_color = "";
            } elseif ($background_color == "Pink") {
                $bg_color = "bg-AF9DA3";
            } elseif ($background_color == "Green") {
                $bg_color = "bg-303E3D";
            }
        ?>
            <div class="spacing <?php echo $bg_color; ?> <?php
                                                            echo $desktop_mb_main;
                                                            echo $desktop_mb;
                                                            echo $tablet_mb_main;
                                                            echo $tablet_mb;
                                                            echo $mobile_mb_main;
                                                            echo $mobile_mb;
                                                            ?>  "></div>
        <?php endif; ?>
<?php endwhile;
endif; ?>