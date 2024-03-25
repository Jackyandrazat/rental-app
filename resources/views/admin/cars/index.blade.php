<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center">List of Cars</h1>
                    <a href="{{ route('cars.create') }}"
                        class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Cars</a>
                    <table class="w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr class="text-center">
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Brand</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Model</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Plate</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Budget</th>
                                <th class="px-2 py-2 bg-gray-200 border border-gray-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->brand }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->model }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->license_plate }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $car->rental_rate_per_day }}</td>
                                    <td class="px-2 py-2">
                                        <div class="flex items-center justify-center space-x-4 text-sm">
                                            <a href="{{ route('cars.edit', ['car' => $car->id]) }}"
                                                class="flex items-center justify-between px-2 py-1 text-green-600 rounded-lg focus:outline-none focus:shadow-outline-gray hover:bg-green-100">
                                                Edit
                                            </a>

                                            <form action="{{ route('cars.destroy', ['car' => $car->id]) }}"
                                                method="post" class="inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    class="flex items-center justify-between px-2 py-1 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray hover:bg-red-100"
                                                    aria-label="Delete" type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this data?')">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
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
