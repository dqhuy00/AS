@extends('layout')



@section('content')
  <div class="boxtrai mr">
    <div class="row">
      <div class="banner mb">
        <!-- Slideshow container -->
        <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">

            <img src="https://bookbuy.vn/Res/Images/Album/4dd7e4ad-370b-4734-a1e4-fe777b6499f5.jpg?w=880&scale=both&h=320&mode=crop" style="width:100%">

          </div>

          <div class="mySlides fade">

            <img src="https://bookbuy.vn/Res/Images/Album/a4b50f5c-d290-4d47-8295-8f3ea72ce082.jpg?w=880&scale=both&h=320&mode=crop" style="width:100%">

          </div>

          <div class="mySlides fade">

            <img src="https://bookbuy.vn/Res/Images/Album/faae9715-8f05-43fd-93c6-6d4c9e39906f.jpg?w=880&scale=both&h=320&mode=crop" style="width:100%">

          </div>

          <div class="mySlides fade">

            <img src="https://bookbuy.vn/Res/Images/Album/990fc630-e54b-4ef6-9416-edd2d7287c46.jpg?w=880&scale=both&h=320&mode=crop" style="width:100%">

          </div>

          <div class="mySlides fade">

            <img src="https://bookbuy.vn/Res/Images/Album/4640714e-a9fb-41f9-bb7d-1ad9f2d8fdda.jpg?w=880&scale=both&h=320&mode=crop" style="width:100%">

          </div>
        </div>
        <br>
      </div>
    </div>
    
    <div class="row">
      <h2 class="mb" style="font-size: 24px; display: flex; justify-content: center">Sản phẩm mới nhất</h2>
      <div class="boxsp1">
        @foreach($books as $book) 

                    <div class="boxsp">
                        <div class="sp9">
                        <a href="{{ route('page.sach',$book->id) }}"><img class="sp9-anh"  src="{{$book->thumbnail}}" alt=""></a>
                        </div>
                        <a href="{{ route('page.sach',$book->id) }}"><span>{{$book->title}}</span></a>
                        <p><b>{{$book->price}}</b> <ins>$</ins></p>

                    </div>



  @endforeach

      </div>
    </div>
  </div>

  

@endsection