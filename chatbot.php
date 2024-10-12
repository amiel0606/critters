<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="chatbot.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Chatbot UI -->
        <div class="card">
          <div class="card-header bg-primary text-white text-center">
            Chatbot
          </div>
          <div class="card-body chat-box" id="chat-box">
            <!-- Messages will appear here -->
          </div>
          <div class="card-footer">
            <div class="input-group">
              <input type="text" class="form-control" id="user-input" placeholder="Type a message..." aria-label="User Input">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="sendMessage()">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JavaScript -->
  <script src="script.js"></script>
</body>
</html>
