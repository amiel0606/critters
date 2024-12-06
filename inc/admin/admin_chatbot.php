<?php require('inc/header.php'); ?>

<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <?php require('inc/links.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
      }

      .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 50px auto;
        max-width: 1200px;
      }

      .live-chat-container {
        width: 100%;
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        margin-bottom: 20px;
      }

      .chatbot-container {
        flex: 1;
        margin-left: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        max-width:80%;
        margin-left: auto;
      }

      h1 {
        text-align: center;
      }

      .chatbot-table {
        margin-top: 20px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      th,
      td {
        padding: 10px;
        text-align: left;
      }

      th {
        background-color: #ddd;
      }

      td {
        background-color: #f9f9f9;
      }

      .send-message-container {
        margin-top: 20px;
      }

      .reply-section {
        margin-top: 10px;
        border-top: 1px solid #ddd;
        padding-top: 10px;
      }

      .reply {
        margin-top: 5px;
        padding: 10px;
        background-color: #e8f5e9;
        border-radius: 5px;
      }

      .message {
        padding: 10px;
        border-radius: 20px;
        max-width: 70%;
        position: relative;
        word-wrap: break-word;
      }

      .customer-message {
        background-color: #e9ecef;
        align-self: flex-start;
        border-bottom-left-radius: 0;
      }

      .bot-message {
        background-color: #d1ecf1;
        align-self: flex-end;
        text-align: right;
        border-bottom-right-radius: 0;
      }

      .send-live-message-container {
        display: flex;
        gap: 10px;
      }

      .live-message-input {
        flex: 1;
      }

      /* Media Query for smaller devices */
      @media (max-width: 768px) {
        .container {
          flex-direction: column;
          align-items: center;
        }

        .chatbot-container,
        .live-chat-container {
          width: 100%;
          max-width: 100%;
          margin: 10px 0;
        }

        .send-message-container form {
          width: 100%;
        }
      }

      /* Responsive table for smaller devices */
      @media (max-width: 600px) {
        table {
          font-size: 14px;
        }

        .chatbot-table {
          overflow-x: auto;
          -webkit-overflow-scrolling: touch;
        }

        .chatbot-table table {
          width: 100%;
          display: block;
          overflow-x: auto;
          white-space: nowrap;
        }

        th, td {
          padding: 8px;
        }

        .send-message-container {
          margin-top: 10px;
        }
      }
    </style>
  </head>

  <body>

      <div class="chatbot-container">
        <h1>Chatbot</h1>
        <div class="chatbot-table">
          <table class="table">
            <thead>
              <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="chatbot-content"></tbody>
          </table>
        </div>

        <div class="send-message-container">
          <h4>Send Message</h4>
          <form action="./inc/addQuestion.php" id="sendMessageForm" method="post">
            <div class="mb-3">
              <label for="newQuestion" class="form-label">Question</label>
              <input type="text" name="newQuestion" class="form-control" id="newQuestion" required>
            </div>
            <div class="mb-3">
              <label for="newAnswer" class="form-label">Answer</label>
              <textarea class="form-control" name="newAnswer" id="newAnswer" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="./inc/editQuestion.php" method="post" id="editForm">
                  <div class="mb-3">
                    <label for="editQuestion" class="form-label">Question</label>
                    <input name="question" type="text" class="form-control" id="editQuestion" required>
                    <input type="hidden" name="id">
                  </div>
                  <div class="mb-3">
                    <label for="editAnswer" class="form-label">Answer</label>
                    <textarea name="answer" class="form-control" id="editAnswer" rows="3" required></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Reply Modal -->
      <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="replyModalLabel">Reply to Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="replyForm">
                <div class="mb-3">
                  <label for="replyMessage" class="form-label">Reply Message</label>
                  <textarea class="form-control" id="replyMessage" rows="3" required></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="sendReplyBtn">Send Reply</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      function fetchQuestions() {
        $.ajax({
          url: './inc/getChatbot.php',
          method: 'GET',
          dataType: 'json',
          success: function (data) {
            $('#chatbot-content').empty();
            if (data.length === 0) {
              $('#chatbot-content').append(
                '<tr><td colspan="3" class="text-center">No Chatbot data yet</td></tr>'
              );
            } else {
              $.each(data, function (index, item) {
                $('#chatbot-content').append(
                  '<tr>' +
                  '<td class="question">' + item.question + '</td>' +
                  '<td class="answer">' + item.answer + '</td>' +
                  '<td>' +
                  '<div class="btn-group" role="group" aria-label="Action buttons">' +
                  `<button class="edit-btn btn btn-success" data-bs-toggle="modal" data-id="${item.id}" data-bs-target="#editModal">Edit</button>` +
                  `<button class="delete-btn btn btn-danger" data-id="${item.id}">Delete</button>` +
                  '</div>' +
                  '</td>' +
                  '</tr>'
                );
              });
              $('.delete-btn').on('click', function () {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to delete this question?')) {
                  $.ajax({
                    url: './inc/deleteQuestion.php',
                    method: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                      if (response.success) {
                        alert('Question deleted successfully.');
                        fetchQuestions();
                      } else {
                        alert('Error deleting question: ' + response.error);
                      }
                    },
                    error: function (xhr, status, error) {
                      console.error('AJAX Error: ' + status + error);
                    }
                  });
                }
              });
              $('.edit-btn').on('click', function () {
                const id = $(this).data('id');
                const question = $(this).closest('tr').find('.question').text();
                const answer = $(this).closest('tr').find('.answer').text();

                $('#editQuestion').val(question);
                $('#editAnswer').val(answer);
                $('#editForm input[name="id"]').val(id);
              });
            }
          },
          error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
          }
        });
      }

      fetchQuestions();
    });
  </script>
  </body>
  </html>
