<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            分析用
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 <div>
                  <form action="{{ route('analysis.index')}}" method="get">
                    <select name="year">
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      </select>
                      <button type="submit">グラフ描画</button>
                  </form>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
  <script>
  // phpの変数を jsの変数に置き換える必要がある
  // phpのjson_encodeやjsonディレクティブで対応
  const year = @json($year);
  const yearArray = @json($yearArray);
  const salesArray = @json($salesArray);

  document.addEventListener('DOMContentLoaded', function() {

    const ctx = document.getElementById("myChart").getContext("2d");
    const myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: yearArray,
        datasets: [
            {
                label: year,
                data: salesArray,
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 159, 64, 1)",
                ],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
    });
})
    </script>

</x-app-layout>
