$(document).ready(function() {
    function fetchCmsData() {
        $.ajax({
            type: 'GET',
            url: './getCMS.php',
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    console.error(response.error);
                } else {
                    var htmlContent = '';
                    htmlContent += `
                            <h3 class="mb-0 h-font">${response[0].title}</h3>
                    `;
                    $('#title').html(htmlContent);
                } 
            },
            error: function(xhr, status, error) {
                console.error('Error fetching CMS data:', error);
            }
        });
    }
    fetchCmsData();
});