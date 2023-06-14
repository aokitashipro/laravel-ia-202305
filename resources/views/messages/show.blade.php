<h1>show</h1>
  <div>
    <label>投稿者</label>
    <div>{{ $message->name }}</div>
  </div>
  <div>
    <label>連絡先</label>
    <div>{{ $message->email }}</div>
  </div>
  <div>
    <label>宛先</label>
    <div>{{ $message->contact_to }}</div>
  </div>
  <div>
    <label>要件・詳細</label>
    <div>{{ $message->message }}</div>
  </div>
  <a href="{{ route('messages.edit', $message->id)}}">編集</a>
  <br>
  <form action="{{ route('messages.destroy', $message->id)}}" method="post">
    @csrf  
    @method('delete')
    <input type="submit" value="削除" />
  </form>
