# Aplicación web para la empresa Empomer

>La aplicación esta desarrollada con Laravel 8 y su sistema de plantillas Blade y se utiliza Bootstrap principalmente para los diseños.
>
>Se utiliza como motor de bases de datos a MySQL y se utiliza los modelos Eloquent y Migraciones de Laravel.



# Funcionalidades

> * Sistema de autentificación Laravel Jetstream con registro de usuarios, inicio de sesión, recuperación de contraseñas y una vista del perfil de usuario.
> 
> * Registro, actualización, eliminación y listado de clientes.
>
> * Registro, actualización, eliminación y 
listado de facturas.
>
> * Registro, actualización, eliminación y listado de ofrendas.
>
> * Registro, actualización, eliminación y listado de categorias (servicio o producto).
>
> Pendientes: 
>
>* Agregar roles al sistema (rol cliente y rol admin)
>
>* Agregar vistas que permitan a los clientes visualizar sus datos.

# Modelo físico de la Base de Datos

![Modelo físico de la BD Empomer](https://raw.githubusercontent.com/dpdorado/app_empomer/main/bd/modelo_fisico.png)

>* Versión SQL: db/empomer_sql.txt

# Vistas de la App Empomer

>* Bienvenida : empomer/resources/views/welcome.blade.php

![Modelo físico de la BD Empomer](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/welcome.png)

>* Registro de usuarios : empomer/resources/views/auth/register.blade.php

![Register](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/register.png)


>* Inicio de sesión de usuarios : empomer/resources/views/auth/login.blade.php

![Login](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/login.png)

>* Home de usuario logueado : empomer/resources/views/center.blade.php

![Home](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/home.png)

>* Lsta de clientes registrados : empomer/resources/views/customers/index.blade.php

![Register customers](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/customers.png)

>* Registro de clientes : empomer/resources/views/customers/register.blade.php

![Register customers](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/customers_create.png)

>* Editar clientes : empomer/resources/views/customers/edit.blade.php

![Update customers](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/customers_edit.png)

>* Lsta de facturas registradas : empomer/resources/views/bills/index.blade.php

![Register bills](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/bill.png)

>* Registro de facturas : empomer/resources/views/bills/register.blade.php

![Register bills](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/bills_create.png)

>* Editar facturas : empomer/resources/views/bills/edit.blade.php

![Update bills](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/bills_edit.png)


>* Lsta de categorias registradas : empomer/resources/views/categories/index.blade.php

![Register categories](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/categories.png)

>* Registro de categorias : empomer/resources/views/categories/register.blade.php

![Register categories](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/categories_create.png)

>* Editar categorias : empomer/resources/views/categories/edit.blade.php

![Update categorias](https://raw.githubusercontent.com/dpdorado/app_empomer/main/screenshot/categories_edit.png)


# Requerimientos

>* Tener instalado composer.
>* Tener instalado git.
>* Tener instalado Xampp.

# Descargar y correr la App Empomer

>1. *git clone repo*: clonamos el repositorio que aloja la aplicación.
>2. Nos ubicamos en el directorio empomer y descargamos las depencias con *composer install*.
>3. Iniciamos los servicios *Xampp* especialmente *MySQL* y creamos la Basede Datos con nombre *empomer*.
>4. Nos aseguramos que las migraciones esten creadas con el comando *php artisan migrate* y verificamos que las tablas esten creadas en la Base de Datos *empomer*.
>5. Corremos la App Empomer con el comando *php artisan serve* desde el directorio empomer.
>6. Desde el navegador accedemos a la url: http://127.0.0.1:8000/


