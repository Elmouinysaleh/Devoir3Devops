<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVOIR DEVOPS TP03</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS for styling and animations -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            text-align: center;
            margin-top: 20px;
        }
        .note {
            text-align: center;
            margin-bottom: 20px;
        }
        .list-group-item {
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
            text-align: center;
        }
        .list-group-item:hover {
            transform: scale(1.05);
            background-color: #e9ecef;
        }
        .list-group-item i {
            margin-right: 10px;
        }
        .list-group-item-action {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px 20px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 header">
            <h1 class="my-4">DEVOIR DEVOPS TP03</h1>
        </div>
        <div class="col-12 note">
            <p class="text-muted">Les noms d'équipe sont récupérés depuis la base de données du service <strong>db</strong>.</p>
        </div>
        <div class="col-12">
            <div class="list-group">
                <?php
                include 'config.php';

                $query = 'SELECT name FROM team';
                try {
                    $stmt = $pdo->query($query);
                    while ($row = $stmt->fetch()) {
                        $name = htmlspecialchars($row['name']);
                        $icon = 'fas fa-user';

                        // Specific icons for Hind and Zahira
                        if ($name == 'Tonzar Hind' || $name == 'Machraoui Zahira') {
                            $icon = 'fas fa-female';
                        }

                        echo '<a href="#" class="list-group-item list-group-item-action">';
                        echo '<i class="' . $icon . '"></i> ' . $name;
                        echo '</a>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo 'Database error: ' . htmlspecialchars($e->getMessage());
                    echo '</div>';
                }

                // Close connection
                $pdo = null;
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 DEVOIR DEVOPS TP03</p>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
