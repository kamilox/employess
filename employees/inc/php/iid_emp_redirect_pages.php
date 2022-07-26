<?php
function iid_emp_redirect_template($template) {
    global $wp, $wpdb, $post;
    $postType = get_post_type($post);
    if($postType == "employee" && is_singular()){
        $template = plugin_dir_path(__FILE__) . 'single.php';
    }
    return $template;
}
add_filter( 'template_include', 'iid_emp_redirect_template' );
?>