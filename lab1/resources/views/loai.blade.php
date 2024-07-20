@extends('layout')

@section('content')
<div class="boxtrai mr">
  
  <div class="row">
    <h2 class="mb" style="font-size: 24px; display: flex; justify-content: center">{{$name}}</h2>
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