# Prueba de desarrollo para desarrollador de PHP, HTML y XML en OMNI.PRO

## Introducción
Con esta prueba queremos evaluar tus habilidades en las siguientes áreas:
* Uso óptimo de las buenas prácticas y estandares de programación de Adobe Commerce
* Uso óptimo de PHP
* Uso óptimo de MySQL
* Uso medio de HTML
* Uso medio de Git
* Uso medio de XML
  
Durante esta prueba puedes seguir tu propio proceso de desarrollo. Por favor ten en cuenta que queremos obtener un producto que equilibre calidad y cantidad, si no eres capaz de terminar esta prueba en su totalidad en el tiempo dado aún deberíamos ser capaces de apreciar tu trabajo y habilidades. Piensa en esta pequeña aplicación como un proyecto que será mantenido y posiblemente extendido en el futuro por otros desarrolladores.

## Descripción:
Construye un módulo simple para Adobe Commerce con funcionalidad de blog (solo administración desde el Panel de Administración)

## Caracteristicas:
* Se debe crear un módulo llamado Blog dentro del Vendor Omnipro
* Se debe crear un menu en la sección Content de Magento llamada OMNI.PRO y Tendrá un Item llamado Blog
* Se debe poder visualizar en el frontend a traves de la ruta /blog una lista de los posts creados en el admin ordenados por fecha de publicación

## Grid de Blog:
- Columnas:
- Id
- Titulo
- Fecha de Creación

El grid debe tener las siguientes acciones:
- Eliminar los posts seleccionados
- Eliminar todos los posts

## Formulario de creación de Posts
El formulario de blog debe tener los siguientes inputs:
- Titulo
- Contenido

El Título y contenido deben ser requeridos
Tanto el controlador, como los items del menú deben tener validación para solamente poder ser utilizados por un rol que tenga permisos de este recurso

# En la página del blog debe mostrar cada post debe mostrar la siguiente información:
- Titulo
- Fecha de Publicación (Formato DD/MM/YYYY)
- Contenido

# Desde el panel de administración de Magento:
* Se deben visualizar las publicaciones existentes
* Se pueden crear publicaciones
* Se pueden editar las publicaciones
* Se pueden eliminar las publicaciones

Se espera un historial de Git conciso y documentado. Cuando el desarrollo haya terminado, se debe crear una Solicitud de Fusión (Pull Request) para notificar al equipo técnico que la prueba está lista para ser evaluada. Solo es necesario versionar el directorio que contiene el módulo y no la aplicación de Magento. La extensión debe ser auto-instalable con el comando "magento setup:upgrade".

¡Buena suerte!
