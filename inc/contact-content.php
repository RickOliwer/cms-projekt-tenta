<?php

if(!function_exists('my_contact_title')){

    function my_contact_title(){

        if(!function_exists('get_field')){
            return;
        }

        $title = get_field('contact_title', false, false);

        
        if(!empty($title)){
            printf('<h1 class="contact-title">%s</h1>',
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
            printf('<p class="contact-excerpt">%s</p>',
                   $excerpt,
            );
        }
    }
}

//Contact Social Media
if(!function_exists('my_contact_social')) {
	function my_contact_social(){
		if(!function_exists('get_field')){
			return;
		}
		if ( have_rows('contact_social_media')){


			while(have_rows('contact_social_media')){
				the_row();

				$facebook = get_sub_field('facebook');
				$instagram = get_sub_field('instagram');
				$linkedin = get_sub_field('linkedin');


                echo '<div class="social-media">';
                if(!empty($facebook)){
                    printf(
                        '
                            <div class="social fb">
                                <a href="%s">
                                    <i class="fab fa-facebook-f" style="color: black; font-size: 60px;"></i>
                                </a>
                            </div>
                        ',
                        $facebook,
                    );
                }

                if(!empty($instagram)){
                    printf(
                        '
                            <div class="social ig">
                                <a href="%s">
                                    <i class="fab fa-instagram" style="color: black; font-size: 60px;"></i>
                                </a>
                            </div>
                        ',
                        $instagram,
                    );
                }

                if(!empty($linkedin)){
                    printf(
                        '
                            <div class="social in">
                                <a href="%s">
                                    <i class="fab fa-linkedin-in" style="color: black; font-size: 60px;"></i>
                                </a>
                            </div>
                        ',
                        $linkedin,
                    );
                }

                echo '</div>';
			}
	
		}


	}
}


if(!function_exists('my_contact_info')) {
	function my_contact_info(){
		if(!function_exists('get_field')){
			return;
		}
		if ( have_rows('contact_contact')){


			while(have_rows('contact_contact')){
				the_row();

                $phone = get_sub_field('phone');
                $email = get_sub_field('email');

                echo '<div class="contact-info">';
                printf(
                    '
                        <div class="phone_info">
                            <i class="fas fa-mobile-alt" style="color: black; font-size: 60px;"></i>
                            <div class="phone">
                                <p>%d</p>
                            </div
                        </div>

                        <div class="email_info">
                            <i class="fas fa-at" style="color: black; font-size: 60px;"></i>
                            <div class="email">
                                <p>%s</p>
                            </div
                        </div>
                    ',
                    $phone,
                    $email,
                );

                if( have_rows('address_info') ){

                    while( have_rows('address_info') ){
                        the_row();

                        $address = get_sub_field('address');
                        $city = get_sub_field('city');
                        $zipcode = get_sub_field('zip-code');

                        printf(
                            '
                                <div class="address_info">
                                    <i class="fas fa-map-marker-alt" style="color: black; font-size: 60px;"></i>
                                    <div class="address">
                                        <p>%s</p>
                                        <p>%d</p>
                                        <p>%s</p>
                                    </div
                                </div>
                            ',
                            $address,
                            $zipcode,
                            $city,
                        );
                    }

                }
                echo '</div>';
			}
		}
	}
}




// /**
//  * retun gmap api
//  *
//  * @return void
//  */
// function gmap_acf_init() {
//     acf_update_setting('google_api_key', '');
// }
// add_action('acf/init', 'gmap_acf_init');