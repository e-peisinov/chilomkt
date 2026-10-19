/*
 * Las escenas del sitio público. Todas se arman por atributos data-* desde Blade
 * y viven dentro del gsap.context de movimiento.js (se revierten al navegar).
 * El HTML ya se ve completo sin esto: cada animación parte de un estado visible.
 */
import { gsap, ScrollTrigger } from './movimiento';

const todos = (sel, raiz = document) => gsap.utils.toArray(raiz.querySelectorAll(sel));

/* Hero: la cámara entra por la huella. Los arcos pasan de largo a distinta velocidad
   y el punto amarillo crece hasta ser el fondo de la sección siguiente. */
function escenaHuella(sec) {
    const escenario = sec.querySelector('[data-escenario]');
    const huella = sec.querySelector('[data-huella]');
    if (! escenario || ! huella) return;
    const arcos = todos('[data-arco]', huella);
    const punto = huella.querySelector('[data-punto]');

    // Cuánto hay que mover la huella para que su centro quede en el centro de la pantalla.
    const dx = () => escenario.clientWidth / 2 - (huella.offsetLeft + huella.offsetWidth / 2);
    const dy = () => escenario.clientHeight / 2 - (huella.offsetTop + huella.offsetHeight / 2);
    // El punto mide 47 de 680 unidades; tiene que tapar la diagonal entera.
    const tapa = () => (Math.hypot(escenario.clientWidth, escenario.clientHeight) / 2 + 40) / (47 * huella.offsetWidth / 680);

    const tl = gsap.timeline({
        defaults: { ease: 'none' },
        scrollTrigger: { trigger: sec, start: 'top top', end: 'bottom bottom', scrub: 0.8, invalidateOnRefresh: true },
    });

    tl.to(todos('[data-hero-sale]', sec), { y: -70, autoAlpha: 0, stagger: 0.03, duration: 0.28, ease: 'power2.in' }, 0)
        .to(huella, { x: dx, y: dy, duration: 0.45, ease: 'power2.inOut' }, 0);

    const escalas = [7, 10, 15];
    const giros = [-14, 22, -36];
    arcos.forEach((arco, i) => {
        tl.to(arco, { scale: escalas[i] ?? 12, rotation: giros[i] ?? 0, svgOrigin: '0 0', duration: 0.55, ease: 'power2.in' }, 0.06 + i * 0.05)
            .to(arco, { autoAlpha: 0, duration: 0.14 }, 0.5 + i * 0.05);
    });
    tl.to(punto, { scale: tapa, svgOrigin: '0 0', duration: 0.5, ease: 'power3.in' }, 0.36)
        .to(todos('[data-hero-fijo]', sec), { autoAlpha: 0, duration: 0.15 }, 0.5);

    // Con mouse, los arcos siguen apenas al puntero: la huella está viva.
    if (window.matchMedia('(pointer: fine)').matches) {
        const seguidores = arcos.map((arco, i) => ({
            x: gsap.quickTo(arco, 'x', { duration: 0.9 + i * 0.25, ease: 'power3.out' }),
            y: gsap.quickTo(arco, 'y', { duration: 0.9 + i * 0.25, ease: 'power3.out' }),
        }));
        const mover = (e) => {
            const nx = e.clientX / window.innerWidth - 0.5;
            const ny = e.clientY / window.innerHeight - 0.5;
            seguidores.forEach((s, i) => { s.x(nx * (i + 1) * 9); s.y(ny * (i + 1) * 9); });
        };
        escenario.addEventListener('pointermove', mover);
        return () => escenario.removeEventListener('pointermove', mover);
    }
}

/* Pictogramas de cada servicio (los de los posts). `st` agrega el disparador
   (dentro del carrusel horizontal usa containerAnimation). */
