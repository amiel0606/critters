$('#general_s_form').on('submit', function(e) {
    e.preventDefault();
    let siteTitle = $('#site_title_inp').val();
    let siteAbout = $('#site_about_inp').val();

    // Perform an AJAX request to save the settings
    $.ajax({
        type: 'POST',
        url: 'save_general_settings.php', // Replace with your actual endpoint
        data: { site_title: siteTitle, site_about: siteAbout },
        success: function(response) {
            // Handle success
            alert('General settings updated successfully');
            $('#general-s').modal('hide');
        },
        error: function() {
            // Handle error
            alert('Failed to update general settings');
        }
    });
});


$('#contacts_s_form').on('submit', function(e) {
    e.preventDefault();
    let address = $('#address_inp').val();
    let gmap = $('#gmap_inp').val();
    let pn1 = $('#pn1_inp').val();
    let fb = $('#fb_inp').val();

    // Perform an AJAX request to save the settings
    $.ajax({
        type: 'POST',
        url: 'save_contacts_settings.php', // Replace with your actual endpoint
        data: { address: address, gmap: gmap, pn1: pn1, fb: fb },
        success: function(response) {
            // Handle success
            alert('Contact settings updated successfully');
            $('#contacts-s').modal('hide');
        },
        error: function() {
            // Handle error
            alert('Failed to update contact settings');
        }
    });
});
