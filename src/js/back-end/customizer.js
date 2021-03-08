//Hide/show footer layout options

(function( $ ) {
    wp.customize.bind( 'ready', function() {

        // hide control at first load
        if($('input[name="_customize-radio-header_layout_radio"]:checked').val()==="global"){
            $('#customize-control-footer_layout_radio').hide();
        }else{
            $('#customize-control-footer_layout_radio').show();
        }
        $(document).on('click', 'input[name="_customize-radio-header_layout_radio"]', function() {
            if($(this).val()==="global"){
                $('#customize-control-footer_layout_radio').hide();
            }else{
                $('#customize-control-footer_layout_radio').show();
            }
        });
  
    } );
    })( jQuery );




