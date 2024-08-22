<?php
require 'db_conect.php';
session_start();
$_SESSION['username'] = 'matvii';
$info = Conection::get_conection($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Frontend Example</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f4f4f4;
    }

    .container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    button {
      width: 48%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #0056b3;
    }

    .send-btn-container {
      margin-top: 10px;
    }

    .send-btn {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .send-btn:hover {
      background-color: #218838;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Account Management</h2>
    <input type="text" disabled id="username" placeholder="<?php echo $info[0]['username']; ?>" />
    <input type="password" disabled id="password" placeholder="<?php echo $info[0]['password']; ?>" />
    <input type="text" disabled id="token" placeholder="<?php echo $info[0]['token']; ?>" />
    <div class="btn-container">
      <form action="popa.php" method="post" id="sendForm">
        <input type="text" data="<?php echo $info[0]['username']; ?>" id="username" name="username">
        <button type="submit" id="newTokenBtn">New Token</button>
      </form>

    </div>
    <p></p>
  </div>

  <script>
    document
      .getElementById("newTokenBtn")
      .addEventListener("click", function() {
        const token =
          Math.random().toString(36).substring(2, 15) +
          Math.random().toString(36).substring(2, 15);
        document.getElementById("token").value = token;
      });
    document
      .getElementById("sendBtn")
      .addEventListener("click", function() {});
  </script>
</body>

</html>