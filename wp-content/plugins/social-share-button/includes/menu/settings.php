<?php	


/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



if(empty($_POST['social_share_button_hidden'])){
	
		$social_share_button_total = get_option( 'social_share_button_total' );	
		$social_share_button_sites = get_option( 'social_share_button_sites' );
		$social_share_button_theme = get_option( 'social_share_button_theme' );		
		
		$social_share_button_more_display = get_option( 'social_share_button_more_display' );
	    $social_share_button_display_total_count = get_option( 'social_share_button_display_total_count' );
		
		$social_share_button_display = get_option( 'social_share_button_display' );
		$social_share_button_count_format = get_option( 'social_share_button_count_format' );						


	}
else{

	$nonce = $_POST['_wpnonce'];
	if(wp_verify_nonce( $nonce, 'social_share_button_nonce' ) && $_POST['social_share_button_hidden'] == 'Y') {
		//if($_POST['social_share_button_hidden'] == 'Y') {
			//Form data sent


			$social_share_button_total = sanitize_text_field($_POST['social_share_button_total']);
			update_option('social_share_button_total', $social_share_button_total);

			$social_share_button_sites = stripslashes_deep($_POST['social_share_button_sites']);

			foreach ($social_share_button_sites as $site_key=>$site_data){

				$social_share_button_sites_array[$site_key]['title'] = sanitize_text_field($site_data['title']);
				$social_share_button_sites_array[$site_key]['id'] = sanitize_text_field($site_data['id']);
				$social_share_button_sites_array[$site_key]['share_url'] = esc_url($site_data['share_url']);
				$social_share_button_sites_array[$site_key]['icon'] = sanitize_text_field($site_data['icon']);

				if(!empty($site_data['visible'])){
					$social_share_button_sites_array[$site_key]['visible'] = sanitize_text_field($site_data['visible']);
                }
                else{
	                $social_share_button_sites_array[$site_key]['visible'] = '';
                }

				$social_share_button_sites_array[$site_key]['can_remove'] = sanitize_text_field($site_data['can_remove']);
            }

			$social_share_button_sites = $social_share_button_sites_array;

			//echo '<pre>'.var_export($social_share_button_sites, true).'</pre>';


			update_option('social_share_button_sites', $social_share_button_sites);
			
			$social_share_button_theme = sanitize_text_field($_POST['social_share_button_theme']);
			update_option('social_share_button_theme', $social_share_button_theme);
			
			$social_share_button_more_display = sanitize_text_field($_POST['social_share_button_more_display']);
			update_option('social_share_button_more_display', $social_share_button_more_display);

            $social_share_button_display_total_count = sanitize_text_field($_POST['social_share_button_display_total_count']);
            update_option('social_share_button_display_total_count', $social_share_button_display_total_count);

			$social_share_button_display = stripslashes_deep($_POST['social_share_button_display']);

			foreach ($social_share_button_display as $display_key=>$display_data){

				$social_share_button_display_array[$display_key]['location'] = sanitize_text_field($display_data['location']);
				$social_share_button_display_array[$display_key]['position'] = sanitize_text_field($display_data['position']);
				$social_share_button_display_array[$display_key]['posttype'] = sanitize_text_field($display_data['posttype']);
				$social_share_button_display_array[$display_key]['page_type'] = sanitize_text_field($display_data['page_type']);
			}



			$social_share_button_display = $social_share_button_display_array;


			//echo '<pre>'.var_export($social_share_button_display, true).'</pre>';


			update_option('social_share_button_display', $social_share_button_display);			
							
			$social_share_button_count_format = sanitize_text_field($_POST['social_share_button_count_format']);
			update_option('social_share_button_count_format', $social_share_button_count_format);			


			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.', 'social_share_button' ); ?></strong></p></div>
	
			<?php
			} 
	}	

	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".social_share_button_plugin_name.' '.__('Settings', 'social_share_button')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', esc_url($_SERVER['REQUEST_URI'])); ?>">
	<input type="hidden" name="social_share_button_hidden" value="Y">
        <?php settings_fields( 'social_share_button_plugin_options' );
				do_settings_sections( 'social_share_button_plugin_options' );

		?>

    
    <div class="para-settings wp-share-button-settings">
    
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><?php _e('Options','social_share_button'); ?></li>
            <li nav="2" class="nav2"><?php _e('Style','social_share_button'); ?></li>
            <li nav="3" class="nav3"><?php _e('Display','social_share_button'); ?></li>                   
            <li nav="4" class="nav4"><?php _e('Shortcode','social_share_button'); ?></li>
            <li nav="5" class="nav5"><?php _e('Help & Support','social_share_button'); ?></li>            
                                 
        </ul> <!-- tab-nav end --> 
		<ul class="box">
       		<li style="display: block;" class="box1 tab-box active">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Total max button display','social_share_button'); ?></p>
                    <p class="option-info"></p> 
                    
                    <input size="15" type="text" name="social_share_button_total" value="<?php if(!empty($social_share_button_total)) echo $social_share_button_total; else echo 4; ?>" />
				</div>          
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Display more buttons','social_share_button'); ?></p>
                    <p class="option-info"></p> 
                    <select name="social_share_button_more_display" >
                    <option <?php if($social_share_button_more_display=='yes') echo 'selected'; ?> value="yes" >Yes</option>
                    <option <?php if($social_share_button_more_display=='no') echo 'selected'; ?> value="no" >No</option>
                    </select>

				</div>

                <div class="option-box">
                    <p class="option-title"><?php _e('Display total count','social_share_button'); ?></p>
                    <p class="option-info"></p>
                    <select name="social_share_button_display_total_count" >
                        <option <?php if($social_share_button_display_total_count=='yes') echo 'selected'; ?> value="yes" >Yes</option>
                        <option <?php if($social_share_button_display_total_count=='no') echo 'selected'; ?> value="no" >No</option>
                    </select>

                </div>


                <div class="option-box">
                    <p class="option-title"><?php _e('Count format','social_share_button'); ?></p>
                    <p class="option-info"><?php _e('Full format will display whole number(4000) and short format will display as 4k (i.e 4000).','social_share_button'); ?></p> 
                    <select name="social_share_button_count_format" >
                    <option <?php if($social_share_button_count_format=='full') echo 'selected'; ?> value="full" >Full</option>
                    <option <?php if($social_share_button_count_format=='short') echo 'selected'; ?> value="short" >Short</option>
                    </select>

				</div>             
            
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Sharing sites','social_share_button'); ?></p>
                    <p class="option-info"><?php _e('you can pass values for url and title dynamically using following string on share url, <ul><li>TITLE = Post Title </li><li>URL = Post url</li> </ul>','social_share_button'); ?></p>
                    
                    
                    <table class="widefat " id="social_share_button_sites">
                        <thead>
                        	<tr>
                            	<th><?php _e('Sort','social_share_button'); ?></th><th><?php _e('Site name','social_share_button'); ?></th><th><?php _e('ID','social_share_button'); ?></th><th><?php _e('Share URL','social_share_button'); ?></th><th title="Font Awesome Icon ID"><?php _e('FA Icon','social_share_button'); ?></th><th><?php _e('Visiblity','social_share_button'); ?></th><th><?php _e('Remove','social_share_button'); ?></th>
                       		</tr>  
						</thead>
                    <?php 
        
                    
                    if(empty($social_share_button_sites)){
							
							$class_social_share_button_functions = new class_social_share_button_functions();
							$social_share_button_sites = $class_social_share_button_functions->social_share_button_sites();

                           // $social_share_button_sites = $social_share_button_sites_defaults;
                        }

                    if(!empty($social_share_button_sites))
                    foreach ($social_share_button_sites as $site_key=>$site_info) {
                        if(!empty($site_key))
                            {
                                ?>
                            <tr><td class="sorting"><span class="sort"><i class="fa fa-bars" aria-hidden="true"></i></span></td>
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_key; ?>][title]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['title'])) echo $social_share_button_sites[$site_key]['title']; ?>" />
                            </td>                 
                            
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_key; ?>][id]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['id'])) echo $social_share_button_sites[$site_key]['id']; ?>" />
                            </td>
                            
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_key; ?>][share_url]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['share_url'])) echo $social_share_button_sites[$site_key]['share_url']; ?>" />
                            </td>                            
                            
                             
                            
                            
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_key; ?>][icon]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['icon'])) echo $social_share_button_sites[$site_key]['icon']; ?>" />
                            </td>
                   
                            <td>
                            
                            <?php
                            if(!empty($social_share_button_sites[$site_key]['visible'])){
								
								$checked = 'checked';
								}
							else{
								$checked = '';
								}
							
							?>
                            
                            
                            <input <?php echo $checked; ?> name="social_share_button_sites[<?php echo $site_key; ?>][visible]" type="checkbox" value="yes" />
                            </td>                   
                   
                   
                            <td>
                            
                            <?php
                            if($site_info['can_remove']=='yes'){
                            ?>
                            
                            <span class="remove"><i class="fa fa-times"></i></span>
        
                            <?php
                            }
                            else{
                                echo '<span class="no-remove" title="Can\'t remove.">...</span>';
                                
                                }
                            
                            ?>
                            
                            <input name="social_share_button_sites[<?php echo $site_key; ?>][can_remove]" type="hidden" value="<?php echo $site_info['can_remove']; ?>" />
                            
                            
                            </td>
                            
                            
                            </tr>
                                <?php
                                
                                
                            
                            }
                    }
                    
                    ?>
        
                            
                	</table> 
                    <br/>
                    <div class="button add-site" ><?php _e('Add more','social_share_button'); ?></div>
                    <div class="button reset-site" ><?php _e('Reset','social_share_button'); ?></div>
                    
            	</div>
			</li>
            <li style="display: none;" class="box2 tab-box">
                <div class="option-box">
                    <p class="option-title"><?php _e('Themes','social_share_button'); ?></p>
                    <p class="option-info"></p> 

                    <?php
                    
					$class_social_share_button_functions = new class_social_share_button_functions();
					$social_share_button_themes = $class_social_share_button_functions->social_share_button_themes();

					foreach($social_share_button_themes as $theme_key=>$theme_name){
						
						if($social_share_button_theme == $theme_key){
							$checked = 'checked';
							}
						else{
							$checked = '';
							}
						
						
						?>

                        <div class="">
                        <label>
                        
                        <input <?php echo $checked; ?> type="radio" name="social_share_button_theme" value="<?php echo $theme_key; ?>" />
                        <img src="<?php echo social_share_button_plugin_url.'includes/menu/images/'.$theme_key.'.png'; ?>" />
                        </label>
                        </div>
						<?php
						
						
						
						}
					
					
					
					
					?>


                    
                    
            	</div>
                
                
            </li>
            <li style="display: none;" class="box3 tab-box">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Display on these automatically','social_share_button'); ?></p>
                    <p class="option-info"></p> 
                    
                    <?php
                  // var_dump($social_share_button_display);
					?>
                    <table class="widefat " id="social_share_button_display">
                    <thead>
                    <tr>
                    	<th><?php _e('Display on','social_share_button'); ?></th>
                        <th><?php _e('Position','social_share_button'); ?></th>
                        <th><?php _e('Postypes','social_share_button'); ?></th>
                        <th><?php _e('Page type','social_share_button'); ?></th>
                        <th><?php _e('Remove','social_share_button'); ?></th>                                             
                                               
                    </tr>
                    </thead>
                    
                    <?php
                    
					if(empty($social_share_button_display)){
						
					$social_share_button_display = array(
													'0' => array(	'location'=>'content',
																	'position'=>'after',
																	'posttype'=>'post',																	
																	'page_type'=>'single',
																	),

														);
														
						}

					
					
					
					
					foreach($social_share_button_display as $key=>$button_info){
						
						?>
                        <tr>
                            <td>
                            
                            <?php $location = $button_info['location']; ?>
                            
                            <select name="social_share_button_display[<?php echo $key; ?>][location]" >
                                <option <?php if($location=='none') echo 'selected'; ?> value="none"><?php _e('None','social_share_button'); ?></option>                           
                                <option <?php if($location=='content') echo 'selected'; ?> value="content"><?php _e('Content','social_share_button'); ?></option>

                            </select>
                            </td>
                            <td>
                            <?php $position= $button_info['position']; ?>
                            <select name="social_share_button_display[<?php echo $key; ?>][position]" >
                                <option <?php if($position=='none') echo 'selected'; ?> value="none"><?php _e('None','social_share_button'); ?></option>                            	<option <?php if($position=='before') echo 'selected'; ?> value="before"><?php _e('Before','social_share_button'); ?></option>
                                <option <?php if($position=='after') echo 'selected'; ?> value="after"><?php _e('After','social_share_button'); ?></option>                            
                            </select>
                            </td>
                            
                            <td>
                            <?php $posttype = $button_info['posttype']; 
							
							$post_types = get_post_types( '', 'names' );

							?>
                            <select name="social_share_button_display[<?php echo $key; ?>][posttype]" >
                            <option <?php if($posttype=='none') echo 'selected'; ?> value="none"><?php _e('None','social_share_button'); ?></option>
                            <?php
                            foreach ( $post_types as $post_key ){
								
								
								?>
                                <option <?php if($posttype==$post_key) echo 'selected'; ?> value="<?php echo $post_key; ?>"><?php echo $post_key; ?></option>
                                <?php
								}

							?>
                            
                            </select>
                            </td>
                            
                                                
                            <td>
                            <?php 

							
							$page_type = $button_info['page_type'];
							 ?>
                            <select name="social_share_button_display[<?php echo $key; ?>][page_type]" >
                                <option <?php if($page_type=='none') echo 'selected'; ?> value="none"><?php _e('None','social_share_button'); ?></option>                            
                                <option <?php if($page_type=='single') echo 'selected'; ?> value="single"><?php _e('Single','social_share_button'); ?></option>
                                <option <?php if($page_type=='archive') echo 'selected'; ?> value="archive"><?php _e('Archive','social_share_button'); ?></option>
                                <option <?php if($page_type=='home') echo 'selected'; ?> value="home"><?php _e('Home','social_share_button'); ?></option>                                                  
                            </select>
                            </td>
                            <td>
                            <span class="remove"><i class="fa fa-times"></i></span>
                            </td>                            
                                               
                        </tr>
                        
                        <?php
						
						
						
						}
					
					?>

                    </table>
                    
                    
                    
                    <br/>
                    <div class="button add-display-filter" ><?php _e('Add more','social_share_button'); ?></div>
                    
				</div>
            
            </li> 
            <li style="display: none;" class="box4 tab-box">
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Shortcode','social_share_button'); ?></p>
                    <p class="option-info"><?php _e('Please use following shortcode inside loop on your theme files','social_share_button'); ?></p> 
                    <?php echo '&lt;?php echo do_shortcode("[social_share_button]"); ?>'; ?>
				</div>
                      
            </li>
            
            <li style="display: none;" class="box5 tab-box">
            
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Plugin info ?','social_share_button'); ?></p>
                    <p class="option-info">
					<?php
                    if(social_share_button_customer_type=="free")
                        {
							$html = sprintf('You are using %s version %s of %s, To get more feature you could try our premium version.',social_share_button_customer_type,social_share_button_plugin_version, social_share_button_plugin_name);
							
							_e($html,'social_share_button');
							echo '<br />';
							$html = sprintf('<a href="%s">%s</a>',social_share_button_plugin_name,social_share_button_pro_url);							
							_e($html,'social_share_button');
                            
                        }
                    else
                        {
							$html = sprintf('Thanks for using <strong> premium version %s of %s ',social_share_button_plugin_version,social_share_button_plugin_name);							
							_e($html,'social_share_button');	
							
                        }

					?>       

                    
                    </p>

                </div>
                
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Need Help ?','social_share_button'); ?></p>
                    <p class="option-info"><?php _e('Feel free to contact with any issue for this plugin, Ask any question via forum %s ','social_share_button'); 
					
					echo sprintf('Feel free to contact with any issue for this plugin, Ask any question via forum <a href="%s">%s</a> (free)',social_share_button_qa_url, social_share_button_qa_url);
					echo '<br />';
					echo sprintf('please read documentation here <a href="%s">%s</a>',social_share_button_tutorial_doc_url,social_share_button_tutorial_doc_url);
					
					?>
                    </p>

                </div>
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Submit reviews','social_share_button'); ?></p>
                    <p class="option-info">
                    <?php
                    _e('We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.','social_share_button');
					
					?>
                    
                    </p>
                	<img src="<?php echo social_share_button_plugin_url."assets/admin/images/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo social_share_button_wp_reviews; ?>">
                		<?php echo social_share_button_wp_reviews; ?>
               		</a>

                </div>


     
            </li>            
            
            
            
            
                     
		</ul>
        
        
 <script>
 jQuery(document).ready(function($)
	{
		$(function() {
			$( "#social_share_button_sites tbody" ).sortable();
			//$( ".items" ).disableSelection();
			});
		
		})

</script>


                <p class="submit">
	                <?php wp_nonce_field( 'social_share_button_nonce' ); ?>
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes','social_share_button' ); ?>" />
                </p>
		</form>


</div>
