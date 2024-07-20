@extends('layout')



@section('content')
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">
                <h1 class="spct text-size">Chi tiết sản phẩm</h1>

                <p class="spct text-size1">{{ $book->title }}</p>
            </div>
            <div class="boxcontent row">
                <div class="row mb spct"><img src="{{ $book->thumbnail }}"></div>;
                <p class="mb" style="color: red;font-size: 20px;text-align: center ;"><b
                        style="font-size: 20px;">{{ $book->price }}</b> <ins style="font-size: 15px;">$</ins></p>;
                <div>
                    <p style="font-size: 12px">Tác giả: {{ $book->author }}</p>
                    <p style="font-size: 12px">Nhà xuất bản: {{ $book->publisher }}</p>
                    <p style="font-size: 12px">Ngày xuất bản: {{ $book->publication }}</p>
                    <p style="font-size: 12px">Số lượng: {{ $book->quantity }}</p>
                    <p style="font-size: 12px">Thể loại: {{ $book->name }}</p>
                </div>

            </div>
        </div>
        <div class="row mb">
            <div class="boxtitle">BÌNH LUẬN</div>
            <div class="boxcontent2 binhluan">
                <table class="">
                    @foreach ($comments as $bl)
                        <tr>
                            <td>
                                {{ $bl->content }}
                            </td>
                            <td>
                                {{ $bl->fullname }}
                            </td>
                            <td>
                                {{ $bl->comment_date }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="boxfooter searbox">

                @if (Session::has('user'))
                    <form class="formtkiem" action="{{ route('comment') }}" method="post">
                        @csrf
                        <input type="hidden" name="account_id" value="{{ $user->id }}">
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <input type="date" hidden id="ngay" name="comment_date">
                        <script>
                            // Lấy ngày hiện tại
                            const today = new Date().toISOString().split('T')[0];

                            // Đặt giá trị cho input
                            document.getElementById('ngay').value = today;
                        </script>
                        <input type="text" name="content" id="" required>
                        <input type="submit" name="guibinhluan" value="Gửi">
                    </form>
                @else
                    <h1 style="color: red; text-align: center;">Vui lòng đăng nhập để được bình luận !</h1>
                @endif
            </div>

        </div>

    </div>
@endsection
