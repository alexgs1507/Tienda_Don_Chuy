<img src="https://capsule-render.vercel.app/api?type=waving&color=0:F16363,100:63F18F&height=200&section=header&text=Abarrotes%20Don%20Chuy&fontSize=60&fontColor=ffff&fontAlignY=38&desc=XploitSeeker3000%20%20%E2%80%94%20JAPL%20%20%20&descAlignY=58&descSize=18&animation=fadeIn" width="100%"/>

<div align="center">
<p align="center">
  <a href="https://git.io/typing-svg">
    <img src="https://readme-typing-svg.herokuapp.com?font=Plus+Jakarta+Sans&weight=700&size=34&pause=1000&color=F1E363&center=true&vCenter=true&width=500&lines=Bramana;Gestión+Financiera+Inteligente" alt="Typing SVG" />
  </a>
</p>

Una aplicación web progresiva (PWA) de finanzas personales construida con Vanilla JavaScript. Diseñada para ser rápida, segura y estéticamente atractiva, sin depender de frameworks pesados.

  <a href="https://git.io/typing-svg">
    <img src="https://readme-typing-svg.herokuapp.com?font=Plus+Jakarta+Sans&weight=700&size=32&pause=1000&color=63F18F&center=true&vCenter=true&width=500&lines=Controla+tus+Gastos;Alcanza+tus+Metas;" alt="Typing SVG" />
  </a>


[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/es/docs/Web/JavaScript)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/es/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/es/docs/Web/CSS)
[![Firebase](https://img.shields.io/badge/firebase-ffca28?style=for-the-badge&logo=firebase&logoColor=black)](https://firebase.google.com/)

[Explorar Demo](#) · [Reportar Bug](#) · [Solicitar Feature](#)

</div>

---

## Características Principales

- **Dashboard Analítico Custom:** Gráficas de pastel y diagramas de árbol renderizados completamente en SVG puro, sin usar librerías externas.
- **Doble Capa de Seguridad:** 
  - Autenticación segura mediante **Firebase** (Google y Correo/Contraseña).
  - Bloqueo por **PIN local** de 4 dígitos con teclado virtual animado.
- **Michi Interactivo:** Un avatar SVG animado que reacciona cubriéndose los ojos cuando el usuario ingresa su contraseña.
- **Personalización Profunda:** 5 temas de color (Oscuro, Claro, Azul, Verde, Grisazul) generados con variables CSS nativas, y personalización de avatares.
- **Módulos Financieros Completos:** Gestión de Gastos por categorías, Wishlist con barras de progreso, Planeador de Ahorro con cálculos de viabilidad, y gestión de Fondos (Débito, Crédito, Efectivo).
- **PWA Ready:** Diseño totalmente responsivo (Mobile-First) e instalable como aplicación nativa.

## Vistazo Rápido

> **Nota:** Reemplaza los enlaces `ruta-a-tu-imagen.gif` con capturas reales o GIFs de tu proyecto.

<div align="center">
  <img src="ruta-a-tu-gif-del-michi.gif" alt="Michi Animado Login" width="400"/>
  <p><i>Animación interactiva en el inicio de sesión.</i></p>
</div>

<div align="center">
  <img src="ruta-a-tu-screenshot-dashboard.png" alt="Dashboard Principal" width="800"/>
  <p><i>Dashboard general con gráficas SVG dinámicas y análisis de presupuesto automático.</i></p>
</div>

##  Arquitectura y Tecnologías

Este proyecto demuestra que se pueden construir aplicaciones complejas, dinámicas y hermosas utilizando los estándares de la web moderna:

-   **Frontend:** Vanilla JavaScript (ES6+), HTML5 Semántico.
-   **Estilos:** CSS3 puro con fuerte enfoque en `CSS Variables` para tematización instantánea y modo oscuro nativo. Flexbox y CSS Grid para layouts complejos.
-   **Gráficos:** Generación procedimental de elementos `<svg>`, `<path>` y `<circle>` utilizando matemáticas trigonométricas directamente en JavaScript.
-   **Backend & Auth:** Firebase Authentication (Google Auth Provider, Email/Password).
-   **Almacenamiento (Fase 1):** `localStorage` con estructura JSON para persistencia de datos offline.

## Instalación y Uso Local

Al no requerir compiladores complejos como Webpack o Vite (fase inicial), levantar el proyecto es sumamente sencillo.

1. Clona el repositorio:
   ```bash
   git clone [https://github.com/alexgs1507/Tienda_Don_Chuy.git](https://github.com/alexgs1507/Tienda_Don_Chuy.git)