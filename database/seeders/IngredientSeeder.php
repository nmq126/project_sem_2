<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('ingredients')->truncate();
        DB::table('ingredients')->insert([
            [
                'name' => 'Gà Châu Phi, bột ngô, bột nấm trắng',
                'description' => 'Là loại nguyên liệu tuyệt vời trong công thức làm nên các món tráng miệng, món bánh hay pha chế đồ uống',
            ],
            [
                'name' => 'Giấm Balsamic',
                'description' => 'Là loại gia vị đặc biệt quý hiếm khi phải mất đến khoảng 10 - 25 năm mới sản xuất thành công một mẻ.',
            ],
            [
                'name' => 'Pho mát Moose',
                'description' => 'Loại pho mát này có nguồn gốc từ Thụy Điển được bán với mức giá vào khoảng 500USD/ pound',
            ],
            [
                'name' => 'Nấm Matsutake',
                'description' => 'Loại nấm này được tìm thấy tại các quốc gia như Trung Quốc, Hàn Quốc, Nhật Bản, Canada, Phần Lan, Thụy Điển',
            ],     [
                'name' => 'Tôm hùm Scotland',
                'description' => 'Hương vị thơm ngon tuyệt hảo của thớ thịt tôm hùm Scotland nóng hổi giúp nó được xếp vào danh sách những loại nguyên liệu nấu ăn đắt nhất hành tinh',
            ],
            [
                'name' => 'Trà xanh Matcha',
                'description' => 'Là loại nguyên liệu tuyệt vời trong công thức làm nên các món tráng miệng, món bánh hay pha chế đồ uống',
            ],
            [
                'name' => 'Giấm Balsamic',
                'description' => 'Là loại gia vị đặc biệt quý hiếm khi phải mất đến khoảng 10 - 25 năm mới sản xuất thành công một mẻ.',
            ],
            [
                'name' => 'Pho mát Moose',
                'description' => 'Loại pho mát này có nguồn gốc từ Thụy Điển được bán với mức giá vào khoảng 500USD/ pound',
            ],
            [
                'name' => 'Nấm Matsutake',
                'description' => 'Loại nấm này được tìm thấy tại các quốc gia như Trung Quốc, Hàn Quốc, Nhật Bản, Canada, Phần Lan, Thụy Điển',
            ],     [
                'name' => 'Tôm hùm Scotland',
                'description' => 'Hương vị thơm ngon tuyệt hảo của thớ thịt tôm hùm Scotland nóng hổi giúp nó được xếp vào danh sách những loại nguyên liệu nấu ăn đắt nhất hành tinh',
            ],
            [
                'name' => 'Trà xanh Matcha',
                'description' => 'Là loại nguyên liệu tuyệt vời trong công thức làm nên các món tráng miệng, món bánh hay pha chế đồ uống',
            ],
            [
                'name' => 'Giấm Balsamic',
                'description' => 'Là loại gia vị đặc biệt quý hiếm khi phải mất đến khoảng 10 - 25 năm mới sản xuất thành công một mẻ.',
            ],
            [
                'name' => 'Pho mát Moose',
                'description' => 'Loại pho mát này có nguồn gốc từ Thụy Điển được bán với mức giá vào khoảng 500USD/ pound',
            ],
            [
                'name' => 'Nấm Matsutake',
                'description' => 'Loại nấm này được tìm thấy tại các quốc gia như Trung Quốc, Hàn Quốc, Nhật Bản, Canada, Phần Lan, Thụy Điển',
            ],
            [
                'name' => 'Tôm hùm Scotland',
                'description' => 'Hương vị thơm ngon tuyệt hảo của thớ thịt tôm hùm Scotland nóng hổi giúp nó được xếp vào danh sách những loại nguyên liệu nấu ăn đắt nhất hành tinh',
            ],




        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
