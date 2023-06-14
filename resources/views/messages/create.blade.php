@foreach ($errors->all() as $error)
    <li> <span class="error">{{ $error }}</span></li>
@endforeach
<h1>create</h1>
<form action="{{ route('messages.store')}}" method="post">
  @csrf
  <div>
    <label>投稿者</label>
    <input type="text" name="name" value="{{ old('name') }}">
  </div>
  <div>
    <label>連絡先</label>
    <input type="email" name="email" value="{{ old('email') }}">
  </div>
  <div>
    <label>宛先</label>
    <input type="text" name="contact_to" value="{{ old('contact_to') }}">
  </div>
  <div>
    <label>要件・詳細</label>
    <textarea name="message">{{ old('message') }}</textarea>
  </div>
  <input type="submit" value="保存">
</form>