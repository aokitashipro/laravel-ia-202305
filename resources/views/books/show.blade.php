<h1>show</h1>
id: {{ $book->id }}<br>
タイトル: {{ $book->title }}<br>
価格: {{ $book->price }}

<a href="{{ route('books.index')}}">一覧に戻る</a>
<a href="{{ route('books.edit', $book->id)}}">編集</a>

<form id="delete_{{ $book->id }}" method="post" action="{{ route('books.destroy', $book->id )}}">
  @csrf
  @method('delete')
<div>
<a href="#" data-id="{{ $book->id }}" onclick="deletePost(this)" >削除する</a>
</div>
</form>

<!-- 確認メッセージ -->
<script>
function deletePost(e){
  'use strict' 
  if(confirm('本当に削除していいですか？')){
    document.getElementById('delete_' + e.dataset.id).submit()
 }
}
</script>
