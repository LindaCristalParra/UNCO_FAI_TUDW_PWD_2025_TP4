# Trabajo Práctico Nº 4 – PHP / MySQL / PDO

Repositorio del proyecto para el Trabajo Práctico Nº 4 de la materia Programación Web Dinámica (UNCO FAI), correspondiente al grupo 02.

## Descripción

Este trabajo práctico consiste en el desarrollo de una aplicación web en PHP que interactúa con la base de datos **infoautos** (con tablas `auto` y `persona`), utilizando PDO para la conexión y la clase `BaseDatos.php` vista en clase. Cada auto está asociado a un único dueño (persona).

La aplicación está organizada respetando el patrón MVC y los siguientes ejercicios:

### Ejercicio 1: Capa de Datos (Modelo ORM)

- Implementación del modelo de datos (ORM) para la base entregada.
- Una clase PHP por cada tabla (`Auto`, `Persona`), con variables de instancia, getters/setters, y métodos para seleccionar, ingresar, modificar y eliminar datos.

### Ejercicio 2: Capa de Control

- Implementación de controladores para acceder al modelo y entregar información a las vistas.

### Ejercicio 3: VerAutos.php

- Página que muestra todos los autos cargados, incluyendo nombre y apellido del dueño.
- Si no hay autos, se muestra un mensaje indicativo.

### Ejercicio 4: BuscarAuto.php y accionBuscarAuto.php

- Formulario para buscar auto por patente.
- Muestra los datos del auto y dueño correspondiente.
- Mensajes adecuados si no se encuentra el auto.
- Uso de CSS y validaciones JavaScript.

### Ejercicio 5: listaPersonas.php y autosPersona.php

- Listado de personas con link para ver autos asociados.
- Muestra datos de la persona y su listado de autos.

### Ejercicio 6: NuevaPersona.php y accionNuevaPersona.php

- Formulario para agregar nueva persona.
- Mensaje indicando éxito o falla en la carga.
- CSS y validaciones JavaScript.

### Ejercicio 7: NuevoAuto.php y accionNuevoAuto.php

- Formulario para agregar nuevo auto (incluyendo dueño).
- Chequeo previo de existencia del dueño.
- Mensajes y link para agregar nueva persona si no existe.
- CSS y validaciones JavaScript.

### Ejercicio 8: CambioDuenio.php y accionCambioDuenio.php

- Formulario para cambiar dueño de auto por patente y documento.
- Mensajes de error si auto o persona no existen.
- CSS y validaciones JavaScript.

### Ejercicio 9: BuscarPersona.html, accionBuscarPersona.php y ActualizarDatosPersona.php

- Formulario para buscar persona por documento.
- Muestra datos y permite modificarlos (excepto documento).
- Actualización de datos con validaciones y estilos.

## Organización del Proyecto

```
phpMysql/
├── Modelo/
│   ├── Auto.php
│   ├── Persona.php
│   ├── infoAutos.sql
│   └── Conector/
├── Control/
│   ├── controlAuto.php
│   └── controlPersona.php
├── Vista/
│   └── (subcarpetas y archivos varios de vistas)
└── README.md
```

- **Modelo** contiene las clases de datos principales (`Auto.php`, `Persona.php`), el script de base de datos (`infoAutos.sql`) y el subdirectorio `Conector` para la conexión.
- **Control** contiene los controladores (`controlAuto.php`, `controlPersona.php`).
- **Vista** contiene las páginas principales de la interfaz y puede incluir una estructura interna para CSS y JS.

## Tecnologías Utilizadas

- **PHP** (POO, PDO)
- **MySQL**
- **Bootstrap** (estilos y validaciones)
- **JavaScript** (validaciones)

## Grupo 02

- Ramiro Navarrete
- Andrea Crespillo
- Lautaro Mellado
- Linda Parra

---

**Observaciones y buenas prácticas:**
- Todas las salidas al usuario están implementadas en la capa de **Vista**, separando correctamente la lógica y la presentación.
- No se accede directamente al ORM desde las vistas; siempre se utiliza la capa de control.
- Se aplican buenas prácticas de seguridad (validaciones, sanitización) y organización de código.

---

> **Repositorio:** [UNCO_FAI_TUDW_PWD_2025_TP4](https://github.com/LindaCristalParra/UNCO_FAI_TUDW_PWD_2025_TP4)

