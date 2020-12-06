<?php 
    require_once 'usuarioC.php';
    $p = new usuario();

  if(isset($_POST["cursos"])){
 
$curso=$_POST["cursos"];
$nome=$_POST["texto"];
 


//Carregando fontes TrueType

//imagecreatefromjpeg(filename)
$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

$font1= realpath('BevanRegular.ttf');
$font2= realpath('PlayballRegular.ttf');
//imagettftext(image, size, angle, x, y, color, fontfile, text)

imagettftext($image, 32, 0, 320, 250, $titleColor,$font1,"CERTIFICADO");

imagettftext($image, 32, 0, 375, 350, $titleColor,$font2, $nome);


imagestring($image, 25, 100, 380, utf8_decode("Certificamos que: ".$nome." Concluiu o curso de: ".$curso." Na data:").date("d/m/Y"),$titleColor);

header("Content-Type: image/jpeg");


imagejpeg($image);
imagejpeg($image, "certificado-".date("Y-m-d").".jpg");

imagedestroy($image);
}

else {
	echo "selecione o curso";
}
?>