function animarPictograma(el, st) {
    const tipo = el.dataset.pictograma;
    const disparo = { trigger: el, start: 'top 85%', end: 'center 45%', scrub: 0.6, ...st };

    if (tipo === 'estrategia') {
        gsap.from(el.querySelector('[data-signo]'), { scale: 0.55, rotation: -18, transformOrigin: '50% 60%', ease: 'none', scrollTrigger: disparo });
    } else if (tipo === 'redes') {
        const celdas = todos('[data-celda]', el);
        gsap.timeline({ scrollTrigger: disparo })
            .to(celdas, { backgroundColor: '#FFB43A', borderColor: '#FFB43A', stagger: 0.12, duration: 0.2, ease: 'none' });
    } else if (tipo === 'audiovisual') {
        gsap.from(el.querySelector('[data-foco]'), { scale: 1.35, autoAlpha: 0.2, ease: 'none', scrollTrigger: disparo });
    } else if (tipo === 'diseno') {
        const [a, b, c] = todos('[data-pieza]', el);
        gsap.timeline({ defaults: { ease: 'none' }, scrollTrigger: disparo })
            .from(a, { xPercent: 40, yPercent: -30 }, 0)
            .from(b, { xPercent: -45, yPercent: 35, rotation: 8 }, 0)
            .from(c, { xPercent: -60, yPercent: 60 }, 0);
    }
}

/* Servicios como carrusel de Instagram: la pista avanza en horizontal con el scroll. */
function escenaCarrusel(sec) {
    const pista = sec.querySelector('[data-pista]');
    const slides = todos('[data-slide]', sec);
    if (! pista || slides.length < 2) return;
    const contador = sec.querySelector('[data-contador]');
    const puntos = todos('[data-punto-carrusel]', sec);
    const n = slides.length;
    let actual = -1;

    const recorrido = gsap.to(pista, {
        x: () => -(pista.scrollWidth - window.innerWidth),
        ease: 'none',
        scrollTrigger: {
            trigger: sec,
            start: 'top top',
            end: 'bottom bottom',
            scrub: 0.6,
            invalidateOnRefresh: true,
            onUpdate: (self) => {
                const i = Math.min(n - 1, Math.round(self.progress * (n - 1)));
                if (i === actual) return;
                actual = i;
                if (contador) contador.textContent = `${i + 1}/${n}`;
                puntos.forEach((p, j) => p.classList.toggle('bg-current', j === i));
            },
        },
    });

    todos('[data-pictograma]', sec).forEach((el) => animarPictograma(el, {
        containerAnimation: recorrido, start: 'left 85%', end: 'center 55%',
    }));
    todos('[data-slide-texto]', sec).forEach((el, i) => {
        if (i === 0) return;
        gsap.from(el, { x: 120, autoAlpha: 0, ease: 'none', scrollTrigger: { trigger: el, containerAnimation: recorrido, start: 'left 95%', end: 'left 45%', scrub: 0.5 } });
    });
}

/* El método: la regla se traza y el remate manuscrito se escribe de izquierda a derecha. */
function escenaMetodo(fila) {
    const regla = fila.querySelector('[data-regla]');
    const remate = todos('.remate', fila);
    const titulo = fila.querySelector('[data-paso]');
    gsap.timeline({ defaults: { ease: 'none' }, scrollTrigger: { trigger: fila, start: 'top 88%', end: 'top 50%', scrub: 0.6 } })
        .from(regla, { scaleX: 0, transformOrigin: '0 50%' }, 0)
        .from(titulo, { xPercent: -8, autoAlpha: 0.15 }, 0)
        .fromTo(remate, { clipPath: 'inset(-20% 100% -20% 0)' }, { clipPath: 'inset(-20% -5% -20% 0)' }, 0.2);
}

/* Cierre: la huella se rearma desde grande hasta tamaño logo (zoom-out). */
function escenaRearma(el) {
    const arcos = todos('[data-arco]', el);
    const punto = el.querySelector('[data-punto]');
    const tl = gsap.timeline({ defaults: { ease: 'none' }, scrollTrigger: { trigger: el, start: 'top 95%', end: 'center 50%', scrub: 0.7 } });
    arcos.forEach((arco, i) => tl.from(arco, { scale: 4 + i * 2.5, autoAlpha: 0, rotation: i % 2 ? 40 : -40, svgOrigin: '0 0' }, i * 0.08));
    if (punto) tl.from(punto, { scale: 0, svgOrigin: '0 0' }, 0.3);
}

