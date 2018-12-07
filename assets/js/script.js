(function ($) {
    $( document ).ready(function() {
        // declaration of variables
        const global_variables = {
            'cj_top_navbar_search' : $("#cj_top_navbar_search"),
            'searchform' : $("#searchform")
        };

        // functions
        // header:
        global_variables.cj_top_navbar_search.on('click', function () {
            global_variables.searchform.toggleClass('cj_appear');
        });


    });
})( jQuery );