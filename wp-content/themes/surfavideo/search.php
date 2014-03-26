<?php
get_header();
$page = $_GET['page'];
$color 		= array("1e73be", "6ac93e", "dd3333");
if (empty($page))
{
$page ='1';
}
$startx = ($page - 1) * 15;
$startx = $startx + 1; 
?>
<?php
$keyw   	=	str_replace(' ','+',get_search_query());
$urlrss    	= 'http://www.bing.com/search?q=site:youtube.com+'.$keyw.'&count=15&first='.$startx.'&format=rss';
$feedbing  	= simplexml_load_string(Copasan($urlrss));
$title	   	= $feedbing->channel->item->title[0];
$ytb  	   	= $feedbing->channel->item->link[0];
$vid		= explode('http://www.youtube.com/watch?v=',$ytb);
$vid		= explode('&',$vid[1]);
$vid		= $vid[0];
$desc	   	= $feedbing->channel->item->description[0];
$date	   	= $feedbing->channel->item->pubDate[0]; 	
$title 		= str_replace(array('"','...','..','- YouTube'),'',$title);
$title		= str_replace(array('_','/'),' ',$title);
$title		= trim($title);
$url		= '/'.$vid.'/'.str_replace(' ','-',$title);
$image		= 'https://i1.ytimg.com/vi/'.$vid.'/mqdefault.jpg';
?>
<?php get_header(); ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="clearfix" role="main">
              

			<div id="intro-text">
                  <p><?php echo get_option('wall_greeting'); ?></p>
               </div><!-- .entry-content -->
			

			
							<div id="grid-wrap" class="clearfix">
                								                						<div class="grid-box featured">
					
<article id="post-22" class="post-22 post type-post status-publish format-standard sticky hentry category-surf"  style="background-color: #<?php echo $color[rand(1,3)]; ?>">
	
         	<div class="grid-box-img"><a href="<?php echo $url; ?>" rel="bookmark" title="<?php echo $title; ?>"><img width="610" height="610" src="<?php echo $image; ?>" class="attachment-full wp-post-image" alt="<?php echo $title; ?>" /></a></div>
		
	    
    		        <span class="cat-links" style="background-color: #<?php echo $color[rand(1,3)]; ?>">
            <a href="/?s=<?php echo $cat; ?>" title="View all posts in <?php echo $cat; ?>" rel="tag"><?php echo $cat; ?></a>        </span>
            	
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo $url; ?>" title="Permalink to <?php echo $title; ?>" rel="bookmark"><?php echo $title; ?></a></h2>

				<div class="entry-meta">
			<span class="sep meta-by">Author </span> <span class="author vcard"><a class="url fn n" href="http://surfarama.com/author/Charles/" title="View all posts by Charles" rel="author">Charles</a></span><span class="byline"> <span class="sep meta-on"> Date </span> <a href="http://surfarama.com/the-green-room/" title="10:05 am" rel="bookmark"><time class="entry-date" datetime="2013-06-25T10:05:44-05:00">June 25, 2013</time></a></span>		</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
    

	<div class="entry-content post_content">
		<?php echo $title.'<br/>'.$desc; ?>		</div><!-- .entry-content -->

	<footer class="entry-meta">
					
					
		
			</footer><!-- #entry-meta -->
</article><!-- #post-22 -->
                    </div>
                    				                						
<?php
for ($i=1; $i<=14; $i++)
{
$item		= $feedbing->channel->item[$i];
$title	   	= $item->title;
$ytb  	   	= $item->link;
$vid		= explode('http://www.youtube.com/watch?v=',$ytb);
$vid		= explode('&',$vid[1]);
$vid		= $vid[0];
$desc	   	= $item->description;
$date	   	= $item->pubDate; 	
$title 		= str_replace(array('"','...','..','- YouTube'),'',$title);
$title		= str_replace(array('_','/'),' ',$title);
$title		= trim($title);
$url		= '/'.$vid.'/'.str_replace(' ','-',$title);
$image		= 'https://i1.ytimg.com/vi/'.$vid.'/mqdefault.jpg';
if (!empty($vid))
{
echo '<div class="grid-box ">
					
<article id="post-70" class="post-70 post type-post status-publish format-standard hentry category-snow"  style="background-color: #'.$color[rand(1,3)].'">
	
         	<div class="grid-box-img"><a href="'.$url.'" rel="bookmark" title="'.$title.'"><img width="610" height="915" src="'.$image.'" class="attachment-full wp-post-image" alt="'.$title.'" /></a></div>
		
	    
    		        <span class="cat-links" style="background-color: #'.$color[rand(1,3)].'">
            <a href="/?s='.$cat.'" title="View all posts in '.$cat.'" rel="tag">'.$cat.'</a>        </span>
            	
	<header class="entry-header">
		<h2 class="entry-title"><a href="'.$url.'" title="Permalink to '.$title.'" rel="bookmark">'.$title.'</a></h2>

				<div class="entry-meta">
			<span class="sep meta-by">Author </span> <span class="author vcard"><a class="url fn n" href="/?s='.$cat.'" title="View all posts by '.$cat.'" rel="author">'.$cat.'</a></span></div><!-- .entry-meta -->
			</header><!-- .entry-header -->
    

	<div class="entry-content post_content">
		'.$title.'</div><!-- .entry-content -->
	<footer class="entry-meta">
			</footer><!-- #entry-meta -->
</article><!-- #post-70 -->
                    </div>';
}
}
?>
                    				                						
                    </div>

        </div> <!-- end #main -->
<?php
if ($page !=1)
   {
    $next = $page + 1;
    $before = $page - 1;
   
   echo '<div class="pagination"><a href="/?s='.get_search_query().'&page='.$before.'" class="inactive"> Previous Page</a><span class="current">Page '.$page.'</span><a href="/?s='.get_search_query().'&page='.$next.'" class="inactive">Next Page </a></div>';
   }
else
{
 $next = $page + 1;
 echo '<div class="pagination"><span class="current">Page '.$page.'</span><a href="/?s='.get_search_query().'&page='.$next.'" class="inactive">Next Page </a></div>';
}
?>

        <div></div>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>