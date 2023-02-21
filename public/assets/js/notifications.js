$(document).ready(function () {
    $('body').on('click', '#page-header-notifications-dropdown', function () {
      var userURL = $(this).data('getNotifications');

        $.ajax({

            url: userURL,
            type: 'GET',
            dataType: 'json',

            success: function(data) {
                $('#notifications_div').append(data);
            }

        });



   });

    

});