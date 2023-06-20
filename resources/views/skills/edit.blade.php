<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スキル編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <x-skill-list />
                    <form action="{{ route('skills.update', $skill->id)}}" method="post">
                    @csrf
                      スキル名: {{ $skill->name }} <br>
                      スコア :
                      <select name="score">
                        @for($i=0 ; $i < 11; $i++ )
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                      <button type="submit">更新する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
