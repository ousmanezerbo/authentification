<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

} else {
    header("Location: login.php");
    exit();
}


use RobThree\Auth\TwoFactorAuth;
$tfa = new TwoFactorAuth();
#$secret = $tfa->createSecret();
if (empty($_SESSION['tfa_secret'])) {
    $_SESSION['tfa_secret'] = $tfa->createSecret();
}
$secret = $_SESSION['tfa_secret'];

if (!empty($_POST['tfa_code'])) {
    if ($tfa->verifyCode($secret, $_POST['tfa_code'])) {
         $mysqli = require __DIR__ . "/database.php";
         $sql = "UPDATE user SET secret = '{$secret}' WHERE id = {$_SESSION["user_id"]}";
         $result = $mysqli->query($sql);
       
    } else {
        echo "Code invalide";
    }
}

?>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Accueil</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Bienvenu(e) <?= htmlspecialchars($user["name"]) ?></p>

        <?php if (!$user['secret']): ?>
            <p>Code secret: '<?php echo $secret; ?>'</p>
            <h2>Veuillez activer la double authentification.</h2>
            <h2>Téléchargez l'application Google authenticator puis scannez le code QR</h2>
            <img src="<?= $tfa->getQRCodeImageAsDataUri('PGI', $secret) ?>">
            <form method="POST">
                <input type="text" placeholder="Vérification Code" name="tfa_code">
                <button type="submit">Valider</button>
            </form>
        <?php else: ?>
          <p>Authentification OTP activée</p>
        <?php endif ?>
        <p><a href="logout.php">Se déconnecter</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Se connecter</a> or <a href="signup.html">S'inscrire</a></p>
        
    <?php endif; ?>

    <footer class="bg-white">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">© 2023 M1SSI Ousmane Boun Afane Zerbo.</p>
        </div>
    </footer>
</body>
</html>
