<h1>create</h1>
<form action="{{ route('books.store')}}" method="post">
  @csrf
  <div>
    <label>タイトル</label>
    <input type="text" name="title" value="{{ old('title') }}">
  </div>
  <div>
    <label>価格</label>
    <input type="number" name="price" value="{{ old('price') }}">
  </div>
  <input type="submit" value="保存">
</form>