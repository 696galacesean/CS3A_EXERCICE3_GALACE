<?php
include 'db_connect.php';

$plot = [];
if ($result = $conn->query("SELECT program, irreg_students, date FROM student_dashboard1")) {
    while ($row = $result->fetch_assoc()) {
        $plot[] = $row;
    }
    $result->free();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CAS Student Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="dashboard-container">
        <h2 class="text-center mb-4">CS Student Dashboard</h2>
        <table class="table table-bordered text-center rounded">
            <thead class="table-dark">
                <tr>
                    <th>Program</th>
                    <th>Number of Irregular Students</th>
                    <th>School Year</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($plot as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['program']) ?></td>
                        <td><?= htmlspecialchars($row['irreg_students']) ?></td>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="container">
            <canvas id="BarChart"></canvas>
            <canvas id="LineChart"></canvas>
            <canvas id="PieChart"></canvas>
        </div>

        <script>
            const plot_data = <?= json_encode($plot) ?>;
        </script>

        <script src="js/chart.js"></script>
    </div>
</body>
</html>
