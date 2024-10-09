<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QADashboard</title>
    <style>
        /* Basic styles for the body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header styles */
        .header {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        span {
            font-size: 1.5em;
            font-weight: bold;
        }

        /* Navigation menu styles */
        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #575757;
            border-radius: 4px;
        }

        /* Padding for the content below the header */
        .content {
            padding-top: 60px;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Logo -->
        <div class="logo">
            <span>QADashboard</span>
        </div>

        <!-- Navigation links -->
        <div class="nav-links">
            <a href="./report.php">View Report</a>
            <a href="./viewclass.php">View Class</a>
            <a href="./dashboard.php">Add Class</a>
            <a href="./logout.php">Logout</a>
        </div>
    </div>

    <!-- Content section -->
    <div class="content">
        <!-- Your page content goes here -->
    </div>
</body>
</html>
