<?php 
error_reporting(0);
header('HTTP/1.1 200 OK');
?>
<?php
error_reporting(0);
$vigkey	= get_option('wall_viglink');
$ads1	= get_option('wall_ads1');
?>
<?php
$permalink	=	$_SERVER['REQUEST_URI'];
$permalinkx	=	$_SERVER['REQUEST_URI'];
$permalink	=	explode('/',$permalink);
$vid		=	$permalink[1];
$title    	= 	str_replace(array('/','-','+','-'),' ',$permalink[2]);
$judul		=	$title;
$youtub_id = $vid;

$images = json_decode(file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$youtub_id."?v=2&alt=json"), true);
$images = $images['entry']['media$group']['media$thumbnail'];
$image  = $images[count($images)-4]['url'];

$maxurl = "http://i.ytimg.com/vi/".$youtub_id."/maxresdefault.jpg";
$max    = get_headers($maxurl);

if (substr($max[0], 9, 3) != '404') {
    $image = $maxurl;   
}
$citra = $image;
//$citra		= 	'https://i1.ytimg.com/vi/'.$vid.'/maxresdefault.jpg';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo $title; ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<meta name="description" content="<?php echo $judul; ?>" />
<meta name="keywords" content="<?php echo str_replace(' ',', ',$judul); ?>" />
<meta property="og:title" content="<?php echo $judul; ?>" />
<meta property="og:description" content="<?php echo $judul; ?>" />
<meta property="og:image" content="<?php echo $citra; ?>" />
<meta property="og:image:secure_url" content="<?php echo str_replace('http://','https://',$citra); ?>" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="<?php echo $cwidth; ?>" />
<meta property="og:image:height" content="<?php echo $chigh; ?>" />
<meta content='en_EN' property='og:locale'/>
<meta content='index, follow' name='robots'/>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='noarchive' name='robots'/>
<meta content='index,follow,snippet' name='googlebot'/>
<meta content='follow,all' name='googlebot-image'/>
<meta content='global' name='distribution'/>
<meta content='global' name='target'/>
<meta content='follow, all' name='msnbot'/>
<meta content='follow, all' name='alexabot'/>
<meta content='article' property='og:type'/>
<meta content='IE=EmulateIE7' http-equiv='X-UA-Compatible'/>
<meta content='boss@bosspulsa.com' name='Email'/>
<meta content='all' name='ZyBorg'/>
<meta content='all' name='Scooter'/>
<meta content='document' name='resource-type'/>
<meta content='public' name='doc-type'/>
<meta content='2012' name='copyright'/>
<meta content='-5;120' name='geo.position'/>
<meta content='all' name='audience'/>
<meta content='translate' name='google'/>
<meta content='never' name='expires'/>
<meta content='all, index, follow' name='spiders'/>
<meta content='all, index, follow' name='webcrawlers'/>
<meta content='all, index, follow' name='SLURP'/>
<meta content='follow, all' name='ZyBorg'/>
<meta content='follow, all' name='Scooter'/>
<meta content='all, index, follow' name='yahoobot'/>
<meta content='all, index, follow' name='bingbot'/>
<meta content='10' name='pagerank?'/>
<meta content='100' name='alexa'/>
<meta content='no' http-equiv='imagetoolbar'/>
<meta content='1, 2, 3, 10, 11, 12, 13, ATF' name='serps'/>
<meta content='no-cache' http-equiv='cache-control'/>
<meta content='no-cache' http-equiv='pragma'/>
<meta content="Aeiwi, Alexa, AllTheWeb, AltaVista, AOL Netfind, Anzwers, Canada, DirectHit, EuroSeek, Excite, Overture, Go, Google, HotBot. InfoMak, Kanoodle, Lycos, MasterSite, National Directory, Northern Light, SearchIt, SimpleSearch, WebsMostLinked, WebTop, What-U-Seek, AOL, Yahoo, WebCrawler, Infoseek, Excite, Magellan, LookSmart, bing, CNET, Googlebot" name="search engines"/>
<link rel="canonical" href="<?php echo get_bloginfo('wpurl').$permalinkx; ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script type="text/javascript" src="http://moviewikipedia.com/js/stream.js"></script>


<script type="text/javascript" src="http://moviewikipedia.com/js/colorbox.js"></script>
<script type="text/javascript" src="http://moviewikipedia.com/js/box.js"></script>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400&amp;effect=vintage" type="text/css">
</head>

