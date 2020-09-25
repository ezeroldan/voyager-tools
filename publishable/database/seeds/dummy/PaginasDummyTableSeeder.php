<?php

use App\Web\Pagina;
use Illuminate\Database\Seeder;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class PaginasDummyTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run()
    {

        $this->setModelClass(Pagina::class);

        $this->setDataPartial('foto', 'novedades/ejemplo.jpg');
        $this->setDataPartial(
            'body',
            '<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. In vehicula velit turpis. Mauris in venenatis nisl. Ut imperdiet urna velit, in vulputate sem ultricies id. In consectetur sodales placerat. Etiam viverra lorem vel quam porta mattis. Cras laoreet dictum nulla sed porta. Duis a nunc mauris. Etiam non arcu et arcu finibus fermentum in eu tellus. Vivamus suscipit elit nisl, id imperdiet felis volutpat vel. Vestibulum accumsan gravida justo, nec iaculis augue placerat et. Mauris et erat et magna volutpat placerat.</p>
        <p>&nbsp;</p>
        <p>Proin ullamcorper metus ut arcu tristique vulputate. Vivamus eget erat a quam ultricies vulputate ac eu massa. Nam magna magna, scelerisque et pulvinar eu, vulputate ac tortor.</p>
        <ul>
        <li>Nullam fermentum ultrices purus, vitae luctus justo tempor vel.</li>
        <li>Pellentesque nec bibendum enim. Ut rhoncus faucibus nunc a mollis.</li>
        <li>Suspendisse purus libero, tempus in sem ut, vestibulum semper elit.</li>
        <li>Ut id sem nec mauris feugiat vestibulum at at dui.</li>
        </ul>
        <p>&nbsp;</p>
        <p>Quisque eget luctus massa, maximus placerat quam. Fusce augue quam, vehicula eget aliquam sed, dignissim et nisl. Sed maximus justo tincidunt volutpat tristique. Morbi efficitur, nibh vitae porta efficitur, ex libero pharetra orci, sit amet malesuada dolor ligula eget leo. Cras eleifend mollis congue. Aliquam iaculis pharetra gravida. Cras sed luctus dui. Vestibulum convallis, mi sit amet eleifend imperdiet, arcu libero vehicula est, eget vehicula odio risus placerat ante. Aliquam eget augue sit amet arcu sodales vehicula. Etiam condimentum vulputate risus, vel mollis nisi sagittis id. Donec non nisl vel tortor congue suscipit.</p>
        <p>&nbsp;</p>
        <p>Pellentesque porttitor efficitur erat, ut auctor diam tempor nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean cursus id ligula ullamcorper euismod. Donec hendrerit dui ac turpis fringilla, vel ultrices justo imperdiet. Vestibulum ullamcorper euismod purus, non accumsan ligula scelerisque ac. Phasellus congue augue sit amet magna consectetur vestibulum. Praesent facilisis, erat in varius lacinia, sapien nulla mollis eros, luctus lacinia enim mauris sagittis erat. Donec in sollicitudin libero. Nunc lobortis, tortor et scelerisque porta, turpis sem faucibus eros, non hendrerit ex risus eget ipsum. Fusce ac metus a enim feugiat tincidunt tempus ac enim.</p>
        <p>&nbsp;</p>
        <p>In commodo pharetra pulvinar. Proin sit amet mauris a enim ullamcorper euismod. Maecenas euismod vitae turpis sit amet vulputate. Donec non pulvinar elit. Quisque sem sem, aliquet sit amet tincidunt euismod, porta rhoncus enim. In lacinia sit amet ligula in condimentum. Vestibulum auctor velit ac nisi mattis auctor at in est. Sed finibus id turpis ultrices sodales. Curabitur id rutrum diam. Nullam mauris libero, cursus in dictum vel, ullamcorper in purus. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam fermentum sem lacus, sollicitudin pulvinar erat venenatis quis.</p>'
        );

        $this->setSlugFiled('nombre');
        $this->insertManyByFields(['nombre'], ['Sobre Nosotros', 'Servicios', 'Tasaciones', 'Privacidad y Uso del Sitio']);
    }
}
