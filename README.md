# ENVIO EMAIL CON PHP MAILER

## REQUERIMIENTOS

Instalar PHP Mailer https://github.com/PHPMailer/PHPMailer mediante composer

## 00-ejemplo.php 

Copia del ejemplo de PHPMailer y adaptación a cuenta de GMAIL

## 01-ejemplo_mailtrap.php 

Copia del ejemplo de PHPMailer y adaptación a cuenta de https://mailtrap.io

## 02-mensajehtml

Introducción de mensajes HTML, y adjuntos

## 03 Plantilla para mail

Vamos a usar una plantilla de internet y reorganizar la configuracion. genramos la carpeta inc para almacenar lso archivos que van a ser incluidos en otros.

### plantilla HTML

Buscamos en Internet una plantilla y ponemops directamente rn un fichero de nuestro sitio 03-plantilla.html

en 03-modelo_00.php lo 'cogemos' asi

```php	
$contenido = file_get_contents('03-plantilla.html');
```	

y lo asociamos a la clase phpMailer

```php	
 $mail->Body    = $contenido;
``` 
### separar la plantilla en cabecera +  contenido  + pie

Analizando la plantilla la vamos a adaptar a nuestrar necesidades.
Vamos a separarla en 3 partes :
    - Cabecera : parte comun
    - Contenido : parte variable
    - Pie : parte comun

Podemos realizarlo con ficheros como en el caso anterior, pero nosotros vamos a usar un fichero configuracion y cada parte vamos a asignarla a una variable




config.php
phpMailer.php








