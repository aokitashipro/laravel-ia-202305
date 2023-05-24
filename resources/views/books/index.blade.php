<h1>index</h1>
@if (session('flash_message'))
  <div class="flash_message">
      {{ session('flash_message') }}
  </div>
@endif

<a href="{{ route('books.create')}}">新規作成</a>

@foreach($books as $book)
<a href="{{ route('books.show', $book->id )}}">{{ $book->id }}</a>
{{ $book->title }}
@endforeach