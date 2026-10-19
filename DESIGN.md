---
name: CHILO
description: Sitio público de CHILO (@chilo.mkt), estudio de marketing y contenido de Mercedes. Un carrusel de Instagram que se desliza con el scroll.
colors:
  negro: "#121212"
  hueso: "#E2E1DC"
  amarillo: "#FFB43A"
  petroleo: "#124D47"
typography:
  display:
    fontFamily: "Anton, Impact, sans-serif"
    fontSize: "clamp(3rem, min(8.4vw, 12.5vh), 7.6rem)"
    fontWeight: 400
    lineHeight: 0.94
    letterSpacing: "0.005em"
  headline:
    fontFamily: "Anton, Impact, sans-serif"
    fontSize: "clamp(3rem, 8vw, 7rem)"
    fontWeight: 400
    lineHeight: 0.94
    letterSpacing: "0.005em"
  title:
    fontFamily: "Anton, Impact, sans-serif"
    fontSize: "clamp(2.4rem, 5vw, 3.6rem)"
    fontWeight: 400
    lineHeight: 0.94
    letterSpacing: "0.005em"
  remate:
    fontFamily: "Kaushan Script, cursive"
    fontSize: "0.74em"
    fontWeight: 400
    lineHeight: 1.05
    letterSpacing: "0"
  body:
    fontFamily: "Hanken Grotesk Variable, ui-sans-serif, system-ui, sans-serif"
    fontSize: "1.125rem"
    fontWeight: 400
    lineHeight: 1.625
  label:
    fontFamily: "Hanken Grotesk Variable, ui-sans-serif, system-ui, sans-serif"
    fontSize: "0.72rem"
    fontWeight: 650
    letterSpacing: "0.26em"
rounded:
  none: "0px"
  full: "9999px"
spacing:
  gutter-movil: "20px"
  gutter-tablet: "32px"
  gutter-desktop: "48px"
  slide-arriba: "96px"
  slide-arriba-sm: "112px"
  slide-abajo-lg: "128px"
  contenedor: "1280px"
components:
  boton-amarillo:
    backgroundColor: "{colors.amarillo}"
    textColor: "{colors.negro}"
    typography: "{typography.title}"
    rounded: "{rounded.none}"
    padding: "1.05em 1.5em"
  boton-negro:
    backgroundColor: "{colors.negro}"
    textColor: "{colors.hueso}"
    rounded: "{rounded.none}"
    padding: "1.05em 1.5em"
  boton-hueso:
    backgroundColor: "{colors.hueso}"
    textColor: "{colors.negro}"
    rounded: "{rounded.none}"
    padding: "1.05em 1.5em"
  cinta-negro:
    backgroundColor: "{colors.negro}"
    textColor: "{colors.hueso}"
    rounded: "{rounded.none}"
    padding: ".38em .7em .34em"
  cinta-petroleo:
    backgroundColor: "{colors.petroleo}"
    textColor: "{colors.hueso}"
    rounded: "{rounded.none}"
    padding: ".38em .7em .34em"
  sticker-amarillo:
    backgroundColor: "{colors.amarillo}"
    textColor: "{colors.negro}"
    typography: "{typography.remate}"
    rounded: "{rounded.full}"
  sticker-negro:
    backgroundColor: "{colors.negro}"
    textColor: "{colors.amarillo}"
    typography: "{typography.remate}"
    rounded: "{rounded.full}"
  campo:
    backgroundColor: "transparent"
    textColor: "{colors.negro}"
    rounded: "{rounded.none}"
    padding: "14px 16px"
  barra:
    backgroundColor: "{colors.negro}"
    textColor: "{colors.hueso}"
    height: "64px"
---

# Design System: CHILO

> **Provisorio.** Tipografías y colores son aproximaciones tomadas de los posts de Instagram de @chilo.mkt (oct 2026). Se corrigen cuando llegue el manual de marca; hasta entonces, los valores de este archivo son la referencia y no se "mejoran" a ojo.
>
> **Alcance.** Este sistema cubre solo el sitio público: layout `publica` y las páginas Inicio, Nosotros, Servicios y Contacto (cuerpo con clase `sitio`). El panel admin y las pantallas de auth (layouts `admin` y `guest`) NO forman parte: siguen con su estética previa (colores `chilo.*`, Inter, utilidades `glass`/`animate-*`). No mezclar los dos mundos en ninguna dirección.

