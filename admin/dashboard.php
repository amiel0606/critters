
<?php 
//  require('inc/essentials.php'); 
//  adminLogin();
?>

<?php 
require('inc/get_analytics.php'); 
$analytics = getAnalytics(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Analytics</title>
    <?php require('inc/links.php'); ?>
    <?php require('inc/header.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h3 class="mb-4">Service Usage Analytics</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Service Name</th>
                    <th>Usage Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($analytics as $data) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($data['service_name']); ?></td>
                        <td><?php echo htmlspecialchars($data['usage_count']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php require('inc/scripts.php'); ?>
</body>
</html>
