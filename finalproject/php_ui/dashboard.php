<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<style>
        .navbar {
            display: flex;
            gap: 30px; /* space between links */
            padding: 20px;
            background-color: #f0f0f0; /* optional background */
            justify-content: space-around; /* center horizontally */
            border-radius: 20px;
            align-items: center;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #ddd;
        }
        .cls{
            display: flex;
            justify-content: space-around;
            gap:40px;
        }
        .cll{
            display: flex;
            justify-content: space-around;
            background-color: red;
            color: white;
            border-radius: 10px;
        }
    </style>
<body>
    <div class="navbar">
        <div class="cls">
        <a href="home.php"><b>Home</b></a><br><br/>
        <a href="toolsused.php"><b>Tools Used</b></a><br><br/>
        <a href="teamates.php"><b>Team</b></a><br><br/>
        <a href="aboutproject.php"><b>About Project</b></a><br><br/>
    </div>
        <div class="cll">
        <a href="logout.php"><b>Logout</b></a><br><br/>
    </div>
    </div>
</body>

</html>
