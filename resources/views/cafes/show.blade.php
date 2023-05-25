<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            show
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <div class="flex justify-center">     
              <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="p-2 w-full">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">カフェの名前</label>
            <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $cafe->name }}</div>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="prefecture" class="leading-7 text-sm text-gray-600">都道府県</label>
            <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $cafe->prefecture}}</div>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="address" class="leading-7 text-sm text-gray-600">区市町村</label>
            <div type="text" id="address" name="address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $cafe->address}}</div>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="review" class="leading-7 text-sm text-gray-600">評価 (1.0 - 5.0)</label>
            <div type="number" step="0.1" id="review" name="review" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $cafe->review }}</div>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            @if($cafe->is_visible == '1')
            <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">表示</div>
            @endif
            @if($cafe->is_visible == '0')
            <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">非表示</div>
            @endif
          </div>
        </div>

        <div class="p-2 w-full">
          <a href="{{ route('cafes.edit', $cafe->id )}}" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-md">編集する</a>
        </div>
      
      </div>
        </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
