<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot</title>
  <?php require('inc/links.php'); ?>
  <link rel="stylesheet" href="styles.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .chatbot-container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #ddd;
    }

    td {
      background-color: #f9f9f9;
    }

    .edit-btn, .delete-btn {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .edit-btn {
      background-color: #4CAF50;
      color: white;
    }

    .delete-btn {
      background-color: #f44336;
      color: white;
      margin-left: 10px;
    }

    .send-message-container {
      margin-top: 20px;
    }

    /* Styles for replies */
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
  </style>
</head>
<body>
  <?php require('inc/header.php'); ?>

  <div class="chatbot-container">
    <h1>Chatbot</h1>
    <div class="chatbot-table">
      <table>
        <thead>
          <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="chatbot-content">
          <tr>
            <td class="question">Why is my dog itching so much, and what can I do about it?</td>
            <td class="answer">Look for signs of fleas or flea dirt on your dog's skin and fur. If fleas are present, consider using a flea prevention treatment like topical or oral medications.</td>
            <td>
              <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
              <button class="delete-btn">Delete</button>
              <button class="reply-btn" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
            </td>
          </tr>
          <tr>
            <td class="question">What should I feed my dog?</td>
            <td class="answer">A balanced diet of high-quality dog food, appropriate for their age and size.</td>
            <td>
              <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
              <button class="delete-btn">Delete</button>
              <button class="reply-btn" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Send Message Form -->
    <div class="send-message-container">
      <h4>Send Message</h4>
      <form id="sendMessageForm">
        <div class="mb-3">
          <label for="newQuestion" class="form-label">Question</label>
          <input type="text" class="form-control" id="newQuestion" required>
        </div>
        <div class="mb-3">
          <label for="newAnswer" class="form-label">Answer</label>
          <textarea class="form-control" id="newAnswer" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
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
            <form id="editForm">
              <div class="mb-3">
                <label for="editQuestion" class="form-label">Question</label>
                <input type="text" class="form-control" id="editQuestion" required>
              </div>
              <div class="mb-3">
                <label for="editAnswer" class="form-label">Answer</label>
                <textarea class="form-control" id="editAnswer" rows="3" required></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
          </div>
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

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    let currentRow;

    document.getElementById('sendMessageForm').addEventListener('submit', (event) => {
      event.preventDefault();

      const newQuestion = document.getElementById('newQuestion').value;
      const newAnswer = document.getElementById('newAnswer').value;


      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td class="question">${newQuestion}</td>
        <td class="answer">${newAnswer}</td>
        <td>
          <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
          <button class="delete-btn">Delete</button>
          <button class="reply-btn" data-bs-toggle="modal" data-bs-target="#replyModal">Reply</button>
        </td>
      `;

      document.getElementById('chatbot-content').appendChild(newRow);
      document.getElementById('newQuestion').value = '';
      document.getElementById('newAnswer').value = '';
      addEventListenersToRow(newRow);
    });

    document.querySelectorAll('.edit-btn').forEach(button => {
      button.addEventListener('click', (event) => {
        currentRow = event.target.closest('tr');
        const question = currentRow.querySelector('.question').textContent;
        const answer = currentRow.querySelector('.answer').textContent;
        document.getElementById('editQuestion').value = question;
        document.getElementById('editAnswer').value = answer;
      });
    });

    document.getElementById('saveChangesBtn').addEventListener('click', () => {
      const newQuestion = document.getElementById('editQuestion').value;
      const newAnswer = document.getElementById('editAnswer').value;
      currentRow.querySelector('.question').textContent = newQuestion;
      currentRow.querySelector('.answer').textContent = newAnswer;
      const editModal = new bootstrap.Modal(document.getElementById('editModal'));
      editModal.hide();
    });

    function addEventListenersToRow(row) {
      const deleteButton = row.querySelector('.delete-btn');
      deleteButton.addEventListener('click', (event) => {
        const rowToDelete = event.target.closest('tr');
        rowToDelete.remove();
      });

      const replyButton = row.querySelector('.reply-btn');
      replyButton.addEventListener('click', (event) => {
        currentRow = event.target.closest('tr');
      });
    }


    document.querySelectorAll('.delete-btn').forEach(button => {
      addEventListenersToRow(button.closest('tr'));
    });

    document.getElementById('sendReplyBtn').addEventListener('click', () => {
      const replyMessage = document.getElementById('replyMessage').value;
      let replySection = currentRow.querySelector('.reply-section');
      if (!replySection) {
        replySection = document.createElement('div');
        replySection.classList.add('reply-section');
        currentRow.appendChild(replySection);
      }

      const replyDiv = document.createElement('div');
      replyDiv.classList.add('reply');
      replyDiv.textContent = replyMessage;
      replySection.appendChild(replyDiv);
      const replyModal = new bootstrap.Modal(document.getElementById('replyModal'));
      replyModal.hide();
      document.getElementById('replyMessage').value = '';
    });
  </script>
</body>
</html>
