<?php
    

    function employees_styles(){
        $args = array(
            'post_type' => 'employee',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);

        wp_enqueue_style('employess-styles',  plugin_dir_url( __FILE__ ).'../css/iid_emp_styles.css', 1.0);
        if($query){
            wp_enqueue_style('bootstrap-css',  plugin_dir_url( __FILE__ ).'../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css', 1.0);
        }
        wp_enqueue_script('jquery');
        wp_enqueue_script('employees-query', plugin_dir_url( __FILE__ ).'../js/iid_emp_styles.js', array('jquery'), 1.0);
        if($query){
            wp_enqueue_script('bootstrap-query', plugin_dir_url( __FILE__ ).'../bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js',  1.0);
        }
    }
    add_action('init', 'employees_styles');
?>