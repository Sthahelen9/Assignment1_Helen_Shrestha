<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Student Information System</title>
</head>
<body>
    <header>
        <h1>Student Information System</h1>
        <nav>
            <a href="index.php">Add Data</a>
            <a href="view_data.php">View Data</a>
        </nav>
    </header>

    <div class="form">
        <h2>Add Student Data</h2>
        <form action="database.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="grades">Grades:</label>
            <input type="text" id="grades" name="grades" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" required>

            <input type="submit" value="Submit">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Student Information System. All rights reserved.</p>
    </footer>
</body>
</html>
