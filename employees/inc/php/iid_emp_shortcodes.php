<?php
/**
* Template Name: Lawyers Page
* @package WordPress
*/
//Lawyers
function shortcode_lawyers( ) {
    global $post, $wp;
    $custom_terms = get_terms('employeed');
    $args_law = array('post_type' => 'employee',
        'tax_query' => array(
            array(
                'taxonomy' => 'employeed',
                'field' => 'slug',
                'terms' => 'lawyer',
            ),
        ),
    );    
    $lawyers = get_posts( $args_law );
    echo '<div class="employees-container">';
        foreach ($lawyers as $key => $lawyer) {
            $id_lawyer = $lawyer->ID;
            $cat = get_the_category($id_lawyer);
            echo '<div class="employees-item">';
                    echo '<div class="employees-item-photo">';
                        echo '<a href="'.get_permalink($id_lawyer).'">';
                            echo '<img src="'.get_the_post_thumbnail_url( $id_lawyer ).'">';
                        echo '</a>';// $url
                    echo '</div>';//employees-item-photo
            echo '</div>';//employees-item
        }
    echo '</div>';// employees-container
}
add_shortcode( 'lawyers','shortcode_lawyers'  );

//Administrative 
function shortcode_administrative( ) {
    global $post, $wp;
    $custom_terms = get_terms('employeed');
    $args_admin = array('post_type' => 'employee',
        'tax_query' => array(
            array(
                'taxonomy' => 'employeed',
                'field' => 'slug',
                'terms' => 'administrative',
            ),
        ),
    );    
    $administratives = get_posts( $args_admin );
    echo '<div class="employees-container">';
        foreach ($administratives as $key => $administrative) {
            $id_admin = $administrative->ID;
            $cat = get_the_category($id_admin);
            echo '<div class="employees-item">';
                    echo '<div class="employees-item-photo">';
                        echo '<a href="'.get_permalink($id_admin).'">';
                            echo '<img src="'.get_the_post_thumbnail_url( $id_admin ).'">';
                        echo '</a>';// $url
                    echo '</div>';//employees-item-photo
            echo '</div>';//employees-item   
        }
    echo '</div>';// employees-container
}
add_shortcode( 'administrative','shortcode_administrative'  );

// All
function shortcode_all() {
    global $post, $wp;
    $args_all = array(
        'post_type' => 'employee'
    );    
    $alls = get_posts( $args_all );

    echo '<div class="employees-container">';
        foreach ($alls as $key => $all) {
            $id = $all->ID;
            echo '<div class="employees-item">';
                    echo '<div class="employees-item-photo">';
                        echo '<a href="'.get_permalink($id).'">';
                            echo '<img src="'.get_the_post_thumbnail_url( $id ).'">';
                        echo '</a>';// $url
                    echo '</div>';//employees-item-photo
            echo '</div>';//employees-item
        }
    echo '</div>';// employees-container
}
add_shortcode( 'all','shortcode_all'  );

//get comments

function iid_emp_comments(){
    global $post, $wpdb;
    $comments = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'comments WHERE comment_post_ID ='.$post->ID.'');
    if(!empty($comments)){
       foreach ($comments as $key => $comment) {
         print_r($comment->comment_content.'<br>');
       }
    }
}
add_shortcode( 'comments','iid_emp_comments'  );



?>