# CVSAPP con Laravel
CVSAPP consiste en una aplicación dedicada para la creación de currículums para los alumnos.

## Características Implementadas

### Funcionalidades Principales
- Permite crear, leer, actualizar y eliminar CVs de alumnos
- **Sistema de imágenes** para fotografías de perfil
- **Validación de formularios** en frontend y backend
- **Manejo de errores** con mensajes de feedback

### **Controladores (`app/Http/Controllers/`)**

#### `AlumnoController.php`
Gestiona todas las operaciones de crear, leer, actualizar y eliminar CVs
La función index() muestra lista de todos los CVs
La función create() muestra formulario de creación de CVs
La función store() guarda un nuevo CV en la base de datos
La función show() muestra CV completo del alumno
La función edit() muestra un formulario de edición de CVs
La función update() permite actualizar datos del CV
La función destroy() elimina el CV
La función upload() permite la subida de imágenes al CV

#### `MainController.php`
Controla las páginas principales
La función index(), página de inicio con cards que obtiene todos los CVs de la base de datos
La función copy() crea los elementos de navegación de la página
La función prueba() crea un formulario para pruebas

#### `ImageController.php`
Servir imágenes de forma segura
La función view() busca al alumno del CV en la base de datos, verifica su existencia y si no existe muestra una imagen por defecto en el CV, si el alumno no ha adjuntado ninguna foto también muestra la imagen por defecto, y si sí ha adjuntado una imagen pues se verá dicha foto.
Busca el alumno por ID en la base de datos

### **Modelos (`app/Models`)**

#### `Alumno.php`
Representa la tabla 'alumnos' en la base de datos
Con $fillable representamos los campos que se pueden asignar masivamente
Con $casts hacemos una conversión automática de tipos de datos de fecha y decimales
getFotografiaUrl() devuelve la URL de la imagen o por defecto
Con getEdad() calculamos la edad del alumno a partir de fecha de nacimiento
Con getNombreCompleto() combinamos nombre y apellidos del alumno

### **Vistas (`resources/views/`)**

#### **Carpeta `alumno/`**
La vista 'index.blade.php' lista alumnos en tabla con un modal de eliminación
La vista create.blade.php representa un formulario para crear nuevos CVs
La vista edit.blade.php representa un formulario para editar cualquier CV
La vista show.blade.php se trata de la vista específica de cualquier CV
La vista show1.blade.phpVista muestra una vista simple en formato tabla de los CVs

#### **Carpeta `main/`**
Representa las funciones del controlador MainController.php
La vista index.blade.php se trata de la página principal con cards de alumnos
La vista copy.blade.php muestra la página de ejemplo con navegación
La vista prueba.blade.php muestra la Página de prueba de funcionalidades

#### **Carpeta `template/`**
La vista base.blade.php se trata del layout principal y la estructura base
La vista copybase.blade.php trata del layout alternativo para páginas especiales

### **Base de Datos (`database/`)**

#### `migrations/create_alumnos_table.php`
Define la estructura de la tabla 'alumnos'

Crea la tabla alumnos en la base de datos, donde se almacenarán un id, nombre, apellidos, teléfono, correo, fecha_nacimiento, nota_media, experiencia laboral, formación académica, habilidades y una fotografía. Al crear un CV se almacenan todos estos datos del alumnos en la base de datos.