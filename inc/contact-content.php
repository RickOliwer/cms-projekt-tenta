<?php

if(!function_exists('my_contact_title')){

    function my_contact_title(){

        if(!function_exists('get_field')){
            return;
        }

        $title = get_field('contact_title', false, false);

        
        if(!empty($title)){
            printf('<p>%s</p>',
                    $title,
        );
        }
    }
}

if(!function_exists('my_contact_excerpt')){

    function my_contact_excerpt(){

        if(!function_exists('get_field')){
            return;
        }

        $excerpt = get_field('contact_excerpt', false, false);


        if(!empty($excerpt)){
            printf('<p>%s</p>',
                   $excerpt,
            );
        }
    }
}