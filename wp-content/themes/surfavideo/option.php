<?php
$themename = "YOUTUBE PAKAI BING";
$shortname = "wall";
	
$options = array (

	array(  "name" => "HOMEPAGE KEYWORD",
            "type" => "title",
			"desc" => "",
        ),
		
	array(  "type" => "open"),

	array( 	"name" => "Keyword",
			"desc" => "Enter Main Keyword, and homepage will displaying images related your choosen keyword",
			"id" => $shortname."_keyword",
			"std" => "camera",
            "type" => "text"),
	
	array(  "type" => "close"),

array(  "name" => "ADS UNDER VIDEO",
            "type" => "title",
			"desc" => "",
        ),
		
	array(  "type" => "open"),	
	
        array( 	"name" => "ADS UNDER VIDEO",
			"desc" => "Enter ADS Code, It will be dispalyed under video",
			"id" => $shortname."_ads1",
			"std" => "",
            "type" => "textarea"), 		
	
	array(  "type" => "close"),
array(  "name" => "GREETING OR WELCOME MESSAGE",
            "type" => "title",
			"desc" => "",
        ),
		
	array(  "type" => "open"),	
	
        array( 	"name" => "GREETING",
			"desc" => "ENTER YOUR WELCOME OR GRETING MESSAGE HERE",
			"id" => $shortname."_greeting",
			"std" => "Dealer Pulsa Elektrik Terpercaya Sejak 2 November 2007, <a href=http://bosspulsa.com>http://bosspulsa.com</a>",
            "type" => "text"), 		
	
	array(  "type" => "close"),
	
);

 
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=option.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=option.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." OPTIONS", "$themename OPTIONS", 'edit_themes', basename(__FILE__), 'mytheme_admin');
	//add_menu_page( $themename." OPTIONS", "$themename OPTIONS", 'edit_themes', basename(__FILE__), 'mytheme_admin');  
}



function mytheme_admin() {

    global $themename, $shortname, $options;


    
    
?>
<div class="wrap">
<div class="opwrap" style="background:#fff; margin:20px auto; width:80%; padding:30px; border:1px solid #ddd;" >



<h2 class="wraphead" style="margin:10px 0px; padding:15px 10px; font-family:arial black; font-style:normal; background:#B3D5EF;"><b><?php echo $themename; ?> THEME OPTION</b></h2>
   <?php
   if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	?>
<form method="post">

<?php foreach ($options as $value) {


switch ( $value['type'] ) {

case "image":
?>


<tr>
<td width="30%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="70%"><img src="<?php echo $value['id']; ?>" /></td>
</tr>
<tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<?php break;

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br />
<?php break;

case "break":
?>
<tr><td colspan="2" style="border-top:1px solid #C2DCEF;">&nbsp;</td></tr>

<?php break;

case "title":
?>

<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    <td colspan="2"><h3 style="font-size:18px;font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>

	</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ffffff;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<p style="text-align:right;"> Dealer Pulsa Elektrik Murah? Ya! <a href="http://bosspulsa.com">BOSSPULSA.COM</a> </small>
</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
