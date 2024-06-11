<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <title>View Student Data</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .pagination {
            margin: 20px 0;
            text-align: center;
        }
        .pagination a {
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 2px;
            color: #333;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
        .pagination a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Information System</h1>
        <nav>
            <a href="index.php">Add Data</a>
            <a href="view_data.php">View Data</a>
        </nav>
    </header>

    <div class="data">
        <h2>View Data</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Grades</th>
                    <th>Address</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $limit = 10;
                $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                $start_from = ($page - 1) * $limit;

                $stmt = $conn->prepare("SELECT * FROM student_infos LIMIT ?, ?");
                $stmt->bind_param("ii", $start_from, $limit);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['grades']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }

                $stmt->close();

                $result = $conn->query("SELECT COUNT(id) FROM student_infos");
                $row = $result->fetch_row();
                $total_records = $row[0];
                $total_pages = ceil($total_records / $limit);

                echo "<div class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='view_data.php?page=" . $i . "'";
                    if ($i == $page) echo " class='active'";
                    echo ">" . $i . "</a> ";
                }
                echo "</div>";

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Student Information System. All rights reserved.</p>
    </footer>
</body>
</html>
