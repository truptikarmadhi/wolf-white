<?php
$service_id= get_the_ID();
$heading = get_the_title($service_id);
$thumbnail = get_the_post_thumbnail_url($service_id, 'fullscreen');


$service_title_content = get_field('service_title_content');
$two_image_content_section = get_field('two_image_content_section');
$recent_section = get_field('recent_section');
?>

<div class="spacing tpb-155 dpb-235"></div>

<section class="sub-hero-section position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-end tmb-50 dmb-75">
            <div class="col-lg-6 pe-lg-5 tmb-15">
                <?php if(!empty($heading)):?>
                    <div class="montserrat font13 leading20 text-black fw-normal border-808080-25 text-capitalize rounded-pill d-inline-flex px-4 py-1 dmb-25">
                        <?php echo $heading; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($service_title_content['heading'])):?>
                    <div class="playfair-regular font56 leading68 res-font35 res-leading40 text-black">
                        <?php echo $service_title_content['heading']; ?>
                    </div>
                <?php endif; ?>
            </div> 
            <div class="col-lg-6 ps-lg-5">
                <div class="ps-lg-5">
                    <?php if(!empty($service_title_content['description'])):?>
                        <div class="montserrat font16 leading24 text-black fw-normal">
                            <?php echo $service_title_content['description']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-hero-img">
        <?php if (!empty($thumbnail)): ?>
            <img src="<?php echo $thumbnail; ?>" alt="<?php echo $heading; ?>" class="w-100 h-100 object-cover">
        <?php endif; ?>
    </div>
</section>

<div class="spacing tmb-65 dmb-130"></div>

<?php if(!empty($two_image_content_section)):
    $first_image = $two_image_content_section['first_image'];
    $heading = $two_image_content_section['heading'];
    $description = $two_image_content_section['description'];
    $second_image = $two_image_content_section['second_image'];
?>
    <section class="two-image-content-section wow animated animate__fadeInUp" data-wow-duration="1.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-lg-4">
                    <div class="d-none d-lg-block pe-lg-2">
                        <?php if(!empty($first_image)):?>
                            <div class="first-img w-100">
                                <img src="<?php echo $first_image['sizes']['medium']; ?>" alt="<?php echo $first_image['alt']; ?>" class="w-100 h-100 object-cover">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-4">
                    <div class="ps-lg-2 pe-2 pe-lg-0">
                        <?php if(!empty($heading)):?>
                            <div class="playfair-regular font48 leading52 res-font36 res-leading40 text-black tmb-15 dmb-25">
                                <?php echo $heading; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($description)):?>
                            <div class="montserrat font16 leading24 text-black fw-normal tmb-35 dmb-80">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>
                        <div class="row row5">
                            <div class="col-6 d-lg-none d-lg-block pe-lg-2">
                                <?php if(!empty($first_image)):?>
                                    <div class="first-img w-100">
                                        <img src="<?php echo $first_image['sizes']['medium']; ?>" alt="<?php echo $first_image['alt']; ?>" class="w-100 h-100 object-cover">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 col-lg-7 ps-lg-4 ms-auto">
                                <div class="ps-lg-2">
                                    <?php if(!empty($second_image)):?>
                                        <div class="second-img w-100">
                                            <img src="<?php echo $second_image['sizes']['medium']; ?>" alt="<?php echo $second_image['alt']; ?>" class="w-100 h-100 object-cover">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
include 'templates/page-builder.php';
?>