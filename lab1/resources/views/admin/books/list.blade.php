@extends('admin.admin')



@section('content')
    <div class="row">
        <div class="row frmtitle mb">
            <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
        </div>
        <div class="row frmcontent">
            <form action="#" method="post">

                <div class="row mb10 mt10">
                    <a href="{{ route('admin.book.create') }}"><input type="button" value="Thêm mới"></a>
                </div>
                <div class="row mb10 frmdsloai">

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>THUMBNAIL</th>
                                <th>AUTHOR</th>
                                <th>PUBLISHER</th>
                                <th>PUBLICATION</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>CATEGORY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td><img src="{{ $book->thumbnail }}" height="60px"></td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->publication }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.book.edit', $book->id) }}">Sửa</a>

                                        <form>

                                        </form>
                                        <form action="{{ route('admin.book.delete', $book->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection
