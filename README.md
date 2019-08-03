# Proyecto LMS
- Clonar proyecto (app es el nombre del folder que queremos crear, podemos usar el que queramos)
  - git clone https://github.com/mwleinad/iap.git lms
  - Si estas usando wamp lo mas facil es abrir una terminal, ir a C:/wamp/www/ y ejecutar el comando de arriba
  - Esto creara un folder en c:/wamp/www/lms
- Importar la base de datos. 
  - Crear una nueva base de datos (generalmente con phpmyadmin) llamada lms (o cualquier otro nombre)
  - Importar el archivo lms.sql
- Modificar el archivo .envexample
    - Cambiar el nombre a .env
    - Cambiar los valores que apliquen a nuestro proyecto (Si estamos usando wamp existe la posibilidad de no cambiar nada)
- En la carpeta lms corre "composer install"
  - Eso instalara las dependencias que necesitamos
  - Si no tienes composer lo puedes instalar en https://getcomposer.org/doc/00-intro.md#installation-windows
- Permisos
  - En localhost (wamp) no es necesario cambiar permisos pero en el servidor real es posible que haya que dar permisos a algunas carpetas, ejecutar lo siguiente
    - chmod 777 templates_c 
    - chmod 777 ajax/templates_c
    - chmod 777 ajax/new/templates_c
  
#PHP y APACHE  
- Version PHP 7.2
- Apache, Activar modulo mod_rewrite

#Folders
- Hay varios folders que se tienen que crear para el correcto funcionamiento. Estos no estan en git debido a que son symlinks y el target del symlink no es el mismo. (Esto es debido a que estos folders se almacenan en una diferente particion en un servidor linux)

  - Windows (Crear folders directamente)
    - /alumnos
    - /calendario
    - /diplomas
    - /docentes
    - /doc_inbox
    - /docs
    - /estandares
    - /extrafiles
    - /homework
    - /file_retro
    - /files
    - /flash
    - /forofiles
    - /homework
    - /informe
    - /materia
    - /m_educacion
    - /msj
    - /personal_foto
    - /reportes
    - /reports
    - /resources
    - /sabanas
    - /tripticos
    
 - Linux 
   - Crear mismos folders PERO en la particion de archivos (Buscarla, empieza con) /mnt/volume
    - Crear carpeta llamada "uploads"
    - Crear carpetas y agregarle un symlink a cada una. Para crear el symlink seria algo como
      - ln -s /mnt/volume_sfo2_01/uploads/alumnos /home/USUARIO/public_html/app/alumnos
  
 - Si se necesita crear otra carpeta para subir archivos en el servidor la manera correcta es usando symlinks. Favor de no crearlo directo. 
 
 
 #Errores
 - Cuando se trata de guardar algo aparece: Field doesn't have a default value in
    - Esto es debido a que todo ya esta muy viejo :D 
    - Hay que cambiar el valor de STRICT_TRANS_TABLES en el mysql. 
    - Si estas usando wamp ve a C:\wamp\bin\mysql\mysql5.7.21 y busca el archivo my.ini
    - agrega sql_mode="" al final del archivo
    - Reinicia los servicios
  
