<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            
            if (empty($user["secret"])) {
                header("Location: index.php");
            } else {
                header("Location: facialauth.html");
            }
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Se connecter</h1>
    
    <?php if ($is_invalid): ?>
        <em>Mot de passe ou adresse email invalide</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        
        <button>Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="signup.html">S'inscrire</a></p>

    <footer class="bg-white">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">© 2023 M1SSI Ousmane Boun Afane Zerbo.</p>
        </div>
    </footer>
</body>
</html>








