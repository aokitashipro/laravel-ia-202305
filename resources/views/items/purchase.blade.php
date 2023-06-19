<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="mb-8">
                        <x-relationtest-link />
                    </div>  
<form method="post" action="{{ route('items.store')}}">
  @csrf
  商品:
  <select name="item_id">
    <option value="0">選択してください</option>
    @foreach($items as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
  </select>
  <br><br>
  数量:
  <input type="number" name="amount" min="0" max="{{ $item->current_stock}}">
  <br><br>
  現在のポイント: {{ $user->total_point}}
  <br><br>
  使用ポイント
  <input type="number" name="point" value="0" min="0" max="{{ $user->total_point }}">
  <br><br>
  <button class="px-4 py-2 bg-blue-400 text-white" type="submit">送信</button>
</form>

</div>
            </div>
        </div>
    </div>
</x-app-layout>
