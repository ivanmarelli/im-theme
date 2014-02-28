<?php
$themename  = "IM-theme";
$shortname  = "im";
$options = array (
    array( "name" => $themename." Opciones",
    "type" => "title"),
    array( "type" => "open"),
/*
    array( "name" => "Color Scheme",
    "desc" => "Select the color scheme for the theme",
    "id" => $shortname."_color_scheme",
    "type" => "select",
    "options" => array("blue", "red", "green"),
    "std" => "blue"),
    array( "name" => "Logo URL",
    "desc" => "Enter the link to your logo image",
    "id" => $shortname."_logo",
    "type" => "text",
    "std" => ""),
    array( "name" => "Homepage header image",
    "desc" => "Enter the link to an image used for the homepage header.",
    "id" => $shortname."_header_img",
    "type" => "text",
    "std" => ""),
    array( "name" => "Footer copyright texto",
    "desc" => "Introduzca el texto utilizado en el lado derecho del pie de página. Puede ser HTML",
    "id" => $shortname."_footer_text",
    "type" => "text",
    "std" => ""),
*/
    array( "name" => "Fan Page Facebook",
    "desc" => "Pegue su url de su fan page. Ej. ",
    "id" => $shortname."_fb_code",
    "type" => "text",
    "std" => ""),
    array( "name" => "Twitter",
    "desc" => "Su perfil de twitter. Ej: @ivanmarelli",
    "id" => $shortname."_tw_code",
    "type" => "text",
    "std" => ""),
    array( "name" => "Google Analytics",
    "desc" => "Pegue de Google Analytics u otros códigos de seguimiento en este cuadro. Se añade debajo del footer",
    "id" => $shortname."_ga_code",
    "type" => "textarea",
    "std" => ""),
    array( "name" => "RSS Feed",
    "desc" => "Pegue su RSS URL Feedburner aquí para que los lectores lo ven en su sitio web",
    "id" => $shortname."_feedburner",
    "type" => "text",
    "std" => get_bloginfo('rss2_url')),
    array( "type" => "close")
);


function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
            foreach ($options as $value) {
                if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                    header("Location: themes.php?page=functions.php&saved=true");
                    die;
                } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); }
                header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_menu_page($themename." Opciones", "".$themename." Opciones", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>

<div>
<h2><?php echo $themename; ?> - Configuración</h2>
<form method="post">
    <?php foreach ($options as $value) {
            switch ( $value['type'] ) {
                case "open":
    ?>
<table width="100%" border="0" style="background-color:#cdcdcd; padding:10px;">
        <?php break;
                case "close":
        ?>
</table><br />
        <?php break;
                case "title":
        ?>

<table width="100%" border="0" style="background-color:#868686; padding:5px 10px;"><tr>
<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
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
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
        <?php
            break;
            case 'textarea':
        ?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
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
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
        <?php
            break;
            case "checkbox":
        ?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><?php // if(get_option($value['id'])){ $checked = "checked="checked""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
</td>
</tr>
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
      <?php break;
         }
    }
?>
    <p>
    <input name="save" type="submit" value="Save changes" />
    <input type="hidden" name="action" value="save" />
    </p>
</form>
    <form method="post">
        <p>
            <input name="reset" type="submit" value="Reset" />
            <input type="hidden" name="action" value="reset" />
        </p>
    </form>
</div>

    <?php
        }
    add_action('admin_menu', 'mytheme_add_admin');
?>
<?php echo $shortname_feedburner; ?>