<?php
session_start();
ob_clean();

// 1. Configuración básica
$width = 200;
$height = 60;
$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$length = 6;

// 2. Generar código
$code = substr(str_shuffle($chars), 0, $length);
$_SESSION['captcha_code'] = $code;

// 3. Crear imagen
$image = imagecreate($width, $height);

// 4. Colores
$bg_color = imagecolorallocate($image, 245, 245, 245); // Fondo claro
$text_color = imagecolorallocate($image, 30, 30, 30);   // Texto oscuro
$noise_color = imagecolorallocate($image, 150, 150, 150); // Ruido

// 5. Rellenar fondo
imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

// 6. Añadir ruido (puntos)
for ($i = 0; $i < 100; $i++) {
    imagesetpixel($image, rand(0, $width), rand(0, $height), $noise_color);
}

// 7. Añadir líneas
for ($i = 0; $i < 5; $i++) {
    imageline($image, 0, rand() % $height, $width, rand() % $height, $noise_color);
}

// 8. Dibujar texto (sin fuente externa)
$font_size = 5; // Fuente interna GD
$x = 10;
for ($i = 0; $i < $length; $i++) {
    $y = rand(20, $height - 20);
    imagestring($image, $font_size, $x, $y, $code[$i], $text_color);
    $x += 30;
}

// 9. Enviar imagen
header('Content-Type: image/png');
header('Cache-Control: no-cache, no-store, must-revalidate');
imagepng($image);
imagedestroy($image);
exit();
?>