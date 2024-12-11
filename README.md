<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#Creacion de la feature

1. Análisis de Problema
Cuando comencé a trabajar en el CRUD básico de usuarios, lo primero que pensé fue en hacer algo sencillo pero funcional. Mi objetivo principal era que cualquier persona pudiera crear, ver, editar y eliminar usuarios de una manera sencilla y directa. Como soy más de aprender haciendo, quise experimentar con las herramientas que Laravel ya ofrece para no complicarme demasiado. Sabía que Laravel tiene un sistema de Eloquent que me ayudaría a manejar los datos fácilmente, pero quería tener un control más específico sobre cómo se gestionaban los usuarios en el sistema. Quería que el proceso fuera simple para mí y para los usuarios finales.

2. Investigación de Soluciones
No tuve que investigar mucho, ya que sabía que Laravel tiene todo lo necesario para un CRUD básico. Lo que más me interesaba era la forma de validar los datos que los usuarios ingresaran. Para eso, me fijé en cómo Laravel maneja las validaciones con los FormRequest. Sabía que Laravel hacía esto de una forma bastante estructurada, por lo que me decidí a utilizarlo. También me puse a leer sobre cómo se podían crear rutas de recursos para que Laravel generara automáticamente todas las rutas necesarias para las operaciones del CRUD. Luego, me concentré en cómo hacer que las vistas fueran fáciles de usar y agradables visualmente, por lo que me incliné por usar Blade para hacer los formularios y mostrar los datos.

3. Elección de Solución
Al final, decidí no complicarme. Usar las herramientas que Laravel ofrece por defecto era suficiente para lo que quería hacer. Para las rutas, aproveché las resource routes de Laravel, lo que me permitió ahorrar tiempo porque ya se encargaba de crear las rutas necesarias para crear, mostrar, editar y eliminar usuarios. Con respecto a las vistas, usé Blade, que es lo que más cómodo me resulta cuando tengo que trabajar con formularios y mostrar datos. Para la validación de datos utilicé FormRequest para asegurarme de que los usuarios no pudieran enviar datos incorrectos. Para el proceso de eliminación, usé un formulario de tipo DELETE, que al principio me dio un poco de problemas, pero con la directiva @method('DELETE') pude solucionarlo sin mucho esfuerzo.

4. Depuración
Al principio, todo parecía ir bien, pero como siempre, algunos pequeños problemas aparecieron. El primer desafío que tuve fue con las validaciones. Al principio, Laravel no me estaba mostrando los errores de validación correctamente, así que tuve que asegurarme de que los mensajes de error aparecieran en los formularios. Después, me topé con un problema al intentar eliminar usuarios, porque el formulario no estaba enviando la solicitud DELETE correctamente. Al revisar el código, me di cuenta de que olvidé agregar el token de CSRF, así que lo corregí rápidamente. Luego, el proceso de editar usuarios también me dio algunos dolores de cabeza. No estaba pasando los datos correctamente al formulario de edición, por lo que los campos no se autocompletaban. Esto lo solucioné revisando el controlador y asegurándome de que los valores correctos se enviaran a la vista de edición.

5. Finalización
Finalmente, después de resolver todos los problemas que surgieron, todo empezó a funcionar como esperaba. Los formularios de crear usuarios validaban correctamente los datos, y los listados de usuarios mostraban la información de manera clara. El formulario de editar usuarios también funcionaba sin problemas y, lo mejor, el proceso de eliminar un usuario ahora se hacía sin error alguno. Todo estaba integrado de manera simple, pero eficaz, utilizando Blade para las vistas y Eloquent para manejar los datos. Estaba satisfecho con el resultado final porque todo estaba funcionando bien, y pude entregar un sistema limpio, fácil de usar y fácil de mantener.
