@extends('admin.admin')



@section('content')
<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row frmcontent">
        <form action="{{ route('admin.book.add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="sp-all">
                <div>
                    <div class="row mb10 sp-one">
                        <strong>Tên sản phẩm</strong>   <br>
                        <input type="text" name="title" id="tensp">
                        <p style="color: red;" id="tensanpham"></p>
                    </div>
                    <div class="row mb10 sp-one">
                    <strong>Danh mục</strong> <br>
                        <select name="category_id" id="">
                                @foreach($categories as $cate)
                                    <option value="{{$cate->id}}" >{{$cate->name}}</option>;   
                                @endforeach                           
                        </select>
                    </div>
                    
                    <div class="row mb10 sp-one">
                        <strong>Giá</strong> <br>
                        <input type="number" step="0.1" name="price" id="giasp">
                        <p style="color: red;" id="giasanpham"></p>
                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Số lượng</strong> <br>
                        <input type="number" name="quantity" id="sl">
                        <p style="color: red;" id="giasanpham"></p>
                    </div>
                </div>
                <div>
                    <div class="row mb10 sp-one">
                        <strong>Ảnh mô tả</strong>  <br>
                        <input type="text" name="thumbnail" id="anh">
                        <p style="color: red;" id="anh"></p>

                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Tác giả</strong>   <br>
                        <input type="text" name="author" id="author">
                        <p style="color: red;" id="author"></p>
                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Nhà xuất bản</strong>   <br>
                        <input type="text" name="publisher" id="publisher">
                        <p style="color: red;" id="publisher"></p>
                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Ngày xuất bản</strong>   <br>
                        <input type="date" name="publication" id="publisher">
                        <p style="color: red;" id="publisher"></p>
                    </div>
                </div>
            </div>
            
            <div class="row mb10 mt10" >
                <input type="submit" class="mr5" name="themmoi" onclick="validateForm()" value="THÊM MỚI">
                <input type="reset" class="mr5" value="NHẬP LẠI">
                <a href="{{ route('admin.book.list') }}"><input type="button" value="DANH SÁCH"></a>    
            </div>
        </form>
    </div>
</div>
</div>
@endsection