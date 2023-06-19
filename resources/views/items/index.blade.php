<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        買える商品一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
              <div class="mb-8">
                {{ Item::REASON['BUY_ITEM'] }}
                
                <x-relationtest-link title="コンポーネントに値を渡せます" :userName="$user->name" />

              </div>                
              @foreach($items as $item)
                商品名: {{ $item->name }}<br>
                価格: {{ $item->price }}<br>
                在庫: {{ $item->current_stock }}<br>
              @endforeach

              </div>
            </div>
        </div>
    </div>
</x-app-layout>
