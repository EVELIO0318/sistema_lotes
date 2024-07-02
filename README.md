# 🏞️ Sistema de Lotes

![HTML](https://img.shields.io/badge/HTML5-orange) ![CSS](https://img.shields.io/badge/CSS3-blue) ![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow) ![PHP](https://img.shields.io/badge/PHP-7.4-blue) ![MVC](https://img.shields.io/badge/MVC-Pattern-green)

Este proyecto es una página web autoadministrable para la gestión de lotes de terreno, desarrollada con HTML, CSS, JavaScript y PHP siguiendo el patrón de diseño MVC. Incluye un módulo administrador al que se accede agregando `/admin` a la URL. Además, permite el envío de correos electrónicos y otras funcionalidades.

## 📋 Tabla de Contenidos
- [Instalación](#⚙️-instalación)
- [Uso](#🚀-uso)
- [Características](#✨-características)
- [Tecnologías](#🛠️-tecnologías)
- [Contribuciones](#🤝-contribuciones)
- [Licencia](#📄-licencia)
- [Contacto](#📧-contacto)

## ⚙️ Instalación

1. Clona el repositorio:
    ```bash
    git clone https://github.com/EVELIO0318/sistema_lotes.git
    ```
2. Configura el servidor web y la base de datos.
3. Configura el archivo `.env` con los detalles de la base de datos y otras configuraciones necesarias.
4. Ejecuta las migraciones y seeders si existen:
    ```bash
    php artisan migrate --seed
    ```

## 🚀 Uso

1. Inicia el servidor local:
    ```bash
    php -S localhost:8000 -t public
    ```
2. Accede a la aplicación en tu navegador:
    ```
    http://localhost:8000
    ```
3. Para acceder al módulo administrador, agrega `/admin` a la URL:
    ```
    http://localhost:8000/admin
    ```

## ✨ Características

- Gestión de lotes de terreno
- Módulo administrador accesible mediante `/admin`
- Envío de correos electrónicos
- Interfaz intuitiva y fácil de usar
- Diseño responsivo

## 🛠️ Tecnologías

- [HTML](https://developer.mozilla.org/es/docs/Web/HTML)
- [CSS](https://developer.mozilla.org/es/docs/Web/CSS)
- [JavaScript](https://developer.mozilla.org/es/docs/Web/JavaScript)
- [PHP](https://www.php.net/)
- [MVC Pattern](https://developer.mozilla.org/en-US/docs/Glossary/MVC)

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Si deseas contribuir, por favor sigue estos pasos:

1. Haz un fork del proyecto.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Sube los cambios a tu rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## 📄 Licencia

Este proyecto está licenciado bajo la Licencia Personal de Evelio Escobar.

## 📧 Contacto

Evelio Escobar - [evelio.villeda9@gmail.com](mailto:evelio.villeda9@gmail.com)

¡Gracias por visitar nuestro proyecto!
