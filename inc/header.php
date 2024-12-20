<?php
$userID =  isset($_SESSION['id']) ? $_SESSION['id'] : 0;
try {
    if (isset($_GET['login'])) {
        if ($_GET['login'] == 'success') { ?>
            <script>
                alert('Logged in successfully');
            </script>
        <?php } elseif ($_GET['login'] == 'notLoggedIn') { ?>
            <script>
                alert('Please login to access this page');
            </script>
        <?php }
    } elseif (isset($_GET['error'])) {
        if ($_GET['error'] == 'WrongLogin') { ?>
            <script>
                alert('Wrong login credentials');
            </script>
        <?php } elseif ($_GET['error'] == 'stmtFailed') { ?>
            <script>
                alert('Failed to execute statement');
            </script>
        <?php } elseif ($_GET['error'] == 'none') { ?>
            <script>
                alert('Success!');
            </script>
        <?php } elseif ($_GET['error'] == 'EmptyInput') { ?>
            <script>
                alert('Please fill in all fields');
            </script>
        <?php } elseif ($_GET['error'] == 'PassNotMatching') { ?>
            <script>
                alert('Passwords do not match');
            </script>
        <?php } elseif ($_GET['error'] == 'InvalidUsername') { ?>
            <script>
                alert('Invalid username');
            </script>
        <?php } elseif ($_GET['error'] == 'UsernameTaken') { ?>
            <script>
                alert('Username already taken');
            </script>
<?php }
    }
} catch (\Throwable $th) {
    throw new Exception("An unexpected error occurred: " . $th->getMessage());
}
?>
<style>
    .chat-messages {
        display: flex;
        flex-direction: column;
    }

    .message {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .bot-message {
        justify-content: flex-start;
    }

    .user-message {
        justify-content: flex-end;
    }

    .bot-message strong {
        color: blue;
    }

    .user-message strong {
        color: green;
    }

    .bot-message span,
    .user-message span {
        padding: 5px 10px;
        border-radius: 10px;
    }

    .bot-message span {
        background-color: #e0e0e0;
    }

    .user-message span {
        background-color: #007bff;
        color: white;
    }

    .bg-danger {
        background-image: linear-gradient(to right, #D09192, #C82471);
    }
    .btn-outline-secondary:hover {
    background-color: #e2e6ea;
}
.btn-success:hover {
    background-color: #218838;
}

</style>
<nav class="navbar navbar-expand-lg navbar-light bg-danger px-lg-3 py-lg-2 shadow-sm sticky-top ">
    <div class="container-fluid">
        <a class="navbar-brand" href="landingpage.php">
            <img src="path_to_logo.png" alt="Logo" id="cms-logo" width="100" height="auto">
        </a>
        <div id="title"></div>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="landingpage.php" href="landingpage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="service.php">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="booking.php">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="calendar.php">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About</a>
                </li>
            </ul>
            <div class="d-flex">
                <button type="button"
                    class="btn btn-outline-dark shadow-none me-lg-3 me-2 <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>"
                    data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button"
                    class="btn btn-outline-dark shadow-none <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>"
                    data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
                </button>
                <!-- Dropdown -->
                <div id="dropdown" class="dropdown <?php echo isset($_SESSION["id"]) ? "" : "invisible"; ?>">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo isset($_SESSION["firstName"]) ? $_SESSION["firstName"] . " " . $_SESSION["lastName"] : ""; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="Show_history.php">Show Booking</a></li>
                        <li><a class="dropdown-item" href="./inc/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Modals for Login and Register -->
<div class="modal fade <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>" id="loginModal"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./inc/login.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center ">
                        <i class="bi bi-person-circle fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="form-label">Email address</label>
                        <input name="email" type="email" class="form-control shadow--none" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Password</label>
                        <input name="password" type="password" class="form-control shadow-none" id="myInput"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            placeholder="Enter Corrrect Password" required>
                        <input id="showPass" type="checkbox" onclick="myPassword()">
                        <label for="showPass">Show Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button name="submit" type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Registration Modal -->
<div class="modal fade <?php echo isset($_SESSION["id"]) ? "invisible" : ""; ?>" id="registerModal"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./inc/register.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">First Name</label>
                                <input name="Fname" type="text" class="form-control shadow-none" placeholder="Name" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Last Name</label>
                                <input name="Lname" type="text" class="form-control shadow-none" placeholder="Last Name"
                                    required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Email</label>
                                <input id="email-input" name="email" type="email" class="form-control shadow-none"
                                    placeholder="Enter Valid Email" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Contact No.</label>
                                <input id="phone-input" name="contact" type="tel" class="form-control shadow-none"
                                    placeholder="Enter Valid Phone Number" pattern="^\+?[0-9]{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$"
                                    maxlength="11" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control shadow-none"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    placeholder="Choose a strong password" required>
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="ConfPassword" type="password" class="form-control shadow-none"
                                    placeholder="Copy current Password" required>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="termsCheck" onchange="toggleSendOtpButton()">
                                <label class="form-check-label" for="termsCheck">
                                    I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
                                </label>
                            </div>
                            <div class="col-md-6 p-0 mb-3" id="otp-section" style="display:none;">
                                <label class="form-label">Enter OTP</label>
                                <input type="text" id="otp" class="form-control shadow-none form-input"
                                    placeholder="Enter the OTP" required>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button name="send_otp" type="button" class="send-otp btn btn-dark shadow-none" id="send-otp"
                                disabled>SEND OTP</button>
                            <button name="send_otp" type="button" class="send-otp btn btn-dark shadow-none"
                                id="resend-otp" style="display:none;">RESEND OTP</button>
                            <input id="verify" type="button" class="btnVerify" value="Verify" style="display:none;">
                            <button name="submit" type="submit" class="btn btn-dark shadow-none" id="register"
                                style="display:none;">REGISTER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold mx-auto" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="termsAndConditions" >Your terms and conditions content goes here...</p>
            </div>
        </div>
    </div>
</div>     
        </div>
    </div>
</div>






<div class="container text-center my-4">
    <!-- Chatbot Button Positioned at the Bottom Right Corner -->
    <button type="button" class="btn btn-outline-dark shadow-none position-fixed bottom-0 end-0 m-3" id="chatbotButton"
        data-bs-toggle="modal" data-bs-target="#chatbotModal" style="z-index: 2; background-color:white;">
        <i class="bi bi-chat-square-dots me-2"></i> Chat with Us
    </button>
    <div class="container text-center my-4">
        <!-- Chatbot Button Positioned at the Bottom Right Corner -->
        <button type="button" class="btn btn-outline-dark shadow-none position-fixed bottom-0 end-0 m-3"
            id="chatbotButton" data-bs-toggle="modal" data-bs-target="#chatbotModal">
            <i class="bi bi-chat-square-dots me-2"></i> Chat with Us
        </button>

        <!-- Chatbot Modal -->
        <div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatbotModalLabel">Chatbot</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="chat-window">
                            <!-- Chat messages will be displayed here -->
                            <div class="chat-messages"
                                style="height: 400px; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 0.5rem; padding: 10px;">
                                <!-- Bot message -->
                                <div class="message bot-message mb-2">
                                    <strong>Bot:</strong>
                                    <span class="ms-2">Woof! How can I help you today?</span>
                                </div>

                            </div>
                        </div>
                        <!-- Predefined Questions -->
                        <div class="my-3" id="quick-questions">
                            <h6>Quick Questions:</h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="chatWithAdminBtn">Chat with Admin</button>
                        <div id="chatInputSection" style="display: none;">
                            <input type="text" name="message" class="form-control" placeholder="Type your message..."
                                aria-label="User message" id="userMessage">
                            <button type="submit" class="btn btn-primary" name="send_btn_customer"
                                id="sendMessageBtn">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            function toggleRegisterButton() {
        const termsCheck = document.getElementById("termsCheck");
        const registerButton = document.getElementById("register");
        registerButton.disabled = !termsCheck.checked;
    }

    // Show or hide password
    function myFunction() {
        const passwordField = document.querySelector('input[name="password"]');
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function toggleSendOtpButton() {
        const termsCheck = document.getElementById('termsCheck');
        const sendOtpButton = document.getElementById('send-otp');
        sendOtpButton.disabled = !termsCheck.checked;
    }

            function myPassword() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            $(document).ready(function() {
                let uID = <?php echo $userID; ?>;
                let isHidden = false;
                $('#chatWithAdminBtn').click(function() {
                    $(this).hide();
                    $('#quick-questions').hide();
                    $('#chatInputSection').show();
                    let uID = <?php echo $userID; ?>;
                    loadMessages(uID);
                    isHidden = true;
                });
                setInterval(function() {
                    if (isHidden) {
                        loadMessages(uID);
                    }
                }, 1000);

                function sendMessage() {
                    const messageText = $('#userMessage').val();
                    if (messageText) {
                        $.ajax({
                            url: './admin/inc/sendMessage.php',
                            type: 'POST',
                            data: {
                                send_btn_customer: true,
                                message: messageText
                            },
                            success: function(response) {
                                $('#userMessage').val('');
                                let uID = <?php echo $userID; ?>;
                                loadMessages(uID);
                                scrollToBottom();
                            },
                            error: function(xhr, status, error) {
                                console.error("Error sending message: " + error);
                            }
                        });
                    }
                }
                $('#sendMessageBtn').click(function() {
                    sendMessage();
                });
                $('#userMessage').keypress(function(e) {
                    if (e.which === 13) {
                        sendMessage();
                    }
                });

                function loadMessages(userId) {
                    $.ajax({
                        url: 'http://localhost/critters/admin/inc/fetchMessages.php',
                        type: 'GET',
                        data: {
                            user_id: userId
                        },
                        dataType: 'json',
                        success: function(messages) {
                            $('.chat-messages').empty();
                            $.each(messages, function(index, message) {
                                const messageClass = message.receiver === "admin" ? 'user-message float-end' : 'bot-message';
                                $('.chat-messages').append(
                                    `<div class="message ${messageClass} mb-2">
                            <strong>${message.sender === 'admin' ? 'Admin' : 'User'}:</strong>
                            <span class="ms-2">${message.message}</span>
                        </div>`
                                );
                            });
                            scrollToBottom();
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching messages: " + error);
                        }
                    });
                }

                function fetchCmsData() {
                    $.ajax({
                        type: 'GET',
                        url: 'http://localhost/critters/admin/inc/getCMS.php',
                        dataType: 'json',
                        success: function(response) {
                            var cms_title = response[0].title;
                            var cms_about = response[0].about;
                            var cms_logo = response[0].logo;
                            $('#cms-logo').attr('src', `http://localhost/critters/admin/inc/uploads/${cms_logo}`);
                            $('#termsAndConditions').text(response[0].terms);
                            if (response.error) {
                                console.error(response.error);
                            } else {
                                var htmlContent = '';
                                htmlContent += `
                        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="landingpage.php">${response[0].title}</a>
                    `;
                                $('#title').html(htmlContent);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching CMS data:', error);
                        }
                    });
                }

                function fetchQuestions() {
                    $.ajax({
                        url: 'http://localhost/critters/admin/inc/getChatbot.php',
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#quick-questions').find('button').remove();
                            if (data.length === 0) {
                                $('#quick-questions').append('<p>No quick questions available.</p>');
                            } else {
                                $.each(data, function(index, item) {
                                    const button = $('<button>')
                                        .addClass('btn btn-outline-primary btn-sm me-2 quick-question')
                                        .text(item.question)
                                        .data('answer', item.answer)
                                        .click(function() {
                                            displayUserMessage($(this).text());
                                            displayBotTypingAnimation();
                                            setTimeout(() => {
                                                displayBotMessage($(this).data('answer'));
                                            }, 2000);
                                        });
                                    $('#quick-questions').append(button);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
                        }
                    });
                }

                function displayUserMessage(message) {
                    const userMessageHtml = `
                                <div class="message user-message mb-2">
                                    <strong>You:</strong>
                                    <span class="ms-2">${message}</span>
                                </div>
                            `;
                    $('.chat-messages').append(userMessageHtml);
                    scrollToBottom();
                }

                function displayBotTypingAnimation() {
                    const typingHtml = `
                                <div class="message bot-message mb-2 typing-indicator">
                                    <strong>Bot:</strong>
                                    <span class="ms-2">...</span>
                                </div>
                            `;
                    $('.chat-messages').append(typingHtml);
                    scrollToBottom();
                }

                function displayBotMessage(message) {
                    $('.typing-indicator').remove();
                    const botMessageHtml = `
                                <div class="message bot-message mb-2">
                                    <strong>Bot:</strong>
                                    <span class="ms-2">${message}</span>
                                </div>
                            `;
                    $('.chat-messages').append(botMessageHtml);
                    scrollToBottom();
                }

                function scrollToBottom() {
                    const chatWindow = $('.chat-messages');
                    chatWindow.scrollTop(chatWindow[0].scrollHeight);
                }

                function verifyOTP() {
                    $(".error").html("").hide();
                    var otp = $("#otp").val();
                    var input = {
                        "otp": otp
                    };

                    if (otp.length == 6) {
                        $.ajax({
                            url: './inc/verify_otp.php',
                            type: 'POST',
                            dataType: "json",
                            data: input,
                            success: function(response) {
                                console.log(response);
                                if (response.status === "success") {
                                    alert(response.message);
                                    $("#register").show();
                                    $('#verify').hide();
                                    $('#resend-otp').hide();
                                } else {
                                    $(".error").html(response.message).show();
                                }
                            },
                            error: function() {
                                $(".error").html("An error occurred while verifying the OTP.").show();
                            }
                        });
                    } else {
                        $(".error").html('Please enter a valid OTP.').show();
                    }
                }


                fetchQuestions();
                fetchCmsData();
                $('.send-otp').click(function() {
                    var email = $('#email-input').val();
                    if (email) {
                        $.ajax({
                            url: './inc/send_otp.php',
                            type: 'POST',
                            data: {
                                email: email
                            },
                            success: function(response) {
                                var data = JSON.parse(response);
                                if (data.success) {
                                    alert(data.message);
                                    $('#verify').show();
                                    $('#resend-otp').show();
                                    $('#send-otp').hide();
                                    $('#otp-section').show();
                                } else {
                                    alert(data.message);
                                }
                            },
                            error: function() {
                                alert('Error sending OTP. Please try again.');
                            }
                        });
                    } else {
                        alert('Please enter a valid email address.');
                    }
                });
                $('#verify').click(function() {
                    verifyOTP();
                });
            });
        </script>