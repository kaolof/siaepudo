-Instalar xampp versión 7.3.1, y composer desde su página

-Hacer la condiguración correspondiente de puertos del Apache a 4436 y 8080 en Config seleccionando Apache(httpd.conf) y Apache(httpd.ssl.conf) para poder iniciar el Apache y MySql

-Al realizar la instalación de composer darle siguiente e instalar en la ruta C:\xampp\php\php.exe en caso de instalar el xampp en una ruta distinta llevar la instalación hasta esa ruta y dar siguiente hasta que aparezca el botón de install

-ir a Equipo click derecho y propiedades. Una vez ahí seleccionar configuración avanzada del sistema y dentro seleccionar la opción variables de entorno, luego revisar en "Variables de usuario" si está Path seleccionar y luego verificar que exista la ruta xampp\php sino agregarla

-Dentro de la carpeta del xampp ir a la ruta htdocs y pegar la carpeta de siaepudo

-Dentro de la carpeta siaepudo hacer un llamado a consola

-Dentro de consola escribir composer global require laravel/installer para hacer una instalación de laravel

-Abrir el localhost:8080 para entrar a phpmyadmin y crear una base de datos llamada siaepudo

-Luego dentro de la misma consola cuya ruta debe ser la de la carpeta siaepudo escribir php artisan migrate para crear las tablas de la BDD

-Escribir ahora php artisan migrate:refresh --seeds para hacer una inserción masiva de datos a las tablas

-Finalizada la inserción de los datos escribir php artisan serve para poder iniciar 