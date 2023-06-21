<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スキル一覧画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <x-skill-list />
                    <table>
                      <tr>
                        <th>スキル名</th>
                        <th>スコア</th>
                        <th>追加日</th>
                        <th>編集</th>
                      </tr>
                    @foreach($user->skills as $skill)
                    <tr>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->pivot->score }}</td>
                        <td>{{ $skill->pivot->created_at }}</td>
                        <td><a href="{{ route('skills.edit', $skill->id )}}">編集</a></td>
                      </tr>
                    @endforeach
                    </table>
                    @foreach($skills as $skill)
                    {{ $skill->id}} : {{$skill->name}}
                    @endforeach

                    {{ $skills->links() }}
                  </div>
            </div>
        </div>
    </div>

</x-app-layout>
