<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col300" role="complementary">
<div class="widget">						<h2 class="widget-title">Google Trends</h2>
						<?php
$feed = 'http://www.google.com/trends/hottrends/atom/hourly';
$feed = Copasan($feed);
$feed = explode ('<content type="html"><![CDATA[',$feed);
$feed = explode (']]>',$feed[1]);
$feed = $feed[0];
$feed = str_replace('<ol>','<ul>',$feed);
$feed = str_replace('</ol>','</ul>',$feed);
$feed = preg_replace('/([0-9]{8})/', '', $feed);
$feed  = str_replace('http://www.google.com/trends/hottrends?pn=p1#a=','',$feed);
$feed  = str_replace(array('<span class="On Fire new">','<span class="Spicy new">','<span class="Medium new">','</span>'),'',$feed);
$feed  = str_replace('-','/?s=',$feed);
$feed  = str_replace('">','">',$feed);
$feed  = str_replace('%2B','+',$feed);
echo $feed;
?>
</div>

			<?php if ( ! dynamic_sidebar( 'sidebar-post' ) ) : ?>

				<aside id="categories" class="widget">
					<div class="widget-title"><?php _e( 'Categories', 'surfarama' ); ?></div>
					<ul>
						<?php wp_list_categories( array( 
							'title_li' => '',
							'hierarchical' => 0
						) ); ?>
					</ul>
				</aside>

				<aside id="recent-posts" class="widget">
					<div class="widget-title"><?php _e( 'Latest Posts', 'surfarama' ); ?></div>
					<ul>
						<?php
							$args = array( 'numberposts' => '10' );
							$recent_posts = wp_get_recent_posts( $args );
							
							foreach( $recent_posts as $recent ){
								if ($recent["post_title"] == '') {
									 $recent["post_title"] = __('View Post', 'surfarama');
								}
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' . $recent["post_title"] .'</a> </li> ';
							}
						?>
                    </ul>
				</aside>
                
                <aside id="recent-comments" class="widget">
            		<div class="widget-title"><?php _e( 'Recent Comments', 'surfarama' ); ?></div>
					<ul>
					<?php surfarama_recent_comments(); ?>
                    </ul>
           		</aside>
                
                <aside id="archives" class="widget">
					<div class="widget-title"><?php _e( 'Archives', 'surfarama' ); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
