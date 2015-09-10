jQuery(document).ready(function($) {

    // Show/Hide Logo Typography
    jQuery('#section-f_logo_type input[type="radio"]').click(function() {
            if (jQuery(this).filter(":checked").val() == 'f_text_logo'){
                    jQuery('#section-f_logo_typography').show(0);
                    jQuery('#section-f_logo_url').hide(0);
            } else {
                    jQuery('#section-f_logo_typography').hide(0);
                    jQuery('#section-f_logo_url').show(0);
            };
    });

    if (jQuery('#section-f_logo_type input[type="radio"]:checked').val() == 'f_image_logo') {
            jQuery('#section-f_logo_typography').hide(0);
            jQuery('#section-f_logo_url').show(0);
    }

});