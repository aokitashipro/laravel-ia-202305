@foreach ($errors->all() as $error)
    <li> <span class="error">{{ $error }}</span></li>
@endforeach
<h1>Edit</h1>
<form action="{{ route('messages.update', $message->id)}}" method="post">
  @csrf
  @method('put')
  <div>
    <label>投稿者</label>
    <input type="text" name="name" value="{{ $message->name }}">
  </div>
  <div>
    <label>連絡先</label>
    <input type="email" name="email" value="{{ $message->email }}">
  </div>
  <div>
    <label>宛先</label>
    <input type="text" name="contact_to" value="{{ $message->contact_to }}">
  </div>
  <div>
    <label>要件・詳細</label>
    <textarea name="message">{{ $message->message }}</textarea>
  </div>
  <input type="submit" value="保存">
</form>