<?php
/**
 * Plugin Name: User Category Post Filter
 * Description: Show posts only from categories selected by the user during registration.
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter the main query to only show posts from categories assigned to the current user.
 */
function filter_posts_by_user_registration_categories($query) {
    if (!is_admin() && $query->is_main_query() && !is_singular()) {
        if (is_user_logged_in() && !current_user_can('administrator')) {
            $user_id = get_current_user_id();
            $allowed_cats = get_user_meta($user_id, 'user_registration_user_categories', true);

            if (!empty($allowed_cats) && is_array($allowed_cats)) {
                $query->set('category_name', implode(',', $allowed_cats));
            } else {
                $query->set('post__in', [0]); // No access, show no posts
            }
        }
    }
}
add_action('pre_get_posts', 'filter_posts_by_user_registration_categories');
