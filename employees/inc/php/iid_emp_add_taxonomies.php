<?php

function iid_emp_add_type_employees(){
    $taxonomy = 'employeed';
    //Insert kind of employees
    wp_insert_term(
        'Lawyer',    //the term 
        $taxonomy,  //the taxonomy
        array(
            'description' => 'Lawyer',
            'slug'        => 'lawyer',
            'parent'      => $taxonomy,
            )
    );
    wp_insert_term(
        'Administrative',    //the term 
        $taxonomy,  //the taxonomy
        array(
            'description' => 'Administrative',
            'slug'        => 'administrative',
            'parent'      => $taxonomy,
            )
    );
}
add_action('init', 'iid_emp_add_type_employees');
?>