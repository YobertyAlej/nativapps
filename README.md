# Proceso de selección NativApps

Este repositorio contiene el codigo fuente de la prueba de seleccion de talento para NativApps,
el mismo esta pensado para solucionar una prueba de concepto sencilla, desarrollada en PHP y JS,
usando las tecnologias Laravel 9.x y Vue 3 para su desarrollo, usando vite como herramienta
de tooling y building.

## El reto

Construya una aplicación web con estructura monolítica con Laravel que permita la gestión de
cursos, estudiantes y la asignación entre estos, teniendo en cuenta que un estudiante puede estar
asociado a varios cursos.

### Entidades

* Estudiante

Nombre
Apellido
Edad
Correo electrónico
Cursos asociados

* Cursos

Nombre
Horario
Fecha inicio
Fecha Fin
Número de estudiantes asociados

### Operaciones requeridas

* CRUD de estudiantes
* CRUD de cursos
* Asignación de estudiante a un curso especifico
* Consulta del top 3 de los cursos con más estudiantes en los últimos 6 meses
* Listado de cursos a los que se encuentra asignado un estudiante

para mas información consultar el apartado de docs

## Setup y serve

### Pre-requisitos

* PHP ^8.0.2
* Node 14.18+, 16+

### Pasos

1. Lo primero es clonar este repositorio usando el comando

    ```sh
    git@github.com:YobertyAlej/nativapps.git
    ```

2. Copiar y renombrar las variables de entorno de la aplicación, ajustar en caso de ser necesario por colision o preferencia.

    ```sh
    cp .env.example .env
    ```

3. Por defecto la base de datos a usar es una conexion externa a heroku, es necesario añadir
las variables de este entorno:

    ```.env
        DB_CONNECTION=pgsql
        DB_HOST=
        DB_PORT=5432
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
    ```

4. Desde el root folder de nuestro proyecto correr

    ```sh
    composer install
    php artisan ziggy:generate
    php artisan key:generate
    npm install
    npm run build
    php artisan serve
    ```

5. Revisa el acceso a la app en [http://localhost:8000](http://localhost:8000)

6. Si deseas correr la app con una base de datos distinta a la por defecto debes correr el comando de migración

    ```sh
    php artisan migrate
    php artisan db:seed
    ```

## Troubleshooting

Recuerde acceder en local usando localhost y no 127.0.0.1, esto para evitar conflictos con CORS
