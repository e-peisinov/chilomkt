# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users
Mayormente de Mercedes (Provincia de Buenos Aires) y alrededores: dueños de comercios y PyMEs locales (gimnasio, café, consultorio, tienda), emprendedores y marcas personales que necesitan que su negocio se vea en redes. Llegan desde Instagram o por recomendación, evaluando a quién confiarle su comunicación, y quieren entender rápido qué hace CHILO y si les habla a ellos.

## Product Purpose
Sitio institucional de CHILO (chilo.mkt), estudio de marketing y contenido de Mercedes. Debe convertir visitas en contacto. Éxito = el visitante escribe por WhatsApp o DM, deja un mensaje en el formulario o sigue a la marca en Instagram.

## Positioning
"Ayudamos a que los negocios se vean, se elijan y crezcan." Nada de fórmulas mágicas ni contenido genérico: primero entienden la marca, después arman un plan y recién ahí crean. Método antes que improvisación: Escuchamos (dónde estás), Planificamos (a tu medida), Creamos (con criterio). Son dos personas que "se animaron" a vivir de algo propio.

## Operating Context
Contenido administrado desde un CMS propio (Laravel + Livewire): textos e imágenes de cada sección viven en la tabla `secciones`, más servicios, clientes, equipo y configuración global (email, teléfono, WhatsApp, redes, dirección, logo). Todo diseño debe tolerar textos editables de largo variable e imágenes opcionales.

## Capabilities and Constraints
- Páginas públicas: Inicio, Nosotros, Servicios, Contacto. Inicio: hero + estadísticas, servicios, clientes/trabajos, proceso (método), CTA. Nosotros: hero, historia, estadísticas, misión, visión, valores, equipo, CTA. Servicios: hero, listado, CTA. Contacto: hero, formulario, datos, CTA.
- Servicios (según Instagram, oct 2026): Estrategia (diagnóstico, a quién le hablás, pilares de contenido, calendario con objetivos); Manejo de redes (posteos, historias, textos y programación, todos los meses); Producción audiovisual (fotos, video y drone: dos cámaras, drone y un fotógrafo profesional); Diseño y edición (edición de fotos y videos, creativos y piezas).
- Sección de portfolio/clientes: el cliente quiere mostrar el contenido hecho para cada cliente; la estructura definitiva está pendiente de definir. Mientras tanto se apoya en el modelo `Cliente`.
- La sección Testimonios fue retirada a pedido del cliente; no se reintroduce.
- Stack fijo: Laravel 12, Livewire 3, Tailwind 3, Alpine, GSAP + ScrollTrigger + Lenis por npm (sin CDN). Todo nombrado en español.
- Debe funcionar perfecto en celular, tablet y desktop; las animaciones no pueden trabar en móvil y con movimiento reducido el sitio se ve completo sin animación.
- Alcance del rediseño: solo el sitio público (layout `publica` + las 4 páginas). Login/registro y panel admin no se tocan.

## Brand Commitments
- Nombre: CHILO, firma "CHILO mkt" (Anton + "mkt" manuscrito). Usuario de Instagram @chilo.mkt.
- Símbolo: la huella, una C hecha de arcos concéntricos con un punto amarillo en el centro. "Cada marca deja su marca, y nuestro trabajo es ayudarte a dejar la tuya."
- Paleta (de los posts; a confirmar con el manual de marca): negro #121212, gris cálido claro #E2E1DC, amarillo #FFB43A, verde petróleo #124D47.
- Tipografía (aproximada hasta tener el manual): títulos en condensada pesada en mayúsculas (Anton), remates manuscritos en pincel (Kaushan Script), texto en sans limpia (Hanken Grotesk), rótulos chicos en mayúsculas espaciadas.
- Gramática de los carruseles: rótulo de sección arriba a la izquierda y huella chica arriba a la derecha; títulos enormes con un remate manuscrito torcido; letras gigantes caladas (solo contorno) de fondo; etiquetas tipo cinta inclinadas con contorno desplazado; círculos-sticker ("hola!", "escribinos", "dale"); "deslizá →" y contador 1/5.
- Voz rioplatense con voseo ("Escribinos", "Deslizá", "contanos", "laburo"), directa y con humor medido.
- Logo configurable texto/imagen desde el admin; el diseño debe soportar ambos modos (sin imagen subida se dibuja la huella).
- No debe sentirse corporativo ni infantil o recargado.

## Evidence on Hand
No hay material real todavía: sin fotos del equipo, sin trabajos de clientes, sin logos reales de clientes (los clientes y el equipo cargados son de ejemplo). El diseño se resuelve con la gráfica de la marca. No inventar métricas, resultados ni testimonios.

## Product Principles
1. Convertir sin presionar: WhatsApp, DM e Instagram siempre a mano.
2. El sitio es un carrusel más de la marca: misma gramática que los posts, con movimiento.
3. Método antes que improvisación: cercano y con humor, pero con criterio visible.
4. Contenido editable primero: cada composición sobrevive a textos e imágenes cambiados desde el CMS.
