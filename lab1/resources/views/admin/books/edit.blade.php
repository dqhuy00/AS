@extends('admin.admin')



@section('content')
<div class="row">
    <div class="row frmtitle">
        <h1>CHỈNH SỬA SẢN PHẨM</h1>
    </div>
    <div class="row frmcontent">
        <form action="{{ route('admin.book.update',$book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="sp-all">
                <input type="hidden" value="{{$book->id}}">
                <div>
                    <div class="row mb10 sp-one">
                        <strong>Tên sản phẩm</strong>   <br>
                        <input type="text" name="title" id="tensp" value="{{$book->title}}">
                        <p style="color: red;" id="tensanpham"></p>
                    </div>
                    <div class="row mb10 sp-one">
                    <strong>Danh mục</strong> <br>
                        <select name="category_id" id="">
                                @foreach($categories as $cate)
                                    <option value="{{$cate->id}}" {{$cate->id == $book->id ? 'selected' : ''}}>{{$cate->name}}</option>;   
                                @endforeach                           
                        </select>
                    </div>
                    
                    <div class="row mb10 sp-one">
                        <strong>Giá</strong> <br>
                        <input type="number" name="price" id="giasp" value="{{$book->price}}">
                        <p style="color: red;" id="giasanpham"></p>
                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Số lượng</strong> <br>
                        <input type="number" name="quantity" id="sl" value="{{$book->quantity}}">
                        <p style="color: red;" id="giasanpham"></p>
                    </div>
                </div>
                <div>
                    <div class="row mb10 sp-one">
                        <strong>Ảnh mô tả</strong>  <br>
                        <input type="text" name="thumbnail" id="anh" value="{{$book->thumbnail}}">
                        <p style="color: red;" id="anh"></p>

                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Tác giả</strong>   <br>
                        <input type="text" name="author" id="author" value="{{$book->author}}">
                        <p style="color: red;" id="author"></p>
                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Nhà xuất bản</strong>   <br>
                        <input type="text" name="publisher" id="publisher" value="{{$book->publisher}}">
                        <p style="color: red;" id="publisher"></p>
                    </div>
                    <div class="row mb10 sp-one">
                        <strong>Ngày xuất bản</strong>   <br>
                        <input type="date" name="publication" id="publication" value="{{$book->publication}}">
                        <p style="color: red;" id="publication"></p>
                    </div>
                </div>
            </div>
            
            <div class="row mb10 mt10" >
                <input type="submit" class="mr5" name="themmoi"  value="THÊM MỚI">
                <input type="reset" class="mr5" value="NHẬP LẠI">
                <a href="{{ route('admin.book.list') }}"><input type="button" value="DANH SÁCH"></a>    
            </div>
        </form>
    </div>
</div>
</div>
@endsection