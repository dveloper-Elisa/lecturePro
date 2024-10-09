<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 15px 30px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            color: white;
        }

        .container p {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
        }

        nav ol {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        nav ol li {
            display: inline;
        }

        nav ol li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        nav ol li a:hover {
            color: #FFD700;
        }
    </style>
</head>
<body>

<div class="container">
    <div>
        <p>LecturePro</p>
    </div>
    <nav>
        <ol>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./">About</a></li>
            <li><a href="./cp_login.php">Login</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ol>
    </nav>
</div>
</body>
</html>
