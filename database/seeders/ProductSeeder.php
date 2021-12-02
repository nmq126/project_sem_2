<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id' => '1',
                'name' => 'Fried Chicken',
                'price' => 50000,
                'category_id' => '10',
                'ingredient_id' => '1',
                'thumbnail' => 'https://cdn.statically.io/img/gachaybo.com/f=auto/wp-content/uploads/2021/07/4-ga-ran-kfc.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '
                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Mañana, a partir de los botones de opción, sino un poco de dolor. Escribir en el freno ahora. No hay comentarios eran, en el mejor, pero el
                            financiamiento de la atención de la salud o la risa. Bienvenido a aprender más acerca de la cultura popular, y el tiempo, no, ni a crecer fuerte. Miramos a los miembros de televisión por cable de televisión.</p>
                        <div class=img> <img src="https://media.istockphoto.com/photos/chicken-nuggets-picture-id158910924?k=20&m=158910924&s=612x612&w=0&h=OHKB70HK1DBHI7ROSRPdrnm67KgtckhHX6SuhqfUUTk=" alt=""></div>
                        <p>Por otra parte, denunciamos con indignación a los hombres que son engañados y desmoralizados por los encantos del placer del momento, tan cegados por el deseo, que no pueden prever el dolor y la molestia que se va a producir,
                            y la misma culpa es de los que faltan a su deber por debilidad de la voluntad, que es lo mismo que decir que fallan por la fatiga y el dolor. Estos casos son muy simples y fácil de distinguir. En una hora libre, sin las
                            trabas de nuestro poder de elección y cuando nada impida que seamos capaces de hacer lo que más nos gusta, todo placer es de agradecer y cada dolor se puede evitar. Pero en ciertas circunstancias y debido a las exigencias
                            del deber o de las obligaciones de la empresa, estos placeres tienen que ser repudiados y sus molestias aceptadas .El hombre sabio, por lo tanto, siempre tiene en estos asuntos una elección: rechaza placeres para asegurar
                            otros placeres mayores, o de lo contrario evita los dolores para evitar dolores peores.</p>
                ',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '2',
                'name' => 'Pot-roast Beef',
                'price' => 200000,
                'category_id' => '8',
                'ingredient_id' => '2',
                'thumbnail' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/recipe-image-legacy-id-1222463_11-7eaf5a2.jpg?quality=90&webp=true&resize=440,400',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 12,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '3',
                'name' => 'Fried Fish',
                'price' => 30000,
                'category_id' => '11',
                'ingredient_id' => '3',
                'thumbnail' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/727bda84826873.5d6906eb29c0a.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 11,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '4',
                'name' => 'Lemon Juice',
                'price' => 10000,
                'category_id' => '5',
                'ingredient_id' => '4',
                'thumbnail' => 'https://tiimg.tistatic.com/fp/1/006/390/sour-taste-fresh-lemon-juice-190.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '5',
                'name' => 'Strawberry Juice',
                'price' => 20000,
                'category_id' => '5',
                'ingredient_id' => '5',
                'thumbnail' => 'https://vn.all.biz/img/vn/catalog/16002.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
