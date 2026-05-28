<?php

use App\Models\Seccion;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $secciones = [
            ['pagina' => 'home', 'clave' => 'inicio_estadisticas', 'contenido' => json_encode([
                ['valor' => '50+', 'etiqueta' => 'Clientes activos'],
                ['valor' => '200%', 'etiqueta' => 'ROI promedio'],
                ['valor' => '5+', 'etiqueta' => 'Anos de experiencia'],
            ])],
            ['pagina' => 'home', 'clave' => 'inicio_proceso', 'titulo' => 'Un proceso pensado para resultados reales', 'subtitulo' => 'Como trabajamos', 'contenido' => json_encode([
                ['num' => '01', 'titulo' => 'Analisis & Estrategia', 'descripcion' => 'Estudiamos tu marca, tu audiencia y tu competencia para crear un plan a medida.'],
                ['num' => '02', 'titulo' => 'Ejecucion Creativa', 'descripcion' => 'Disenamos contenido visual impactante y campanas que conectan con tu publico.'],
                ['num' => '03', 'titulo' => 'Optimizacion Continua', 'descripcion' => 'Medimos, ajustamos y escalamos para maximizar tu retorno de inversion.'],
                ['num' => '04', 'titulo' => 'Crecimiento & Mentalidad', 'descripcion' => 'Te acompanamos con coaching para que tu mentalidad acompane el crecimiento del negocio.'],
            ])],
            ['pagina' => 'home', 'clave' => 'inicio_testimonios', 'titulo' => 'Lo que dicen nuestros clientes', 'subtitulo' => 'Historias reales de crecimiento y transformacion.'],
            ['pagina' => 'home', 'clave' => 'inicio_cta', 'titulo' => 'Listo para el proximo nivel?', 'subtitulo' => 'Agenda una consulta gratuita y descubri como podemos transformar tu marca con estrategia y mentalidad.', 'contenido' => 'Empecemos ahora'],
            ['pagina' => 'nosotros', 'clave' => 'nosotros_historia', 'titulo' => 'Mas que una agencia, somos tu aliado estrategico', 'subtitulo' => 'Nuestra historia'],
            ['pagina' => 'nosotros', 'clave' => 'nosotros_estadisticas', 'contenido' => json_encode([
                ['valor' => '5+', 'etiqueta' => 'Anos'],
                ['valor' => '150+', 'etiqueta' => 'Proyectos'],
                ['valor' => '50+', 'etiqueta' => 'Clientes'],
            ])],
            ['pagina' => 'nosotros', 'clave' => 'nosotros_valores', 'titulo' => 'Nuestros Valores', 'subtitulo' => 'Lo que nos define', 'contenido' => json_encode([
                ['icono' => 'shield', 'titulo' => 'Transparencia', 'descripcion' => 'Comunicacion clara y resultados medibles.'],
                ['icono' => 'bolt', 'titulo' => 'Innovacion', 'descripcion' => 'Siempre a la vanguardia del marketing digital.'],
                ['icono' => 'heart', 'titulo' => 'Pasion', 'descripcion' => 'Amamos lo que hacemos y se nota en cada proyecto.'],
                ['icono' => 'users', 'titulo' => 'Compromiso', 'descripcion' => 'Tu exito es nuestro exito. Asi de simple.'],
            ])],
            ['pagina' => 'nosotros', 'clave' => 'nosotros_equipo_intro', 'titulo' => 'Las personas detras de ChiloMkt', 'subtitulo' => 'Profesionales apasionados que hacen posible la magia.'],
            ['pagina' => 'nosotros', 'clave' => 'nosotros_cta', 'titulo' => 'Queres trabajar con nosotros?', 'subtitulo' => 'Contanos sobre tu proyecto y veamos como podemos ayudarte.', 'contenido' => 'Hablemos'],
            ['pagina' => 'servicios', 'clave' => 'servicios_hero', 'titulo' => 'Nuestros Servicios', 'subtitulo' => 'Soluciones integrales de marketing digital y mentalidad para hacer crecer tu negocio.'],
            ['pagina' => 'servicios', 'clave' => 'servicios_cta', 'titulo' => 'Necesitas algo personalizado?', 'subtitulo' => 'Cada negocio es unico. Contanos que necesitas y armamos una propuesta a tu medida.', 'contenido' => 'Solicitar presupuesto'],
        ];

        foreach ($secciones as $seccion) {
            Seccion::firstOrCreate(['clave' => $seccion['clave']], $seccion);
        }
    }

    public function down(): void
    {
        Seccion::whereIn('clave', [
            'inicio_estadisticas', 'inicio_proceso', 'inicio_testimonios', 'inicio_cta',
            'nosotros_historia', 'nosotros_estadisticas', 'nosotros_valores', 'nosotros_equipo_intro', 'nosotros_cta',
            'servicios_hero', 'servicios_cta',
        ])->delete();
    }
};
