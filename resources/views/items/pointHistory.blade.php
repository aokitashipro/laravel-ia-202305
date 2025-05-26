<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ポイント履歴
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                        <x-relationtest-link />
                    </div>                
                    現在の合計: {{ $user->total_point}}
                    <br><br>
                    @foreach($user->pointHistory as $point)
                        更新日: {{ $point->created_at}} 
                        ポイント: {{ $point->amount}} 
                        理由: 
                        @if($point->reason == 0) 付与
                        @elseif($point->reason == 1) 商品購入
                        @endif
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
