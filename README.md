# Registro de Vehículos - Web Service (Arquitectura Multicapa)

Este proyecto consiste en el desarrollo de un **Servicio Web** diseñado para la gestión y registro de información de vehículos. La aplicación sigue una **arquitectura multicapa**, lo que garantiza una separación clara de responsabilidades, facilitando el mantenimiento y la escalabilidad del sistema.

---

## 📝 Descripción del Proyecto

El objetivo principal es permitir el ingreso de datos técnicos de vehículos a través de servicios en formato **JSON**. Para simplificar el caso de estudio, los campos que normalmente serían catálogos (como marca o color) se manejan como entradas de texto directo.

### Campos del Vehículo registrados:
* **ID:** Identificador único del registro.
* **Marca:** Nombre del fabricante.
* **Modelo:** Línea o referencia del vehículo.
* **Placa:** Matrícula identificadora.
* **Chasis:** Número de serie del bastidor.
* **Año:** Año de fabricación.
* **Color:** Color exterior del vehículo.

---

## 🏗️ Arquitectura del Sistema

La solución se ha implementado utilizando un patrón de **Arquitectura Multicapa**, dividiendo la lógica de la siguiente manera:

1.  **Capa de Servicios (API):** Gestión de endpoints y comunicación en formato JSON.
2.  **Capa de Negocio:** Procesamiento de la información y reglas de validación.
3.  **Capa de Acceso a Datos:** Persistencia y manejo de la información del vehículo.

---

## 🚀 Requisitos e Instalación

### Herramientas Necesarias
* Entorno de desarrollo compatible (IDE).
* Acceso a Internet para gestión de dependencias.
* **Postman** (para validación de funcionalidad).

### Pasos para ejecutar
1. Clona este repositorio:
   ```bash
   git clone [https://github.com/tu-usuario/nombre-del-repo.git](https://github.com/tu-usuario/nombre-del-repo.git)
