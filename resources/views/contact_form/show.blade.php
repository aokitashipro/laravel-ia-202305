<h1>詳細画面</h1>
<div>{{ $contact->id }}</div>
<div>{{ $contact->name }}</div>
<div>{{ $contact->email }}</div>
<div>{{ $contact->gender }}</div>
<div>{{ $contact->age }}</div>
<div>{{ $contact->message }}</div>

<a href="{{ route('contact.index') }}">一覧に戻る</a>
<a href="{{ route('contact.edit', $contact->id) }}">編集</a>

<form action="{{ route('contact.delete', $contact->id) }}" method="post">
@csrf
<input type="submit" value="削除">
</form>
