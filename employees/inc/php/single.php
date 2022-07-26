<?php
/*
* Template Name: Singular Employee
*
*/

//Capture and update data from content page
get_header();
global $post;
$asociationType = get_post_meta( $post->ID, 'asociation_type', true ); // Get the saved values
$phoneNumber = get_post_meta( $post->ID, 'phone_number', true ); // Get the saved values
$extNumber = get_post_meta( $post->ID, 'ext_number', true ); // Get the saved values
$asociateEmail = get_post_meta( $post->ID, 'asociate_email', true ); // Get the saved values
$personalMessage = get_post_meta( $post->ID, 'personal_message', true ); // Get the saved values

$paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
$args  = array(
    'number'    => 12,
    'post_id' => $post->ID,
    'status' => 'approve',
    'paged' => $paged,
    'parent' => 0,
);
$comments = get_comments($args);

$comments_args = array(
    // Change the title of send button 
    'label_submit' => __( 'Send', 'textdomain' ),
    // Change the title of the reply section
    'title_reply' => __( 'Escribe tu reseña', 'textdomain' ),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    // Redefine your own textarea (the comment body).
    'comment_field' => '<p class="comment-form-comment"><label for="comment">' 
                        . _x( 'Comment', 'noun' ) 
                        . '</label><br />
                            <textarea id="comment" name="comment" aria-required="true"></textarea>
                        </p>',
);

    echo '<div class="container employee-container">';
        echo '<div class="row">';
            echo '<div class="col-12 col-md-4 employee-single-image-container">';
                echo '<img class="employee-single-image" src="'.get_the_post_thumbnail_url($post).'">';
            echo '</div>';//col
            echo '<div class="col-12 col-md-8 employee-contact">';
                    echo '<div class="employee-title-content">';
                        echo '<h1 class="employee-title">'.get_the_title($post).'</h1>';
                    echo '</div>';//employee-title-content
                    echo '<div class="employee-type-content">';
                        echo '<h2 class="employee-type">'.$asociationType.'</h2>';
                        echo '<div class="employee-type-decorator"></div>';
                    echo '</div>';//employee-title-content
                echo '<div class="text-contact">';
                    echo 'Tel: <a href="tel:'.$phoneNumber.'">'.$phoneNumber.'</a> Ext:'.$extNumber.'';
                echo '</div>';
                echo '<div class="text-contact email-contact">';
                    echo '<a href="mailto:'.$asociateEmail.'">'.$asociateEmail.'</a>';
                echo '</div>';
                echo '<div class="personal-message">';
                    echo '<p>'.'<span> << </span>'.$personalMessage.'<span> >> </span>'.'</p>';
                echo '</div>';
            echo '</div>';//col
        echo '</div>'; // row
        echo '<div class="row">';
            echo '<div class="col-12 emp-cv">';
                echo '<p>'.get_the_content($post).'</p>';
            echo '</div>';//col
        echo '</div>'; // row


        echo '<div class="row">';
            echo '<div class="col-12 comment-content">';
            $imgSrc = plugin_dir_url( __FILE__ )."user_new.webp";
                foreach ($comments  as $key => $comment) {
                    echo '<div class="comment-content-item">';
                        echo '<div class="comment-content-item-user">';
                            echo '<img src="'.$imgSrc.'">';
                            echo '<a href="mailto:'.$comment->comment_author_email.'"><h6>'.$comment->comment_author_email.'</h6></a>';
                        echo '</div>';
                        echo '<p>'.'<span> << </span>'.$comment->comment_content.'<span> >> </span>'.'</p>';                        
                    echo '</div>';//col
                }
                echo '</div>';//col
        echo '</div>'; // row
        echo '<div class="row">';
            echo '<div class="col-12 col-md-6 form-content">';
                comment_form( $comments_args );
            echo '</div>';//col
        echo '</div>';
    echo '</div>';//container

get_footer();
?>
