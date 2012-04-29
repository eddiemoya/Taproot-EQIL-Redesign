<?php
/*
Plugin Name: Salsa Labs Signup Widget
Description: Salsa Labs Signup Widget 
Version: 1
Author: Eddie Moya
*/

/*
Copyright (C) 2011 Eddie Moya (eddie.moya+wp[at]gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

class Salsa_Labs_Signup_Widget extends WP_Widget {
    
    /**
     * Adds an action that callback to a self-registering method.
     * @author Eddie Moya
     */
    function register_widget(){
        add_action('widgets_init', array( __CLASS__, '_register_widget' ) );
    }
    
    /**
     * Self registers this class.
     * 
     * @uses register_widget()
     * @author Eddie Moya
     */
    function _register_widget(){
       register_widget(__CLASS__);
    }

	/**
	 * Widget setup.
	 */
	function Salsa_Labs_Signup_Widget() {
		/* Widget settings. */
		$widget_ops = array( 
            'classname' => 'salsa-labs-signup', 
            'description' => 'Adds an email signup form for Salsa Labs' );

        /* Widget control settings. */
		//$control_ops = array( 'width' => 500, 'height' => 350 );

		/* Create the widget. */
		parent::WP_Widget( 'salsa-labs-signup', 'Salsa Labs Signup', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
        
        $title = $instance['title'];
        $url = $instance['salsa_url'];
        
        echo $before_widget;
        
        echo $before_title . $title . $after_title; 
        
        ?>
        <form action="<?php echo $url; ?>">
            <input type="text" id="email" placeholder=" Your Email Address" />
            <input type="submit" id="submit"  class="gradient_blue" value="GO" />
        </form>
        <?php 
        
        echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
        
		$instance = $old_instance;
        
        $instance['title'] = $new_instance['title'];
        $instance['salsa_url'] = $new_instance['salsa_url'];
		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array('title' => 'Email Sign up', 'salsa_url' => 'http://equalityfederation.salsalabs.com/o/35010/p/salsa/web/common/public/signup?signup_page_KEY=21');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
        
        $fields = array(
            array(
                'field_id' => 'title',
                'type' => 'text',
                'label' => 'Title'
            ),
            array(
                'field_id' => 'salsa_url',
                'type' => 'text',
                'label' => 'Salsa URL'
            ),
        );
        
        $this->form_fields($fields, $instance);


	}
    
    function form_fields($fields, $instance){
        foreach($fields as $field){
            extract($field);
            
            if(!isset($style)) $style = '';
            self::form_field($field_id, $type, $label, $style, $instance);
        }
    }
    function form_field($field_id, $type, $label, $style, $instance){
        
        ?><p><?php
        
        switch ($type){
            case 'text':
                ?>
                <label for="<?php echo $this->get_field_id( $field_id ); ?>"><?php echo $label; ?>: </label>
                <input id="<?php echo $this->get_field_id( $field_id ); ?>" style="<?php echo $style; ?>" class="widefat" name="<?php echo $this->get_field_name( $field_id ); ?>" value="<?php echo $instance[$field_id]; ?>" />
                <?php break;
        }
        
        ?></p><?php
    }
}
Salsa_Labs_Signup_Widget::register_widget();
