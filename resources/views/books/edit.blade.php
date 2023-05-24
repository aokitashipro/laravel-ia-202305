<h1>edit</h1>
<form action="{{ route('books.update', $book->id )}}" method="post">
  @csrf
  @method('put')
  <div>
    <label>タイトル</label>
    <input type="text" name="title" value="{{ $book->title }}">
  </div>
  <div>
    <label>価格</label>
    <input type="number" name="price" value="{{ $book->price }}">
  </div>
  <input type="submit" value="更新">
</form>