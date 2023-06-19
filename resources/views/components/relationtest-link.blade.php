{{-- 属性を受け取るには @propsで指定する --}}
@props([
  'title', 'userName'])

{{-- Gateの練習 --}}
@can('paid-user')
  有料ユーザーだけ表示
@endcan

{{ $title }}{{ $userName }}

<ul>
  <li><a class="text-blue-400" href="{{ route('items.index')}}">一覧</a></li>
  <li><a class="text-blue-400" href="{{ route('items.purchase')}}"">購入画面</a></li>
  <li><a class="text-blue-400" href="{{ route('items.purchaseHistory')}}"">購入履歴</a></li>
  <li><a class="text-blue-400" href="{{ route('items.pointHistory')}}"">ポイント履歴</a></li>
</ul>
