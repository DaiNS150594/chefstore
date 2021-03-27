<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<?php tmpmela_content_after(); ?>
</div>
<!-- .main-content-inner -->
</div>
<!-- .main_inner -->
</div>
<!-- #main -->
<?php tmpmela_footer_before(); ?>
<footer id="colophon" class="site-footer">
    <?php tmpmela_footer_inside(); ?>
    <?php if (is_active_sidebar('footer-newsletter-widget-area')) : ?>
        <div class="footer-outer">
            <div class="theme-container"><?php dynamic_sidebar('footer-newsletter-widget-area'); ?></div>
        </div>
    <?php endif; ?>
    <div class="theme-container">
        <?php get_sidebar('footer'); ?>
        
        <div class="footer-bottom">
            <?php if (is_active_sidebar('footer-middle-widget-area')) : ?>
				<div class="footer-middle">
					<?php dynamic_sidebar('footer-middle-widget-area'); ?>
				</div>
			<?php endif; ?>
            <?php //if (is_active_sidebar('footer-bottom-widget-area')) : ?>
                <?php //dynamic_sidebar('footer-bottom-widget-area'); ?>
            <?php //endif; ?>
			
			
			
			<!-- Dungvv custom accepted payment methods -->
			<aside style="margin-bottom: 10px;" id="accepted_payment_methods-1" class="widget widget_accepted_payment_methods toggled-on">
				<div class=""><h4 style="padding-bottom: 0px !important;">Phương Thức Thanh Toán</h4></div>
				<ul class="accepted-payment-methods">
					<li class="dankort">
						<span title="thanh toán bằng tiền mặt">
							<img style="border: 1px solid grey; border-radius: 5px;" width="54px" src="https://chefstore.vn/wp-content/uploads/2021/03/cash_small.jpg" alt="thanh toán tiền mặt" />
						</span>
					</li>
					<li class="dankort">
						<span title="thanh toán chuyển khoản ngân hàng">
							<img style="border: 1px solid grey; border-radius: 5px;" src="https://chefstore.vn/wp-content/uploads/2021/03/internet-banking-small.jpg" alt="thanh toán chuyển khoản" />
						</span>
					</li>
				</ul>
			</aside>
			<!-- Dungvv custom accepted payment methods -->
			
			<div class="site-info">  <?php echo esc_html__('Copyright', 'shopvolly'); ?>
                &copy; <?php echo esc_attr(date('Y')); ?> <?php echo esc_attr(stripslashes(get_option('tmpmela_footer_slog'))); ?><?php do_action('tmpmela_credits'); ?></div>
			
        </div>
    </div>
    <div class="hotline-phone-ring-wrap">
	<div class="hotline-phone-ring">
		<div class="hotline-phone-ring-circle"></div>
		<div class="hotline-phone-ring-circle-fill"></div>
		<div class="hotline-phone-ring-img-circle">
		<a href="tel:0987654321" class="pps-btn-img">
			<img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/call.png') ?>" alt="Gọi điện thoại" width="50">
		</a>
		</div>
	</div>
	<div class="hotline-bar">
		<a href="tel:0961550978">
			<span class="text-hotline">096.155.0978</span>
		</a>
	</div>
</div>
</footer>
<!-- #colophon -->
<?php tmpmela_footer_after(); ?>
</div>
<!-- #page -->
<?php tmpmela_go_top(); ?>
<?php tmpmela_get_widget('before-end-body-widget'); ?>
<?php wp_footer(); ?>
</body>
</html>