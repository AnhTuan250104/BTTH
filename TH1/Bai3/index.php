<!DOCTYPE html>
<html lang="vi">
<?php include("getcsv.php")
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách người dùng</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$user['username']}</td>";
                    echo "<td>{$user['password']}</td>";
                    echo "<td>{$user['lastname']}</td>";
                    echo "<td>{$user['firstname']}</td>";
                    echo "<td>{$user['city']}</td>";
                    echo "<td>{$user['email']}</td>";
                    echo "<td>{$user['course1']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
