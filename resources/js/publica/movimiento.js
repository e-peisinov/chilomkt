/*
 * Movimiento del sitio público (portado de donbigo): scroll suave con Lenis y
 * animaciones atadas al scroll con GSAP ScrollTrigger.
 *
 * Con movimiento reducido (o `?captura`, para las capturas de revisión) no hay
 * scroll suave ni animaciones: el sitio se ve completo sin ellas. Las páginas
 * navegan con `wire:navigate`, así que lo que depende de la página se arma en
 * `livewire:navigated` y se desarma antes de cambiar de página.
 */
import Lenis from 'lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Se lee una vez al cargar: una navegación de Livewire puede llevarse `?captura`.
const QUIETO = window.matchMedia('(prefers-reduced-motion: reduce)').matches
    || new URLSearchParams(window.location.search).has('captura');

export const quieto = () => QUIETO;

let lenis = null;

/** Lleva a un ancla o a un elemento, con margen por la barra fija. */
export function irA(destino) {
    const el = typeof destino === 'string' ? document.querySelector(destino) : destino;
    if (! el) return;
    const aire = document.querySelector('[data-barra]')?.offsetHeight ?? 0;

    if (lenis) {
        lenis.scrollTo(el, { offset: -aire, duration: 1.4 });
    } else {
        window.scrollTo({ top: el.getBoundingClientRect().top + window.scrollY - aire, behavior: quieto() ? 'auto' : 'smooth' });
    }
}

/** El menú móvil abierto frena el scroll de la página. */
export function frenarScroll(frenar) {
    document.documentElement.style.overflow = frenar ? 'hidden' : '';
    if (lenis) frenar ? lenis.stop() : lenis.start();
}

/**
 * Arranca el scroll suave una vez y llama a `armar()` en cada página. Lo que
 * `armar` crea adentro del `gsap.context` se revierte solo al navegar. Después
 * de cada redibujo de Livewire (el formulario de contacto) se recalculan los
 * disparadores.
 */
export function iniciarMovimiento(armar) {
    // Enlaces a un ancla de la misma página.
    document.addEventListener('click', (e) => {
        const a = e.target.closest('a[href*="#"]');
        if (! a || a.pathname !== location.pathname) return;
        const destino = a.hash;
        if (! destino || destino.length < 2 || ! document.querySelector(destino)) return;
        e.preventDefault();
        irA(destino);
    });

    if (! quieto()) {
        lenis = new Lenis({ lerp: 0.1 });
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((t) => lenis.raf(t * 1000));
        gsap.ticker.lagSmoothing(0);
    }

    let contexto = null;
    let pendiente = null;
    // Atrás/adelante del navegador: ahí sí se respeta la posición que restaura Livewire.
    let desdeHistorial = false;

    const montar = () => {
        const html = document.documentElement;
        // wire:navigate copia los atributos del <html> de la página nueva y se lleva estas clases.
        if (lenis) html.classList.add('lenis');
        html.classList.toggle('movimiento', ! quieto());
        contexto?.revert();
        frenarScroll(false);

        // Lenis guarda su propia posición y la volvería a aplicar sobre la página nueva:
        // una página nueva arranca arriba (o en su ancla); el historial, donde lo dejó Livewire.
        if (lenis) {
            lenis.resize();
            const destino = desdeHistorial ? window.scrollY : 0;
            lenis.scrollTo(destino, { immediate: true, force: true });
        }
        if (! desdeHistorial && location.hash.length > 1) {
            requestAnimationFrame(() => irA(location.hash));
        }
        desdeHistorial = false;

        if (quieto()) return;
        contexto = gsap.context(() => armar());
        requestAnimationFrame(() => ScrollTrigger.refresh());
    };

    document.addEventListener('livewire:navigate', (e) => {
        desdeHistorial = Boolean(e.detail?.history);
    });

    document.addEventListener('livewire:navigating', () => {
        contexto?.revert();
        contexto = null;
    });
    document.addEventListener('livewire:navigated', montar);
    document.fonts?.ready.then(() => ScrollTrigger.refresh());

    document.addEventListener('livewire:init', () => {
        window.Livewire.hook('morphed', () => {
            clearTimeout(pendiente);
            pendiente = setTimeout(() => ScrollTrigger.refresh(), 30);
        });
    });
}

export { gsap, ScrollTrigger };
