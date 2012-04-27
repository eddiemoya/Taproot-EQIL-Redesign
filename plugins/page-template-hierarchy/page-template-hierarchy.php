<?php /*
Plugin Name: Page Template Hierarchy
Plugin URI: http://eddiemoya.com/
Description:  Adds parent-page.php & child-page.php to the template hierarchy with all the normal hierarchical behavior with conditional tags to match: is_child_page() and is_parent_page()
Author: Eddie Moya
Version: 1.0

Copyright (C) 2012 Eddie Moya (eddie.moya+wp@gmail.com)

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

/**
 * @todo Add 'grandchild' templates, or some sort of #-nth-child-of-page-{slug}.php template, with accompanying conditional functions of course.
 */

class Page_Template_Hierarchy {
    
    /**
     *
     * @var type 
     */
    private static $post;
    
    /**
     * Start your engines.
     * 
     * @author Eddie Moya
     */
    function init(){
        global $post;
        
        self::$post = $post;
        add_filter('page_template', array( __CLASS__,'locate_page_template'));
    }
    
    /**
     * Determines the correct relationship status of a page and redirects accordingly.
     * 
     * @author Eddie Moya
     * @since 1.3.1
     */
    public function locate_page_template($original_template) {
        global $post;
        $page = get_queried_object();
        $parent_page = get_page($page->post_parent);
       
        $templates = self::get_template_list('page', $page, $parent_page);
        print_r($page->parent);
        $found_template = (locate_template( $templates )) ? locate_template( $templates ) : $original_template;
        //print_r($found_template);
        return apply_filters('cth_page_template', $found_template);
    }
    
    /**
     * Compiles the list of possible templates that are available for the current 
     * page being displayed, and sends that array off to locate_template for
     * which finds the first one in the list which exists, and returns its path.
     * 
     * @author Eddie Moya
     * @since 1.3.1
     */
    private function get_template_list($type, $object, $parent) {
  
        $is_child = self::has_relationship_by_type($type, 'child');
        $is_parent = self::has_relationship_by_type($type, 'parent');
        
        if( $is_child ){
            $templates[] = "child-of-{$type}-{$parent->slug}.php";
        }
        
        $templates[] = "{$type}-{$object->slug}.php";


        if( $is_child ){
            $templates[] = "child-of-{$type}-{$object->post_parent}.php";
        }
        
        $templates[] = "{$type}-{$object->id}.php";
        
        if( $is_parent ){
            $templates[] = "parent-{$type}.php";
        }
        
        if( $is_child ){
            $templates[] = "child-{$type}.php";
        }
                
        if( $is_child && $is_parent ){
            $templates[] = "parent-child-{$type}.php";
        }
        
        $templates[] = "{$type}.php";
       
        
        ?><pre><?php //print_r($templates); ?></pre><?php
        return $templates;
        
        
    }
    
    private function has_relationship_by_type($type, $relationship){
        $function = "is_{$relationship}_{$type}";
        return $function();
    }
}
Page_Template_Hierarchy::init();

/**
 *
 * @param type $page
 * @return type 
 */
function get_page_object($page){
    $page = (is_numeric($page)) ? get_page($page) : $page;
    $page = (is_string($page))  ? get_page_by_slug($page)   : $page;
    $page = (is_null($page))    ? get_queried_object() : $page;
    return $page;
}

/**
 *
 * @param type $slug
 * @return type 
 */
function get_page_by_slug($slug){
    $args = array(
        'name' => $slug,
        'post_type' => 'page',
        'showposts' => 1
    );
    return get_posts($args);
}

/**
 * @author Eddie Moya
 * 
 * This conditional tag checks if the page being displayed is for a page that has children (e.g. is a parent page).
 * 
 * @param object $page [optional] Page object. Default: Current Page
 * @return bool Returns true if page is a parent, otherwise returns false.
 */
function is_parent_page($page = null){
    
    $page = get_page_object($page);
    $children = get_pages( array( 'child_of' => $page->ID) );
   
    return empty($children) ? false : true;
}

/**
 * @author Eddie Moya
 * 
 * This conditional tag checks if the page being displayed is for a page that has a parent (e.g. is a child page).
 * 
 * @param object $page [optional] Page object. Default Current Page
 * @return bool Returns true if page has a parent, otherwise returns false.
 * @todo It would be nice to condense this down and make it more like the is_page function in WP_Query
 */
function is_child_page($page = null){

    $page = get_page_object($page);

    return ($page->post_parent != 0) ? true : false;
}

/**
 * @author Eddie Moya
 * 
 * This conditional tag checks if the page being displayed is of a page that
 * has parent (e.g. is a child page).
 * 
 * @uses cat_is_ancestor_of()
 * 
 * @param object|string|integer $page [required] Page of the would-be child.
 * @param object|string|integer $child_page [optional]. Page of the would-be parent. Default Current Page
 * @param bool $direct_descendant [optional] If set to true, this function will check if the parent is a direct parent of the given child. If false it will check it the child is a descentant of any distance.
 * 
 * @return bool If the $direct_descendant flag set to true, function returns true if the child is a direct descendant of the parent, if child is no direct it will return false. If $direct_descendant is set to false it will return the same results as cat_is_ancestor_of().
 * @todo It would be nice to condense this down and make it more like the is_page function in WP_Query
 */
function is_parent_of_page($child_page, $parent_page = null, $direct_descendant = true){
    
    $child_page = (is_numeric($child_page)) 	?   get_the_category_by_ID($child_page) : $child_page;
    $child_page = (is_string($child_page))  	?   get_category_by_slug($child_page)   : $child_page;

    $parent_page = (is_numeric($parent_page))	? get_the_category_by_ID($parent_page) 	: $parent_page;
    $parent_page = (is_string($parent_page))  	? get_category_by_slug($parent_page)   	: $parent_page;
    $parent_page = (is_null($parent_page))    	? get_queried_object()                     	: $parent_page;

    if(!isset($child_page->post_parent) || !isset($parent_page->term_id) )
        return false;
    
    return ($direct_descendant) ? ($child_page->post_parent == $parent_page->term_id ) : cat_is_ancestor_of($parent_page, $child_page);

}

/**
 * @author Eddie Moya
 * 
 * This conditional tag checks if the page being displayed is of a page that
 * has parent (e.g. is a child page).
 * 
 * @uses cat_is_ancestor_of()
 * 
 * @param object|string|integer $page [required] Page of the would-be parent.
 * @param object|string|integer $child_page [optional]. Page of the would-be child. Default Current Page
 * @param bool $direct_descendant [optional] If set to true, this function will check if the child is a direct child of the given parent. If false it will check it the parent is an ancestor of any distance.
 * 
 * @return bool If the $direct_descendant flag set to true, function returns true if the child is a direct descendant of the parent, if child is no direct it will return false. If $direct_descendant is set to false it will return the same results as cat_is_ancestor_of().
 * @todo It would be nice to condense this down and make it more like the is_page function in WP_Query
 */
function is_child_of_page($parent_page, $child_page = null, $direct_descendant = true){
    
    $parent_page = (is_numeric($parent_page)) 	? get_the_page_by_ID($parent_page)	: $parent_page;
    $parent_page = (is_string($parent_page)) 	? get_page_by_slug($parent_page) 	: $parent_page;

    $child_page = get_page_object($child_page);

    if(!isset($child_page->post_parent) || !isset($parent_page->ID) )
        return false;
    
    return ($direct_descendant) ? ($child_page->post_parent == $parent_page->ID ) : get_page_children($parent_page, array( $child_page) );
}


