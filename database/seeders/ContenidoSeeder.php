<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Configuracion;
use App\Models\MiembroEquipo;
use App\Models\Seccion;
use App\Models\Servicio;
use App\Models\Testimonio;
use Illuminate\Database\Seeder;

class ContenidoSeeder extends Seeder
{
    public function run(): void
    {
        // Configuraciones globales
        $configs = [
            'nombre_sitio' => 'ChiloMkt',
            'slogan' => 'Marketing Digital & Mentalidad',
            'logo_texto' => 'ChiloMkt',
            'logo_modo' => 'ambos',
            'logo_imagen' => '',
            'email' => 'hola@chilomkt.com',
            'telefono' => '+54 9 11 1234-5678',
            'instagram' => 'https://instagram.com/chilomkt',
            'facebook' => 'https://facebook.com/chilomkt',
            'linkedin' => 'https://linkedin.com/company/chilomkt',
            'whatsapp' => '5491112345678',
            'direccion' => 'Buenos Aires, Argentina',
        ];

        foreach ($configs as $clave => $valor) {
            Configuracion::updateOrCreate(['clave' => $clave], ['valor' => $valor]);
        }

        // Secciones editables
        $secciones = [
            [
                'pagina' => 'home',
                'clave' => 'hero',
                'titulo' => 'Estrategia, hábitos y crecimiento real para tu negocio',
                'subtitulo' => 'Somos ChiloMkt, tu agencia de marketing digital con enfoque en mentalidad empresarial.',
                'contenido' => 'Transformamos marcas con estrategias digitales inteligentes y un mindset orientado al crecimiento sostenible.',
            ],
            [
                'pagina' => 'home',
                'clave' => 'servicios_intro',
                'titulo' => 'Nuestros Servicios',
                'subtitulo' => 'Soluciones integrales para hacer crecer tu negocio en el mundo digital.',
            ],
            [
                'pagina' => 'home',
                'clave' => 'clientes_intro',
                'titulo' => 'Clientes que confían en nosotros',
                'subtitulo' => 'Empresas y emprendedores que eligieron crecer con ChiloMkt.',
            ],
            [
                'pagina' => 'nosotros',
                'clave' => 'nosotros_hero',
                'titulo' => 'Sobre Nosotros',
                'subtitulo' => 'Conoce al equipo detrás de ChiloMkt.',
                'contenido' => 'Somos un equipo apasionado por el marketing digital y el desarrollo de mentalidad empresarial. Creemos que el éxito de un negocio no solo depende de las estrategias, sino también de la mentalidad de quienes lo lideran. Por eso combinamos lo mejor de ambos mundos para ofrecerte resultados reales y sostenibles.',
            ],
            [
                'pagina' => 'nosotros',
                'clave' => 'mision',
                'titulo' => 'Nuestra misión',
                'contenido' => 'Impulsar el crecimiento de negocios a través de estrategias digitales efectivas y el desarrollo de una mentalidad ganadora.',
            ],
            [
                'pagina' => 'nosotros',
                'clave' => 'vision',
                'titulo' => 'Nuestra visión',
                'contenido' => 'Ser la agencia de referencia que transforma negocios combinando marketing digital de alto impacto con coaching de mentalidad empresarial.',
            ],
            [
                'pagina' => 'contacto',
                'clave' => 'contacto_hero',
                'titulo' => 'Contactanos',
                'subtitulo' => 'Estamos listos para ayudarte a llevar tu negocio al siguiente nivel.',
                'contenido' => 'Completa el formulario y nos pondremos en contacto contigo a la brevedad.',
            ],
        ];

        foreach ($secciones as $seccion) {
            Seccion::updateOrCreate(['clave' => $seccion['clave']], $seccion);
        }

        // Servicios
        $servicios = [
            ['titulo' => 'Gestión de redes sociales', 'descripcion' => 'Creamos y gestionamos contenido estratégico para tus redes sociales, aumentando tu visibilidad y engagement con tu audiencia.', 'icono' => 'share', 'orden' => 1],
            ['titulo' => 'Publicidad Digital', 'descripcion' => 'Campañas publicitarias en Facebook, Instagram y Google Ads optimizadas para maximizar tu retorno de inversión.', 'icono' => 'megaphone', 'orden' => 2],
            ['titulo' => 'Diseño web', 'descripcion' => 'Sitios web modernos, rápidos y optimizados para convertir visitantes en clientes.', 'icono' => 'globe', 'orden' => 3],
            ['titulo' => 'Coaching de Mentalidad', 'descripcion' => 'Desarrollo de hábitos y mentalidad empresarial para líderes que buscan crecimiento real y sostenible.', 'icono' => 'brain', 'orden' => 4],
            ['titulo' => 'Email Marketing', 'descripcion' => 'Estrategias de email marketing automatizadas para nutrir leads y fidelizar clientes.', 'icono' => 'envelope', 'orden' => 5],
            ['titulo' => 'Branding', 'descripcion' => 'Construcción y fortalecimiento de marca con identidad visual coherente y memorable.', 'icono' => 'palette', 'orden' => 6],
        ];

        foreach ($servicios as $servicio) {
            Servicio::updateOrCreate(['titulo' => $servicio['titulo']], $servicio);
        }

        // Clientes
        $clientes = [
            ['nombre' => 'TechFlow', 'descripcion' => 'Startup tecnológica', 'orden' => 1],
            ['nombre' => 'Verde Orgánico', 'descripcion' => 'Tienda de productos naturales', 'orden' => 2],
            ['nombre' => 'FitLife Gym', 'descripcion' => 'Cadena de gimnasios', 'orden' => 3],
            ['nombre' => 'Casa del Café', 'descripcion' => 'Cafetería gourmet', 'orden' => 4],
            ['nombre' => 'ModaBA', 'descripcion' => 'Marca de indumentaria', 'orden' => 5],
            ['nombre' => 'Dr. Martínez', 'descripcion' => 'Consultorio odontológico', 'orden' => 6],
        ];

        foreach ($clientes as $cliente) {
            Cliente::updateOrCreate(['nombre' => $cliente['nombre']], $cliente);
        }

        // Testimonios
        $testimonios = [
            ['nombre' => 'María López', 'cargo' => 'CEO', 'empresa' => 'TechFlow', 'contenido' => 'ChiloMkt transformó nuestra presencia digital. En 3 meses triplicamos nuestros leads y el equipo siempre estuvo disponible para guiarnos.', 'orden' => 1],
            ['nombre' => 'Carlos Ruiz', 'cargo' => 'Fundador', 'empresa' => 'FitLife Gym', 'contenido' => 'No solo mejoraron nuestro marketing, sino que el coaching de mentalidad cambió mi forma de liderar el negocio. Resultados increíbles.', 'orden' => 2],
            ['nombre' => 'Ana García', 'cargo' => 'Directora', 'empresa' => 'Verde Orgánico', 'contenido' => 'Profesionales, creativos y comprometidos. ChiloMkt entendió nuestra visión desde el primer día y los resultados hablan por sí solos.', 'orden' => 3],
        ];

        foreach ($testimonios as $testimonio) {
            Testimonio::updateOrCreate(['nombre' => $testimonio['nombre']], $testimonio);
        }

        // Miembros del equipo
        $miembros = [
            ['nombre' => 'Chilo', 'cargo' => 'Fundador & Director Creativo', 'bio' => 'Apasionado por el marketing digital y el desarrollo personal. Más de 5 años ayudando a negocios a crecer con estrategia y mentalidad.', 'orden' => 1],
            ['nombre' => 'Equipo Creativo', 'cargo' => 'Diseño & Contenido', 'bio' => 'Nuestro equipo de diseñadores y creadores de contenido trabaja para darle vida a tu marca en el mundo digital.', 'orden' => 2],
            ['nombre' => 'Equipo Estrategia', 'cargo' => 'Marketing & Publicidad', 'bio' => 'Especialistas en campañas publicitarias, SEO y estrategias de crecimiento digital medible.', 'orden' => 3],
        ];

        foreach ($miembros as $miembro) {
            MiembroEquipo::updateOrCreate(['nombre' => $miembro['nombre']], $miembro);
        }
    }
}
