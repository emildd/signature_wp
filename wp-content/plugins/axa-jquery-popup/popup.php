<?php
 /*
 Plugin Name: [AXA] Jquery Popup
 Plugin URI: http://blog.casanova.vn/wordpress-jquery-popup-plugin/
 Description:  Create a <strong>stunning and great window popup from the scratch using jQuery</strong>. After active please goto <strong>Settings</strong> --> <strong>Popup Management</strong> to configuration it. Modified by Bukhori M Aqid in order to comply with AXA request.
 Version: 1.0
 Author: Nguyen Duc Manh
 Author URI: http://casanova.vn
 */
 
/*****************Frontend****************************************/
function csnv_popup_script(){
	if(get_option('csnv_popup_active')){ 		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 
			'casnova_popup.css', 
			plugins_url('/casnova_popup.css', __FILE__),
			'',
			'',
			false
		);
		
		wp_enqueue_script(
			'casnova_popup.js',
			plugins_url('/casnova_popup.js', __FILE__),
			'',
			'',
			false
		);
		add_action('wp_head', 'head_script');
		add_action('wp_footer', 'append_popup_to_body');
		add_action('wp_footer', 'append_float_to_body');
	}	
}

function head_script()
{
?>
<script type="text/javascript">
<?php if( get_option('csnv_popup_cookie')): ?>
	var popupStatus = getCookie('casanovaPopup')=='on' ? 1 : 0;
<?php else:?>
	var popupStatus = getCookie('casanovaPopup')=='on' ? 0 : 0;
<?php endif;?>	
</script>
<?php	
}

function append_popup_to_body(){
	?>
	<style type="text/css">
	#popupContact{
		height:<?php echo get_option("csnv_popup_h")+10; ?>px;
		width:<?php echo get_option("csnv_popup_w") +10; ?>px;
		}
    </style>
	<script type="text/javascript">
		var enablePopup = 1;
		var imageUrl 	= '<?php echo get_option("csnv_popup_img"); ?>';
		var buttonImageUrl 	= '<?php echo get_option("csnv_popup_btn_img"); ?>';
		var articleUrl 	= '<?php echo get_option("csnv_popup_url"); ?>';
		var targetUrl 	= '<?php echo get_option("csnv_popup_target"); ?>';
		var bottomColor	= '<?php echo get_option("csnv_popup_color"); ?>';
		var popupText	= '<?php echo get_option("csnv_popup_text"); ?>';
		var siteUrl 	=  '<?php echo get_site_url(); ?>';
		
		var popup_area = "";
		if(enablePopup){
			popup_area += "<div id='popupContact'>";
			popup_area += "<div><a id='popupContactClose' href='javascript:void(0);'><span>&nbsp;</span></a></div>";
			<?php if(get_option("csnv_popup_click_close")==1): ?>
			popup_area += "<a href='javascript:disablePopup();' target='_top'><img src='" + imageUrl + "' width='<?php echo get_option("csnv_popup_w"); ?>'></a>";
			<?php else: ?>
			popup_area += "<div class='upper' style='background-color:#fff; padding:15px;'> <img src='"+ imageUrl + "'> </div>";
			// popup_area += "<div class='bottom' style='background-color:"+bottomColor+";'> <p>" + popupText + "</p> <a href='" + articleUrl + "' target='"+ targetUrl +"'> <img src='"+ buttonImageUrl + "'> </a> </div>";
			//edited by Adhit
			popup_area += "<div class='bottom' style='background-color:"+bottomColor+";'> <p style='font-size:17px;padding:0 20px;margin-bottom:10px;'>" + popupText + "</p> <a class='button red' href='" + articleUrl + "' target='"+ targetUrl +"'>KLIK DI SINI <i class='fa fa-angle-double-right'></i> </a> </div>";
			<?php endif;?>
			popup_area += "</div><div id='backgroundPopup'></div>";

			<?php 
				if(get_option("csnv_popup_position")==1){
					if( (($_SERVER["SERVER_PORT"] == '443' ? "https://" : "http://") . ($_SERVER["HTTP_HOST"]) . ($_SERVER["REQUEST_URI"])) == (get_site_url() . "/") ):?>
					 	document.write(popup_area);
					<?php endif;?>
					<?php
				}
				
				elseif(get_option("csnv_popup_position")==2){
					if(is_page()):?>
					 document.write(popup_area);
					<?php endif;?>
					<?php
				}
				
				elseif(get_option("csnv_popup_position")==3){
					if(is_single()):?>
					 document.write(popup_area);
					<?php endif;?>
					<?php
				}
				
				elseif(get_option("csnv_popup_position")==4){
					if(is_archive()):?>
					 document.write(popup_area);
					<?php endif;?>
					<?php
				}
				elseif(get_option("csnv_popup_position")==0){
					?>
					 document.write(popup_area);
				    <?php	 
				}
			 ?>
		}
    </script>
