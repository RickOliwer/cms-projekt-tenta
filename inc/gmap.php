
<?php

if(!function_exists('my_gmap_api')){

    function my_gmap_api(){

        if(!function_exists('get_field')){
            return;
        }

        $key = get_field('gmap_api_key', false, false);

        
        if(!empty($key)){
            define('MY_API_KEY', $key);
        }

        return MY_API_KEY;
    }
}

if(!function_exists('my_google_map')){

    function my_google_map(){
        if(have_rows('locations')){
            ?>
                <div class="acf-map" data-zoom="16">
            <?php
                while(have_rows('locations')){
                    the_row();
                    
                    if ( have_rows( 'location' )){
                        while( have_rows('location')){
                            the_row();
        
                            $lat = get_sub_field('lat');
                            $lng = get_sub_field('lng');
        
                            printf('<div class="marker" data-lat="%s" data-lng="%s"></div>',
                                    $lat,
                                    $lng,
                            );
                        }
                    }
                }
            ?>
                </div>
            <?php
        }
    }
}
?>
