<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Seccion;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

/**
 * Contenido alineado a la nueva identidad de CHILO (posts de Instagram, oct 2026).
 * En los títulos, lo que va entre *asteriscos* se muestra como remate manuscrito.
 * Los servicios anteriores no se borran: quedan inactivos.
 */
class MarcaChiloSeeder extends Seeder
{
    public function run(): void
    {
        $configuraciones = [
            'nombre_sitio' => 'CHILO',
            'logo_texto' => 'CHILO',
            'slogan' => 'Estudio de marketing y contenido',
            'direccion' => 'Mercedes, Buenos Aires',
            'instagram' => 'https://www.instagram.com/chilo.mkt/',
        ];

        foreach ($configuraciones as $clave => $valor) {
            Configuracion::updateOrCreate(['clave' => $clave], ['valor' => $valor]);
        }

        $json = fn (array $datos) => json_encode($datos, JSON_UNESCAPED_UNICODE);

        $secciones = [
            'hero' => ['inicio', 'Que tu negocio se vea, se elija *y crezca.*', 'Somos CHILO, un estudio de marketing y contenido de Mercedes. Nada de fórmulas mágicas ni contenido genérico: primero entendemos tu marca, después armamos un plan y recién ahí creamos.', null],
            'inicio_estadisticas' => ['inicio', null, null, $json([
                ['valor' => '2', 'etiqueta' => 'personas que se animaron'],
                ['valor' => '2', 'etiqueta' => 'cámaras y un drone'],
                ['valor' => '1', 'etiqueta' => 'método antes que improvisación'],
            ])],
            'servicios_intro' => ['inicio', 'Lo que hacemos *por tu marca*', 'De la idea al posteo: estrategia, contenido y producción, todo en un solo lugar.', null],
            'clientes_intro' => ['inicio', 'Marcas que *se animaron*', 'Algunas de las marcas con las que trabajamos.', null],
            'inicio_proceso' => ['inicio', 'Método antes que *improvisación*', 'Primero entendemos tu marca, después armamos un plan y recién ahí creamos.', $json([
                ['num' => '01', 'titulo' => 'Escuchamos', 'descripcion' => '*dónde estás.* Entendemos tu negocio, a quién le hablás y qué necesitás.'],
                ['num' => '02', 'titulo' => 'Planificamos', 'descripcion' => '*a tu medida.* Pilares de contenido y un calendario con objetivos claros.'],
                ['num' => '03', 'titulo' => 'Creamos', 'descripcion' => '*con criterio.* Fotos, video, diseño y textos que cuentan tu marca.'],
            ])],
            'inicio_cta' => ['inicio', '¿Tu marca *se anima?*', 'Escribinos y lo charlamos. Contanos de tu marca y te armamos una propuesta.', 'Escribinos'],

            'nosotros_hero' => ['nosotros', 'Somos dos que se *animaron.*', 'Y hoy ayudamos a otras marcas a animarse.', null],
            'nosotros_historia' => ['nosotros', 'Arrancamos *de cero*', 'Por qué existimos', 'Queríamos vivir de algo propio. Hoy ayudamos a emprendedores y marcas a que su negocio se vea, se elija y crezca. Hace rato que les decimos a nuestros clientes que la imagen importa, así que también lo aplicamos en casa: nuevo logo, nuevos colores y una huella como símbolo.'],
            'nosotros_estadisticas' => ['nosotros', '', '', $json([
                ['valor' => '2', 'etiqueta' => 'personas'],
                ['valor' => '2', 'etiqueta' => 'cámaras'],
                ['valor' => '1', 'etiqueta' => 'drone'],
            ])],
            'mision' => ['nosotros', 'Misión', null, 'Ayudar a que los negocios de nuestra zona se vean, se elijan y crezcan, con estrategia y contenido hecho a medida.'],
            'vision' => ['nosotros', 'Visión', null, 'Que cada marca con la que trabajamos tenga una identidad propia que se reconozca a primera vista.'],
            'nosotros_valores' => ['nosotros', '¿Por qué *una huella?*', 'Porque cada marca tiene algo que nadie más tiene. Nuestro laburo es encontrarlo y hacer que se vea.', $json([
                ['icono' => 'shield', 'titulo' => 'Criterio', 'descripcion' => 'Nada de contenido genérico: cada pieza tiene un por qué.'],
                ['icono' => 'bolt', 'titulo' => 'Método', 'descripcion' => 'Escuchamos, planificamos y recién ahí creamos.'],
                ['icono' => 'heart', 'titulo' => 'Constancia', 'descripcion' => 'Tu cuenta activa todos los meses, no cuando sobra un rato.'],
                ['icono' => 'users', 'titulo' => 'Cercanía', 'descripcion' => 'Somos de acá: charlamos cara a cara y por DM.'],
            ])],
            'nosotros_equipo_intro' => ['nosotros', 'Las caras *detrás de CHILO*', 'Dos personas, dos cámaras, un drone y muchas ganas de que tu marca se vea.', null],
            'nosotros_cta' => ['nosotros', '¿Laburamos *juntos?*', 'Contanos de tu marca y vemos cómo ayudarte.', 'Escribinos'],

            'servicios_hero' => ['servicios', 'Lo que hacemos *por tu marca*', 'Estrategia, manejo de redes, producción audiovisual y diseño. Todo en un solo lugar, siempre con criterio.', 'Subir contenido es fácil. Lo difícil es que *sirva para algo.*'],
            'servicios_cta' => ['servicios', '¿Arrancamos?', 'Escribinos, contanos de tu marca y te armamos una propuesta.', 'Escribinos'],

            'contacto_hero' => ['contacto', 'Escribinos y *lo charlamos*', 'Contanos de tu marca: qué hacés, a quién le hablás y qué te gustaría lograr. Te respondemos a la brevedad.', null],
        ];

        foreach ($secciones as $clave => [$pagina, $titulo, $subtitulo, $contenido]) {
            Seccion::updateOrCreate(['clave' => $clave], [
                'pagina' => $pagina,
                'titulo' => $titulo,
                'subtitulo' => $subtitulo,
                'contenido' => $contenido,
            ]);
        }

        // Servicios: los cuatro de los posts. La descripción lleva el titular en la primera línea.
        $servicios = [
            ['Estrategia', 'estrategia', "Antes de subir algo, sabemos *por qué.*\nDiagnóstico, a quién le hablás, pilares de contenido y un calendario con objetivos claros."],
            ['Manejo de redes', 'redes', "Tu cuenta, con *constancia.*\nPosteos, historias, textos y programación, todos los meses."],
            ['Producción audiovisual', 'audiovisual', "Fotos, video *y drone.*\nDos cámaras, drone y un fotógrafo profesional. Contenido con contexto real, no genérico."],
            ['Diseño y edición', 'diseno', "Una estética que se *reconoce.*\nEdición de fotos y videos, creativos y piezas para que tu feed no se parezca al de nadie."],
        ];

        $titulos = array_column($servicios, 0);
        Servicio::whereNotIn('titulo', $titulos)->update(['activo' => false]);

        foreach ($servicios as $orden => [$titulo, $icono, $descripcion]) {
            Servicio::updateOrCreate(['titulo' => $titulo], [
                'icono' => $icono,
                'descripcion' => $descripcion,
                'orden' => $orden + 1,
                'activo' => true,
            ]);
        }
    }
}
