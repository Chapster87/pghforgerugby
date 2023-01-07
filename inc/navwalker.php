<?php

if ( ! class_exists( 'Custom_Walker_Nav_Menu' ) ) {
	/**
	 * WP_Bootstrap_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
            $id_field = $this->db_fields['id'];

            if ( is_object( $args[0] ) ) {
                $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
            }

            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

        function start_lvl( &$output, $depth = 0, $args = null ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"sub-menu\">\n";
        }

        function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            // Most of this code is copied from original Walker_Nav_Menu
            global $wp_query, $wpdb;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $attributes = ' class="menu-item-link"';
            $attributes .= ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

            // Check if menu item is in main menu
            if ( $depth == 0 && $args->has_children  ) {
                // These lines adds your custom class and attribute
                // $attributes .= ' class="dropdown-toggle"';
                // $attributes .= ' data-toggle="dropdown"';
            }

            $item_output = $args->before;

            // Add the caret if menu level is 0
            if ( $depth == 0 && $args->has_children ) {
                $item_output .= '<button class="btn sub-menu-toggle"></button>';
            }

            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

            // Add the caret if menu level is 0
            // if ( $depth == 0 && && $args->has_children  ) {
            //     $item_output .= ' <b class="caret"></b>';
            // }

            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

    }
}
