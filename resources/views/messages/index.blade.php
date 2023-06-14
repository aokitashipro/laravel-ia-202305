
<a href="{{ route('messages.create')}}">新規作成</a>
<br><br>
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>投稿者</th>
    </tr>
  </thead>
  <tbody>
@foreach($messages as $message)
  <tr>
    <td><a href="{{ route('messages.show', $message->id )}}">{{ $message->id }}</a></td>
    <td>{{ $message->name }}</td>
  </tr>
@endforeach
</table>