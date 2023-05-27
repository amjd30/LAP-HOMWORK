<!DOCTYPE html>
<html>
<head>
  <title>Registered Students</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th, table td {
      padding: 10px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <h2>Registered Students</h2>
  <?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "register_students";

  $conn = new mysqli($server, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Full Name</th><th>Email</th><th>Gender</th></tr>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row["Full_name"] . '</td>';
      echo '<td>' . $row["email"] . '</td>';
      echo '<td>' . $row["gender"] . '</td>';
      echo '</tr>';
    }

    echo '</table>';
  } else {
    echo 'No students registered yet.';
  }

  $conn->close();
  ?>
</body>
</html>
