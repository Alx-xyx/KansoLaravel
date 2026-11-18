<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $productoId = Producto::where('nombre', 'Cuaderno Tomoe River') -> value('producto_id');

        Blog::create([
            'titulo' => 'Por que amamos el papel Tomoe River?',
            'contenido' => 'Un repaso por la historia y las ventajas de este papel...',
            'imagen' => 'blog-tomoe.jpg',
        ]);
$lapiceraId = Producto::where('nombre', 'Lapicera Pilot Juice Up')->value('producto_id');

Blog::create([
    'titulo' => 'Escribir sin manchas: la lapicera de gel que cambió mi escritorio',
    'contenido' =>'En Japón, la papelería no es un detalle menor: es una forma de entender el día a día. Cada lapicera se diseña pensando en un gesto muy concreto, el de escribir rápido, tomar apuntes sin pensar en el instrumento y seguir adelante. La Pilot Juice Up es un buen ejemplo de esa filosofía.
    Lo primero que se nota es la tinta de gel de secado rápido. Quienes escribimos con la mano izquierda, o quienes anotan apurados en reuniones y clases, sabemos lo molesto que es arrastrar la palma y terminar con la hoja manchada. Con esta lapicera, el trazo se asienta enseguida y el papel queda limpio, incluso al escribir de corrido.
    La punta fina permite una línea precisa y constante. Es ideal para esas anotaciones pequeñas en los márgenes, para listas de tareas o para dibujar esquemas prolijos en un cuaderno. Además, el agarre es cómodo y liviano, así que se puede escribir durante un buen rato sin que la mano se canse.
    Otro punto a favor es la variedad de colores. Usar tonos distintos para títulos, ideas principales y notas al margen ayuda a ordenar el pensamiento y a repasar después con más facilidad. Es un pequeño método de estudio que cuesta muy poco y rinde mucho.
    En Kanso seleccionamos productos que combinan funcionalidad y cuidado por el detalle, y esta lapicera cumple con las dos cosas. Si todavía no la probaste, te recomendamos combinarla con un cuaderno de papel de buena calidad: la diferencia al escribir se siente enseguida.',
    'imagen' => 'blog-pilot.jpg',
]);
    }
}
