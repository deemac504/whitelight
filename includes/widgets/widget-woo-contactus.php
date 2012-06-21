<?php
/*---------------------------------------------------------------------------------*/
/* Contact Us widget */
/*---------------------------------------------------------------------------------*/
class Woo_ContactUs extends WP_Widget {

	function Woo_ContactUs() {
		$widget_ops = array( 'description' => 'Note: To be used on your Homepage' );

		parent::WP_Widget(false, __( 'Woo - Contact Us', 'woothemes' ),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		
   		$title = apply_filters('widget_title', empty($instance['title']) ?  __( 'Contact Us', 'woothemes' ) : $instance['title']);
   		$phone = $instance['phone'];
		$email = $instance['email'];
		$vcard = $instance['vcard'];
		$address = $instance['address'];
		$map_page_template = $instance['map_page_template'];
		
		echo $before_widget;
		if ($title) { echo $before_title.__( $title, 'woothemes' ).$after_title; } ?>
            
        <div class="wrap">
            <ul>
            	<?php if ($phone != '') { ?><li class="phone"><span><?php _e( 'Phone', 'woothemes' ); ?></span><?php echo $phone; ?></li><?php } ?>
            	<?php if ($email != '') { ?><li class="email"><span><?php _e( 'Email', 'woothemes' ); ?></span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li><?php } ?>
            	<?php if ($vcard != '') { ?><li class="vcard"><span><?php _e( 'V-Card', 'woothemes' ); ?></span><a href="<?php echo $vcard; ?>"><?php _e( 'Download', 'woothemes' ); ?></a></li><?php } ?>
            	<?php if ($address != '') { ?>
            		<li class="address">
            			<span><?php _e( 'Address', 'woothemes' ); ?></span>
            			<?php _e( nl2br($address),'woothemes'); ?>
            			<?php if ( isset($map_page_template) && $map_page_template != '' ) { ?>
							<a href="<?php echo get_permalink($map_page_template); ?>" class="map"><?php _e( 'Map','woothemes'); ?> &raquo;</a>
						<?php } ?>
            		</li>
            	<?php } ?>
            </ul>	
        </div>

	   <?php			
	   echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {
   
   		$title = esc_attr($instance['title']);
		$phone = esc_attr($instance['phone']);
		$email = esc_attr($instance['email']);
		$vcard = esc_attr($instance['vcard']);
		$address = esc_attr($instance['address']);
		$map_page_template = esc_attr($instance['map_page_template']);
		
		//Access the WordPress Pages via an Array
		$woo_pages = array();
		$woo_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );    
		foreach ($woo_pages_obj as $woo_page) {
		    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
    
		$woo_pages_raw = $woo_pages;
		$woo_pages_raw[0] = "Select a page:";
		$woo_pages_tmp = array_unshift($woo_pages, "Select a page:" ); 
		        
		?>
		<p>
		   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'woothemes' ); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone Number:', 'woothemes' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $phone; ?>" class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'woothemes' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'vcard' ); ?>"><?php _e( 'V-Card:', 'woothemes' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'vcard' ); ?>" value="<?php echo $vcard; ?>" class="widefat" id="<?php echo $this->get_field_id( 'vcard' ); ?>" />
        </p>
        
        <p>
		   <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:', 'woothemes' ); ?></label>
			<textarea name="<?php echo $this->get_field_name( 'address' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'info_field_text' ); ?>"><?php echo $address; ?></textarea>
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'map_page_template' ); ?>"><?php _e( 'Contact Us Page:', 'woothemes' ); ?></label>
            <select name="<?php echo $this->get_field_name( 'map_page_template' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'map_page_template' ); ?>">
            	<?php foreach($woo_pages_raw as $k => $v) { ?>
               	<option value="<?php echo $k ?>" <?php if($map_page_template == $k){ echo "selected='selected'";} ?>><?php _e( $v, 'woothemes' ); ?></option>
                <?php } ?>
            </select>
        </p>
                
		<?php
	}
} 

register_widget( 'woo_ContactUs' );
?>