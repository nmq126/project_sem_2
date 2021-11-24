    <!DOCTYPE html>
        <html>

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/user/css/Blog/blog.css">
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

        <title>Blog</title>

        </head>

        <body>
        <div class="header">
        Blog
        </div>
        <div class="slideshow-container">

        <div class="mySlides fade">

        <img src="https://assets.grab.com/wp-content/uploads/sites/11/2021/06/13192919/Grab-Galaxy-1125x630.jpg">
        <div class="text">
        <div class="title-blog">
        <h2>💚🎞️ Dùng Grab xem Galaxy Play cả năm</h2>
        <p> GrabFood Blog, Passenger Blog, Promotions Món quà tặng bạn dùng 💚Grab, tặng gói ưu đãi siêu khủng có 1-0-2 nè mọi người ơi. Từ nay cho đến hết 31/12/2021, với người dùng sử dụng một trong các dịch vụ củ [..]
        </p>
        <a href="#">Read More</a>

        </div>
        </div>
        </div>
        <div class="mySlides fade">

        <img src="https://assets.grab.com/wp-content/uploads/sites/11/2021/08/01180235/1920x675_GM_0208.jpg" >
        <div class="text">
        <div class="title-blog">
        <h2>GRABMART ĐÃ SẴN SÀNG GIAO HÀNG LIÊN QUẬN</h2>
        <p> Đơn hàng thực phẩm, nhu yếu phẩm sẽ được GrabMart giao liên quận đến các khu cách ly, phong tỏa, bệnh viện dã chiến tại thành phố Hồ Chí Minh! Bạn đang sinh sống tại các khu vực cách ly/phong tỏa ở thành phố Hồ Chí Minh và lo lắng
        về nguồn cung cấp thực phẩm, nhu yếu phẩm trong những ngày tới? 😢 Không cần muộn phiền nữa vì GrabMart nay đã sẵn sàng giao những đơn hàng thiết yếu liên quận, từ gạo, mì nhanh gọn cho đến rau, thịt tươi ngon! Những khu vực đặc
    biệt đã được Grab cập nhật trên hệ thống với cú pháp: Khu cách ly – [địa điểm] hoặc Khu phong tỏa – [ địa điểm ] hoặc Bệnh viện dã chiến – [ địa điểm ].
        </p>
        <a href="#">Read More</a>

        </div>
        </div>
        </div>

        <div class="mySlides fade">

        <img src="https://assets.grab.com/wp-content/uploads/sites/11/2020/08/07172710/Troy-Portal-Cover.png" >
        <div class="text">
        <div class="title-blog">
        <h2>[GrabFood] Grab sắp ra mắt trang web GrabMerchant mới!</h2>
        <p> Vào ngày 01/09/2020, Grab chính thức ra mắt cổng thông tin GrabMerchant – một trang web đơn giản để quản lý nhà hàng có nhiều chi nhánh. Từ nay, Đối tác có thể giám sát các hoạt động GrabFood và Moca của tất cả các chi nhánh ngay trên
        chính máy tính của mình.


        </p>
        <a href="#">Read More</a>

        </div>
        </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>


        <div class="dots" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <div class="content-blog">
        <div class="blog-header">
        <h1>Articles</h1>
        
<div class="media-search">
    <div class="search"> 
        <input class="search-input"  type="text" placeholder="Search Articles ">
         <i class='bx bx-search'></i>
        </div>
<div class="result">

 </div>
</div>


</div>


</div>
        </div>
        <div class="blog-body">
        <div class="cards">



@foreach ($blogs as $blog)
<div class="card-item">
    <a href="{{$blog->link}}">
    <div class="card-image">
    <img src="{{$blog->image}}" alt="">
    </div>
    </a>
    <div class="card-content">
        <a href="#">
    <h4>{{$blog->title}}</h4>
    </a>

    </div>
    </div>
@endforeach
      <div class="page">
        <?php
        // config
        $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
        ?>

        @if ($blogs->lastPage() > 1)
        <ul class="pagination">
    <li class="{{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}">
                          <a class="first" href="{{ $blogs->url(1) }}">First</a>
                      </li>
                      @if($blogs->currentPage() > 1)
                          <li  >
                              <a href="{{ $blogs->url($blogs->currentPage() - 1) }}">&#10094</a>
                          </li>
                      @endif
                      @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                          <?php
                          $half_total_links = floor($link_limit / 2);
                          $from = $blogs->currentPage() - $half_total_links;
                          $to = $blogs->currentPage() + $half_total_links;
                          if ($blogs->currentPage() < $half_total_links) {
                              $to += $half_total_links - $blogs->currentPage();
                          }
                          if ($blogs->lastPage() -$blogs->currentPage() < $half_total_links) {
                              $from -= $half_total_links - ($blogs->lastPage() - $blogs->currentPage()) - 1;
                          }
                          ?>
                          @if ($from < $i && $i < $to)
                              <li class="{{ ($blogs->currentPage() == $i) ? ' active' : '' }}">
                                  <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                              </li>
                          @endif
                      @endfor
                      @if($blogs->currentPage() < $blogs->lastPage())
                          <li >
                              <a  href="{{ $blogs->url($blogs->currentPage() + 1) }}">&#10095</a>
                          </li>
                      @endif
                      <li class="{{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}">
                          <a class="last" href="{{ $blogs->url($blogs->lastPage()) }}">Last</a>
                      </li>
                  </ul>
              @endif
      </div>
        </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="user/js/Blog/blog.js">
        </script>

        </body>

        </html>
