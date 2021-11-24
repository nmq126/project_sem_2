<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('blogs')->truncate();
        DB::table('blogs')->insert([
            [
                "author"=>"Instagram foodholicvn",
                'description' => "May 21, 2021 — [TPHCM] Ghé Quán Xôi Đêm Với Nước Sốt Thần Thánh Bao Ghiền. Ăn qua nhiều quán xôi rồi, nay mới tìm được chỗ nấu xôi có màu vàng ngà chứ ...",
                'details'=>
"
<p>  Ăn qua nhiều quán xôi rồi, nay mới tìm được chỗ nấu xôi có màu vàng ngà chứ không trắng ngà, bù lại thì hạt nếp lại dẻo tơi không khô hay nhão lại dậy thơm mùi nếp rất ngon. Quán xôi này có một điểm đặc biệt nữa là có chi nhánh tại Bình Dương nay lại đổ bộ về Sài Gòn, toạ lạc tại quận 8 nữa. Khẩn trương thử ngay xem xôi gà ở đây hương vị như thế nào nhé:</p>
<div class=address>
  <p >Xôi Gà Ba Phương </p>

  <p>Địa chỉ: 11A Phạm Hùng, Phường 5, Quận 8, Sài Gòn (ngã ba Phạm Hùng và Tạ Quang Bửu)</p>

   <p>Giờ hoạt động: 18h00 – 22h00</p>
</div>
<img src=https://assets.grab.com/wp-content/uploads/sites/11/2021/05/17163446/foodholicvn_175506232_456129068935745_8056775701527572683_n.jpg alt=>
<p>Nếu bạn đã cân qua nhiều hàng xôi gà nức tiếng ở Sài Gòn rồi thì xôi gà Bình Dương chi nhánh Sài Gòn này sẽ làm bạn si mê hơn nữa. Thứ quyết định làm hộp xôi này thơm ngon chính là nước sốt, giữ nguyên công thức từ chi nhánh gốc Ba Phương dưới Bình Dương luôn nhe, hương vị ngòn ngọt mặn mặn dẻo quẹo ướm lên xôi tạo nên một hương vị ngon khó quên, khác với nhiều hàng xôi ở Sài Gòn mà mình biết đến.</p>
<img src=https://assets.grab.com/wp-content/uploads/sites/11/2021/05/17163449/foodholicvn_174409296_170892364894885_7646504903294410190_n.jpg alt=>
<br>
<img src=https://assets.grab.com/wp-content/uploads/sites/11/2021/05/17163449/foodholicvn_174290942_206536200937721_8510284094147464460_n.jpg alt=>
<p>Hộp xôi ở đây có hai mức giá, hộp nhỏ thì 15k, lớn thì 20k, chưa gì thấy giá bình dân, cực kì phải chăng rồi đó. Chỉ với giá tiền như vậy mà bạn có đầy đủ món ăn kèm là da gà chiên giòn – lạp xưởng – chả lụa xắt – chà bông – trứng cút chiên và đặc biệt là đậu phộng muối, điểm nhấn đầy mới lạ cho hộp xôi mặn thập cẩm ngon lành này.</p>
<img src=https://assets.grab.com/wp-content/uploads/sites/11/2021/05/17163448/foodholicvn_174754825_298978228284296_4635820131333491220_n.jpg alt=>
<p>Thịt gà được hai anh chị chủ quán chiên và xé tay chứ không mua loại làm sẵn nên khá yên tâm cũng như không bị dính xương nè. Xớ thịt mềm, đúng kiểu ngoài giòn trong mềm, dù xé sẵn nhưng ăn không bị khô. Những topping còn lại ngoài việc ăn ngon thì còn cho nhiều nữa. Điểm cộng tuyệt vời cho chất lượng luôn đó.
</p>
<img src=https://assets.grab.com/wp-content/uploads/sites/11/2021/05/17163447/foodholicvn_175020041_209899340539252_7948523294086930648_n.jpg alt=>
<p>Quán xôi mới về Sài Gòn nhưng cũng cập nhật nhanh chóng đã có giao hàng tận nơi thông qua GrabFood rồi, nếu là một tín đồ của xôi gà thì không được bỏ qua Xôi gà Ba Phương đâu nha. Ai cũng ghiền ăn xôi ngon như tui thì nhớ lưu lại địa chỉ xe xôi ngon số dzách và đặt ăn liền đi.

</p>

"



                ,
                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/05/17163446/foodholicvn_175506232_456129068935745_8056775701527572683_n.jpg",

                'title' => '[TPHCM] Ghé Quán Xôi Đêm Với Nước Sốt Thần Thánh Bao Ghiền',



            ],
//            [
//                'title' => '[TPHCM] Khám Phá Bò “Ráp Bơ” Món Mới Nổi Trong Làng “Food-Việt”',
//                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/05/13123739/chanlovefoods-146832409_238347257929501_7052561000020593212_n.jpg",
//
//            ],
//            [
//                'title' => '[HN] Xôi Khâu Nhục Khổng Lồ Cùng Nhiều Món Ăn Siêu Ngon Ở Trung Tự',
//                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/05/26183004/chubehanoi_176763602_904476713456810_3553665898780681927_n.jpg",
//
//            ],
//            [
//                'title' => '[HN] Bún Sườn Hun Khói Độc Đáo',
//                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/11/04232109/250371696_928474664456600_8132253319843711634_n.jpg",
//
//            ],
//            [
//                'title' => '[DN] Cá Viên Chiên Sốt Thái Kèm Nhiều Món Ngonnn',
//                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/11/09002423/251352381_4465567453533406_5220666988069111402_n.jpg",
//
//            ],
//            [
//                'title' => '[TPHCM] Bánh Bao Chiên Tân Định Và Cơ Duyên Truyền Nghề',
//                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/11/10135549/134414496_234993004692939_4521963943029870587_n.jpg",
//
//            ],
//            [
//                'title' => '[HCM] Chua Chua Cay Cay, Món Này Phải Thử',
//                'image' => "https://assets.grab.com/wp-content/uploads/sites/11/2021/11/01181912/241272506_812688759400856_6230620009606110103_n.jpg",
//
//            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
