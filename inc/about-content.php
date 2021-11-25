<?php

if(!function_exists('about_title')){

    function about_title(){

        if(!function_exists('get_field')){
            return;
        }

        $title = get_field('about_title', false, false);


        if(!empty($title)){
            printf('<p>%s</p>',
                    $title,
        );
        }
    }

}
