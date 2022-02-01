# prseconecta
Codigo de prseconecta

Para comenzar, la estructura del proyecto del proyecto es muy sencilla se basa en el modelo view controller o modelo vista controlador 

En la carpeta Libraries, es donde se deben subir las librerias como por ejemplo, la de stripe que se encuentra ahí, y también está la carpeta core que se encuentra
todo el core del mini framework de php

En views se suben todas las vistas allí tiene el nombre del controlador y dentro de ese las vistas de ese controlador y en la carpeta Template en Views es donde
subo todo lo que es "template" por ejemplo, modales, html de correos e incluso html reutilizable

En config, esta el acceso a la base de datos constantes globables,

en helpers están las funciones que te ayudarán a desarrollar la aplicación puedes crear más incluso, por ejemplo está StrClean que te ayuda a evitar SQL inyection

Para crear una nueva vista tienes que crear un controller por ejemplo que lo llames "Vista" (Siempre mayuscula inicial) si deseas añadirle un guión tienes que añadirle
piso bajo por ejemplo, "Vista_primera" y automaticamente tambien te la detecta como "Vista-primera", cabe destacar que cada vez que crees un nuevo controlador puedes crear 
un modelo para ese que automaticamente estaran relacionados. Puedes usar los traits como hago yo a veces para no estar creando modelos como loco. Dentro de
cada controlador deberia haber la direccion js dependiendo de la vista que quieras editar, La direccion estaria en Assets/js/direccionproporcionadaporelcontrolador

Muchas de las funciones ya estan autodocumentadas, es decir que la funcion ya tiene el nombre de lo que hace

Hay mucho codigo que ya esta resuelto por ejemplo, el de customs forms que dudo que tengas que tocar pero puedes hechar un vistazo de igual manera.

Los archivos css y js de la pagina es decir no los administradores si no de la pagina se encuentran dentro de Assets/bunzo

Cualquier duda, se comunican con marcel y tratare de responder con anterioridad posible

test
