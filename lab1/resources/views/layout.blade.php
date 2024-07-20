<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <div class="boxcenter">

        <div class="row mb menu">
            <ul>
                <li><a href="{{ route('page.home') }}">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                @if (Session::has('user'))
                    <li><a href="{{ route('admin.book.list') }}">Quản trị</a></li>
                @endif
            </ul>
        </div>
        <div class="row mb">
            @yield('content')
            <div class="boxphai">
                <div class="row mb">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        @if ($user)
                            <div class="row mb10">
                                Xin chào, {{ $user->fullname }}
                            </div>

                            <div class="row mb10">
                                <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                                <li><a href="#">Quên mật khẩu</a></li>
                                <li><a href="#">Cập nhật tài khoản</a></li>
                                <li>
                                    <form style="display: inline" id="logout-form" action="{{ route('logout') }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                    {{-- <a href="{{ route('logout') }}"></a> --}}
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Đăng
                                        xuất
                                    </a>
                                </li>
                            </div>
                        @else
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="row mb10">
                                    <div>Tên đăng nhập</div>
                                    <input type="text" name="email">
                                </div>

                                <div class="row mb10">
                                    <div>Mật khẩu</div>
                                    <input type="password" name="password"><br>
                                </div>

                                <div class="row mb10">
                                    <input type="checkbox"> Ghi nhớ tài khoản?
                                </div>
                                <div class="row mb10">
                                    <input type="submit" value="Đăng nhập" name="dangnhap" id="">
                                </div>

                            </form>
                            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                            <li><a href="{{ route('dangky') }}">Đăng ký thành viên</a></li>
                        @endif
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>

                            @foreach ($categories as $cate)
                                <li><a href="{{ url('loai/' . $cate->id . '/' . $cate->name) }}">{{ $cate->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">TOP 8 giá cao nhất</div>
                    <div class="boxcontent row">


                        @foreach ($expensiveBooks as $book)
                            <div class="row mb10 top10">
                                <img src="{{ $book->thumbnail }}" alt="">
                                <a href="{{ route('page.sach', $book->id) }}">{{ $book->title }}</a>
                                <p>{{ '(' . $book->price . '$)' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="boxtitle">TOP 8 giá thấp nhất</div>
                    <div class="boxcontent row">


                        @foreach ($cheapBooks as $book)
                            <div class="row mb10 top10">
                                <img src="{{ $book->thumbnail }}" alt="">
                                <a href="{{ route('page.sach', $book->id) }}">{{ $book->title }}</a>
                                <p>{{ '(' . $book->price . '$)' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb footer spct" style="margin-top: 25px;">
            <div style="display: flex;justify-content: space-between;align-items: center;color: #e57373;">
                <h1 style="font-size: 1.2vw;">Lab1</h1>
                <h2 style="font-size: 1vw;margin-right: 15px;">Đặng Quốc Huy _Ph39308</h2>
            </div>
        </div>
    </div>



    <!-- Script SlideShow  -->
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
</body>

</html>
