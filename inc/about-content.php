<?php

if(!function_exists('about_title')){

    function about_title(){

        if(!function_exists('get_field')){
            return;
        }

        $title = get_field('about_title', false, false);


        if(!empty($title)){
            printf('<h1>%s</h1>',
                    $title,
        );
        }
    }

}

if(!function_exists('about_excerpt')){

    function about_excerpt(){

        if(!function_exists('get_field')){
            return;
        }

        $excerpt = get_field('about_excerpt', false, false);


        if(!empty($excerpt)){
            printf('<p>%s</p>',
                    $excerpt,
        );
        }
    }

}

if(!function_exists('about_img')){

    function about_img(){

        if(!function_exists('get_field')){
            return;
        }

        $img = get_field('about_img');


        if(!empty($img)){
            echo "<img src='$img'>";
        }
    }

}

if(!function_exists('about_text')){

    function about_text(){

        if(!function_exists('get_field')){
            return;
        }

        $text = get_field('about_text', false, false);


        if(!empty($text)){
            printf('<p>%s</p>',
                    $text,
        );
        }
    }

}