## Overview

**Creative North Star: "El carrusel que se desliza"**

El sitio es un carrusel más de @chilo.mkt. Cada sección es un slide con un fondo pleno que se turna con el siguiente; la página se lee como posts en fila, con la misma gramática que el feed: rótulo arriba a la izquierda y huella chica arriba a la derecha, titular enorme en condensada con un remate manuscrito torcido, letras gigantes caladas de fondo, cintas inclinadas, stickers circulares, visor REC y grilla de feed. La huella (tres arcos concéntricos y un punto amarillo) es la cámara: en Inicio se entra por sus arcos hasta que el punto se vuelve el fondo del slide siguiente, y en cada cierre se rearma hasta tamaño logo.

La densidad es de afiche, no de documento: pocos elementos por slide, tipografía que ocupa el ancho, mucho aire vertical entre la cabecera del slide y el titular. El material es plano: color pleno, línea de 2–3px y contorno corrido. La profundidad la dan el cambio de fondo entre slides, el calado de fondo y el movimiento atado al scroll, nunca sombras ni vidrio. El movimiento es parte del mundo, pero el sitio tiene que leerse completo sin él.

Rechazos confirmados por la dirección: la landing de agencia (hero centrado, fila de tarjetas iguales con íconos, logos grises), sombras blandas, gradientes y vidrio.

**Key Characteristics:**
- Cuatro fondos plenos que se turnan por slide; cada fondo trae sus propios colores de remate, trazo, calado y texto suave.
- Anton en mayúsculas para todo lo que se grita; Kaushan Script solo como remate; Hanken Grotesk para leer.
- Esquinas rectas en todo salvo stickers y puntos, que son círculos.
- Contorno corrido (desplazado, sin relleno) como única "sombra" del sistema, en botones y cintas.
- Scroll con escenas fijadas (huella, carrusel horizontal) que se desarman en una pila completa con movimiento reducido.

## Colors

Cuatro plenos de la marca, sin rampas ni tintes intermedios: el contraste viene de cambiar de fondo, no de matizar.

### Primary
- **Amarillo Punto** (amarillo): el punto de la huella. Fondo del slide "qué hacemos" y de todos los cierres, botón principal, sticker, remate sobre fondos oscuros, contorno de foco y selección. Es el color de la acción: WhatsApp siempre va en amarillo o sobre amarillo.

### Secondary
- **Verde Petróleo** (petroleo): los arcos de la huella grande, el fondo de slides de pausa (misión/visión, audiovisual) y el remate y el trazo sobre hueso. También el caret de los campos y el foco del borde en el formulario.

### Neutral
- **Negro Feed** (negro): fondo por defecto del sitio, de la barra fija, del pie y de los slides de entrada. Texto sobre amarillo y hueso.
- **Hueso Cálido** (hueso): fondo de slides de lectura (método, contacto, nosotros) y texto sobre negro y petróleo.

### Variables por fondo
Cada fondo (`fondo-negro`, `fondo-hueso`, `fondo-amarillo`, `fondo-petroleo`) declara cuatro roles que los componentes heredan, así un mismo componente funciona en cualquier slide:
- **Remate / trazo:** amarillo sobre negro y petróleo; petróleo sobre hueso; negro sobre amarillo.
- **Calado:** el color del texto del fondo al 16% (20% sobre amarillo), solo para letras de fondo y líneas decorativas.
- **Texto suave:** el color del texto del fondo al 72–80%, para bajadas y datos secundarios.

### Named Rules
**The Slide Pleno Rule.** Una sección es un fondo pleno de la paleta y nada más. Nunca un gradiente, una imagen de fondo o un tinte intermedio; los componentes toman color de las variables del fondo, no de valores sueltos.

**The Turno Rule.** Dos slides seguidos no comparten fondo. El orden habitual alterna negro con hueso/amarillo/petróleo; el cierre de cada página es siempre amarillo.

## Typography

