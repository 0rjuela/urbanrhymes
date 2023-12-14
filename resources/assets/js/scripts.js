
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('videoscene', require('./components/Videoscene.vue'));
Vue.component('progressheader', require('./components/Progress.vue'));
Vue.component('menufooter', require('./components/Menufooter.vue'));

Vue.use(Vuex);


 $(document).ready(function(){

    $('#login-facebook').on('click', function(e) {

        var termCheck = $('input#terminos-check').is(':checked');

        if (termCheck == false) {
        	e.preventDefault();
        }

    });

    $('#term-checkbox').on('click', function() {
        $(this).toggleClass('checked');
        if ($(this).hasClass('checked')) {
            $('#terminos-check').attr('checked', true);
        } else {
            $('#terminos-check').attr('checked', false);
        }
    });

    /**
     * Manage Menu
     */
    $('#menu-btn').on('click', function(e) {
    	e.preventDefault();

        if( $('.menu').height() > 0 ) {
            $('.menu').animate({height:'0px'}, function() {
                $('.menu').css('display', 'none');
            });
        } else {
            $('.menu').animate({height:'220px'});
            $('.menu').css('display', 'block');
        }

    });

    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });
    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });


    // Send Email
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let message = $('#message').val();

        $.ajax({
            method: 'post',
            url: '/enviar-correo',
            data: {
                name: name,
                email: email,
                message: message
            },
            success: function(data) {
                if (data.status == true) {
                    $('#name').val('');
                    $('#email').val('');
                    $('#message').val('');
                    $('.email-sent').css({opacity: '1'});
                }
            }
        });
    });    
});