<?php	
}

function append_float_to_body(){
	?>

	<style type="text/css">
		#popupFloat{
			position: fixed;
			top:450px;
			right: 0px;
		}
	</style>
	<script type="text/javascript">
		var floatImageUrl 	= '<?php echo get_option("csnv_popup_float_img"); ?>';
		var float_area = "<div id='popupFloat'> <a href='javascript:loadPopup()'>";
		float_area += "<img src='"+ floatImageUrl + "'/>"
		float_area += "</a></div>";

		document.write(float_area);

	</script>
	<?php
}

add_action('init', 'csnv_popup_script');

/************Admin Panel***********/
function csnv_popup_plugin_remove(){
	delete_option('csnv_popup_active');	
	delete_option('csnv_popup_cookie');	
	delete_option('csnv_popup_w');
	delete_option('csnv_popup_h');
	delete_option('csnv_popup_img');
	delete_option('csnv_popup_btn_img');
	delete_option('csnv_popup_float_img');
	delete_option('csnv_popup_color');
	delete_option('csnv_popup_url');
	delete_option('csnv_popup_target');
	delete_option('csnv_popup_text');
	delete_option('csnv_popup_position');
	delete_option('csnv_popup_click_close');
}
function csnv_popup_plugin_install(){
	add_option('csnv_popup_active',1);
	add_option('csnv_popup_cookie',0);// Mac dinh khong dung cookie
	add_option('csnv_popup_w','315');
	add_option('csnv_popup_h','200');
	add_option('csnv_popup_img',plugins_url('/axamandiri_logo.png', __FILE__));
	add_option('csnv_popup_btn_img',plugins_url('/button-axa.png', __FILE__));
	add_option('csnv_popup_float_img',plugins_url('/float.png', __FILE__));
	add_option('csnv_popup_color','#ffda00');
	add_option('csnv_popup_url','https://axa-mandiri.co.id');
	add_option('csnv_popup_target','_blank');
	add_option('csnv_popup_text','Nasabah <strong>AXA Mandiri</strong> silahkan klik disini');
	add_option('	','1');
	add_option('csnv_popup_click_close','0');
}