**Display Font:** Anton (con Impact, sans-serif)
**Remate Font:** Kaushan Script (con cursive)
**Body / Label Font:** Hanken Grotesk Variable (con la sans del sistema)

Las tres se sirven desde el proyecto (`@fontsource`), nunca desde un CDN.

**Character:** una condensada pesada que grita en mayúsculas como en los posts, cortada por un trazo de pincel que le agrega la mano y el humor; debajo, una grotesca limpia que lee sin hacer ruido.

### Hierarchy
- **Display** (Anton 400, mayúsculas, `clamp(3rem, min(8.4vw, 12.5vh), 7.6rem)` en el hero de Inicio y hasta `8.6rem` en los heros internos, interlineado 0.94, `text-wrap: balance`): el h1 de cada página.
- **Headline** (Anton 400, `clamp(3rem, 8vw, 7rem)` a `clamp(3.2rem, 9vw, 8rem)`): titular de cada slide y del cierre (hasta `9.5rem`).
- **Title** (Anton 400, `clamp(2.4rem, 5vw, 3.6rem)` a `clamp(2.6rem, 6.6vw, 6.2rem)`): titulares de servicio, pasos del método, bloques de contacto, nombres del equipo (`2.25rem`).
- **Remate** (Kaushan Script 400, 0.74em del titular, girado −6°, sin mayúsculas): la palabra final del titular, marcada en el CMS como `*así*`. Toma el color de remate del fondo.
- **Body** (Hanken Grotesk 400, 18–20px, interlineado ~1.6, `max-width` ~32–36rem): bajadas y textos en el color suave del fondo.
- **Label / Rótulo** (Hanken Grotesk 650, 0.72rem, tracking 0.26em, mayúsculas): rótulo de la cabecera de slide, navegación de escritorio, "Deslizá", etiquetas de campos y títulos de columna del pie.
- **Cifras** (números tabulares): contadores 1/N, estadísticas (Anton 1.5rem en amarillo), teléfono y timecode.

### Named Rules
**The Un Remate Rule.** Un titular lleva como mucho un remate manuscrito, al final o cerca del final. Kaushan Script no se usa para párrafos, botones ni navegación; fuera del titular solo aparece en stickers y en el "mkt" de la firma.

**The Gritar o Leer Rule.** Anton es para lo que se ve de lejos (titulares, botones, cintas, cifras, menú móvil); todo texto que se lee de corrido va en Hanken Grotesk. No hay pesos intermedios de Anton ni párrafos en mayúsculas.

## Layout

Contenedor de 1280px centrado con márgenes de 20px (móvil), 32px (tablet) y 48px (desktop). Cada slide arranca con su cabecera a 96px (112px desde `sm`) del borde superior para dejar lugar a la barra fija de 64px, y cierra con 96–128px abajo. Entre la cabecera y el titular hay un salto grande (64–128px): el titular "cae" en la mitad o el tercio inferior del slide, como en un post.

Los heros ocupan la pantalla (`min-h-svh` en Inicio, 80–88svh en las internas) con el titular abajo a la izquierda (`mt-auto`). Los slides de servicio son de pantalla completa con grilla de 12 columnas en desktop: texto en 7, gráfica en 5, alternando de lado; en móvil la gráfica se achica a 44–62% del ancho y se alinea a un costado, nunca centrada sobre el texto. La grilla de trabajos es un feed de 2 columnas (3 desde `lg`) con celdas cuadradas y 6–8px de separación.

Escenas fijadas (solo con movimiento): el hero de Inicio se fija ~1.5 pantallas (250svh) mientras la cámara atraviesa la huella; los servicios en Inicio son un carrusel horizontal fijado (n × 85svh + 100svh) con contador 1/N, puntos y "Deslizá →". Sin JS, con `prefers-reduced-motion` o con `?captura`, las mismas piezas quedan apiladas en vertical y completas.

### Named Rules
**The Abajo a la Izquierda Rule.** El titular de un slide de apertura se apoya abajo a la izquierda; arriba van solo la cabecera y, si corresponde, el sticker. Nada centrado.

**The Pila Completa Rule.** Toda escena fijada tiene que leerse entera como pila vertical sin movimiento. Si algo solo existe dentro de la animación, está mal.

## Elevation & Depth

