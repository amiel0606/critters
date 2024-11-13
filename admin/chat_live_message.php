<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Interface</title>
  <?php require('inc/links.php'); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f7f6;
      margin-top: 0px;
      font-family: Arial, sans-serif;

    }

    .chat-app .people-list {
      width: 280px;
      position: absolute;
      left: 0;
      top: 0;
      padding: 20px;
      z-index: 7;
    }

    .chat-app .chat {
      margin-left: 280px;
      border-left: 1px solid #eaeaea;
    }

    .people-list .chat-list li {
      padding: 10px 15px;
      list-style: none;
      border-radius: 3px;
    }

    .people-list .chat-list li:hover {
      background: #efefef;
      cursor: pointer;
    }

    .people-list .chat-list li.active {
      background: #efefef;
    }

    .people-list .name {
      font-size: 15px;
    }

    .chat .chat-header {
      padding: 15px 20px;
      border-bottom: 2px solid #f4f7f6;
    }

    .chat .chat-history {
      padding: 20px;
      border-bottom: 2px solid #fff;
    }

    .chat .chat-history ul {
      padding: 0;
    }

    .chat .chat-history ul li {
      list-style: none;
      margin-bottom: 30px;
    }

    .chat .chat-history ul li:last-child {
      margin-bottom: 0px;
    }

    .chat .chat-history .message-data {
      margin-bottom: 15px;
    }

    .chat .chat-history .message {
      color: #444;
      padding: 18px 20px;
      line-height: 26px;
      font-size: 16px;
      border-radius: 7px;
      display: inline-block;
      position: relative;
    }

    .chat .chat-history .my-message {
      background: #efefef;
    }

    .chat .chat-history .other-message {
      background: #e8f1f3;
      text-align: right;
    }

    .chat .chat-message {
      padding: 20px;
    }

    .clearfix::after {
      content: "";
      display: table;
      clear: both;
    }

    <<<<<<< Updated upstream .container .card {
      max-width: 85%;
      margin-left: auto;

    }

    =======>>>>>>>Stashed changes @media only screen and (max-width: 767px) {
      .chat-app .people-list {
        width: 100%;
        display: none;
      }

      .chat-app .people-list.open {
        display: block;
      }

      .chat-app .chat {
        margin: 0;
      }
    }
  </style>
</head>

<body>
  <?php require('inc/header.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card chat-app">
          <div id="plist" class="people-list">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search...">
            </div>
            <ul class="list-unstyled chat-list" id="user-list">
              <!-- Contacts will be appended here -->
            </ul>
          </div>

          <div class="chat">
            <div class="chat-header clearfix">
              <div class="row">
                <div class="col-6">
                  <div class="chat-about">
                    <h6 class="mb-0" id="chat-user-name">Select a user to chat</h6>
                    <input type="text" name="idUser" id="idUser">
                  </div>
                </div>
              </div>
            </div>

            <div class="chat-history">
              <ul class="m-0" id="chat-messages">
                <!-- Messages will be appended here -->
              </ul>
            </div>

            <div class="chat-message clearfix">
              <div class="input-group mb-0">
                <input type="text" id="message-input" class="form-control" placeholder="Enter text here...">
                <button id="send-message" class="btn btn-primary" name="send-btn-customer" type="button">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $.ajax({
        url: './inc/fetchUsers.php',
        type: 'GET',
        dataType: 'json',
        success: function (users) {
          $.each(users, function (index, user) {
            $('#user-list').append(
              `<li class="clearfix user" data-user-id="${user.id}">
                        <div class="about">
                            <div class="name">${user.firstName} ${user.lastName}</div>
                        </div>
                    </li>`
            );
          });
        },
        error: function (xhr, status, error) {
          console.error("Error fetching users: " + error);
        }
      });

      $(document).on('click', '.user', function () {
        const userId = $(this).data('user-id');
        const userName = $(this).find('.name').text();
        $('#chat-user-name').text(userName);
        $('#idUser').val(userId);
        loadMessages(userId);
      });

      function loadMessages(userId) {
        $.ajax({
          url: './inc/fetchMessages.php',
          type: 'GET',
          data: { user_id: userId },
          dataType: 'json',
          success: function (messages) {
            $('#chat-messages').empty();
            $.each(messages, function (index, message) {
              const messageClass = message.sender === 'admin' ? 'my-message' : 'other-message float-end';
              $('#chat-messages').append(
                `<li class="clearfix">
                        <div class="message ${messageClass}">${message.message}</div>
                    </li>`
              );
            });
          },
          error: function (xhr, status, error) {
            console.error("Error fetching messages: " + error);
          }
        });
      }

      $('#send-message').click(function () {
        const messageText = $('#message-input').val();
        const userId = $('#idUser').val();
        if (messageText && userId) {
          $.ajax({
            url: './inc/sendMessage.php',
            type: 'POST',
            data: {
              customer_id: userId,
              message: messageText
            },
            success: function (response) {
              $('#message-input').val('');
              loadMessages(userId);
            },
            error: function (xhr, status, error) {
              console.error("Error sending message: " + error);
            }
          });
        }
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>