@extends('layout')



@section('content')
    <div class="boxtrai mr">
        <div class="row mb">

            <div class="boxtitle">
                <h1 class="spct text-size">ĐĂNG KÝ TÀI KHOẢN</h1>
            </div>
            <div class="boxcontent row formtaikhoan">
                <form action="{{ route('dk') }}" method="POST">
                    @csrf
                    <div class="row mb">
                        Email
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="row mb">
                        Fullname
                        <input type="text" name="fullname" required>
                    </div>
                    <div class="row mb">
                        Password
                        <input type="text" name="password" required>
                    </div>
                    <div class="row mb">
                        Address
                        <input type="text" name="address" required>
                    </div>
                    <div class="row mb">
                        Phone Number
                        <input type="text" name="phone" required>
                    </div>

                    <div class="row mb">
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
