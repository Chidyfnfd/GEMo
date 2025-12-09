**Sitio web**
https://gemo-gestor-emocional.netlify.app

🌟 **Descripción del Proyecto**
GEMo (Gestor Emocional) es una aplicación web de una sola página (SPA) diseñada para el registro y seguimiento del estado emocional de los usuarios, con un componente de Ayuda Profesional a través de un chat en vivo.

El sistema soporta dos perfiles de usuario principales:

**Usuario (Cliente):** Permite registrar el nivel emocional diario, asociándolo a una emoción y un hábito. Ofrece reportes visuales (reporte semanal y gráficos de intensidad) y la opción de solicitar asistencia profesional a través de un chat.

**Administrador (Profesional):** Permite gestionar y atender las solicitudes de ayuda (pendientes o activas). Los administradores pueden ver el historial emocional del cliente antes de iniciar una conversación de chat, enviar mensajes de asesoramiento y cerrar el chat para archivarlo.


⚙️ **Tecnologías Utilizadas**
La aplicación está construida como un prototipo de frontend puro utilizando tecnologías web estándar y CDN (Content Delivery Network) para simplificar la configuración.

- React (Biblioteca JS): Utilizada para construir la interfaz de usuario (UI) mediante componentes modulares (AuthScreen, Header, AdminDashboard, etc.) y gestionar el estado de la aplicación.

- Babel Standalone (Transpilador JS): Empleado para compilar el código JSX y ES6+ embebido directamente en el navegador sin necesidad de un entorno de build.

- JavaScript (ES6+): Lenguaje principal que implementa la lógica de la aplicación, el manejo de datos, la autenticación simulada y la gestión de la persistencia de datos.

- Web Storage API (localStorage): Se utiliza mediante el hook useStickyState para simular una base de datos. Almacena la data del usuario, registros de entradas, consejos, solicitudes de ayuda, chats y la preferencia de tema oscuro.

- Tailwind CSS (CDN): Framework CSS que proporciona clases de utilidad para el diseño rápido y responsivo, incluyendo la implementación del Modo Oscuro (darkMode: 'class').

- HTML5 y CSS3: Proporcionan la estructura base del documento y estilos personalizados.

- Lucide Icons (CDN): Librería que suministra los íconos vectoriales (SVG) utilizados en la interfaz de usuario.


🔑 **Credenciales de Cuentas de Prueba**
La aplicación utiliza un arreglo de usuarios iniciales (INITIAL_USERS) almacenado en el código para simular la autenticación.

**Contraseña Común:** Todas las cuentas de prueba utilizan la **contraseña: 123**

**Cuentas de Administrador (Profesional):**

admin@gemo.com

admin4@gemo.com

**Cuentas de Cliente (Usuario):**

cliente1@mail.com

cliente2@mail.com

