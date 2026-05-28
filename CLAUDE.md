## Stack Tecnologico
- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Livewire 3 + Tailwind CSS (sin archivos CSS ni etiquetas style)
- **UI**: Livewire Flux (instalado), componentes Blade
- **Auth**: Laravel Breeze (Livewire edition)
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
| Panel | `/admin` | Dashboard con stats y mensajes recientes |
| PaginaInicio | `/admin/pagina/inicio` | CMS de inicio: hero, estadisticas, servicios, clientes, proceso, testimonios, CTA |
| PaginaNosotros | `/admin/pagina/nosotros` | CMS de nosotros: hero, historia, estadisticas, mision, vision, valores, equipo, CTA |
| PaginaServicios | `/admin/pagina/servicios` | CMS de servicios: hero, listado servicios, CTA |
| PaginaContacto | `/admin/pagina/contacto` | CMS de contacto |
| GestionConfiguraciones | `/admin/configuraciones` | Config global (email, tel, redes, direccion) |

### Layouts
- `layouts/publica.blade.php` - Layout publico con nav y footer
- `layouts/admin.blade.php` - Layout admin con sidebar

## Imagenes y Uploads
- **Disco**: `public` (storage/app/public/)
- **Symlink**: `public/storage` -> `storage/app/public`
- **Patron**: `$archivo->store('carpeta', 'public')` retorna path relativo
- **Acceso**: `asset('storage/' . $modelo->campo_imagen)`
- **Validacion**: `image|max:2048` (2MB)
- **Directorios**: `secciones/`, `servicios/`, `clientes/`, `equipo/`, `testimonios/`
- **Secciones con imagen editable**: hero (inicio), inicio_proceso, nosotros_historia
- **Modelos con imagen editable**: Servicio (imagen), Cliente (logo), MiembroEquipo (foto), Testimonio (foto)

## Secciones CMS (tabla `secciones`)
Claves existentes: `hero`, `inicio_estadisticas`, `servicios_intro`, `clientes_intro`, `inicio_proceso`, `inicio_testimonios`, `inicio_cta`, `nosotros_hero`, `nosotros_historia`, `nosotros_estadisticas`, `mision`, `vision`, `nosotros_valores`, `nosotros_equipo_intro`, `nosotros_cta`, `servicios_hero`, `servicios_cta`, `contacto_hero`, `contacto_cta`