/* Código de tiempo del visor REC: corre mientras está en pantalla. */
function relojVisor(el) {
    let cuadro = 0;
    let id = null;
    const dos = (v) => String(v).padStart(2, '0');
    const pintar = () => {
        cuadro++;
        const s = Math.floor(cuadro / 24);
        el.textContent = `${dos(Math.floor(s / 3600))}:${dos(Math.floor(s / 60) % 60)}:${dos(s % 60)}:${dos(cuadro % 24)}`;
    };
    const st = ScrollTrigger.create({
        trigger: el.closest('[data-pictograma]') ?? el,
        onToggle: (self) => {
            clearInterval(id);
            if (self.isActive) id = setInterval(pintar, 1000 / 24);
        },
    });
    return () => { clearInterval(id); st.kill(); };
}

export function armarEscenas() {
    const limpiezas = [];

    todos('[data-escena="huella"]').forEach((sec) => {
        const fin = escenaHuella(sec);
        if (fin) limpiezas.push(fin);
    });

    // El carrusel solo es horizontal cuando hay lugar para fijarlo; si no, va apilado.
    todos('[data-escena="carrusel"]').forEach(escenaCarrusel);
    todos('[data-pictograma]').forEach((el) => {
        if (! el.closest('[data-escena="carrusel"]')) animarPictograma(el, {});
    });

    todos('[data-metodo-fila]').forEach(escenaMetodo);
    todos('[data-rearma]').forEach(escenaRearma);
    todos('[data-timecode]').forEach((el) => limpiezas.push(relojVisor(el)));

    // Cintas de texto que corren en sentidos opuestos con el scroll.
    todos('[data-cinta]').forEach((el) => {
        const sentido = Number(el.dataset.cinta) || -1;
        gsap.fromTo(el, { xPercent: sentido < 0 ? 0 : -30 }, { xPercent: sentido < 0 ? -30 : 0, ease: 'none', scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: true } });
    });

    // Letras caladas de fondo: se desplazan más lento que el resto (profundidad).
    todos('[data-paralaje]').forEach((el) => {
        const [eje, valor] = (el.dataset.paralaje || 'y:-20').split(':');
        gsap.to(el, { [eje === 'x' ? 'xPercent' : 'yPercent']: Number(valor), ease: 'none', scrollTrigger: { trigger: el.parentElement, start: 'top bottom', end: 'bottom top', scrub: true } });
    });

    // Stickers y cintas que se pegan al entrar.
    todos('[data-pega]').forEach((el, i) => {
        gsap.from(el, { scale: 1.7, rotation: i % 2 ? 18 : -18, autoAlpha: 0, duration: 0.7, ease: 'back.out(2.2)', scrollTrigger: { trigger: el, start: 'top 90%', once: true } });
    });

    // Stickers circulares que giran con el scroll.
    todos('[data-gira]').forEach((el) => {
        gsap.to(el, { rotation: Number(el.dataset.gira) || 120, ease: 'none', scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: 0.5 } });
    });

    // Bloques que entran escalonados (texto de cada slide).
    todos('[data-entra]').forEach((el) => {
        gsap.from(el.children, { y: 34, autoAlpha: 0, duration: 0.9, stagger: 0.08, ease: 'expo.out', scrollTrigger: { trigger: el, start: 'top 86%', once: true } });
    });

    // Grilla del feed: cada posteo aparece como si se subiera.
    todos('[data-feed]').forEach((el) => {
        gsap.from(el.children, { scale: 0.86, autoAlpha: 0, duration: 0.7, stagger: { each: 0.07, from: 'start' }, ease: 'expo.out', scrollTrigger: { trigger: el, start: 'top 82%', once: true } });
    });

    // El cero gigante de "arrancamos de cero" se dibuja de abajo hacia arriba.
    todos('[data-dibuja]').forEach((el) => {
        gsap.fromTo(el, { clipPath: 'inset(100% 0 0 0)' }, { clipPath: 'inset(0% 0 0 0)', ease: 'none', scrollTrigger: { trigger: el.parentElement, start: 'top 80%', end: 'center 50%', scrub: 0.6 } });
    });

    return () => limpiezas.forEach((f) => f?.());
}
