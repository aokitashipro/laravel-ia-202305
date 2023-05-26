<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            家具一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form action="{{ route('furnitures.index')}}" method="get">
                  <div class="flex flex-wrap">
                  <div>
                    <label for="prefecture" class="leading-7 text-sm text-gray-600">都道府県</label>
                    <select name="prefecture">
                      <option value="all">全国</option>
                      @for($i = 0; $i < 47 ; $i++)
                        <option value="{{ Prefecture::LIST[$i] }}">{{ Prefecture::LIST[$i] }}</option>
                      @endfor
                    </select>
                  </div>
                  <div>
                    <label for="order" class="leading-7 text-sm text-gray-600">並び順</label>
                    <select name="order">
                      <option value="latest">新着順</option>
                      <option value="popular">人気順</option>
                      <option value="low_price">安い順</option>
                      <option value="high_price">高い順</option>
                    </select>
                  </div>
                  <div>
                    <label for="min_price" class="leading-7 text-sm text-gray-600">最小価格</label>
                    <input type="number" id="min_price" name="min_price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                  <div>
                    <label for="max_price" class="leading-7 text-sm text-gray-600">最大価格</label>
                    <input type="number" id="max_price" name="max_price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                </div>
                <div class="p-2 w-full">
                  <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-md">検索する</button>
                </div>
              </form>
                </div>
                {{-- output --}}
                <table>
                  <tr>
                    <th>都道府県</th>
                    <th>品名</th>
                    <th>価格</th>
                    <th>評価</th>
                    <th>登録日</th>
                  </tr>
                @foreach($furnitures as $furniture)
                <tr>
                  <td>{{ $furniture->prefecture }}</td>
                  <td>{{ $furniture->name }}</td>
                  <td>{{ $furniture->price }}</td>
                  <td>{{ $furniture->review }}</td>
                  <td>{{ $furniture->created_at }}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
