<div>Hello contact</div>

<div class="" style="color: blue;">
    <?php 
        my_contact_title();
        my_contact_excerpt(); 
        
        my_contact_info();
        
        my_contact_social();

        my_google_map();
        

    ?>

</div>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php my_gmap_api(); ?>"></script>

<style type="text/css">
.acf-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}

</style>
<script type="text/javascript" src="../inc/app.js"></script>
