<div class="container-fluid  mt-5" id="footer-wrapper">
                <div class="f-row">
                  <div class="col-lg-4 p-4">
                    <div id="general"></div>
                  </div>
                  <div class="col-lg-4 p-4">
                    <h5 class="mb-3">Links</h5>
                      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
                      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Service</a> <br>
                      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Products</a> <br>
                      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a> <br>
                      <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
                  </div>
                  <div class="col-lg-4 p-4">
                    <h5 class="mb-3">Follow Us</h5>
                    <div id="social"></div>
                    

                       <br>
                  </div>
                </div>
              </div>
              <style>
                 .f-row {
                  display: flex;
                  flex-wrap: wrap; /* Ensures responsiveness */
                  }
                  #footer-wrapper{
                    background-color: #FFD0DF;
                    box-shadow: 5px 5px 10px 2px rgb(0 0 0 / 0.3);
                  }
              </style>

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
    function fetchCmsData() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/critters/admin/inc/getCMS.php',
            dataType: 'json',
            success: function(response) {
                var cms_title = response[0].title;
                var cms_about = response[0].about;
                if (response.error) {
                    console.error(response.error);
                } else {
                    var htmlContent = '';
                    htmlContent += `
                    <h3 class="h-font fw-bold fs-3 mb-2">${cms_title}</h3>
                    <p>
                ${cms_about}
                </p>
                    `;
                    $('#general').html(htmlContent);
                    var socialHTML = `
                    <a href="${response[0].social}" class="d-inline-block  text-dark text-decoration-none mb-2">
                      <i class="bi bi-facebook me-1"></i>Facebook
                    </a>
                                           <br>
                       <p data-text="${response[0].viber}" class="copy-viber d-inline-block text-dark text-decoration-none mb-2">
                       <i class="bi bi-chat-left-text-fill me-1"></i>${response[0].viber}
                    </p>
                    `;
                    $('#social').html(socialHTML);
                }
                $(document).on('click', '.copy-viber', function() {
                    var textToCopy = $(this).data('text');
                    var $tempInput = $('<input>');
                    $('body').append($tempInput);
                    $tempInput.val(textToCopy).select();
                    document.execCommand('copy');
                    $tempInput.remove();
                    alert('Text copied to clipboard: ' + textToCopy);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching CMS data:', error);
            }
        });
    }
    fetchCmsData();
});
</script>