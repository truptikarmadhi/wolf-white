<?php
$case_id = get_the_ID();
$heading = get_the_title($case_id);
$description = get_the_excerpt($case_id);
$thumbnail = get_the_post_thumbnail_url($case_id, 'fullscreen');

$hero_section = get_field('hero_section');
$left_right_list_section = get_field('left_right_list_section');
$event_highlights_section = get_field('event_highlights_section');
$testimonial_section = get_field('testimonial_section');

$next_post = get_next_post();
?>


<!-- sub-hero-section -->
<?php if(!empty($hero_section)):
    $background_image = $hero_section['background_image'];
    $image = $hero_section['image'];
    $video = $hero_section['video'];
    $youtube = $hero_section['youtube'];
    $vimeo = $hero_section['vimeo'];
?>
    <section class="sub-hero-section bg-303E3D position-relative overflow-hidden dpt-260">
        <div class="container container2">
            <div class="d-flex align-items-end dmb-75">
                <div class="col-6">
                    <?php if(!empty($heading)):?>
                        <div class="playfair-regular font56 leading68 text-F0EBE2">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <div class="col-9 ms-auto">
                        <?php if(!empty($description)):?>
                            <div class="montserrat font18 leading27 text-F0EBE2 fw-normal">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-hero-img">
            <?php if(!empty($thumbnail)):?>
                <img src="<?php echo $thumbnail; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
            <?php else:?>    
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
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<div class="spacing dmb-95"></div>

<!-- left-right-list-section -->
<?php if(!empty($left_right_list_section)):
    $heading = $left_right_list_section['heading'];
    $description = $left_right_list_section['description'];
    $lists = $left_right_list_section['lists'];
?>
    <section class="left-right-list-section">
        <div class="container">
            <div class="row">
                <div class="col-7 pe-3">
                    <?php if(!empty($heading)):?>
                        <div class="playfair-regular font48 leading52 text-black dmb-40">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($description)):?>
                        <div class="montserrat font16 leading24 text-black fw-normal">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-5 ps-4">
                    <div class="col-11 ms-auto">
                        <?php if(!empty($lists)):
                            foreach($lists as $list):
                                $heading = $list['heading'];
                                $data = $list['data'];
                            ?>
                                <div class="left-right-list d-flex align-items-center justify-content-between dpt-20 dpb-20">
                                    <?php if(!empty($heading)):?>
                                        <div class="montserrat font20 leading28 text-black fw-normal">
                                            <?php echo $heading; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($data)):?>
                                        <div class="montserrat font16 leading24 text-black fw-normal opacity-50">
                                            <?php echo $data; ?>
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
<?php endif; ?>

<div class="spacing dmb-80"></div>

<div class="divider divider-808080-25"></div>

<div class="spacing dmb-110"></div>

<!-- event-highlight-section -->
<?php if(!empty($event_highlights_section)):
    $heading = $event_highlights_section['heading'];
    $masnory_parts = $event_highlights_section['masnory_parts'];
?>
    <section class="event-highlight-section">
        <div class="container">
            <?php if(!empty($heading)):?>
                <div class="playfair-regular font48 leading52 text-black dmb-45">
                    <?php echo $heading; ?>
                </div>
            <?php endif; ?>
            <div class="masnory-group">
                <?php if(!empty($masnory_parts)):
                    foreach($masnory_parts as $masnory):
                        $image = $masnory['image'];
                        $video_selection = $masnory['video_selection'];
                        $video = $masnory['video'];
                        $youtube = $masnory['youtube'];
                        $vimeo = $masnory['vimeo'];

                        $video_url = '';
                        if(!empty($video_selection) && $video_selection == "Video" && !empty($video)){
                            $video_url = $video['url'];
                        }elseif(!empty($video_selection) && $video_selection == "Youtube" && !empty($youtube)){
                            $video_id = get_youtube_video_id($youtube);
                            $video_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1&loop=1&playlist={$video_id}&mute=1&controls=0&rel=0&modestbranding=1&disablekb=1&fs=0&iv_load_policy=3";
                        }elseif(!empty($video_selection) && $video_selection == "Vimeo" && !empty($vimeo)){
                            $vimeo_url = convert_vimeo_to_embed($vimeo);
                            $video_url = get_vimeo_video_id($vimeo_url) . "?autoplay=1&loop=1&muted=1&background=1&controls=0";
                        }
                    ?>
                        <div class="masnory-cards dmb-30">
                            <div class="masnory-card position-relative overflow-hidden">
                                <?php if(!empty($image)):?>
                                    <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 h-100 object-cover">
                                <?php endif; ?>
                                <?php if (!empty($video_url)) : ?>
                                    <a href="<?php echo esc_url($video_url); ?>"
                                        data-fancybox="video-gallery" class="position-absolute top-0 start-0 w-100 h-100">
                                        <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 h-100 object-cover opacity-0">
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo esc_url($image['url']); ?>"
                                        data-fancybox="video-gallery" class="position-absolute top-0 start-0 w-100 h-100">
                                        <img src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['alt']; ?>" class="w-100 h-100 object-cover opacity-0">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<div class="spacing dmb-80"></div>

<!-- testimonial-section -->
<?php if(!empty($testimonial_section)):
    $testimonial = $testimonial_section['testimonial'];
    $client_name = $testimonial_section['client_name'];
?>
    <section class="testimonial-section bg-AF9DA3 dpt-170 dpb-90">
        <div class="container">
            <div class="col-9">
                <?php if(!empty($testimonial)):?>
                    <div class="playfair-regular font40 leading48 text-F0EBE2 dmb-25">
                        <?php echo $testimonial; ?>
                    </div>
                <?php endif;?>
                <?php if(!empty($client_name)):?>
                    <div class="montserrat font16 leading24 text-F0EBE2 fw-normal opacity-50">
                        <?php echo $client_name; ?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (!empty($next_post)): 
    $next_id = $next_post->ID;
?>
    <section class="next-case-section position-relative overflow-hidden">
        <img src="<?php echo get_the_post_thumbnail_url($next_id); ?>" alt="" class="w-100 h-100 object-cover">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50"></div>
        <div class="position-absolute top-0 start-0 w-100 h-100 dpt-50 dpb-70 z-3">
            <div class="container h-100">
                <div class="h-100 d-flex flex-column justify-content-between">
                    <div class="d-inline-flex">
                        <div class="next-cat montserrat font13 leading20 text-F0EBE2 fw-normal text-capitalize rounded-pill px-4 py-1 me-2">
                            next project
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="">
                            <div class="playfair-regular font48 leading52 text-F0EBE2 text-capitalize dmb-20">
                                <?php echo get_the_title($next_id); ?>  
                            </div>
                            <div class="montserrat font16 leading20 text-F0EBE2">
                                <?php echo get_the_excerpt($next_id); ?> 
                            </div>
                        </div>
                        <div class="">
                            <a href="<?php echo get_the_permalink($next_id); ?>" class="text-decoration-none btnA bg-F0EBE2-btn montserrat font15 leading18 fw-medium text-uppercase d-inline-flex align-items-center rounded-pill">
                                View PROJECT
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
