<?php 
$post_id = get_the_ID();
$heading = get_the_title($post_id);
$description = get_the_excerpt($post_id);
$thumbnail = get_the_post_thumbnail_url($post_id, 'fullscreen');
$categories = get_the_terms($post_id, 'category');

$member_name = get_field('member_name');
$news_group = get_field('news_group');
$recent_slider_section = get_field('recent_slider_section');

$current_post_id = get_the_ID();

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1, // sabhi posts
    'post__not_in'   => array($current_post_id) // current post exclude
);

$query = new WP_Query($args);
?>

<div class="spacing tpb-135 dpb-150"></div>

<!-- single-post-section -->
<section class="single-post-section">
    <div class="container">
        <div class="col-lg-8 px-lg-5 mx-auto d-flex flex-lg-row flex-column align-items-lg-end justify-content-between tmb-50 dmb-45">
            <div class="col-lg-9">
                <div class="d-inline-flex dmb-25">
                    <?php if(!empty($categories)):
                        foreach($categories as $cats):
                        ?>
                            <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                <?php echo $cats->name; ?>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
                <div class="playfair-regular font56 leading68 res-font40 res-leading48 text-black text-capitalize tmb-35">
                    <?php echo get_the_title($post_id); ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="col-lg-10 mx-lg-auto">
                    <div class="">
                        <?php if(!empty($member_name)):
                            $team_id = $member_name->ID;
                            $title = get_the_title($team_id);
                        ?>
                            <div class="montserrat font14 leading21 text-black fw-medium">
                                <?php echo $title; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex">
                        <div class="montserrat font14 leading21 fw-normal text-black opacity30 me-2">
                            <?php echo get_the_date('d M', $post_id); ?>
                        </div>
                        <div class="">
                            <?php if(!empty($news_group)):
                                $reading_time = get_full_group_reading_time($news_group);
                            ?>   
                                <div class="post-time position-relative montserrat font14 leading21 fw-normal text-black opacity30 ps-3">
                                    <?php echo $reading_time; ?> min read
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($thumbnail)):?>
            <div class="single-img tmb-25 dmb-60">
                <img src="<?php echo $thumbnail; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
            </div>
        <?php endif; ?>
        <?php if(!empty($news_group)):
            $news_main = $news_group['news_main'];
            $full_image = $news_group['full_image'];
            $news_content = $news_group['news_content'];
            $testimonial = $news_group['testimonial'];
            $news_description = $news_group['news_description'];
            $news_title_content = $news_group['news_title_content'];
        ?>
            <div class="col-lg-8 px-lg-5 mx-auto">
                <?php if(!empty($news_main)):
                    $heading = $news_main['heading'];
                    $content = $news_main['content'];
                ?>
                    <div class="tmb-45 dmb-65 pe-2 pe-lg-0 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <?php if(!empty($heading)):?>
                            <div class="montserrat font40 leading48 res-font32 res-leading40 text-black fw-medium tmb-15 dmb-25">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>    
                        <?php if(!empty($content)):?>
                            <div class="montserrat font16 leading24 res-font14 res-leading20 text-black fw-normal dmb-25">
                                <?php echo $content; ?>
                            </div>
                        <?php endif; ?>    
                    </div>
                <?php endif; ?>
                <?php if(!empty($full_image)):?>
                    <div class="single-post-img tmb-25 dmb-70 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <img src="<?php echo $full_image['sizes']['fullscreen']; ?>" alt="<?php echo $full_image['alt']; ?>" class="w-100 h-100 object-cover">
                    </div>
                <?php endif; ?>
                <?php if(!empty($news_content)):
                    $description = $news_content['description'];
                ?>
                    <div class="tmb-30 dmb-50 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <?php if(!empty($description)):?>
                            <div class="single-title montserrat font16 leading24 text-black fw-normal pe-2 pe-lg-0">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>    
                    </div>
                <?php endif; ?>
                <?php if(!empty($testimonial)):?>
                    <div class="single-testimonial position-relative playfair-regular font20 leading27 text-black tmb-40 dmb-35 pe-3 pe-lg-0 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <?php echo $testimonial; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($news_description)):?>
                    <div class="tmb-50 dmb-40 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                        <div class="montserrat font16 leading24 text-black fw-normal">
                            <?php echo $news_description; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($news_title_content)):
                    foreach($news_title_content as $content):
                        $heading = $content['heading'];
                        $description = $content['description'];
                    ?>
                        <div class="tmb-40 dmb-65 wow animated animate__fadeInUp" data-wow-duration="1.5s">
                            <?php if(!empty($heading)):?>
                                <div class="montserrat font32 leading42 res-font28 res-leading34 text-black fw-medium dmb-20">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>    
                            <?php if(!empty($description)):?>
                                <div class="montserrat font16 leading24 res-font14 res-leading20 text-black fw-normal">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>    
                        </div>
                    <?php endforeach;
                endif; ?>
                <div class="">
                    <?php echo do_shortcode('[ssba url=”http://simplesharebuttons.xn--com-9o0a title=”Simple Share Buttons”]');?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="spacing tmb-50 dmb-150"></div>

