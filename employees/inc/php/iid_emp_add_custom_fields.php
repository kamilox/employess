<?php
require_once('iid_emp_class_list.php');

function create_assign_to_field() {
    $page = 'employee';
    $context = 'normal';
    $priority = 'high';

    add_meta_box( 'asociation-type', 'Asciation Type', 'asociation_type',$page, $context, $priority );
    add_meta_box( 'phone-number', 'Phone Number', 'phone_number',$page, $context, $priority );
    add_meta_box( 'ext-number', 'Ext Number', 'ext_number',$page, $context, $priority );
    add_meta_box( 'asociate-email', 'Asociate Email', 'asociate_email',$page, $context, $priority );
    add_meta_box( 'personal-message', 'Personal Message', 'personal_message',$page, $context, $priority );
}
add_action( 'add_meta_boxes', 'create_assign_to_field' );

function asociation_type($post){
    global $post; // Get the current post data
	$getClass = new IddEmpOptionsList();
    $types = $getClass->getType();
    $asociationType = get_post_meta( $post->ID, 'asociation_type', true ); // Get the saved values
   
    ?>
    <!--Assinged to field -->
        <fieldset>    
            <div class="custom-fields">
                <div class="custom-fields-title">
                    <label for="asociation_type">
                        <?php _e('Tipo de Socio (a):'); ?>
                    </label>
                </div>
                <div class="custom-fields-input">
                    
                    <select 
                            name="asociation_type" 
                            id="asociation_type" 
                        >
                        <?php
                             if(empty($asociationType)){
                                echo '<option value="">Please Select an Asociated Type</option>';
                            }else{
                                echo '<option value="'.$asociationType.'">'.$asociationType.'</option>';
                            }
                       
                            
                            foreach ($types as $key => $type) {
                                
                                echo '<option value="'.$type.'">';
                                    echo $type;
                                echo '</option>';
                            }
                        ?>
                    </select>
                    
                </div>
            </div>
        </fieldset>
    <?php
    wp_nonce_field( 'iid_emp_namespace_form_metabox_nonce', 'iid_emp_namespace_form_metabox_process' );
}

function phone_number($post){
    global $post; // Get the current post data
    $phoneNumber = get_post_meta( $post->ID, 'phone_number', true ); // Get the saved values
   
    ?>
    <!--Assinged to field -->
        <fieldset>    
            <div class="custom-fields">
                <div class="custom-fields-title">
                    <label for="phone_number">
                        <?php _e('Numero de teléfono:'); ?>
                    </label>
                </div>
                <div class="custom-fields-input">
                    
                    <input type="tel"
                            name="phone_number" 
                            id="phone_number" 
                            value="<?php if(!empty($phoneNumber)){
                                echo $phoneNumber;
                            }else{
                                echo '';
                            }
                            ?>"
                        >
                        
                    
                </div>
            </div>
        </fieldset>
    <?php
    wp_nonce_field( 'iid_emp_namespace_form_metabox_nonce', 'iid_emp_namespace_form_metabox_process' );
}

function ext_number($post){
    global $post; // Get the current post data
    $extNumber = get_post_meta( $post->ID, 'ext_number', true ); // Get the saved values
   
    ?>
    <!--Assinged to field -->
        <fieldset>    
            <div class="custom-fields">
                <div class="custom-fields-title">
                    <label for="ext_number">
                        <?php _e('Extensión:'); ?>
                    </label>
                </div>
                <div class="custom-fields-input">
                    
                    <input type="number"
                            name="ext_number" 
                            id="ext_number" 
                            value="<?php if(!empty($extNumber)){
                                echo $extNumber;
                            }else{
                                echo '';
                            }
                            ?>"
                        >
                        
                    
                </div>
            </div>
        </fieldset>
    <?php
    wp_nonce_field( 'iid_emp_namespace_form_metabox_nonce', 'iid_emp_namespace_form_metabox_process' );
}

