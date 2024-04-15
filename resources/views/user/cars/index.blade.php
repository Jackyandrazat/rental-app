<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center">List of Cars</h1>
                    <table id="cars-table" class="w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Brand</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Model</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Plate</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Budget</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->brand }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->model }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->license_plate }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->rental_rate_per_day }}</td>
                                    <td
                                        class="px-4 py-2 border border-gray-400  
                                    @if ($car->status == 'available') text-green-400
                                    @elseif($car->status == 'reserved')
                                    text-orange-400 @endif">
                                        {{ $car->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/search.js') }}" defer></script>
</x-app-layout>
