/*
 * Sitio público CHILO: movimiento con el scroll (GSAP + ScrollTrigger + Lenis).
 * Se carga solo desde layouts/publica; el admin no lo usa.
 */
import { iniciarMovimiento, frenarScroll } from './publica/movimiento';
import { armarEscenas } from './publica/escenas';

window.chilo = { frenarScroll };

iniciarMovimiento(armarEscenas);
