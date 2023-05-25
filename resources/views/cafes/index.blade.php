<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            index
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if (session('flash_message'))
            <div class="mx-auto bg-blue-300">
                {{ session('flash_message') }}
            </div>
            @endif
            
                <div class="p-6 text-gray-900">
                  <div class="flex justify-center mb-8">
                    <a href="{{ route('cafes.create') }}" class=" text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規作成</a>
                  </div>
                  <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">店名</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
          </tr>
        </thead>
        <tbody>
        @foreach($cafes as $cafe)
          <tr>
            <td class="px-4 py-3">{{ $cafe->name }}</td>
            <td class="text-center">
            <a href="{{ route('cafes.show', $cafe->id) }}" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">詳細表示</a>
            </td>
          </tr>
        @endforeach          
        </tbody>
      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
