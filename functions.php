<?php


function get_the_publisher($id) {

    $publisher_link = 'Media Source';

    $publishers = get_the_terms($id,'media_note_publisher');

    $i = 0;

    foreach ($publishers as $publisher) {
        if ($i<1){
            $publisher_link = '<a href="' . $publisher->description . '">' . $publisher->name . '</a>';
        }
        $i++;
    }

    return $publisher_link;
}

function register_uthsc_childtheme_styles() {
    wp_register_style('uthsc-child-stylesheet', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_style('uthsc-child-stylesheet');
}
add_action('wp_enqueue_scripts', 'register_uthsc_childtheme_styles', 11);


/**
 * Auto-subscribe or unsubscribe an Edit Flow user group when a post changes status
 *
 * @see http://editflow.org/extend/auto-subscribe-user-groups-for-notifications/
 *
 * @param string $new_status New post status
 * @param string $old_status Old post status (empty if the post was just created)
 * @param object $post The post being updated
 * @return bool $send_notif Return true to send the email notification, return false to not
 */
/*function efx_auto_subscribe_usergroup( $new_status, $old_status, $post ) {
    global $edit_flow;

    // When the post is first created, you might want to automatically set
    // all of the user's user groups as following the post
    if ( 'draft' == $new_status ) {
        // Get all of the user groups for this post_author
        $usergroup_ids_to_follow = $edit_flow->user_groups->get_usergroups_for_user( $post->post_author );
        $usergroup_ids_to_follow = array_map( 'intval', $usergroup_ids_to_follow );
        $edit_flow->notifications->follow_post_usergroups( $post->ID, $usergroup_ids_to_follow, true );
    }

    // You could also follow a specific user group based on post_status
    if ( 'copy-edit' == $new_status ) {
        // You'll need to get term IDs for your user groups and place them as
        // comma-separated values
        $usergroup_ids_to_follow = array(
            // 18,
        );
        $edit_flow->notifications->follow_post_usergroups( $post->ID, $usergroup_ids_to_follow, true );
    }

    // Return true to send the email notification
    return $new_status;
}
add_filter( 'ef_notification_status_change', 'efx_auto_subscribe_usergroup', 10, 3 );*/
