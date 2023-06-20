<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            スキル一覧画面(スコア最大値のみ表示・未設定なら0表示)
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
                        <th>編集</th>
                      </tr>
                  @foreach($skills as $allSkill)
                      <tr>
                      <td>{{ $allSkill->name }}</td>
                      <td> @if(array_key_exists($allSkill->id, $userSkill))
                        {{ $userSkill[$allSkill->id]}} 
                        @else 0 @endif </td> 
                      <td><a href="{{ route('skills.zeroEdit', $allSkill->id )}}">編集</a></td>
                      </tr> 
                  @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
