<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-semibold mb-4">List of Returns</h1>
                    <a href="{{ route('returns.create') }}"
                        class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Return</a>
                    @if (session('success'))
                        <div class="mt-4 py-2 px-4 bg-green-100 text-green-700 border border-green-300 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    <table class="w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">ID</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Booking ID</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Return Date</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Rental Days</th>
                                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Total Rental Cost</th>
                                <th class="px-2 py-2 bg-gray-200 border border-gray-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($returns as $return)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border border-gray-400">{{ $return->id }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $return->booking_id }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $return->return_date }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $return->rental_day }}</td>
                                    <td class="px-4 py-2 border border-gray-400">{{ $return->total_rental_cost }}</td>
                                    <td class="px-2 py-2">
                                        <div class="flex items-center justify-center space-x-4 text-sm">
                                            <form action="{{ route('returns.destroy', $return->id) }}" method="post"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-1 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray hover:bg-red-100"
                                                    onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
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
