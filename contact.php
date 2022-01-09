<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="css/styleContact.css">
</head>

<body>
    <h1>Contact</h1>
    <form method="post">
        <label>Nom :</label>
        <input type="text" name="nom" required placeholder="exemple : Denis Dupont">
        <label>Email :</label>
        <input type="email" name="email" required placeholder="exemple : denis.dupont@gmail.com">
        <label>Objet :</label>
        <input type="text" name="objet" required placeholder="exemple : Informations sur...">
        <label>Message :</label>
        <textarea name="message" required placeholder="Votre message : "></textarea>
        <button type="submit"> Envoyer </button>
    </form>
    <?php
    if(isset($_POST['message'])){
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' . $_POST['email'] . "\r\n";

        $message = '
        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
        <b>Email : </b>' . $_POST['email'] . '<br><br>
        <b>Message : </b><br>' . $_POST['message'] . '</p>';

        $objet = $_POST['objet'];

        $retour = mail('thinnesleo@gmail.com', $objet, $message, $entete);
        if($retour) {
            echo '<p>Votre message a bien été envoyé.</p>';
        }
    }
    ?>
</body>
</html>