function csnv_popup_menu() {
	add_options_page( __('Popup Management',''), __('Popup Management',''), 8, basename(__FILE__), 'csnv_popup_setting');
}
function csnv_popup_setting(){
		if($_POST['status_submit']==1){			
			update_option('csnv_popup_active',intval($_POST['csnv_popup_active']));
			update_option('csnv_popup_cookie',intval($_POST['csnv_popup_cookie']));
			
			update_option('csnv_popup_w',intval($_POST['csnv_popup_w']));
			update_option('csnv_popup_h',intval($_POST['csnv_popup_h']));
			update_option('csnv_popup_img',trim($_POST['csnv_popup_img']));
			update_option('csnv_popup_btn_img',trim($_POST['csnv_popup_btn_img']));
			update_option('csnv_popup_float_img',trim($_POST['csnv_popup_float_img']));
			update_option('csnv_popup_color',trim($_POST['csnv_popup_color']));
			update_option('csnv_popup_url',trim($_POST['csnv_popup_url']));
			update_option('csnv_popup_target',trim($_POST['csnv_popup_target']));
			update_option('csnv_popup_text',trim($_POST['csnv_popup_text']));
			
			update_option('csnv_popup_position',intval($_POST['csnv_popup_position']));
			update_option('csnv_popup_click_close',intval($_POST['csnv_popup_click_close']));
			
			echo '<div id="message" class="updated fade"><p>Your settings were saved !</p></div>';
		}
		if($_POST['status_submit']==2){	
			update_option('csnv_popup_active',1);
			update_option('csnv_popup_cookie',0);
			
			update_option('csnv_popup_w','315');
			update_option('csnv_popup_h','200');
			update_option('csnv_popup_img',plugins_url('/axamandiri_logo.png', __FILE__));
			add_option('csnv_popup_btn_img',plugins_url('/button-axa.png', __FILE__));
			add_option('csnv_popup_float_img',plugins_url('/float.png', __FILE__));
			add_option('csnv_popup_color','#ffda00');
			update_option('csnv_popup_url','https://axa-mandiri.co.id');
			update_option('csnv_popup_target',"_blank");
			update_option('csnv_popup_text',"Nasabah <strong>AXA Mandiri</strong> silahkan klik disini");
			update_option('csnv_popup_click_close',0);			
			update_option('csnv_popup_position','1');
			echo '<div id="message" class="updated fade"><p>Your settings were reset !</p></div>';
		}
	?>
	<h2>Popup Setting</h2>
	<form method="post" id="csnv_options">	
    	<input type="hidden" name="status_submit" id="status_submit" value="2"  />
		<table width="100%" cellspacing="2" cellpadding="5" class="editform">
			<tr valign="top"> 
				<td width="150" scope="row">Active plugin:</td>
				<td>
                	<label><input type="radio" name="csnv_popup_active" <?php if (get_option('csnv_popup_active')=='1'):?> checked="checked"<?php endif;?> value="1" />Yes</label>
                    <label><input type="radio" name="csnv_popup_active" <?php if (get_option('csnv_popup_active')=='0'):?> checked="checked"<?php endif;?> value="0" />No</label>
				</td> 
			</tr>
            <tr valign="top"> 
				<td width="150" scope="row">Set Cookie:<br /><small>Yes = Display once per day<br />No = Always display</small></td>
				<td>
                	<select name="csnv_popup_cookie">
                    	<option value="1"<?php if (get_option('csnv_popup_cookie')=='1'):?> selected="selected"<?php endif;?>>Yes</option>
                        <option value="0"<?php if (get_option('csnv_popup_cookie')=='0'):?> selected="selected"<?php endif;?>>No</option>
                    </select>
				</td> 
			</tr>
            <tr valign="top"> 
				<td width="150" scope="row" valign="middle">Display option:</td>
				<td>
                	<p><label><input type="radio" name="csnv_popup_position" <?php if (get_option('csnv_popup_position')=='1'):?> checked="checked"<?php endif;?> value="1" /> Home only</label></p>
                   
                    <p><label><input type="radio" name="csnv_popup_position" <?php if (get_option('csnv_popup_position')=='2'):?> checked="checked"<?php endif;?> value="2" /> Pages only</label></p>
                    
                    <p><label><input type="radio" name="csnv_popup_position" <?php if (get_option('csnv_popup_position')=='3'):?> checked="checked"<?php endif;?> value="3" /> Single post only</label></p>
                    
                    <p><label><input type="radio" name="csnv_popup_position" <?php if (get_option('csnv_popup_position')=='4'):?> checked="checked"<?php endif;?> value="4" /> Archives only</label></p>
                   
                    <p><label><input type="radio" name="csnv_popup_position" <?php if (get_option('csnv_popup_position')=='0'):?> checked="checked"<?php endif;?> value="0" /> All</label></p>
				</td> 
			</tr>
            
            <tr valign="top"> 
				<td  scope="row">Popup width:<br /><small>Width of your popup</small></td> 
				<td scope="row">			
					<input name="csnv_popup_w" size="4" maxlength="4" value="<?php echo (get_option('csnv_popup_w'));?>" /> px (number only)
				</td> 
			</tr>
            <tr valign="top"> 
				<td  scope="row">Popup height:<br /><small>Height of your popup</small></td> 
				<td scope="row">			
					<input name="csnv_popup_h" size="3" maxlength="3" value="<?php echo (get_option('csnv_popup_h'));?>" /> px (number only)
				</td> 
			</tr>
            
            <tr valign="top"> 
				<td  scope="row">Logo image:<br /><small>Enter your logo url</small></td> 
				<td scope="row">			
					<input name="csnv_popup_img" size="50" value="<?php echo html_entity_decode(get_option('csnv_popup_img'));?>" /> 
				</td> 
			</tr>

			<tr valign="top"> 
				<td  scope="row">Button image:<br /><small>Enter your button url</small></td> 
				<td scope="row">			
					<input name="csnv_popup_btn_img" size="50" value="<?php echo html_entity_decode(get_option('csnv_popup_btn_img'));?>" /> 
				</td> 
			</tr>

			<tr valign="top"> 
				<td  scope="row">Popup Color :<br /><small>Enter your color hexa</small></td> 
				<td scope="row">			
					<input name="csnv_popup_color" size="50" value="<?php echo html_entity_decode(get_option('csnv_popup_color'));?>" /> 
				</td> 
			</tr>

			<tr valign="top"> 
				<td  scope="row">Popup Text :<br /><small>Enter your popup information here</small></td> 
				<td scope="row">			
					<input name="csnv_popup_text" size="50" value="<?php echo html_entity_decode(get_option('csnv_popup_text'));?>" /> 
				</td> 
			</tr>

			<tr valign="top"> 
				<td  scope="row">Float Image :<br /><small>Enter your floating image here</small></td> 
				<td scope="row">			
					<input name="csnv_popup_float_img" size="50" value="<?php echo html_entity_decode(get_option('csnv_popup_float_img'));?>" /> 
				</td> 
			</tr>

            <tr>
            	<td>Onclick button</td>
                <td>
                	<p><label><input type="checkbox" name="csnv_popup_click_close" value="1" <?php checked( (bool) get_option("csnv_popup_click_close"), true ); ?> onClick="if(this.checked) document.getElementById('popUrlSection').style.display='none'; else document.getElementById('popUrlSection').style.display=''" /> Close it</label></p>
                    <div id="popUrlSection"<?php if(get_option("csnv_popup_click_close")) echo "style='display:none;'"; ?>>
                    	Or goto Url<br />
                        <input name="csnv_popup_url" size="50"  value="<?php echo (get_option('csnv_popup_url'));?>" />
                    
                    Target:
                    <select name="csnv_popup_target">
                    	<option value="_blank">_blank</option>
                        <option value="_new">_new</option>
                        <option value="_parent">_parent</option>
                        <option value="_self">_self</option>
                        <option value="top">_top</option>
                    </select>
                    </div>
                </td>
            </tr>
            
             <tr valign="top"> 
				<td  scope="row"></td> 
				<td scope="row">			
					<input type="button" name="save" onclick="document.getElementById('status_submit').value='1'; document.getElementById('csnv_options').submit();" value="Save setting" class="button-primary" />
				</td> 
			</tr>
            <tr><td colspan="2"><br /><br /></td></tr>
            <tr valign="top"> 
				<td  scope="row"></td> 
				<td scope="row">			
					<input type="button" name="reset" onclick="document.getElementById('status_submit').value='2'; document.getElementById('csnv_options').submit();" value="Reset to default setting" class="button" />
				</td> 
			</tr>
		</table>
        
	</form>	
	<?php
}

//add setting menu
add_action('admin_menu', 'csnv_popup_menu');
/* What to do when the plugin is activated? */
register_activation_hook(__FILE__,'csnv_popup_plugin_install');
/* What to do when the plugin is deactivated? */
register_deactivation_hook( __FILE__, 'csnv_popup_plugin_remove' );
?>	