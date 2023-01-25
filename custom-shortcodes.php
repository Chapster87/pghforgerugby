<?php

    function include_social_links() {
        $output = '<ul class="shortcode-social-links"><li><a href="https://www.facebook.com/pittsburghrugby" target="_blank" ><span class="visually-hidden">Facebook</span><i class="fab fa-facebook"></i></a></li><li><a href="https://www.instagram.com/pittsburghrugby/" target="_blank" ><span class="visually-hidden">Instagram</span><i class="fab fa-instagram"></i></a></li><li><a href="https://twitter.com/pittsburghrugby" target="_blank" ><span class="visually-hidden">Twitter</span><i class="fab fa-twitter"></i></a></li></ul>';
        return $output;
    }

    add_shortcode('social_links', 'include_social_links');

?>