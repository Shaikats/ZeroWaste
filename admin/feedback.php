
<?php

include '../connection.php';
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:signin.php");
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    
<?php
 $connection=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($connection,'zerowaste');
 


?>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
              
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
    
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >Feed<b style="color: #06C167; ">back</b></p>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
       <br>
       <br>
       <br>

          <div class="activity">
    <div class="table-container" style="overflow-x:auto; margin-top: 20px;">
        <table class="table" aria-label="User Feedbacks Table" style="
            width: 100%;
            border-collapse: separate; 
            border-spacing: 0 10px; /* vertical spacing between rows */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
            background-color: #fff;
        ">
            <thead style="background-color: #06C167; color: white;">
                <tr>
                    <th style="padding: 15px 20px; text-align: center; border-right: 2px solid #fff;">Name</th>
                    <th style="padding: 15px 20px; text-align: center; border-right: 2px solid #fff;">Email</th>
                    <th style="padding: 15px 20px; text-align: center;">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM user_feedback";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr style='background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;'>";
                        echo "<td style='padding: 15px 20px; border-right: 1px solid #ddd;'>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td style='padding: 15px 20px; border-right: 1px solid #ddd;'>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td style='padding: 15px 20px;'>" . htmlspecialchars($row['message']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='padding: 15px; text-align:center;'>No feedback found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Hover effect with subtle shadow and background color
    document.querySelectorAll('table.table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.backgroundColor = '#e6f4ea';
            row.style.boxShadow = '0 2px 10px rgba(6,193,103,0.3)';
        });
        row.addEventListener('mouseleave', () => {
            row.style.backgroundColor = '#f9f9f9';
            row.style.boxShadow = 'none';
        });
    });
</script>

</div>

<script>
    // Hover effect with subtle shadow and background color
    document.querySelectorAll('table.table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.backgroundColor = '#e6f4ea';
            row.style.boxShadow = '0 2px 10px rgba(6,193,103,0.3)';
        });
        row.addEventListener('mouseleave', () => {
            row.style.backgroundColor = '#f9f9f9';
            row.style.boxShadow = 'none';
        });
    });
</script>

    </section>

    <script src="admin.js"></script>
</body>
</html>
