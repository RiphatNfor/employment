<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Management System</title>
<link rel="stylesheet" href="main.css">

</head>
<body>
<header>
  <?php
  if(isset($_SESSION['email'])){
    echo '<h1>';
    echo "yes";
    echo $_SESSION['email'];
    echo '</h1>';
  }
  ?>
  <h1>Welcome To NexInch Employee Management System</h1>
</header>
<nav>
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="attendance.html">Attendance</a></li>
    <li><a href="Seek.html">Seek Leave</a></li>
    <li><a href="faq.html">Faq</a></li>
    <li><a href="calendar.html">Events</a></li>
  </ul>
</nav>
<main>
  <section id="profile">
    <h2>Employee Profile</h2>
    <!-- Profile information form goes here -->
  </section>
  <section id="attendance">
    <h2>Attendance Tracking</h2>
    <!-- Attendance tracking interface goes here -->
  </section>
  <section id="leave">
    <h2>Leave Management</h2>
    <!-- Leave management interface goes here -->
  </section>
  <section id="tasks">
    <h2>Task Management</h2>
    <!-- Task management interface goes here -->
  </section>
  <section id="performance">
    <h2>Performance Reviews</h2>
    <!-- Performance review interface goes here -->
  </section>
  <section id="payroll">
    <h2>Payroll Management</h2>
    <!-- Payroll management interface goes here -->
  </section>
  <section id="documents">
    <h2>Document Management</h2>
    <!-- Document management interface goes here -->
  </section>
  <section id="communication">
    <h2>Communication Tools</h2>
    <!-- Communication tools interface goes here -->
  </section>
  <section id="reports">
    <h2>Reporting and Analytics</h2>
    <!-- Reporting and analytics interface goes here -->
  </section>
</main>
<footer>
  <p>&copy; 2024 Employee Management System</p>
</footer>
</body>
</html>
