jQuery(document).ready(function($){
    $('#nav ul.menu > li.menu-item').on({
        mouseenter: function(){
            
            if( $('.sub-menu', this).is(':hidden') ) {
                
                $('.sub-menu').slideUp();
                $('.sub-menu',this).slideDown('fast');
            }
        }
    })
});

