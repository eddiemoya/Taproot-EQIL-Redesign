<?php
/*
Plugin Name: Simple Link Widget
Description: A simple way to add links to a sidebar, along with background images and alt text.
Version: 1.0
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

class Simple_Link_Widget extends WP_Widget {
    
    /**
     * @author Eddie Moya
     */
    function register_widget(){
        add_action('widgets_init', array( __CLASS__, '_register_widget' ) );
    }
    
    /**
     * @author Eddie Moya
     */
    function _register_widget(){
       register_widget(__CLASS__);
    }

	/**
	 * Widget setup.
	 */
	function Simple_Link_Widget() {
		/* Widget settings. */
		$widget_ops = array( 
            'classname' => 'simple-link', 
            'description' => 'Creates a custom link within a sidebar' );

        /* Widget control settings. */
		//$control_ops = array( 'width' => 500, 'height' => 350 );

		/* Create the widget. */
		parent::WP_Widget( 'simple-link', 'Simple Link', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
        
        $title = $instance['title'];
        $url = $instance['url'];
		$alt = $instance['alt'];
        $text = $instance['text']; 
        //$img = $instance['img'];
        
        echo $before_widget;
        
        echo $before_title . $title . $after_title; 
        
        ?>
        <a href="<?php echo ($url) ? $url : ''; ?>" alt="<?php echo ($alt) ? $alt : ''; ?>"><?php echo ($text) ? $text : ''; ?></a>
        <?php 
        
        echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
        
		$instance = $old_instance;
        
        $instance['title'] = $new_instance['title'];
        $instance['url'] = $new_instance['url'];
		$instance['alt'] = str_replace(' ', '-', strtolower( htmlspecialchars(strip_tags( $new_instance['text'])) ));
        $instance['text'] = $new_instance['text'];
        
		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array('title' => '', 'url' => 'http://', 'alt' => '', 'text' => '', 'img' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
        
        $fields = array(
            array(
                'field_id' => 'title',
                'type' => 'text',
                'label' => 'Title'
            ),
            array(
                'field_id' => 'url',
                'type' => 'text',
                'label' => 'URL'
            ),
            array(
                'field_id' => 'text',
                'type' => 'text',
                'label' => 'Text'
            ),
            array(
                'field_id' => 'alt',
                'type' => 'text',
                'label' => 'Alt Text'
            )
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
Simple_Link_Widget::register_widget();
