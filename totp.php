<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
} else {
    header("Location: login.php");
    exit();
}

use RobThree\Auth\TwoFactorAuth;
$tfa = new TwoFactorAuth();

if (!empty($_POST['tfa_code'])) {
    $tfaCode = $_POST['tfa_code'];

    $userSecret = $user['secret'];

    if ($tfa->verifyCode($userSecret, $tfaCode)) {
        // OTP code is valid, perform login
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Code invalide";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verifier OTP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Verifier le code sur votre smatphone</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" placeholder="Vérification Code" name="tfa_code">
        <button type="submit">Valider</button>
    </form>

    <footer class="bg-white">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">© 2023 M1SSI Ousmane Boun Afane Zerbo.</p>
        </div>
    </footer>

</body>
</html>
