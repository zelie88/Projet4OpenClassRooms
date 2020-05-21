<?php

require 'Database.php';

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="utf-8">
    <title>Billet simple pour l'Alaska</title>
</head>

<body>
    <div>

        <h1>Billet simple pour l'Alaska</h1>

        <p>Work in progress</p>

        <?php

        $db=new Database();
        echo $db->getConnection();

        ?>

    </div>

</body>

</html>