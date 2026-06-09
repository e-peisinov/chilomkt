## Stack Tecnologico
- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Livewire 3 + Tailwind CSS (sin archivos CSS ni etiquetas style)
- **UI**: Livewire Flux (instalado), componentes Blade
- **Auth**: Laravel Breeze (Livewire edition). El registro NO es publico: la ruta `register` esta detras del middleware `auth` (solo un admin logueado crea usuarios). `register` no cambia la sesion del admin; `login`/`register` redirigen a `inicio`.
- **DB**: MySQL (base: `chilomkt`, XAMPP local)
- **Build**: Vite

## Convencion de Nombres
**Todo en espanol**: tablas, modelos, vistas, componentes, rutas, propiedades.

## Estructura del Proyecto

### Modelos (`app/Models/`)
| Modelo | Tabla | Campos clave |
|--------|-------|-------------|
| Servicio | servicios | titulo, descripcion, icono, imagen, orden, activo |
| Cliente | clientes | nombre, logo, sitio_web, descripcion, orden, activo |
| Testimonio | testimonios | nombre, cargo, empresa, contenido, foto, orden, activo |
| MiembroEquipo | miembros_equipo | nombre, cargo, bio, foto, linkedin, instagram, orden, activo |
| Seccion | secciones | pagina, clave (unique), titulo, subtitulo, contenido, imagen |
| Configuracion | configuraciones | clave (unique), valor |
| MensajeContacto | mensajes_contacto | nombre, email, telefono, asunto, mensaje, leido |

### Paginas Publicas (`app/Livewire/Paginas/`)
| Componente | Ruta | Vista |
|-----------|------|-------|
| Inicio | `/` | livewire/paginas/inicio |
| Nosotros | `/nosotros` | livewire/paginas/nosotros |
| Servicios | `/servicios` | livewire/paginas/servicios |
| Contacto | `/contacto` | livewire/paginas/contacto |

### Admin (`app/Livewire/Admin/`) - protegido por `auth`, `verified`
| Componente | Ruta | Funcion |
|-----------|------|---------|
| Panel | `/admin` | Dashboard con stats y mensajes recientes. "Ver todos los mensajes" enlaza a `/admin/pagina/contacto` |
| PaginaInicio | `/admin/pagina/inicio` | CMS de inicio: hero, estadisticas, servicios, clientes, proceso, testimonios, CTA |
| PaginaNosotros | `/admin/pagina/nosotros` | CMS de nosotros: hero, historia, estadisticas, mision, vision, valores, equipo, CTA |
| PaginaServicios | `/admin/pagina/servicios` | CMS de servicios: hero, listado servicios, CTA |
| PaginaContacto | `/admin/pagina/contacto` | CMS de contacto |
| GestionConfiguraciones | `/admin/configuraciones` | Config global (email, tel, redes, direccion) + logo del sitio (texto/imagen/modo) |
| GestionMensajes | `/admin/mensajes` | Listado paginado de mensajes de contacto (ver/eliminar). Acceso alternativo; no esta en el sidebar (los mensajes se gestionan en `/admin/pagina/contacto`) |
| register (Volt) | `/register` | Crear usuario admin (solo logueado, no cambia sesion). Link "Crear usuario" en sidebar |

### Layouts
- `layouts/publica.blade.php` - Layout publico con nav y footer. Renderiza logo configurable; muestra link "Configuraciones" -> `/admin` cuando hay usuario autenticado (en el menu de escritorio y tambien en el menu hamburguesa movil).
- `layouts/admin.blade.php` - Layout admin con sidebar (incluye "Crear usuario"). El sidebar es un drawer deslizable en movil (Alpine `x-data="{ sidebarOpen }"` + overlay), `lg:sticky` fijo en desktop.
- `layouts/guest.blade.php` - Layout de auth (login/register) rediseñado con branding ChiloMkt y logo configurable.

## Logo configurable
- Configurable desde `/admin/configuraciones` (GestionConfiguraciones).
- Config keys: `logo_modo` (`ambos` | `texto` | `imagen`), `logo_texto`, `logo_imagen` (path en disco `logo/`).
- Helper de lectura: `Configuracion::obtener('clave', $default)`.
- Renderizado en `layouts/publica.blade.php` (nav + footer) y `layouts/guest.blade.php`.

## Imagenes y Uploads
- **Disco**: `public` (storage/app/public/)
- **Symlink**: `public/storage` -> `storage/app/public`
- **Patron**: `$archivo->store('carpeta', 'public')` retorna path relativo
- **Acceso**: `asset('storage/' . $modelo->campo_imagen)`
- **Validacion**: usar SIEMPRE el trait `App\Livewire\Concerns\ValidaImagen` -> `$this->reglaImagen('nullable'|'required')` (image + mimes jpg,jpeg,png,webp,gif + mimetypes + max:2048, SIN svg). Aplicado a los 10 componentes con subida. No usar la cadena literal `image|max:2048`.
- **Seguridad servidor**: `storage/app/public/.htaccess` desactiva el motor PHP y deniega ejecucion/descarga de scripts (capa Apache). Reglas de subida temporal endurecidas en `config/livewire.php`.
- **Quitar imagen**: cada componente con subida expone un metodo `quitarImagen...()` que borra del disco y limpia el campo.
- **Directorios**: `secciones/`, `servicios/`, `clientes/`, `equipo/`, `testimonios/`, `logo/`
- **Secciones con imagen editable**: hero (inicio), inicio_proceso, nosotros_historia
- **Modelos con imagen editable**: Servicio (imagen), Cliente (logo), MiembroEquipo (foto), Testimonio (foto)

## Responsive (mobile/tablet/desktop)
El sitio debe funcionar en todos los dispositivos. Patrones a respetar:
- **Sidebar admin**: drawer Alpine en movil (`fixed`, `-translate-x-full` / `translate-x-0`), `lg:sticky lg:translate-x-0` en desktop, con overlay y boton cerrar. El boton hamburguesa usa `@click="sidebarOpen = true"`.
- **Tablas admin**: SIEMPRE envolver en `<div class="overflow-x-auto">` + `<table class="w-full min-w-[600px]">` para evitar corte en pantallas chicas.
- **Nunca usar clases Tailwind dinamicas** con valores variables (`grid-cols-{{ count(...) }}`): el JIT no las compila. Usar clases fijas responsivas (`grid-cols-1 sm:grid-cols-2 lg:grid-cols-4`) o `flex flex-wrap`.
- **`overflow-x-hidden`** en el body de `layouts/publica` como red de seguridad contra scroll horizontal de los blobs decorativos con offsets negativos.
- **`[x-cloak]{display:none!important}`** definido en `resources/css/app.css` (necesario para que `x-cloak` funcione y no haya parpadeo de menus al cargar).
- Heros internos usan `py-24 sm:py-32 lg:py-40`. Imagenes con alto fijo escalonan con breakpoints (ej. `h-72 sm:h-96 lg:h-[450px]`). Grids dentro de modales colapsan en movil (`grid-cols-1 sm:grid-cols-2`).

## Secciones CMS (tabla `secciones`)
Claves existentes: `hero`, `inicio_estadisticas`, `servicios_intro`, `clientes_intro`, `inicio_proceso`, `inicio_testimonios`, `inicio_cta`, `nosotros_hero`, `nosotros_historia`, `nosotros_estadisticas`, `mision`, `vision`, `nosotros_valores`, `nosotros_equipo_intro`, `nosotros_cta`, `servicios_hero`, `servicios_cta`, `contacto_hero`, `contacto_cta`
