# Guía de Inicio y Flujo de Trabajo (APP-UMC)

Esta documentación te ayudará a levantar el entorno de desarrollo local y a seguir las mejores prácticas al trabajar con Git y GitHub en este proyecto.

---

## 🚀 Cómo Iniciar el Proyecto

Sigue estos pasos para poner en marcha la aplicación en tu entorno local.

### 1. Preparación Inicial (Solo la primera vez)

Si acabas de clonar el proyecto, asegúrate de instalar todas las dependencias y configurar las variables de entorno:

1. **Instalar dependencias de PHP (Laravel):**
   ```bash
   composer install
   ```

2. **Instalar dependencias de JavaScript:**
   ```bash
   npm install
   ```

3. **Configurar el archivo `.env`:**
   Copia el archivo de ejemplo y configura tu base de datos:
   ```bash
   cp .env.example .env
   ```
   *Nota: En Windows, si `cp` no funciona, puedes usar `copy .env.example .env`.*

4. **Generar la clave de la aplicación:**
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar migraciones (si hay base de datos configurada):**
   ```bash
   php artisan migrate
   ```

---

### 2. Ejecutar el Proyecto en Desarrollo

Para trabajar en el proyecto, necesitas tener abiertos **dos terminales** simultáneamente:

#### Terminal 1: Servidor Backend (Laravel)
Este comando levantará el servidor PHP en local (usualmente en `http://127.0.0.1:8000`).
```bash
php artisan serve
```

#### Terminal 2: Servidor Frontend (Vite)
Este comando compilará los assets en tiempo real y habilitará el Hot Module Replacement (HMR) para que los cambios en CSS/JS se vean inmediatamente en el navegador.
```bash
npm run dev
```

---

## 🐙 Flujo de Trabajo en Git y GitHub

Para mantener el repositorio limpio y evitar conflictos de código, seguimos un flujo de trabajo basado en ramas (Branching Workflow).

### 1. Actualizar tu rama local `main`
Antes de empezar a trabajar en algo nuevo, asegúrate de tener la última versión del código:
```bash
# Cambiar a la rama principal
git checkout main

# Descargar las últimas actualizaciones
git pull origin main
```

### 2. Crear una nueva rama
Nunca trabajes directamente sobre la rama `main`. Crea una rama específica para la tarea o funcionalidad que vas a desarrollar (por ejemplo: `feature/login`, `fix/bugs-estilo`):
```bash
git checkout -b nombre-de-tu-rama
```
*El parámetro `-b` crea la rama y te cambia a ella automáticamente.*

### 3. Cambiar entre ramas existentes
Si ya creaste la rama anteriormente y quieres volver a ella:
```bash
git checkout nombre-de-la-rama
```
Para ver en qué rama estás actualmente y listar las locales:
```bash
git branch
```

### 4. Guardar tus cambios localmente (Commit)
A medida que avances en tu código, ve guardando tus progresos:

1. **Ver el estado de tus archivos:**
   ```bash
   git status
   ```
2. **Añadir los archivos modificados al área de preparación (staging):**
   ```bash
   # Para añadir todos los archivos modificados
   git add .

   # O para añadir un archivo específico
   git add ruta/al/archivo.php
   ```
3. **Crear el commit con un mensaje descriptivo:**
   ```bash
   git commit -m "feat: añadir formulario de login"
   ```

### 5. Subir tus cambios a GitHub (Push)
La primera vez que subas una nueva rama al servidor remoto, debes indicar a dónde enviarla:
```bash
git push -u origin nombre-de-tu-rama
```
Para los siguientes commits dentro de esa misma rama, bastará con ejecutar simplemente:
```bash
git push
```

### 6. Crear un Pull Request (PR) y fusionar (Merge)
1. Ve al repositorio en **GitHub**.
2. Verás un botón que dice **"Compare & pull request"** para la rama que acabas de subir. Haz clic en él.
3. Añade una descripción de tus cambios y crea el Pull Request.
4. Una vez revisado y aprobado el código, puedes fusionarlo (Merge) con la rama `main` en GitHub.
5. Tras fusionar, vuelve a tu terminal, cambia a `main` y descarga los cambios fusionados:
   ```bash
   git checkout main
   git pull origin main
   ```
