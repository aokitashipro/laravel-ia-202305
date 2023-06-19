<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入履歴
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="mb-8">
                        <x-relationtest-link />
                    </div>  
                    中間テーブル内の列の情報を表示するにはpivotを使う
                    <br><br>
                    @foreach($user->items as $item)
                      購入日: {{ $item->pivot->created_at }} 
                      商品名: {{ $item->name }} 
                      購入時の価格: {{ $item->pivot->price }} 
                      購入数: {{ $item->pivot->amount }} 
                      <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
