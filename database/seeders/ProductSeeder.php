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
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id' => '1',
                'name' => 'Gà rán',
                'price' => 36000,
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
                'name' => 'Bò nướng',
                'price' => 100000,
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
                'name' => 'Cá chiên',
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
                'name' => 'Cam ép',
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
                'name' => 'Nước dâu',
                'price' => 20000,
                'category_id' => '5',
                'ingredient_id' => '5',
                'thumbnail' => 'https://vn.all.biz/img/vn/catalog/16002.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '6',
                'name' => 'Mực Nướng Muối Ớt',
                'price' => 60000,
                'category_id' => '11',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638460660/products/M%E1%BB%B1cN%C6%B0%E1%BB%9BngMu%C3%B3i%E1%BB%9At/mua-nuong-muoi-ot-removebg-preview_iz3xyn.png',
                'description' => 'Mực nướng muối ớt có hương vị cay nồng của ớt và vị ngọt dai của mực.',
                'detail' => '6',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '7',
                'name' => 'Cánh Gà Chiên Mắm',
                'price' => 80000,
                'category_id' => '10',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638462443/products/C%C3%81NH%20G%C3%80%20CHI%C3%8AN%20M%E1%BA%AEM/canh-ga-chien-nuoc-mam-244690-removebg-preview_y7fqbv.png',
                'description' => 'Món cánh gà chiên nước mắm có hương vị rất đặc trưng và thơm ngon khiến bất cứ ai cũng phải "ứa nước miếng".',
                'detail' => '7',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '8',
                'name' => 'Cơm Đảo Đùi Gà',
                'price' => 65000,
                'category_id' => '3',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534192/products/C%C6%A1m%20Ph%E1%BA%A7n/goc-tu_bidsbh.jpg',
                'description' => 'Đùi gà thơm ngon kết hợp cơm đảo làm thêm phần hấp dẫn',
                'detail' => '8',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '9',
                'name' => 'Cơm Thịt Viên Trứng',
                'price' => 60000,
                'category_id' => '3',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534086/products/C%C6%A1m%20Ph%E1%BA%A7n/anhemfood_dv01-removebg-preview_bxiqck.png',
                'description' => 'Cơm mềm dẻo kết hợp với thịt viên và trứng cuộn',
                'detail' => '9',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '10',
                'name' => 'Cơm Cá Kho',
                'price' => 65000,
                'category_id' => '3',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638509339/products/C%C6%A1m%20Ph%E1%BA%A7n/alogiaocomcom_170114-removebg-preview_ppjsz6.png',
                'description' => 'Cá kho với nước sốt làm tăng thêm phần hấp dẫn',
                'detail' => '10',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '11',
                'name' => 'Tôm Nướng',
                'price' => 100000,
                'category_id' => '11',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638535824/products/M%E1%BB%B1cN%C6%B0%E1%BB%9BngMu%C3%B3i%E1%BB%9At/Hai_san_Nha_Trang_qp0ru9.jpg',
                'description' => 'Tôm nướng nguyên con đặm vị để nhậu thì hết sẩy',
                'detail' => '11',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '12',
                'name' => 'Xôi Trắng Ruốc Giò',
                'price' => 35000,
                'category_id' => '1',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534050/products/B%C3%A1nh%20M%E1%BB%B3%20-%20X%C3%B4i/foody-upload-api-foody-mobile-xoi-1-jpg-181001102705-removebg-preview_vbicm8.png',
                'description' => '',
                'detail' => '11',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '13',
                'name' => 'Bánh Mỳ Thịt Nướng',
                'price' => 30000,
                'category_id' => '1',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534053/products/B%C3%A1nh%20M%E1%BB%B3%20-%20X%C3%B4i/foody-upload-api-foody-mobile-banhmithayy-190107145641-removebg-preview_avqys6.png',
                'description' => 'Thịt nướng siêu ngon',
                'detail' => '12',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '14',
                'name' => 'Xôi Xéo Mỡ Hành',
                'price' => 25000,
                'category_id' => '1',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534173/products/B%C3%A1nh%20M%E1%BB%B3%20-%20X%C3%B4i/voi-600x470_lzn5je.jpg',
                'description' => '',
                'detail' => '13',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '15',
                'name' => 'Xôi Thị kho',
                'price' => 30000,
                'category_id' => '1',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534045/products/B%C3%A1nh%20M%E1%BB%B3%20-%20X%C3%B4i/xoi-thit-ngon-o-hai-phong-removebg-preview_iuryfe.png',
                'description' => 'Thịt kho mềm béo ngậy',
                'detail' => '14',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '16',
                'name' => 'Chanh Đào',
                'price' => 40000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638800517/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/tra-chanh-dao-sa-thuc-uong-thom-ngon-tuoi-moi-gioi-tre-me-say_otakjg.jpg',
                'description' => '',
                'detail' => '15',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '17',
                'name' => 'Cà Phê Cốt Dừa',
                'price' => 45000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638802092/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/1464497459_ngaynaycaphenoigivetinhcachban3_ac7b2v.jpg',
                'description' => '',
                'detail' => '16',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '18',
                'name' => 'CaCao-Kem Tươi',
                'price' => 55000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638802191/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/1431763117_news_2689_udwvp2.jpg',
                'description' => '',
                'detail' => '17',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '19',
                'name' => 'Morito',
                'price' => 50000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799424/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/pgkhoahoc11_khoahoc_img1_tryafy.jpg',
                'description' => '',
                'detail' => '18',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '20',
                'name' => 'Trà Sữa Gạo Hàn Quốc',
                'price' => 35000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638721064/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/28-tra-sua-gao-han-quoc-1601000231_n5ksrd.jpg',
                'description' => '',
                'detail' => '19',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '21',
                'name' => 'Chanh Leo',
                'price' => 35000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534291/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/top-10-loai-do-uong-mua-he-de-lam-ngon-nhat-1_wxeuj7.jpg',
                'description' => '',
                'detail' => '20',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '22',
                'name' => 'Trà Sữa',
                'price' => 40000,
                'category_id' => '5',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638801868/products/N%C6%B0%E1%BB%9Bc%20U%E1%BB%91ng/tra-sua-tran-_me49fs.jpg',
                'description' => '',
                'detail' => 'Sữa tươi chân châu đường đen',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '23',
                'name' => 'Khoai Tây Chiên Rắc Phô Mai',
                'price' => 50000,
                'category_id' => '4',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638683368/products/%C4%90%E1%BB%93%20%C4%83n%20nhanh/147997453436832-khoai-2_qz1fkq.jpg',
                'description' => 'Khoai chiên giòn hương vị phô mai ',
                'detail' => '22',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '24',
                'name' => 'Gà Dán Chiên Giòn',
                'price' => 55000,
                'category_id' => '4',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799330/products/%C4%90%E1%BB%93%20%C4%83n%20nhanh/images_6_oan7ao.jpg',
                'description' => '',
                'detail' => '22',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '25',
                'name' => 'Hamberger',
                'price' => 45000,
                'category_id' => '4',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799316/products/%C4%90%E1%BB%93%20%C4%83n%20nhanh/humberger_vant_fw7epc.jpg',
                'description' => '',
                'detail' => '25',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '26',
                'name' => 'Hamberger Phô Mai - Khoai Chiên',
                'price' => 80000,
                'category_id' => '4',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799335/products/%C4%90%E1%BB%93%20%C4%83n%20nhanh/images_7_r946qt.jpg',
                'description' => '',
                'detail' => '26',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '27',
                'name' => 'Nem Chua Dán',
                'price' => 50000,
                'category_id' => '7',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799731/products/%C4%90%E1%BB%93%20%C4%83n%20v%E1%BA%B7t/images_9_ijvdyv.jpg',
                'description' => '',
                'detail' => '27',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '28',
                'name' => 'Bì Heo Chiên',
                'price' => 60000,
                'category_id' => '7',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799734/products/%C4%90%E1%BB%93%20%C4%83n%20v%E1%BA%B7t/images_8_xwadvv.jpg',
                'description' => '',
                'detail' => '28',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '29',
                'name' => 'Phô Mai Que',
                'price' => 50000,
                'category_id' => '7',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799727/products/%C4%90%E1%BB%93%20%C4%83n%20v%E1%BA%B7t/images_10_iigtfr.jpg',
                'description' => '',
                'detail' => '29',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '30',
                'name' => 'Nộm Tai Heo',
                'price' => 55000,
                'category_id' => '7',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638721112/products/%C4%90%E1%BB%93%20%C4%83n%20v%E1%BA%B7t/cach-lam-nom-du-du-tai-heo-gion-ngon-la-mieng-202107311831141712_sa1kx1.jpg',
                'description' => '',
                'detail' => '30',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '31',
                'name' => 'Nem Chay',
                'price' => 30000,
                'category_id' => '6',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638799515/products/%C4%90%E1%BB%93%20chay/images_5_o8pbdu.jpg',
                'description' => '',
                'detail' => '31',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '32',
                'name' => 'Phở Bò',
                'price' => 40000,
                'category_id' => '2',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534135/products/M%C3%B3n%20N%C6%B0%E1%BB%9Bc/176-1764497_pho-png-page-bn-b-hu-png-transparent_jjhd9w.png',
                'description' => '',
                'detail' => '32',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '33',
                'name' => 'Bún Bò Sốt Vang',
                'price' => 55000,
                'category_id' => '2',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638533976/products/M%C3%B3n%20N%C6%B0%E1%BB%9Bc/1456325127-thumbnail-removebg-preview_kxhgef.png',
                'description' => '',
                'detail' => '33',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '34',
                'name' => 'Bánh Mỳ Sốt Vang',
                'price' => 45000,
                'category_id' => '2',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638534015/products/M%C3%B3n%20N%C6%B0%E1%BB%9Bc/920420012428878301531057027377295887171584n-15889574754601616461893-crop-15889576470461192802370-removebg-preview_nttcnn.png',
                'description' => '',
                'detail' => '34',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '35',
                'name' => 'Bún Chả',
                'price' => 50000,
                'category_id' => '2',
                'ingredient_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/dz0vbjbye/image/upload/v1638533996/products/M%C3%B3n%20N%C6%B0%E1%BB%9Bc/an-bun-cha-co-beo-khong-1-removebg-preview_rqr5yq.png',
                'description' => '',
                'detail' => '35',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
