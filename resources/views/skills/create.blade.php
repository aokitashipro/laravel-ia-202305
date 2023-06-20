<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スキル新規登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <x-skill-list />
                    <form action="{{ route('skills.store')}}" method="post">
                    @csrf
                      スキル名:<input type="text" name="name" value="{{ old('name')}}" />
                      <button type="submit">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
