jQuery(document).ready(function ($) {
    
    $('.cpa-color-picker').wpColorPicker();

    $(function () {
        $("#wpvcbL_button_text").click(function () {
            if ($(this).is(":checked")) {
                $("#wpvcbL_show_button_text").show();
            } else {
                $("#wpvcbL_show_button_text").hide();
            }
        });
    });
 
    $('.wpvcbL-tab-tigger').click(function() {
        $('.wpvcbL-tab-tigger').removeClass('wpvcbL-active');
        $(this).addClass('wpvcbL-active');
        var active_tab_key = $('.wpvcbL-tab-tigger.wpvcbL-active').data('menu');
        $('.wpvcbL-settings-wrap').removeClass('wpvcbL-active-container');
        $('.wpvcbL-settings-wrap[data-menu-ref="' + active_tab_key + '"]').addClass('wpvcbL-active-container');
    });
      
    $('#wpvcbL-button-template').change(function() {
        var template_value = $(this).val();
        var array_break = template_value.split('-');
        var current_id = array_break[1];
        $('.wpvcbL-grid-common').hide();
        $('#wpvcbL-grid-demo-' + current_id).show();
    });

    $(".wpvcbL-shortcode-button").click(function(){ 
        //var enable_button = ($("input[name=wpvcbL_enable_button]").attr('checked'))?'show':'hide';
        var enable_button = $('.wpvcbL-enable-button').val();
        //var enable_desktop = ($("input[name=wpvcbL_enable_desktop_button]").attr('checked'))?'show':'hide';
        var enable_desktop = $('.wpvcbL-enable-desktop').val();
        var enable_mobile = $('.wpvcbL-enable-mobile').val();
        //var enable_mobile = $("input[name=wpvcbL_enable_mobile_button]").val();
        var button_template = $( "#wpvcbL-button-template option:selected" ).val();
        var button_location = $( "#wpvcbL-button-location option:selected" ).val();
        var button_color = ($("#wpvcbL_button_color").val());
        var icon_color = ($("#wpvcbL_icon_color").val());
        var contact_num = ($("#wpvcbL_contact_number").val());
        var button_text_enable= $('.wpvcbL_button_text').val();
        //var button_text_enable = ($("input[name=wpvcbL_button_text_enable]").attr('checked'))?'show':'hide';
        var button_text = ($("#wpvcbL_button_text_value").val());
        var text_position = $("[name=radio]:checked").val();

        if(button_text_enable != 'show'){

            $( "#wpvcbL_generated_shortcode" ).html( "[wp_viber_contact_button" +" "+ "enable_button='" +  enable_button + 
            "'" +" "+"enable_desktop='" + enable_desktop + "'" +" "+ "enable_mobile='" + enable_mobile + "'" +" "+
            "button_template='" + button_template +"'" +" "+ "button_color='" + button_color +
            "'"+" "+ "icon_color='" + icon_color +"'"+" "+ "contact_number='" + contact_num +"'"+" "+ "button_location='" + button_location +"']"
            );

        }else{

            $( "#wpvcbL_generated_shortcode" ).html( "[wp_viber_contact_button" +" "+ "enable_button='" +  enable_button + 
            "'" +" "+"enable_desktop='" + enable_desktop + "'" +" "+ "enable_mobile='" + enable_mobile + "'" +" "+
            "button_template='" + button_template +"'" +" "+ "button_color='" + button_color +
            "'"+" "+ "icon_color='" + icon_color +"'"+" "+ "contact_number='" + contact_num +"'"+" "+ "button_location='" + 
            button_location +"'"+" "+ "button_enable_text='" + button_text_enable +"'"+" "+ "button_text='" + button_text +"'"+" "+ "text_position='" + text_position +"']"
            );
            
        }
    });
$('.wpvcbL-enable-button').click(function() {
        if ($(this).is(':checked')){
            $(this).val('show');
        } else{
            $(this).val('hide');
        }
    });
$('.wpvcbL-enable-desktop').click(function() {
        if ($(this).is(':checked')){
            $(this).val('show');
        } else{
            $(this).val('hide');
        }
    });
$('.wpvcbL-enable-mobile').click(function() {
        if ($(this).is(':checked')){
            $(this).val('show');
        } else{
            $(this).val('hide');
        }
    });
$('.wpvcbL_button_text').click(function() {
        if ($(this).is(':checked')){
            $(this).val('show');
        } else{
            $(this).val('hide');
        }
    });
    $('.wpvcb_short_codeDisp').click(function () {
        $(this).select();
        $(this).focus();
        document.execCommand('copy');
        $(this).siblings('.wpvcb_copied-msg').show().delay(1000).fadeOut();
    });

});