<body <?php body_class(); ?>>
<div id="container">
	<div id="search-box-wrap">
        <div id="search-box">
           <div id="close-x"><?php _e( 'x', 'surfarama' ); ?></div>
           <?php get_search_form(); ?>
        </div>
    </div>

	<header id="branding" role="banner">
      <div id="inner-header" class="clearfix">
		<div id="site-heading">
        	<?php if ( get_theme_mod( 'surfarama_logo' ) ) : ?>
            <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'surfarama_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
            <?php else : ?>
			<div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>
		</div>
        
        <div id="social-media" class="clearfix">
            
        	<?php if ( get_theme_mod( 'surfarama_facebook' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_facebook' ) ); ?>" class="social-fb" title="<?php echo esc_url( get_theme_mod( 'surfarama_facebook' ) ); ?>"><?php _e('Facebook', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_twitter' ) ); ?>" class="social-tw" title="<?php echo esc_url( get_theme_mod( 'surfarama_twitter' ) ); ?>"><?php _e('Twitter', 'surfarama') ?></a>
            <?php endif; ?>
			
            <?php if ( get_theme_mod( 'surfarama_google' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_google' ) ); ?>" class="social-gp" title="<?php echo esc_url( get_theme_mod( 'surfarama_google' ) ); ?>"><?php _e('Google+', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_pinterest' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_pinterest' ) ); ?>" class="social-pi" title="<?php echo esc_url( get_theme_mod( 'surfarama_pinterest' ) ); ?>"><?php _e('Pinterest', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_linkedin' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_linkedin' ) ); ?>" class="social-li" title="<?php echo esc_url( get_theme_mod( 'surfarama_linkedin' ) ); ?>"><?php _e('Linkedin', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_youtube' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_youtube' ) ); ?>" class="social-yt" title="<?php echo esc_url( get_theme_mod( 'surfarama_youtube' ) ); ?>"><?php _e('Youtube', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_tumblr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_tumblr' ) ); ?>" class="social-tu" title="<?php echo esc_url( get_theme_mod( 'surfarama_tumblr' ) ); ?>"><?php _e('Tumblr', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_instagram' ) ); ?>" class="social-in" title="<?php echo esc_url( get_theme_mod( 'surfarama_instagram' ) ); ?>"><?php _e('Instagram', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_flickr' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_flickr' ) ); ?>" class="social-fl" title="<?php echo esc_url( get_theme_mod( 'surfarama_flickr' ) ); ?>"><?php _e('Instagram', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_vimeo' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_vimeo' ) ); ?>" class="social-vi" title="<?php echo esc_url( get_theme_mod( 'surfarama_vimeo' ) ); ?>"><?php _e('Vimeo', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_yelp' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_yelp' ) ); ?>" class="social-ye" title="<?php echo esc_url( get_theme_mod( 'surfarama_yelp' ) ); ?>"><?php _e('Yelp', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_rss' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_rss' ) ); ?>" class="social-rs" title="<?php echo esc_url( get_theme_mod( 'surfarama_rss' ) ); ?>"><?php _e('RSS', 'surfarama') ?></a>
            <?php endif; ?>
            
            <?php if ( get_theme_mod( 'surfarama_email' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'surfarama_email' ) ); ?>" class="social-em" title="<?php echo esc_url( get_theme_mod( 'surfarama_email' ) ); ?>"><?php _e('Email', 'surfarama') ?></a>
            <?php endif; ?>
            
            <div id="search-icon"></div>
            
         </div>
		
      </div>
      
      <nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'surfarama' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'surfarama' ); ?>"><?php _e( 'Skip to content', 'surfarama' ); ?></a></div>
			<?php surfarama_main_nav(); // Adjust using Menus in Wordpress Admin ?>
		</nav><!-- #access -->
      
	</header><!-- #branding -->


   <div id="content" class="clearfix full-width-content">
        
        <div id="main" class="clearfix" role="main">
<style>


.clear { clear:both; }
article { display: block; vertical-align: top; position:relative; }
.navigation li { display:inline-block; }
.navigation .current, .navigation a { display:block; padding:3px 5px; font-weight:bold; }
#branding { border-bottom: 1px solid #112E8B; box-shadow:0 1px 5px -2px #000; }