function asociate_email($post){
    global $post; // Get the current post data
    $asociateEmail = get_post_meta( $post->ID, 'asociate_email', true ); // Get the saved values
   
    ?>
    <!--Assinged to field -->
        <fieldset>    
            <div class="custom-fields">
                <div class="custom-fields-title">
                    <label for="asociate_email">
                        <?php _e('Email:'); ?>
                    </label>
                </div>
                <div class="custom-fields-input">
                    
                    <input type="email"
                            name="asociate_email" 
                            id="asociate_email" 
                            value="<?php if(!empty($asociateEmail)){
                                echo $asociateEmail;
                            }else{
                                echo '';
                            }
                            ?>"
                        >
                        
                    
                </div>
            </div>
        </fieldset>
    <?php
    wp_nonce_field( 'iid_emp_namespace_form_metabox_nonce', 'iid_emp_namespace_form_metabox_process' );
}

function personal_message($post){
    global $post; // Get the current post data
    $personalMessage = get_post_meta( $post->ID, 'personal_message', true ); // Get the saved values
   
    ?>
    <!--Assinged to field -->
        <fieldset>    
            <div class="custom-fields">
                <div class="custom-fields-title">
                    <label for="personal_message">
                        <?php _e('Mensaje Personal:'); ?>
                    </label>
                </div>
                <div class="custom-fields-input">
                    
                    <textarea type="email"
                            name="personal_message" 
                            id="personal_message" 
                            rows="4" 
                            cols="50"
                            value="<?php if(!empty($personalMessage)){
                                echo $personalMessage;
                            }else{
                                echo '';
                            }
                            ?>"
                        >
                    </textarea>
                        
                    
                </div>
            </div>
        </fieldset>
    <?php
    wp_nonce_field( 'iid_emp_namespace_form_metabox_nonce', 'iid_emp_namespace_form_metabox_process' );
}

/**
 * Save the metabox
 * @param  Number $post_id The post ID
 * @param  Array  $post    The post data
 */
function iid_emp_save_custom_fields( $post_id, $post ) {

	// Verify that our security field exists. If not, bail.
	if ( !isset( $_POST['iid_emp_namespace_form_metabox_process'] ) ) return;

	// Verify data came from edit/dashboard screen
	if ( !wp_verify_nonce( $_POST['iid_emp_namespace_form_metabox_process'], 'iid_emp_namespace_form_metabox_nonce' ) ) {
		return $post->ID;
	}

	// Verify user has permission to edit post
	if ( !current_user_can( 'edit_post', $post->ID )) {
		return $post->ID;
	}

    
	// Check that our custom fields are being passed along
	// This is the `name` value array. We can grab all
	// of the fields and their values at once.
	if ( !isset( $_POST['asociation_type'] ) ) {
		return $post->ID;
	}
    if ( !isset( $_POST['phone_number'] ) ) {
		return $post->ID;
	}
    if ( !isset( $_POST['ext_number'] ) ) {
		return $post->ID;
	}
    if ( !isset( $_POST['asociate_email'] ) ) {
		return $post->ID;
	}
    if ( !isset( $_POST['personal_message'] ) ) {
		return $post->ID;
	}
    
	/**
	 * Sanitize the submitted data
	 * This keeps malicious code out of our database.
	 * `wp_filter_post_kses` strips our dangerous server values
	 * and allows through anything you can include a post.
	 */
	$sanitized_asociation       = wp_filter_post_kses( $_POST['asociation_type'] );
    $sanitized_phone            = wp_filter_post_kses( $_POST['phone_number'] );
    $sanitized_ext              = wp_filter_post_kses( $_POST['ext_number'] );
    $sanitized_email            = wp_filter_post_kses( $_POST['asociate_email'] );
    $sanitized_message          = wp_filter_post_kses( $_POST['personal_message'] );
    

    
	// Save our submissions to the database
	update_post_meta( $post->ID, 'asociation_type',     $sanitized_asociation );
    update_post_meta( $post->ID, 'phone_number',        $sanitized_phone );
    update_post_meta( $post->ID, 'ext_number',          $sanitized_ext );
    update_post_meta( $post->ID, 'asociate_email',      $sanitized_email );
    update_post_meta( $post->ID, 'personal_message',    $sanitized_message );
}
add_action( 'save_post', 'iid_emp_save_custom_fields', 1, 2 );

?>