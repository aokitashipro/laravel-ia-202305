<h1>編集画面</h1>
<form action="{{ route('contact.update', $contact->id )}}" method="post">
  @csrf
  <div>
    <label for="name">お名前</label>
    <input type="text" id="name" name="name" value="{{ $contact->name }}">
    @if ($errors->has('name'))
     <p class="error">*{{ $errors->first('name') }}</p>
    @endif
    </div>
  <div>
    <label for="email">メールアドレス</label>
    <input type="text" id="email" name="email" value="{{ $contact->email }}">
  </div>
  <div>
    <label>性別</label>
    <input type="radio" name="gender" value="0" @if($contact->gender == 0) checked @endif>男性
    <input type="radio" name="gender" value="1" @if($contact->gender == 1) checked @endif>女性
    <input type="radio" name="gender" value="2" @if($contact->gender == 2) checked @endif>その他
  </div>
  <div>
    <label for="age">年齢</label>
    <input type="number" id="age" name="age" value="{{ $contact->age }}">
  </div>
  <div>
    <label for="messeage">お問合せ内容</label>
    <textarea name="message">{{ $contact->message }}</textarea>
  </div>  
  <div>
    <input type="submit" value="更新する"/>
  </div>
</form>