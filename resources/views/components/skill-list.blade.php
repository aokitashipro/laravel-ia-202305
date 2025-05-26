<ul>
  <li><a class="text-blue-400" href="{{ route('skills.index')}}">ユーザー毎のスキル一覧</a></li>
  <li><a class="text-blue-400" href="{{ route('skills.zeroIndex')}}">ユーザー毎のスキル一覧(最大値・設定なしは0)</a></li>
  @can('manager')
  <li><a class="text-blue-400" href="{{ route('skills.skillsAll')}}"">全ユーザースキル一覧</a></li>
  <li><a class="text-blue-400" href="{{ route('skills.create')}}"">スキル新規登録</a></li>
  @endcan('manager')
</ul>
