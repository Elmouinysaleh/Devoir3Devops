<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP 3 DevOps - Mon Application Web</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .author-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .author {
      display: flex;
      align-items: center;
      margin: 10px;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.5s forwards;
    }

    .icon {
      margin-right: 5px;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Mon Application</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-4">
    <h1>TP 3 DevOps - Mon Application Web</h1>
    <p>Bienvenue dans notre application web.</p>
    <h2 class="mt-4 mb-2 text-center">Équipe DevOps Unie - Projet devoir_tp03 DevOps</h2>
    <p class="text-center">Ce travail a été réalisé par notre équipe dédiée dans le cadre du TP 3 de DevOps.</p>
    <div class="author-container mt-2">
      <?php
      $mysqli = new mysqli("db", "user", "mysecretpassword", "mydatabase");
      if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
      }

      $query = "SELECT name FROM team";
      $result = $mysqli->query($query);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<div class="author"><span class="icon"><i class="fas fa-user"></i></span><span class="name">' . $row["name"] . '</span></div>';
        }
      } else {
        echo "<p>Aucun membre d'équipe trouvé.</p>";
      }
      $mysqli->close();
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
