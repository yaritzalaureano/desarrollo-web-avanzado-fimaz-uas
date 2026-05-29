# Práctica 2 - Herencia y Reutilización de Código en PHP

## Objetivo
Implementar herencia mediante la extensión de clases, reutilizando atributos y métodos de una clase base.

## Explicación de la herencia
- La clase `Admin` **hereda** de la clase `Usuario` usando `extends`.  
- Esto permite que `Admin` use los métodos y atributos de `Usuario` sin repetir código.  

## Diferencias entre Usuario y Admin
- `Usuario`: clase base con atributos privados `nombre` y `correo`.  
- `Admin`: clase derivada que hereda de `Usuario` y agrega el método `getRol()` que devuelve `"Administrador"`.

## Instrucciones de ejecución
1. Colocar los archivos en:
desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-2/
 Abrir en navegador:

http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-2/index.php


