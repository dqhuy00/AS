@extends('layout')

@section('title', 'Trang Chủ')

@section('content')
<div>
  <h2>8 Sản phẩm có giá cao nhất</h2>
  <ul>
    @foreach($expensiveBooks as $book)
    <li>
      <a href="{{ url('/books/' . $book->id) }}">
        {{ $book->title }} - {{ $book->price }} VND
      </a>
    </li>
    @endforeach
  </ul>

  <h2>8 Sản phẩm có giá thấp nhất</h2>
  <ul>
    @foreach($cheapBooks as $book)
    <li>
      <a href="{{ url('/books/' . $book->id) }}">
        {{ $book->title }} - {{ $book->price }} VND
      </a>
    </li>
    @endforeach
  </ul>
</div>
@endsection
 