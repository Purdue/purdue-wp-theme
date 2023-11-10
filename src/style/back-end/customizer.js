//Hide/show search quick links

(function( $ ) {
    // Footer image
wp.customize('my_footer_image', function (value) {
    value.bind(function (to) {
        $('.footer-image').text(to);
    });
});
wp.customize.bind( 'ready', function() {

    // hide control at first load
    if($('input[name="_customize-radio-search_option_radio"]:checked').val()==="google"){
        $('#customize-control-quick_link_1_text').hide();
        $('#customize-control-quick_link_2_text').hide();
        $('#customize-control-quick_link_3_text').hide();
        $('#customize-control-quick_link_4_text').hide();
        $('#customize-control-quick_link_5_text').hide();
        $('#customize-control-quick_link_1_link').hide();
        $('#customize-control-quick_link_2_link').hide();
        $('#customize-control-quick_link_3_link').hide();
        $('#customize-control-quick_link_4_link').hide();
        $('#customize-control-quick_link_5_link').hide();
    }else{
        $('#customize-control-quick_link_1_text').show();
        $('#customize-control-quick_link_2_text').show();
        $('#customize-control-quick_link_3_text').show();
        $('#customize-control-quick_link_4_text').show();
        $('#customize-control-quick_link_5_text').show();
        $('#customize-control-quick_link_1_link').show();
        $('#customize-control-quick_link_2_link').show();
        $('#customize-control-quick_link_3_link').show();
        $('#customize-control-quick_link_4_link').show();
        $('#customize-control-quick_link_5_link').show();
    }
    $(document).on('click', 'input[name="_customize-radio-search_option_radio"]', function() {
        if($(this).val()==="google"){
            $('#customize-control-quick_link_1_text').hide();
            $('#customize-control-quick_link_2_text').hide();
            $('#customize-control-quick_link_3_text').hide();
            $('#customize-control-quick_link_4_text').hide();
            $('#customize-control-quick_link_5_text').hide();
            $('#customize-control-quick_link_1_link').hide();
            $('#customize-control-quick_link_2_link').hide();
            $('#customize-control-quick_link_3_link').hide();
            $('#customize-control-quick_link_4_link').hide();
            $('#customize-control-quick_link_5_link').hide();
        }else{
            $('#customize-control-quick_link_1_text').show();
            $('#customize-control-quick_link_2_text').show();
            $('#customize-control-quick_link_3_text').show();
            $('#customize-control-quick_link_4_text').show();
            $('#customize-control-quick_link_5_text').show();
            $('#customize-control-quick_link_1_link').show();
            $('#customize-control-quick_link_2_link').show();
            $('#customize-control-quick_link_3_link').show();
            $('#customize-control-quick_link_4_link').show();
            $('#customize-control-quick_link_5_link').show();
        }
    });

} );
})( jQuery );