El sistema es plano. No hay `box-shadow` en el sitio público. La profundidad se arma con tres recursos: el cambio de fondo pleno entre slides, letras gigantes caladas (solo contorno, al 16% del color de texto) que corren con paralaje detrás del contenido, y el contorno corrido, un borde de 2px sin relleno desplazado unas 0.3–0.4em hacia abajo-derecha detrás de botones y cintas. Es el recurso nativo de los posts de la marca, no una sombra: nunca lleva relleno ni desenfoque.

### Named Rules
**The Contorno Corrido Rule.** La única capa "debajo" de un elemento es un contorno de 2px en el color de trazo del fondo, desplazado y vacío. Al pasar el mouse o con foco, el contorno de los botones se acomoda debajo del botón (`translate(0,0)`); al apretar, se pasa al otro lado. Sin sombras blandas, sin gradientes, sin vidrio, sin `backdrop-filter`.

## Shapes

Esquinas rectas en todo: botones, cintas, campos, tarjetas de contacto, celdas del feed, visor. Lo único redondo son los círculos de la marca: stickers, el punto de la huella, los puntos del carrusel, la luz REC y el botón flotante de WhatsApp. Las líneas son de 2px (bordes de campos, reglas del método, divisores de contacto) o 3px (esquinas del visor). La huella se dibuja con trazo de 60 unidades y extremos redondeados.

La inclinación es parte de la forma: cintas a ±2°, remates a −6° (−3° en el método), texto de stickers a −12°. La inclinación va siempre en un envoltorio, para que el contorno corrido quede detrás.

### Named Rules
**The Recto o Círculo Rule.** No existen radios intermedios. Si no es un círculo de la marca, tiene esquinas rectas.

## Components

### Buttons
Rectángulo pleno que grita, con el contorno corrido detrás.
- **Shape:** esquinas rectas (0px).
- **Primary (amarillo):** fondo amarillo, texto negro, Anton en mayúsculas a 1.05rem con tracking 0.045em, padding 1.05em × 1.5em, ícono SVG a la izquierda o flecha a la derecha. Contorno de 2px en el trazo del fondo, corrido 0.38em.
- **Negro / Hueso:** misma forma; negro sobre slides amarillos y en el envío del formulario, hueso sobre negro.
- **Hover / Focus:** el contorno se desliza bajo el botón en 350ms con `cubic-bezier(.16,1,.3,1)`; el botón no se mueve. Al apretar, el contorno pasa −0.15em. Foco: contorno de 3px amarillo con 3px de separación (negro sobre slides amarillos).
- **Barra (variante chica):** en la barra de escritorio, botón amarillo compacto (Anton 0.875rem, padding 10px × 16px) sin contorno corrido; al pasar el mouse cambia a fondo hueso.
- **Enlace:** el acompañante del botón ("Ver qué hacemos", "Dejanos un mensaje"): Hanken Grotesk semibold 18px, subrayado de 2px en el color de trazo con 0.28em de separación; al pasar el mouse el subrayado toma el color del texto.

### Cinta (signature)
Etiqueta de servicio o valor, como las cintas pegadas de los posts.
- **Style:** Anton en mayúsculas, interlineado 1, padding .38em × .7em, fondo pleno (negro, hueso, amarillo o petróleo, siempre distinto del slide) con contorno corrido de 2px en el trazo del fondo.
- **Giro:** alterna −2° y +2° entre cintas vecinas. En listas, entran "pegándose" (escala 1.7 → 1 y giro, con rebote) una sola vez.

### Sticker (signature)
Círculo pleno con una palabra manuscrita ("hola!", "escribinos", "dale").
- **Style:** círculo amarillo con texto negro, negro con texto amarillo o petróleo con texto amarillo; Kaushan Script girado −12°. Decorativo (`aria-hidden`), nunca el único lugar de una acción.
- **Behavior:** en heros se pega una vez al entrar; en el cierre gira con el scroll.

### Cabecera de slide
La cabecera de los carruseles de la marca: rótulo a la izquierda (Hanken 650, 0.72rem, tracking 0.26em, mayúsculas) y huella chica de 28px a la derecha, en una fila. Abre cada slide; no se usa suelta como etiqueta encima de un titular.

