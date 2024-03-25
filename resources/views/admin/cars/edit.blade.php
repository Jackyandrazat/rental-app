<x-app-layout>
    <div class="max-w-lg mx-auto mt-10">
        <h1 class="text-2xl font-semibold mb-4">Edit Car</h1>
        <form action="{{ route('cars.update', $car->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Brand:</label>
                <input type="text" name="brand" id="brand" value="{{ $car->brand }}" placeholder="Enter brand" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model:</label>
                <input type="text" name="model" id="model" value="{{ $car->model }}" placeholder="Enter model" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="license_plate" class="block text-gray-700 text-sm font-bold mb-2">Plate:</label>
                <input type="text" name="license_plate" id="license_plate" value="{{ $car->license_plate }}" placeholder="Enter Plate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="rental_rate_per_day" class="block text-gray-700 text-sm font-bold mb-2">Rental Rate:</label>
                <input type="text" name="rental_rate_per_day" id="rental_rate_per_day" value="{{ $car->rental_rate_per_day }}" placeholder="Enter model" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Car</button>
                <a href="{{ route('cars.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>