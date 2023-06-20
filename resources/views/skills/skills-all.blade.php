<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            全メンバースキル一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <x-skill-list />
                    @foreach($users as $user)
                    <div class="mb-8">
                      <p>ユーザー名: {{ $user->name }}</p>
                      <ul>
                      @foreach($user->skills as $skill)
                      <li>スキル名:{{ $skill->name }} スキル値: {{ $skill->pivot->score }}</li>
                      @endforeach
                      </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
