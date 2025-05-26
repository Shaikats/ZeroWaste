<?php
include("login.php"); 

if($_SESSION['name']==''){
	header("location: signup.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="profile.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  
  <style>
    /* Container around entire profile content without box shadow */
    .profile {
      max-width: 720px;
      margin: 50px auto 50px;
      background: #fff;
      padding: 30px 30px 40px;
      border-radius: 8px;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    .profilebox {
      width: 100%;
    }

    /* Heading */
    .headingline {
      font-size: 28px;
      font-weight: 600;
      color: #06C167;
      margin-bottom: 25px;
    }

    /* Info section styling */
    .info p {
      font-size: 18px;
      margin: 12px 0;
      color: #333;
    }

    /* Logout button */
    a.logout-btn {
      display: inline-block;
      margin-top: 10px;
      background-color: #06C167;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    a.logout-btn:hover {
      background-color: #048c0d;
    }

    hr {
      border: none;
      border-bottom: 2px solid #06C167;
      margin: 30px 0;
    }

    /* Donations heading */
    .heading {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
    }

    /* Table container for horizontal scroll */
    .table-container {
      overflow-x: auto;
    }

    /* Table styling */
    table.table {
      width: 100%;
      border-collapse: collapse;
      font-size: 16px;
      min-width: 500px;
    }
    table.table thead {
      background-color: #06C167;
      color: white;
    }
    table.table th,
    table.table td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
    }
    table.table tbody tr:hover {
      background-color: #e6f4e6;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .profile {
        margin: 30px 15px 30px;
        padding: 20px 20px 30px;
      }
      .headingline {
        font-size: 24px;
      }
      .heading {
        font-size: 20px;
      }
      .info p {
        font-size: 16px;
      }
      table.table {
        font-size: 14px;
      }
    }

  </style>
</head>
<body>

<header>
  <img src="img/ZeroWaste.png" alt="" style="width: 270px; height: auto" />
  <div class="hamburger">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
  <nav class="nav-bar">
    <ul>
      <li><a href="home.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="profile.php" class="active">Profile</a></li>
    </ul>
  </nav>
</header>

<script>
  hamburger = document.querySelector(".hamburger");
  hamburger.onclick = function () {
    navBar = document.querySelector(".nav-bar");
    navBar.classList.toggle("active");
  };
</script>

<div class="profile">
  <div class="profilebox">
    <p class="headingline">Profile</p>

    <div class="info" style="padding-left: 10px;">
      <p>Name  : <?php echo htmlspecialchars($_SESSION['name']); ?></p>
      <p>Email : <?php echo htmlspecialchars($_SESSION['email']); ?></p>
      <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <hr />

    <p class="heading">Your donations</p>

    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th>Food</th>
            <th>Type</th>
            <th>Category</th>
            <th>Date/Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $email = $_SESSION['email'];
          $query = "SELECT * FROM food_donations WHERE email='$email'";
          $result = mysqli_query($connection, $query);
          if ($result == true) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . htmlspecialchars($row['food']) . "</td>
                      <td>" . htmlspecialchars($row['type']) . "</td>
                      <td>" . htmlspecialchars($row['category']) . "</td>
                      <td>" . htmlspecialchars($row['date']) . "</td>
                    </tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
