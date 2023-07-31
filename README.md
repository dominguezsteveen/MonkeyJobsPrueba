# Prueba técnica MonkeyJobs

En este repositorio se encuentra alojado el desarrollo de la prueba técnica

## Comenzando 🚀

Instrucciones generales de cómo correr el proyecto de forma local

### Pre-requisitos 📋

Para poder ejecutar el proyecto de forma local se deben tener instalados los siguientes programas:

1. Tener instalado Git para poder clonar el repositorio
2. Visual Studio Code (O cualquier otro editor de tecto de preferencia)
3. Tener instalado Mysql motor de base de datos
4. PHP lenguaje de programación necesario para correr el aplicativo
5. Composer para el manejador de dependencias de PHP

### Instalación 🔧

Asumiendo que se cuentan con los programas previamente mencionados para poder ejecutar esta parte del proyecto, el siguiente paso a paso describirá cómo poder desplegar el proyecto de forma local

1. Se debe clonar el repositorio en una carpeta dentro del equipo en que se quiere desplegar
2. Luego se debe acceder a la carpeta raíz donde quedó el repositorio y allí abrir una consola de comandos y ejecutar el comando: "composer install"
3. Seguido se ejecuta el comando: "npm install"
4. Posteriormente crear una base de datos en MySQL la cual se llamará "monkey_jobs_prueba"
5. Continuando, se debe crear el archivo .env. Se puede duplicar el archivo .env.example y renombrarlo como .env
6. Luego se genera la clave de la aplicación ejecutando el comando: "php artisan key:generate"
7. Por último, ejecutamos las migraciones y los seeder con el comando: "php artisan migrate:fresh --seed"
8. Una vez finalizado el proceso, se ejecuta el comando: "php artisan serve"

## Despliegue 📦

Este comando "php artisan serve" desplegará de forma local la aplicación, la cual por defecto se despliega en el puerto 8000, en caso de que dicho puerto se encuentre ocupado o se requiere otro puerto, se debe ejecutar el comando: "php artisan serve --port={puerto}", reemplazando "{puerto}" por el número de puerto a utilizar.

## Explicación ⚙️

Al iniciar la aplicación en la consola arrojara "Server running on [http://127.0.0.1:8000]"

Se tienen 6 rutas las cuales se encuentran con una mejor descripción en el archivo "MonkeyJobsPrueba_postman.json", esta ubicado en "public/MonkeyJobsPrueba_postman.json"

Las 6 rutas son:
→/api/users
|| Obtendremos un archivo json con los usuarios registrados hasta el momento pero de una forma paginada, se dan los links de las paginas y el total de los usuarios.

→/api/users-all
|| Obtendremos un array con todos los usuarios registrados hasta el momento.

→/api/users
|| Esta ruta requiere el método POST y un objeto json con los datos del usuario a registrar, por ejemplo: {"nombre":"Steveen Andres","apellido":"Dominguez Bedoya","documento":"1007729681","email":"steveena.dominguezb@gmail.com",
"password":"mipassword","tipo_documento_id":1}. Nos devuelve un status y un mensaje de confirmación.

→/api/users/{id}
|| Usando el método GET, obtendremos el usuario buscado mediante el parametro 'id', por ejemplo: /api/users/26

→/api/users/{id}
|| Usando el método PUT podemos actualizar un usuario buscado mediante el parametro 'id', por ejemplo: /api/users/26. Se debe pasar un json de este tipo: {"nombre":"Steveen Andres","apellido":"Dominguez Bedoya","documento":"1007729681","email":"steveena.dominguezb@gmail.com","password":"mipassword","tipo_documento_id":1}.

→/api/users/{id}
|| Usando el método DELETE podemos eliminar un usuario buscado mediante el parametro 'id', por ejemplo: /api/users/26

## Construido con 🛠️

-   [Laravel](https://laravel.com/docs/10.x)
