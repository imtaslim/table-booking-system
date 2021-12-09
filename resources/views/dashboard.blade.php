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
                                    <div align='center'>Tables</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 p-6">
                        @foreach ($tables as $table)
                            <div class="bg-green-700 p-8 relative sm:rounded-lg" style="height: 150px;">
                                <div class="text-white">{{ $table->id }} no. Table</div>
                                
                                <div class="absolute bottom-8 left-8">
                                    <a href="{{ route('bookingTime', $table->id) }}" class="shadow bg-red-600 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Book</a>
                                </div>
                            </div>
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