<?php if(!empty($recent_slider_section)):
    $heading = $recent_slider_section['heading'];
    $button = $recent_slider_section['button'];
?>
<div class="divider divider-808080-25"></div>

<div class="spacing tmb-70 dmb-105"></div>

<!-- recent-slider-section -->
<section class="recent-slider-section position-relative overflow-hidden wow animated animate__fadeInUp" data-wow-duration="1.5s">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between tmb-35 dmb-50">
            <?php if(!empty($heading)):?>
                <div class="playfair-regular font48 leading52 res-font36 res-leading40 text-black">
                    <?php echo $heading; ?>
                </div>
             <?php endif; ?>
             <div class="d-lg-flex d-none align-items-center">
                <div class="recent-dots me-lg-4 tmb-35"></div>
                <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                        <?php echo $button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-12 col-11 pe-3 pe-lg-0 recent-blog-slider">
            <?php if($query->have_posts()):
                while($query->have_posts()): $query->the_post(); 
                    $blog_id = get_the_ID();
                    $link = get_the_permalink($blog_id);
                    $image = get_the_post_thumbnail_url($blog_id, 'medium');
                    $heading = get_the_title($blog_id);
                    $description = get_the_excerpt($blog_id);
                    $category = get_the_category($blog_id);
                ?>
                    <div class="blog-cards">
                        <div class="blog-img radius5 overflow-hidden dmb-25">
                            <?php if(!empty($image)):?>
                                <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
                            <?php endif; ?>
                        </div>
                        <div class="d-flex justify-content-between dmb-25">
                            <?php if(!empty($category)):
                                foreach($category as $cat):?>
                                    <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill px-4 py-1">
                                        <?php echo $cat->name; ?>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                            <?php if(!empty($news_group)):
                                $reading_time = get_full_group_reading_time($news_group, $post_id   );
                            ?>   
                                <div class="post-time position-relative montserrat font12 leading21 fw-normal text-black">
                                    <?php echo $reading_time; ?> min read
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pe-4">
                            <?php if(!empty($heading)):?>
                                <div class="montserrat font24 leading34 text-black fw-medium dmb-10">
                                    <?php echo $heading; ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($description)):?>
                                <div class="montserrat font14 leading20 text-black fw-normal pe-3">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                            <a href="<?php echo $link; ?>" class="montserrat font15 leading20 text-black fw-normal d-inline-flex dmt-25">
                                Read more
                            </a>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div class="recent-slider-dots d-flex d-lg-none flex-column align-items-center tmt-40">
            <?php if (!empty($button['url']) && !empty($button['title'])): ?>
                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] == '_blank' ? "_blank" : ""; ?>" class="text-decoration-none btnA bg-AF9DA3-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                    <?php echo $button['title']; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<div class="spacing tmb-95 dmb-120"></div>