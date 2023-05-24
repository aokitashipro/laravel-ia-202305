確認
<form action="{{ route('contact.store') }}" method="post">
@csrf
<div>名前: {{ $request->name }}</div>
<div>メール: {{ $request->email }}</div>
<div>性別: {{ $request->gender }}</div>
<div>年齢: {{ $request->age }}</div>
<div>お問合せ内容: {{ $request->message }}</div>

<input type="hidden" name="name" value="{{ $request->name }}" />
<input type="hidden" name="email" value="{{ $request->email }}" />
<input type="hidden" name="gender" value="{{ $request->gender }}" />
<input type="hidden" name="age" value="{{ $request->age }}" />
<input type="hidden" name="message" value="{{ $request->message }}" />
<button>送信</button>
</form>

