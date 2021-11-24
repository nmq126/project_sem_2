<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/user/css/Blog/blog_detail.css">
<!-- Boxicons CSS -->
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=618600ef20e65f001281c8c1&product=sticky-share-buttons" async="async"></script>
<title>Blog</title>
</head>
<body>
    <div class="topnav">
HADER
      </div>
      <div class="header">
       <div class="back"> <a href="http://127.0.0.1:8000/blog"><i class='bx bx-arrow-back'></i></a></div>
       <div class="date-author">
          <div class="date">
            {{$blog->created}}
          </div>
          <div class="author">
            {{$blog->author}}
          </div>
       </div>
      </div>
   <div class="container">

    <div class="content">
        <div class="title">
            <h1> {{$blog->title}}</h1>
            </div>
   {!!$blog->details!!}
<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
</div>
   </div>
   <div class="footer">Footer</div>
</body>
</html>
