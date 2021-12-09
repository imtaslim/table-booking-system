<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-3">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-gray-400 border-b border-gray-200">
                                    <p style="font-size: 25px" align='center'>{{ $table }} no. Table</p><br> 
                                    <table class="border-collapse border border-gray-800" style="width: 100%; margin-left: auto; margin-right: auto;">
                                        <thead>
                                        <tr>
                                            <th class="border border-gray-600 px-8">Date</th>
                                            <th class="border border-gray-600 px-8">Start Time</th>
                                            <th class="border border-gray-600 px-8">end Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                @if($book->status == 1)
                                                    <tr align="center">
                                                        <td class="border border-gray-600 px-8">{{ $book->date }}</td>
                                                        <td class="border border-gray-600 px-8">{{ $book->start_time }}</td>
                                                        <td class="border border-gray-600 px-8">{{ $book->end_time }}</td>
                                                    </tr>
                                                @endif 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <form class="w-full max-w-sm" action="{{ route('booking') }}" method="POST">
                            @csrf
                            <input type="hidden" name="table_id" value="{{ $table }}">
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Date
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="date" name="date" value="{{ old('date') }}">
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Start Time
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="time" name="start_time" value="{{ old('start_time') }}">
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                                    End Time
                                </label>
                                </div>
                                <div class="md:w-2/3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="time" name="end_time" value="{{ old('end_time') }}"> 
                                </div>
                            </div>
                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-2/3">
                                <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Book Now">
                                </div>
                            </div>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>