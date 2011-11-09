<?php
if(!isset($_POST['name']) || !isset($_POST['vorname']) || !isset($_POST['telefon'])) {
	header("Location: kontakt.html");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	<title>Hair Studio Lucia - Ihr Coiffeur, Coiffure in Güttingen Thurgau</title>
</head>
<body>
	<?php
	$name = $_POST['name']; 
	$vorname = $_POST['vorname']; 
	$strasse_nr = $_POST['strasse_nr'];
	$plz_ort = $_POST['plz_ort'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email']; 
	if($email == "")
		$email = "info@hairstudiolucia.ch";
	$mitteilung = $_POST['mitteilung'];
	$myemail = "info@hairstudiolucia.ch"; // E-Mail-Adresse, an welche Mail gesendet wird.
	$ccx = ""; 
	$todayis = date("l, F j, Y, g:i a") ;
	$subject = "Feedback von der Internetseite www.hairstudiolucia.ch"; 
	$text = stripcslashes($mitteilung); 
	$text = "$mitteilung \n
Name:			$name
Vorname:		$vorname
Strasse / Nr.:	$strasse_nr
PLZ / Ort:		$plz_ort \n
Telefon:		$telefon 
E-Mail:		$email";
	$message = "$todayis [EST] \n
Nachricht:\n$text";
	$from = "From: $email\r\n";
	if (strstr($message,"Content-Type")) {
		die();
	} else {
		if ($myemail != "")
			mail($myemail, $subject, $message, $from);
		if ($ccx != "")
			mail($ccx, $subject, $message, $from);
	}
	header("Location: kontakt_thanks.html");
	?>
</body>
</html>