	<footer id="colophon" role="contentinfo">
		<div id="site-generator">

			<?php echo __('&copy; ', 'surfarama') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Powered by ', 'surfarama'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'surfarama' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'surfarama' ); ?>"><?php _e('WordPress' ,'surfarama'); ?></a>
			<?php _e(' and ', 'surfarama'); ?><a href="<?php echo esc_url( __( 'http://wpthemes.co.nz/', 'surfarama' ) ); ?>"><?php _e('WPThemes.co.nz', 'surfarama'); ?></a>
            <?php endif; ?>
            
		</div>
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>
<center>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9700978; 
var sc_invisible=0; 
var sc_security="488a76c2"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web statistics"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9700978/0/488a76c2/0/"
alt="web statistics"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</center>

</body>
</html>