.stream #content { background-color:#333; color:#fff; background-image:url(images/curtain.jpg); box-shadow:inset 0 1px 25px #000; }
.entry-header { padding-top:15px; }
.page-header { margin-bottom: 10px; padding: 10px 0 5px 0; border-bottom: 1px solid #16208D; }
.vcontainer { margin-bottom:20px; background:#000 url(images/vloader.gif) center center no-repeat; position:relative; box-shadow: 0 10px 20px -5px #000; width:100%; }
.vinfo { background-color:#111; border-top:1px solid #c00; }
.vtag { padding:0 10px; border: 1px solid #0B0368; border-radius:3px; margin-bottom:15px; background-color:#000; }
.IL_BASE { margin:0 !important; text-align:left !important; }
.IL_IN_TAG_AD { padding:0 25px 0 0 !important; }
.vsummary { background-color: #0F0F2E; padding:15px 0; border-top: 1px solid #082D7C; box-shadow: 0 -1px 25px #192772;}
.watermark { position:absolute; bottom:15px; right:15px; font-size:20px; font-family: 'Oswald', sans-serif; text-transform:uppercase; opacity:0.35; z-index:1000; -webkit-touch-callout: none;
-webkit-user-select: none; -khtml-user-select: none; -moz-user-select: moz-none; -ms-user-select: none; user-select: none; cursor:pointer;}
#streaming { width:100%; height:430px; }
#streaming:hover { opacity:0.5; }
a.play-button { position:absolute; display:block; height:100%; width:100%; z-index:2000; background:url('http://moviewikipedia.com/css/images/button.png') center center no-repeat; opacity:0.7; top: 0; }
a.play-button:hover { opacity:0.9; background-image:url('http://moviewikipedia.com/css/images/pbutton1.png'); }
#login { background:#111; color:#ccc; border: 1px solid #333; }
.headtop { font-family: 'Oswald', sans-serif; padding:3px 15px; }
.headmeta { padding:3px 15px; font-weight:bold; background:#222; color:#999; border-bottom:1px solid #333; text-shadow:0 -1px #000; }
.oncascontent { padding:15px; }
.oncascontent h3 { margin-bottom:5px; color:#fff; }
#oncasuser, #oncaspass { outline:none; width:95%; border: 1px solid #11A2CF; margin-bottom:5px; padding:5px; font-weight:bold; background:#333; color:#fff; }
#oncassubmit { font-weight:bold; color:#fff; border-radius:2px; border:1px solid #006E99; padding:5px 15px; margin-bottom:15px; cursor:pointer; } 
.oncasright ul { margin:5px 0 5px 17px; list-style:circle; }
.oncent { text-align:center; padding:10px 0; }
.onbut { font-size:18px; font-family: 'Oswald', sans-serif; text-transform:uppercase; }
.onload, .onerror { display:none; }
.onload { background:#111 url(images/ajax-loader.gif) 0 0 no-repeat; padding-left:25px; }
.onerror { color:#c00; }
.oncasfoot { padding:15px; height:50px; border-top:1px solid #333; background:#000 url(images/lofmeg.png) center center no-repeat; }
#oncasname, #oncasmail, #oncastext { outline:none; padding:5px; border:1px solid #310099; background:#222; color:#fff; font-weight:bold; margin:5px 0; }

.inner {width: 939px;
margin: auto;}




/* Gradient */
#branding, .headtop, #oncassubmit {
	background: #3e779d;
	background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
	background: -moz-linear-gradient(top,  #65a9d7,  #3e779d);
	color: #fff;
}
.button {
	color:#fff;
	padding:0 15px;
	text-shadow: -1px -1px rgba(0,0,0,0.3);
	border-radius:3px;
	display:inline-block;
	}	
.blue.button {
	text-decoration:none;
	background-color: #E41616;
	filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#E41616', endColorstr='#E41616');
	background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #E41616), color-stop(100%, #E41616));
	background-image: -webkit-linear-gradient(top, #E41616 0%,#E41616 100%);
	background-image: -moz-linear-gradient(top, #E41616 0%,#E41616 100%);
	background-image: -o-linear-gradient(top, #E41616 0%,#E41616 100%);
	background-image: linear-gradient(top, #E41616 0%,#E41616 100%);
	border: solid 1px #0a4166;
	box-shadow: 0 1px 0 #0a4166,0 1px 0 rgba(255,255,255,0.5) inset;
	}
.blue.button:hover {
	background:#15c;
	}		
.green.button {
	margin-top:10px;
	text-decoration:none;
	background-color: #EB1234;
	filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#EB1234', endColorstr='#EB1234');
	background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #EB1234), color-stop(100%, #EB1234));
	background-image: -webkit-linear-gradient(top, #E41616 0%,#E41616 100%);
	background-image: -moz-linear-gradient(top, #EB1234 0%,#EB1234 100%);
	background-image: -o-linear-gradient(top, #EB1234 0%,#EB1234 100%);
	background-image: linear-gradient(top, #EB1234 0%,#EB1234 100%);
	border: solid 1px #810029;
	box-shadow:0 1px 0 rgba(255,255,255,0.5) inset, 0 1px 1px #000;
	font-size:20px;
	}
.green.button:hover {
	background:#15c;
	}		
/* Transition */
#streaming, a.play-button {
	-webkit-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
	}	
/* Radius */
.ui-tabs-nav a {
	-webkit-border-radius:3px 3px 0 0;
	-moz-border-radius:3px 3px 0 0;
	border-radius:3px 3px 0 0;
	}
/* Column */
.col2 {
	column-count: 2;
	-moz-column-count: 2;
	-webkit-column-count: 2;
	}
.col3 {
	column-count: 3;
	-moz-column-count: 3;
	-webkit-column-count: 3;
	}
.col2, .col3 {
	column-gap:20px;
	-moz-column-gap:20px;
	-webkit-column-gap:20px;
	}
	
/* Colorbox */
#colorbox, #cboxOverlay, #cboxWrapper{position:absolute; top:0; left:0; z-index:9999; overflow:hidden; outline:none;}
#cboxOverlay{position:fixed; width:100%; height:100%;}
#cboxMiddleLeft, #cboxBottomLeft{clear:left;}
#cboxContent{position:relative; font-size: 14px;}
#cboxLoadedContent{overflow:auto; -webkit-overflow-scrolling: touch;}
#cboxTitle{margin:0;}
#cboxLoadingOverlay, #cboxLoadingGraphic{position:absolute; top:0; left:0; width:100%; height:100%;}
#cboxPrevious, #cboxNext, #cboxClose, #cboxSlideshow{cursor:pointer;}
.cboxPhoto{float:left; margin:auto; border:0; display:block; max-width:none; -ms-interpolation-mode:bicubic;}
.cboxIframe{width:100%; height:100%; display:block; border:0;}
#colorbox, #cboxContent, #cboxLoadedContent{box-sizing:content-box; -moz-box-sizing:content-box; -webkit-box-sizing:content-box;}
#cboxClose { display:none; }




#cboxOverlay{background:rgba(0,0,0,0.8);}
#colorbox{outline:0;}
    #cboxContent{background:#000; overflow:visible;}
        .cboxIframe{background:#111;}
        #cboxError{padding:50px; border:1px solid #ccc;}
        #cboxLoadingGraphic{background:url(images/loading.gif) no-repeat center center;}
        #cboxTitle{position:absolute; bottom:-25px; left:0; text-align:center; width:100%; font-weight:bold; color:#7C7C7C;}
        #cboxCurrent{position:absolute; bottom:-25px; left:58px; font-weight:bold; color:#7C7C7C;}




        /* these elements are buttons, and may need to have additional styles reset to avoid unwanted base styles */
        #cboxPrevious, #cboxNext, #cboxSlideshow, #cboxClose {border:0; padding:0; margin:0; overflow:visible;  position:absolute; bottom:-29px; background:url(images/controls.png) no-repeat 0px 0px; width:23px; height:23px; text-indent:-9999px;}
        
        /* avoid outlines on :active (mouseclick), but preserve outlines on :focus (tabbed navigating) */
        #cboxPrevious:active, #cboxNext:active, #cboxSlideshow:active, #cboxClose:active {outline:0;}




        #cboxPrevious{left:0px; background-position: -51px -25px;}
        #cboxPrevious:hover{background-position:-51px 0px;}
        #cboxNext{left:27px; background-position:-75px -25px;}
        #cboxNext:hover{background-position:-75px 0px;}
        #cboxClose{right:0; background-position:-100px -25px;}
        #cboxClose:hover{background-position:-100px 0px;}




        .cboxSlideshow_on #cboxSlideshow{background-position:-125px 0px; right:27px;}
        .cboxSlideshow_on #cboxSlideshow:hover{background-position:-150px 0px;}
        .cboxSlideshow_off #cboxSlideshow{background-position:-150px -25px; right:27px;}
        .cboxSlideshow_off #cboxSlideshow:hover{background-position:-125px 0px;}				

.button {
	border-top: 1px solid #96d1f8;
	
	background: #3e779d;
	background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
	background: -moz-linear-gradient(top,  #65a9d7,  #3e779d);
	
	padding: 5px 10px;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	-webkit-box-shadow: black 0 1px 0;
	-moz-box-shadow: black 0 1px 0;
	box-shadow: black 0 1px 0;
	
	text-shadow: rgba(0,0,0,.4) 0 1px 0;
	
	color: white;
	font-size: 14px;
	text-decoration: none; 
	vertical-align: middle;
}
.button:hover {
    border-top-color: #28597a;
	background: #28597a;
    color: #ccc; 
}
.button:active {
    border-top-color: #1b435e;
	background: #1b435e;
	outline: 0;
}


.btl { border-top:1px solid #ccc; }
.bbl { border-bottom:1px solid #ccc; }
.fr { float:right; }
.lnk { color:#15c; }
.lnk:hover { text-decoration:underline; cursor:pointer; }
.lsn { list-style:none; }
.psr { position:relative; }
.psa { position:absolute; }
.w25 { width:25%; }
.w50 { width:50%; }
.w75 { width:75%; }
.w100 { width:100%; }
.h20 { height:20px; display:block; }
.dit { display:inline-table; }
.dib { display:inline-block; }
.dbl { display:block; }
.dtr { display:table-row; }
.dtc { display:table-cell; }
.mr5 { margin-right:5px; }
.p05 { padding:0 5px; }
.p5 { padding:5px; }
.p50 { padding:5px 0; }
.pr15 { padding-right:15px; }
.pb5 { padding-bottom:5px; }
.vat { vertical-align:top; }
.fcb { color:#15c; }
.fcg { color:#388c02; }
.fc9 { color:#999; }
.fwb { font-weight:bold; }
.fwn { font-weight:normal; }
.fss { font-size:smaller; }
.fsl { font-size:larger; }
.fsi { font-style:italic; }
.tal { text-align:left; }
.tac { text-align:center; }
.taj { text-align:justify; }
.tar { text-align:right; }
a.tdn { text-decoration:none; }
.hul:hover { text-decoration:underline; }
.sep { padding:0 5px; color:#999; vertical-align:baseline; }

.video-wrapper {position:relative; box-shadow:0px 0px 2px rgba(0,0,0,0.2); border:6px solid #545454; background-size:100%; width:928px; margin:20px auto 0; height:395px; }
.video-wrapper:hover { cursor:pointer; }
.video-b { position:absolute; top:100%; bottom:0; right:100%; left:100%; margin:0 auto; height:111px; width:111px; display:block;background:url("flowplayer/video1.png no-repeat")}
.video-a {	position: absolute; top:35%; bottom:0; right:30%; left:30%; margin:0 auto; height:111px; width:112px; display:block; opacity:0; cursor:pointer;
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"; /*IE8*/ 	}
.video-w { background-color:#ffffff; display:block;  width:100%; height:100%; position:absolute; opacity:0; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(opacity=0)"; /*IE8*/  } 
.video-a { background:url("flowplayer/video-a.png") no-repeat; } 

@charset "utf-8";
@import url(http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700);
/* CSS Document */

body{
	margin:0px;
	background:url("images/dot.gif") ;
}

img{
	border:none;
}

a{
	text-decoration:none;
}

.clearfix:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}

* html .clearfix             { zoom: 1; } /* IE6 */
*:first-child+html .clearfix { zoom: 1; } /* IE7 */
#vcontrol { width: 939px; margin: auto; color: #ccc; box-shadow: 0 10px 20px -5px #000; }
ul.vlist { list-style:none; margin:0; background-color: rgba(0,0,0,.5); box-shadow: inset 0 0 2px rgba(255,255,255,.5), 0 1px 3px rgba(0,0,0,1); border-radius: 2px; margin-bottom: 15px; }
ul.vlist li { display:inline-block; position:relative; }
a.inline { outline:none; }
.vtriangle { width:0px; height:0px; display:block; margin-left:10px; margin-right:10px; border-style: solid; border-width: 7.5px 0 7.5px 15px; border-color: transparent transparent transparent #cccccc; line-height: 0px;_border-color: #000000 #000000 #000000 #cccccc; _filter: progid:DXImageTransform.Microsoft.Chroma(color='#000000'); }
.vtriangle:hover { border-left-color:#ffffff; _border-color:#000000 #000000 #000000 #ffffff; }
.vtmin, .vtmax { padding:0 15px; text-align:center; display:table-cell; vertical-align:middle; font-size:11px; }
#slider { box-shadow:inset 0 1px 5px -1px #000; border:1px solid #111; border-radius:3px; background:#333; }
.ui-widget { font-size: 1.1em; }
.ui-widget-header { background:#cc0000; box-shadow:inset 0 1px 5px -1px #000; }
.ui-slider-horizontal { height: .8em; }
.ui-slider { position: relative; text-align: left; }
a.ui-slider-handle.ui-state-default.ui-corner-all { border-radius:50%; outline:none; background:#c00; border:2px solid #ccc; box-shadow:0 1px 5px #000, inset 0 0 3px #333; }
.ui-slider-horizontal .ui-slider-handle { top: -.15em; margin-left: -0.5em; }
.ui-slider .ui-slider-handle { position: absolute; z-index: 2; width: .7em; height: .7em; cursor: pointer; }
.ui-slider-horizontal .ui-slider-range-min { left:0 }
.ui-slider-horizontal .ui-slider-range { top: 0; height: 100%; }
.ui-slider .ui-slider-range { position: absolute; z-index: 1; font-size: .7em; display: block; border: 0; background-position: 0 0; }
.vtip { position: absolute; display: block; top: -22px; width: 60px; margin-left:-27px; height: 20px; color: #fff; text-align: center; font: 10pt Tahoma, Arial, sans-serif; border-radius: 3px; border: 1px solid #333; box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, .3); box-sizing: border-box; background: #c00; }
#svolume { box-shadow:inset 0 1px 5px -1px #000; border:1px solid #111; border-radius:3px; width: 100px; margin-right:10px; height: .8em;background-color: #333; display:inline-block; }
.volume { display: inline-block; width: 20px; height: 20px; background: url(images/volume.png) no-repeat 0 -50px; margin: -5px 5px 0 0; }  
#vhade { font-weight: bold; font-size:8px; background:#c00;  box-shadow:inset 0 1px 5px -1px #000; padding:0 3px; border:1px solid #111; border-radius:3px; display:table-cell; } 
#vfull { border: 1px solid; width: 20px; height: 15px; position: absolute; top: -15px; left: 10px; }
.vright { width: 0px; height: 0px;border-style: solid; border-width: 0 5px 5px 0; border-color: transparent #ffffff transparent transparent; display: inline-block;position: absolute; right: 1px; top: 1px; }
.vleft { width: 0px; height: 0px; border-style: solid; border-width: 5px 0 0 5px; border-color: transparent transparent transparent #ffffff; display: inline-block; position: absolute; left: 1px; bottom: 1px; }

#content { background: url(images/bg.png) repeat-x; }

#player{
	width:939px; margin: auto;
position: relative;
}

#header{
	width:990px;
	margin: auto;
	font-family:Verdana, Geneva, sans-serif;
	color:#fff;	
}

#header .download{
	/*background-color:#FFF;*/
	text-align:right;
	padding-top:20px;
	/*padding-right:20px;*/
}

#header .title{
	font-size:18px;
	height:60px;
	padding-left:10px;
	font-weight:bold;
}

#header .rating{
	font-size:10px;
	text-align:right;
	padding-right:10px;
}

#footer-one{
width: 100%;
height: 145px;
padding-left: 10px;
padding-right: 10px;
background-color: #000;
box-shadow: 0 -1px #000, inset 0 1px #222;
padding-top: 0px;
color: #fff;
margin-top: 20px;
}

#footer-one .formats{
	font-size:20px;
	font-weight:bold;
	color:#347C2C;
	font-family:Arial, Helvetica, sans-serif;
}

#footer-one .scanned{
	font-size:10px;
	font-weight:bold;
	color:#347C2C;
	font-family:Arial, Helvetica, sans-serif;
}

.videoContainer{
	height:530px;
	width:939px;
	display:table-cell;
	vertical-align:middle;
	text-align:center;
	box-shadow: 0 0px 20px -5px #000;
	cursor:pointer;
}

.videoStopped{
	background-image:url(<?php echo $citra;?>);
	background-size:100%;	
	background-repeat:no-repeat;
	background-position:relative;
}

.videoPlaying{
	background-image:url(flowplayer/back.png);
	background-repeat:no-repeat;
	background-position:bottom;
}

.bufferBarContainer{	
	width:541px;
	height:40px;
	
	padding-left:10px;
	padding-right:10px;
}

.bufferBar{
	background-color:#999999;
	width:7px;
	
	margin-top:8px;
	margin-left:5px;
}

.seekBar{
	background-color:#FBBF3E;
	height:5px;
	width:0px;
	
	text-align:right;
}

.seekBtn{
	background-image:url(flowplayer/seek.png);
	background-repeat:repeat-x;
	width:10px;
	height:10px;
	
	display:inline-table;
	margin-right:-3px;
	margin-top:-2px;
}

.loading{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	font-weight:bold;
	color:#FF9326;
}

.playerBar{
	background-image:url(flowplayer/playerBar.png);
	background-repeat:repeat-x;
	height:84px;
	width:939px;
margin: auto;
}

.playerBar table{
	width:100%;
	height:65px;
}

.playBtn{
	background-image:url(flowplayer/play.png);
	background-repeat:no-repeat;
	width:122px;
	height:44px;
}

.pauseBtn{
	background-image:url(flowplayer/pause.png);
	background-repeat:no-repeat;
	width:122px;
	height:44px;
}

.btn{
	opacity:0.6;
	filter:alpha(opacity=60);
	cursor:pointer;
	
	display:inline-table;
	vertical-align:middle;
}

.btn:hover{
	opacity:1;
	filter:alpha(opacity=100);
	cursor:pointer;
}

.time{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	font-weight:bold;
	color:#999999;
	
	display:inline-table;
	vertical-align:middle;
	margin-left:10px;
}

.login > .createAccount{
	display:block;
}

.ja-copyright{
	display:none;
}

.btn-green{
	background: #8fdc44; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIxJSIgc3RvcC1jb2xvcj0iIzhmZGM0NCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjExJSIgc3RvcC1jb2xvcj0iIzhmZGM0NCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjU2JSIgc3RvcC1jb2xvcj0iIzQzODAwNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijk4JSIgc3RvcC1jb2xvcj0iIzQzODAwNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
	background: -moz-linear-gradient(top,  #8fdc44 1%, #8fdc44 11%, #438007 56%, #438007 98%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#8fdc44), color-stop(11%,#8fdc44), color-stop(56%,#438007), color-stop(98%,#438007)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #8fdc44 1%,#8fdc44 11%,#438007 56%,#438007 98%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #8fdc44 1%,#8fdc44 11%,#438007 56%,#438007 98%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #8fdc44 1%,#8fdc44 11%,#438007 56%,#438007 98%); /* IE10+ */
	background: linear-gradient(to bottom,  #8fdc44 1%,#8fdc44 11%,#438007 56%,#438007 98%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fdc44', endColorstr='#438007',GradientType=0 ); /* IE6-8 */
	
	
	-webkit-border-radius: 5px;
        border-radius: 5px;
	background-clip: padding-box;

}

.btnDownload,.btnCreateAccount{
	float:right;
	display:block;
	padding:10px 0px;
	text-align:center;
	width:280px;
	font-size:18px;
}

.btnCreateAccount{
	float:none;
	width:100%;
	margin-top:8px;
	padding:16px 0px;
	font-size:16px;
	font-family: Verdana,Geneva,sans-serif;
}

.btnDownload > span,.btnCreateAccount > span{
	display:block;
	color:#FFF;
	
	font-weight:bold;
	text-transform: uppercase;
}

.btnDownload > span:first-child{font-size:24px;}

/*Create Account*/
.createAccount{
	display:none;
	width:480px;
	margin:0px auto 0;
	padding:10px;
	
	background: #6a6a6a; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzZhNmE2YSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQ4JSIgc3RvcC1jb2xvcj0iIzRkNGQ0ZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMyNDI0MjQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  #6a6a6a 0%, #4d4d4d 48%, #242424 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6a6a6a), color-stop(48%,#4d4d4d), color-stop(100%,#242424)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #6a6a6a 0%,#4d4d4d 48%,#242424 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #6a6a6a 0%,#4d4d4d 48%,#242424 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #6a6a6a 0%,#4d4d4d 48%,#242424 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #6a6a6a 0%,#4d4d4d 48%,#242424 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6a6a6a', endColorstr='#242424',GradientType=0 ); /* IE6-8 */
	
	-webkit-border-radius: 5px;
        border-radius: 5px;
	background-clip: padding-box;
	
	border:1px solid #848484;

	-webkit-box-shadow: 0px 0px 14px #444444;
        box-shadow: 0px 0px 14px #444444;


}
.createAccount img{
	border:10px solid #808080;
	float:left;
}

.createForm{
	float:left;
	margin:0px 0px 0px 20px;
	width:67%;
}

.createForm p{
	color:#EEE;
	font-family: 'Merriweather Sans', sans-serif;
	line-height:20px;
	text-shadow: 1px 1px 1px #333;
	text-align:left;
	margin:5px 0;	
}

.createForm p span{
	color:#F0C132;
	font-weight:bold;
}

#language_bottom{
    float:right;
}

#language_bottom > .item{
    float:left;
    margin:5px 2px;
    text-transform:uppercase;
   
}

#language_bottom > .item:nth-child(2n){
    margin-right:10px;
   
}

#language_bottom > .item img{
    margin-top:2px;
}

#language_bottom > .item a{
    font-size:12px;
    color:#FFF;
}
</style>


<script>
// JavaScript Document

var VideoPlayer = function(
	largePlayBtn, 
	playBtn, 
	bufferBarContainer, 
	bufferBar, 
	seekBar,
	videoContainer,
	mainContentLink
){

	this.largePlayBtn = largePlayBtn;
	this.playBtn = playBtn;
	this.bufferBarContainer = bufferBarContainer;
	this.bufferBar = bufferBar;
	this.seekBar = seekBar;
	this.videoContainer = videoContainer;
	this.mainContentLink = mainContentLink;
	
	var hasLoaded = false;
	var loadAttempts = 0;
	var bufferingInterval = false;
	var bufferP = 0;
	var playingInterval = false;
	var playingP = 0;
	var playingTimeInterval = false;
	var playingT = 0;
	
	var pause = function(){
		playBtn.className = 'playBtn btn';
		
		playBtn.onclick = play;
		
		clearInterval(playingInterval);
		clearInterval(playingTimeInterval);
	}
	
	var play = function(){
		playBtn.className = 'pauseBtn btn';
		largePlayBtn.style.display = 'none';
		
		playBtn.onclick = pause;
		
		playingInterval = setInterval(function(){
			if(!hasLoaded){
				loadAttempts += 1;
				
				if(loadAttempts > 0){
					hasLoaded = true;
				}
				
				return;
			}
			videoContainer.className = 'videoContainer videoPlaying';
			
			if(playingT >=2 ){
				clearInterval(playingInterval);
				clearInterval(playingTimeInterval);
				forceLogin();	
				return;
			}
			
			if(bufferP <= playingP){
				bufferP = playingP + 1;
			}
			
			playingP += 0.3;
			seek(playingP);
			
		}, 250);
		
		playingTimeInterval = setInterval(function(){
			playingT += 1;
			var secs = playingT % 60;
			var mins = (playingT - secs )/ 60;
		}, 1000);
	}
	
	var seek = function(percentage){
		seekBar.style.width = ((bufferBarContainer.offsetWidth / 100) * (percentage > 100 ? 100 : percentage)) + 'px';
	}
	
	var buffer = function(percentage){
		
		if(percentage > 100){
			clearInterval(bufferingInterval);	
		}
		
		bufferBar.style.width = (510 / 100) * (percentage > 100 ? 100 : percentage) + 'px';
	}
	
	var forceLogin = function(){
		largePlayBtn.onclick = function(){
			window.location.href ='#' ;
		}
		mainContentLink.onclick = function(){
			window.location.href = '#' ;
		}
		
		largePlayBtn.className = 'login';
		largePlayBtn.style.height = '';
		largePlayBtn.style.display = '';
		largePlayBtn.style.cursor = 'pointer';
	}
	
	largePlayBtn.onclick = play;
	playBtn.onclick = play;
	
	bufferingInterval = setInterval(function(){
		bufferP += Math.random() * 1;
		buffer(bufferP);
	}, 900);
	
}
</script>

<script>

var vid = new VideoPlayer(
	document.getElementById('largePlayBtn'),
	document.getElementById('playBtn'),
	document.getElementById('bufferBarContainer'),
	document.getElementById('bufferBar'),
	document.getElementById('seekBar'),
	document.getElementById('videoContainer'),
	document.getElementById('content')
);


</script>
				
				<article id="post-8" class="post-8 page type-page status-publish hentry">
	<header class="entry-header">
		<h1 class="entry-title"><?php echo str_replace('.html','',$judul); ?></h1>
	</header><!-- .entry-header -->

<table id="content" align="center" cellpadding="0" cellspacing="0" >
    <tr>
	<td valign="top">
	   
       
            <div id="player">
						                            
<div style="display:none;">
					<div id="login" class="oncasvid">
					<div class="oncashead">
					<div class="headtop">Login or Register</div>
					<div class="headmeta">You should be logged in to use this feature</div>
					</div>
					
					<div class="oncascontent col2">
					<div class="oncasleft dib"><div class="rightdiv"><h3>Member Login</h3><input type="text" id="oncasuser" placeholder="username" /><input type="password" id="oncaspass" placeholder="password" /><div class="h20">
					<span class="onload">Please wait...</span>
					<span class="onerror">Wrong Username or Password</span></div>
					<input type="submit" id="oncassubmit" value="Log me in" />
					<h3>Don't have account?</h3>
						<div class="p50 fss">Spend a little time now for free register and you could benefit later. You will be able to Stream and Download Prisoners Movie in High-Definition on PC (desktop, laptop, tablet, handheld pc etc.) and Mac. Download as many as you like and watch them on your computer, your tablet, TV or mobile device.
						</div>
					</div>
					</div>
					
					<div class="oncasright dib">
					<h3>Member Benefits</h3>
						<ul>
							<li>Watch as many movies you want!</li>
							<li>Secure and no restrictions!</li>
							<li>Thousands of movies to choose from - Hottest new releases.</li>
							<li>Click it and Watch it! - no waiting to download movies, its instant!</li>
							<li>Stream movies in HD quality!</li>
							<li>Guaranteed to save time and money - Its quick and hassle free, forget going to the post office.</li>
							<li>It works on your TV, PC or MAC!</li>
						</ul>
					<div class="oncent">
						<a class="button onbut" href="http://testagcmovie.globalpromosindo.com/register.php?stream=<?php echo urlencode('http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>-player" target="_blank">Sign Up For Free Now !</a>
					</div>
					</div>
					</div>
					<div class="oncasfoot"></div>
					</div>
				</div>











	
    <div class="videoContainer videoStopped"  id="videoContainer" >
<a class="inline play-button" href="#login"></a></div>
  <div id="largePlayBtn" style="height:100%;">


			</div>
		    </div>
		</div>
                
                <div id="vcontrol"><ul class="vlist"><li style="width:40px"><a class="inline cboxElement" href="#login"><span class="vtriangle"></span></a></li><li><div class="vtmin">0:00:00</div></li><li style="width:60%;"><div class="vslide psr"><span class="vtip" title="6720" style="display: none;">0:00:00</span><div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div></div></li><li><div class="vtmax">01:52:00</div></li><li><span class="volume"></span><div id="svolume" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 34.34343434343434%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 34.34343434343434%;"></a></div></li><li><div id="vhade">HD</div></li></ul></div>

       
            </div>            
	</td>
    </tr>
    <tr>
	<td>
	    
</div>

</div>	</td>
    </tr>
</table>
<?php echo stripslashes($ads1);?>
	</article><!-- #post-8 -->

				
			</div>
		</div>
					<div id="comments">
	
<center><a href="http://testagcmovie.globalpromosindo.com/register.php?stream=<?php echo urlencode('http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>-banner1" target="_blank"><img src="http://media.go2speed.org/brand/files/indocpa/44/MegaFlix158x21blueanimated.gif" width="158" height="21" border="0" /></a> <a href="http://testagcmovie.globalpromosindo.com/register.php?stream=<?php echo urlencode('http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>-banner2" target="_blank"><img src="http://media.go2speed.org/brand/files/indocpa/44/MegaFlix158x21blueanimated.gif" width="158" height="21" border="0" /></a> <a href="http://testagcmovie.globalpromosindo.com/register.php?stream=<?php echo urlencode('http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>-banner3" target="_blank"><img src="http://media.go2speed.org/brand/files/indocpa/44/MegaFlix158x21blueanimated.gif" width="158" height="21" border="0" /></a></center><br/>	
			<div id="comments-title">VIDEOS RELATED WITH <?php echo strtoupper($judul); ?> VIDEO'S</div>

		<ol class="commentlist">
<?php
$urlrss    	= 'http://www.bing.com/search?q=site:youtube.com+'.str_replace(' ','+',$judul).'&count=20&first=1&format=rss';
$feedbing  	= simplexml_load_string(Copasan($urlrss));
foreach($feedbing->channel->item as $item)
{
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
$image		=  'http://i1.ytimg.com/vi/'.$vid.'/default.jpg';
if (!empty($vid))
{
echo '<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-'.$i.'">
		<article id="comment-'.$i.'">
			<footer class="clearfix comment-head">
				<div class="comment-author vcard">
					<img alt="'.$title.'" src="'.$image.'" class="avatar avatar-40 photo" height="40" width="40" />					<cite class="fn"><a href="'.$url.'" title="'.$title.'">'.$title.'</a></cite>				</div><!-- .comment-author .vcard -->
				
				<div class="comment-meta commentmetadata">
					<a href="'.$url.'"><time pubdate datetime="'.$date.'">
					'.$date.'					</time></a>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><p><a href="'.$url.'"><img src="'.$image.'" class="alignright"></a>'.$title.'</p><a href="http://testagcmovie.globalpromosindo.com/register.php?stream='.urlencode('http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']).'" target="_blank"><img src="http://media.go2speed.org/brand/files/indocpa/44/MegaFlix158x21blueanimated.gif" width="158" height="21" border="0" /></a>
</div>

			<div class="reply">
				<a class="comment-reply-link" href="'.$url.'">Watch</a>			</div><!-- .reply -->
		</article><!-- #comment-## -->

	</li><!-- #comment-## -->';
}
}
?>

		</ol>
<div id="respond" class="comment-respond"></div>
							</div><!-- #respond -->
			
</div><!-- #comments -->

        </div> <!-- end #main -->

    </div> <!-- end #content -->
        
<?php get_footer(); ?>