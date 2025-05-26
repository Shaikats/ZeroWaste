<?php
include "../connection.php";
include("connect.php");
if ($_SESSION['name'] == '') {
    header("location:signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Panel</title>

    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
        .location-wrapper {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .location {
            width: 100%;
            max-width: 900px;
            padding: 20px;
        }

        .location form {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .location select, .location input[type="submit"] {
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        .location input[type="submit"] {
            background-color: #47a118;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .location input[type="submit"]:hover {
            background-color: #3d8f15;
        }

        .table-container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
        }

        .no-results {
            margin-top: 20px;
            background-color: #ffecec;
            padding: 20px;
            border: 1px solid #ffcccc;
            border-radius: 10px;
            color: #c00;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image"></div>
            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="feedback.php">
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
                    <a href="#"><i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span></a>
                    <div class="mode-toggle"><span class="switch"></span></div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <p class="logo" style="color: #47a118; font-weight: bold; font-size: 32px;">ZeroWaste</p>
            <p class="user"></p>
        </div>

        <br><br><br>

        <div class="location-wrapper">
            <div class="location">
                <form method="post">
                    <label for="location" class="logo">Select Location:</label>
                    <select id="location" name="location">
                        <option value="" selected disabled>Select One</option>
                        <option value="dhanmondi">Dhanmondi</option>
                        <option value="uttara">Uttara</option>
                        <option value="mirpur">Mirpur</option>
                        <option value="gulshan">Gulshan</option>
                        <option value="banani">Banani</option>
                    </select>
                    <input type="submit" value="Get Details">
                </form>

                <?php
                if (isset($_POST['location'])) {
                    $location = $_POST['location'];
                    $sql = "SELECT * FROM food_donations WHERE location='$location'";
                    $result = mysqli_query($connection, $sql);

                    echo "<div class='table-container'>";

                    if ($result->num_rows > 0) {
                        echo "<div class='table-wrapper'>";
                        echo "<table class='table'><thead><tr>
                            <th>Name</th>
                            <th>Food</th>
                            <th>Category</th>
                            <th>Phone No</th>
                            <th>Date/Time</th>
                            <th>Address</th>
                            <th>Quantity</th>
                        </tr></thead><tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['food']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['phoneno']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['quantity']}</td>
                            </tr>";
                        }

                        echo "</tbody></table></div>";
                    } else {
                        echo "<div class='no-results'>No results found for <strong>$location</strong>.</div>";
                    }

                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </section>

    <script src="admin.js"></script>
</body>
</html>