### Huella
El símbolo, dibujado en SVG con `currentColor` para los arcos y amarillo para el punto. Grande y cortada por el borde en heros (petróleo sobre negro), chica en cabeceras y en la firma. Es la cámara del sitio: en el hero de Inicio los arcos se agrandan a distinta velocidad y el punto crece hasta cubrir la pantalla; en cierres y en Contacto se rearma desde grande hasta su tamaño.

### Pictogramas de servicio
Cuando un servicio no tiene imagen, su gráfica de los posts: signo de pregunta calado (estrategia), grilla de feed 3×3 que se llena de amarillo (redes), visor REC con timecode y luz que titila (audiovisual), cuadrados superpuestos petróleo/amarillo/hueso (diseño). Toman los colores del slide.

### Visor
Marco de cámara con esquinas en L de 3px × 36px en el color de trazo, alrededor de cualquier foto subida desde el CMS (servicios, método). Las fotos nunca van sueltas ni con esquinas redondeadas.

### Inputs / Fields
- **Style:** borde de 2px negro, esquinas rectas, fondo transparente sobre hueso, texto de 18px, padding 14px × 16px, placeholder negro al 70%. Etiqueta como rótulo encima.
- **Focus:** el borde pasa a petróleo, sin anillo; caret petróleo.
- **Error:** mensaje en bloque negro con texto amarillo semibold de 14px debajo del campo, enlazado con `aria-describedby`.
- **Enviado:** el formulario se reemplaza por un bloque amarillo con titular y remate.

### Navigation
- **Barra:** fija arriba, siempre negra, 64px de alto; se esconde al bajar y vuelve al subir (500ms, `cubic-bezier(.16,1,.3,1)`). Firma "huella + CHILO mkt" a la izquierda.
- **Escritorio:** enlaces como rótulos en hueso al 80%; el actual en amarillo con `aria-current`; botón chico de WhatsApp al final.
- **Móvil:** menú a pantalla completa como slide negro, enlaces en Anton de 3.75rem, WhatsApp en amarillo abajo de todo.
- **Pie:** slide negro con títulos de columna como rótulos amarillos y "CHILO MKT" calado gigante corriendo con paralaje.
- **WhatsApp flotante:** círculo negro de 56px con anillo y ícono amarillos, abajo a la derecha; se invierte al pasar el mouse.

## Do's and Don'ts

### Do:
- **Do** armar cada sección como un slide de fondo pleno (negro, hueso, amarillo o petróleo) que no repite el fondo del anterior, y cerrar cada página con el slide amarillo de cierre.
- **Do** escribir los titulares en Anton mayúsculas con un solo remate manuscrito marcado `*así*` desde el CMS.
- **Do** tomar remate, trazo, calado y texto suave de las variables del fondo en lugar de fijar colores en el componente.
- **Do** usar el contorno corrido de 2px (vacío, desplazado) en botones y cintas, y esquinas rectas en todo lo que no sea un círculo de la marca.
- **Do** enmarcar con el visor cualquier foto que llegue del CMS, y caer en el pictograma del servicio cuando no hay foto.
- **Do** dibujar los íconos como SVG inline con `currentColor` (redes, flechas, contacto); nunca glifos ni emojis.
- **Do** dejar que toda escena con movimiento se lea completa como pila vertical con `prefers-reduced-motion`.

### Don't:
- **Don't** usar sombras blandas, gradientes, vidrio ni `backdrop-filter` en el sitio público.
- **Don't** armar filas de tarjetas iguales con ícono, título y texto, ni centrar el hero: el titular va abajo a la izquierda.
- **Don't** mostrar logos de clientes en gris ni inventar métricas, resultados o testimonios.
- **Don't** usar radios intermedios (4–16px); o recto o círculo.
- **Don't** poner Kaushan Script en párrafos, botones o navegación, ni más de un remate por titular.
- **Don't** usar el rótulo como etiqueta suelta encima de un titular: solo vive en la cabecera de slide, junto a la huella chica, o como etiqueta de campo/columna.
- **Don't** traer al sitio público los colores `chilo.*`, Inter ni las utilidades `glass`/`animate-gradient`/`animate-float` del admin y el login.
