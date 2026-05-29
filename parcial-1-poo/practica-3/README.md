Práctica 3 – Herencia, Validación y Manejo de Excepciones en PHP

Descripción del sistema:
Este proyecto implementa un sistema básico de gestión de usuarios utilizando Programación Orientada a Objetos (POO) en PHP.
El sistema está diseñado para demostrar el uso de herencia entre clases, validación de datos y manejo de excepciones, simulando un entorno de desarrollo más estructurado y cercano a una aplicación real.
La clase base Usuario contiene la información común de los usuarios, mientras que las clases Admin y Alumno heredan de ella e implementan comportamientos específicos.

Flujo de clases del sistema
Clase Usuario:Es la clase base del sistema y representa un usuario genérico.
Atributos:
nombre
correo
El constructor inicializa estos atributos y realiza una validación del correo electrónico utilizando la función filter_var().
Si el correo no tiene un formato válido, el sistema lanza una excepción, evitando que se cree un objeto con datos incorrectos.

Clase Admin:La clase Admin hereda de la clase Usuario.
Implementa el método:
getRol()
Este método devuelve el texto:
Administrador
Esto permite identificar el tipo de usuario dentro del sistema.s
Clase Alumno
La clase Alumno también hereda de la clase Usuario.

Incluye un atributo adicional:
matricula
Además implementa el método:
getRol()
El cual devuelve:Alumno

De esta manera se pueden diferenciar los tipos de usuarios dentro del sistema.

Manejo de excepciones

En el archivo index.php se implementan bloques try / catch para controlar posibles errores durante la creación de objetos.
Cuando se intenta crear un usuario con un correo inválido, el constructor de la clase Usuario genera una excepción que es capturada en el archivo principal.

try {
$usuario = new Usuario("Pedro", "correo-invalido");
} catch (Exception $e) {
echo "Error: " . $e->getMessage();
}

Esto permite mostrar mensajes de error controlados sin detener la ejecución del programa.

Evidencia del manejo de errores:
Cuando el sistema detecta que el correo electrónico no tiene un formato válido, se muestra un mensaje como el siguiente:
Error: Correo inválido
Esto demuestra que el sistema:
Valida los datos antes de crear objetos.
Utiliza excepciones para detectar errores.
Maneja los errores mediante bloques try/catch

 Abrir el navegador y escribir:
http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-3/index.php