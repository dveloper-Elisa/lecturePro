<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Pro</title>
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        body .home{
            backdrop-filter: blur(10px);
            padding:20px;
            border-radius:10px;
            line-height: 2;
            /* z-index:-1; */
            width: 50%;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
            z-index: 1;
        }

        p {
            font-size: 1.2rem;
            color: #555;
            font-weight: bold;
            margin-bottom: 30px;
            z-index: 1;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            z-index: 1;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            button {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 0.9rem;
            }

            button {
                padding: 8px 18px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
<?php include "./header.php"?>
    <div Class="home">
        <h1>Welcome to Lecture Pro System</h1>
        <p>The system that helps communication between Academic Quality Assurance and Class Representatives to monitor the teaching system.</p>

        <button onclick="direct()">Login</button>
    </div>
    
</body>
<script>
    function direct(){
        return window.location.href = "./cp_login.php";
    }
</script>
</html>
