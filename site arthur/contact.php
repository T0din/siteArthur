<!DOCTYPE html>
<html>
	<div id="page"> 
		<head>

			<meta charset="utf-8">
            <link rel="stylesheet" href="reset.css" />
			<link rel="stylesheet" href="Css_site_arthur.css" />
			<title>Arthur Camboly Traductions / Agnlais - Français</title>

		 

		</head>
<div class="wrapper">
		<img src="logo_arthur.png" alt="Arthur Camboly Traductions" id="logo">

		<nav>
			<ul id="Menu">
				<li id="accueil_nav"><a href="./html_site_arthur.php"> Acceuil</a> </li>
				<li id="presentation_nav"><a href="#Presentation"> Présentation</a> </li>
				<li class="contact_nav"><a href="contact.php"> Contact</a> </li>
				<li id="articles_nav"><a href="#Articles"> Articles</a> </li>
				<li id="projets_nav"><a href="#Projets">  Projets</a> </li>
			</ul>
		
		</nav>
<body>
    
</body>
<?php
function isEmptyField($fieldName)
{
    $isEmptyField = false;

    if (empty($_GET[$fieldName])) {
        $isEmptyField = true;
    } else {
        $fieldValue = trim($_GET[$fieldName]);

        if (empty($fieldValue)) {
            $isEmptyField = true;
        }
    }

    return $isEmptyField;
}
//à faire ou à trouver sur le net !!!
function isValidEmailField($fieldName)
{
}
if (!empty($_GET)) {
    if (isEmptyField('firstName')) {
        // J'ajoute une nouvelle valeur à mon tableau $monTableau[] = 'Ma valeur';
        // On peut également utiliser la fonction array_push (http://php.net/array_push)
        $errors[] = 'Le prénom est obligatoire';
    }

    if (isEmptyField('lastName')) {
        $errors[] = 'Le nom est obligatoire<br />';
    }

    if (isEmptyField('email')) {
        $errors[] = 'L\'adresse e-mail est obligatoire<br />';
    // La fonction filter_var permet de valider des données
    } elseif (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'L\'adresse e-mail est invalide<br />';
    }

    if (
        !array_key_exists('certifiedInformations', $_GET) ||
        intval($_GET['certifiedInformations']) != 1
    ) {
        $errors[] = 'Vous devez certifier de la véractité de vos informations<br />';
    }
}

?>
<h1 class="right__title">Contact</h1>
<?php if (empty($errors)) : ?>
<!-- <p>Félicitations ! Votre formulaire / message a bien été transmis !</p> -->
<?php else: ?>
<ul class="errors">
    <?php foreach ($errors as $error) : ?>
    <li><?= $error; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
<form action="contact.php" method="get">
    <!-- fieldset permet de regrouper un ensemble de champs qu'on peut lier à une thématique -->
    <fieldset>
        <p>
            <input type="radio" name="gender" id="gender-miss" value="miss" />
            <!-- La balise est liée à un champ de formulaire avec l'attribut for qui utilise l'id du champ en question. Ici, le label va être lié au champ qui a pour id gender-miss. Je peux mettre du texte à l'intérieur de mon label.
             -->
            <label for="gender-miss">Mme.</label>
            <input type="radio" name="gender" id="gender-mister" value="mister" />
            <label for="gender-mister">M.</label>
        </p>
        <p>
            <!-- l'attribut placeholder permet d'afficher un texte à l'intérieur de mon champ tant qu'il est vide -->
            <!-- l'attribut required rend le champ obligatoire -->
            <input required id="firstName" type="text" name="firstName" placeholder="Prénom" />
        </p>
        <p>
            <input required id="lastName" type="text" name="lastName" placeholder="Nom" />
        </p>
        <p>
            <!-- Les inputs de type permettent de gérer automatiquement les erreurs d'e-mail invalides (le navigateur fera le travail pour nous) -->
            <input required type="email" name="email" id="email" placeholder="Adresse e-mail" />
        </p>
    </fieldset>
    <fieldset>
        <p>
            <label for="origin">J'ai connu ce site grâce à</label>
            <!-- La balise select combinée à des balises options permet d'avoir une liste déroulante de choix -->
            <select id="origin" name="origin">
                <!-- disabled permet de désactiver un champ ou une option -->
                <option selected disabled>choisir</option>
                <option value="facebook">Facebook</option>
                <option value="twitter">Twitter</option>
                <option value="google">Google</option>
                <option value="wordOfMouth">Bouche à oreilles</option>
                <option value="other">Autre</option>
            </select>
        </p>
    </fieldset>
    <fieldset>
        <p>
            <!-- &nbsp; : espace insécable. Définition de Diego : un espace dont les mots qui l'entourent ne peuvent pas être separés -->
            <!-- &apos : l'apostrophe -->
            <label for="message">Pour laisser un commentaire &laquo; libre &raquo; à propos d&apos;Arthur, c'est par ici</label>&nbsp;:
            <textarea name="message" id="message" placeholder="Votre message"></textarea>
        </p>
    </fieldset>
    <fieldset>
        <p>
            <!-- checkbox : case à cocher -->
            <input required id="certifiedInformations" type="checkbox" name="certifiedInformations" value="1" />
            <label for="certifiedInformations">Je certifie la véracité de ces informations</label>
        </p>
    </fieldset>
    <fieldset>
        <p>
            <label for="attachedFile">Ajouter un fichier</label>&nbsp;:
            <input type="file" name="attachedFile" id="attachedFile" />
        </p>
    </fieldset>
    
    <fieldset>
        <!--
        <input type="submit" value="Ajouter" />
        <input type="submit" value="Modifier" />
        -->
        <button type="submit">Envoyer</button>
    </fieldset>
</form>
</div>

<footer id="footer">
    <img id="img_7th_sea" src="7thSea-logo.png" alt="logo_7th_sea">
			<ul id="footer_ul">
				<li class="footer__li_1"><ul><h2>Arthur Camboly</h2>
						<li>Traducteur diplômé</li>
						<li>SIRET - 00000000000000000000000</li>
					</ul>
				</li>
				<li><ul><h2>En savoir plus</h2> </li>
						<li id="mentionslegales"><a href="./mention_legales.php"> Mentions légales</a> </li>
						<li class="contact_nav"><a href="#Contact"> Contact</a> </li>
					</ul>
			</ul>
        <img id="img_ptg" src="logoptg.png" alt="logo_ptg">
	</footer>