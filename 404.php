<section class="error-404 not-found dpt-120 h-vh d-flex align-items-center dpb-120 text-center">
    <div class="container">

        <div class="font80 leading90 dmb-20">404</div>

        <div class="font32 leading40 dmb-20">
            <?php esc_html_e( 'Page Not Found', 'your-theme-textdomain' ); ?>
        </div>

        <div class="font18 leading28 dmb-40">
            <?php esc_html_e( 'Sorry, the page you are looking for does not exist or has been moved.', 'your-theme-textdomain' ); ?>
        </div>

        <a href="<?php echo esc_url( home_url('/') ); ?>" 
           class="btnB link-btn">
            <?php esc_html_e( 'Back to Home', 'your-theme-textdomain' ); ?>
        </a>

    </div>
</section>