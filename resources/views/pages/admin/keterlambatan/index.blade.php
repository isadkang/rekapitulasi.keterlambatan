@extends('layouts.template')

@section('content')
    <div class="mt-5 max-w-full mx-10">
        <div class="container mb-5">
            <h2 class="text-3xl font-semibold mb-2">Data Keterlambatan</h2>
            <p>Admin / Data Keterlambatan</p>
        </div>
        @if (Session::get('success'))
            <div class=" bg-green-300 bg-opacity-50 px-2 py-4 rounded-md flex justify-center items-center mb-5">
                {{ Session::get('success') }}</div>
        @endif
        <div class="handle">
            <a href="{{ route('late.create') }}"
                class="py-2 px-4 bg-yellow-500 hover:bg-yellow-600 transition duration-300 rounded-md text-white font-medium mb-5">Tambah</a>
            <a href="{{ route('late.export') }}"
                class="py-2 px-4 bg-blue-500 hover:bg-blue-600 transition duration-300 rounded-md text-white font-medium mb-5">Export
                Data Keterlambatan</a>
        </div>

        <div class="relative top-6 overflow-x-auto shadow-md sm:rounded-lg">
            <div class="mt-5 flex">
                <a href="{{ route('late.home') }}" id="all" class="text-blue-500 border-t border-l border-r p-2 rounded-t">Keseluruhan Data</a>
                <a href="{{ route('late.rekap') }}" id="rekap" class="hover:text-blue-500 p-2">Rekapitulasi Data</a>
            </div>
            <table class="w-full text-sm text-center rtl:text-right  text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Informasi
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @php $no = 1 @endphp
                @foreach ($lates as $item)
                    <tbody>
                        <tr>
                            <td class="px-6 py-4">
                                {{ $no++ }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->student['name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->date_time_late }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->information }}
                            </td>

                            <td class="flex gap-2 items-center justify-center">
                                <div class="mb-4">
                                    <a href="{{ route('late.edit', $item['id']) }}"
                                        class=" py-2 px-4 bg-green-500 hover:bg-green-600 transition duration-300 rounded-md text-white font-medium">Edit</a>
                                </div>
                                <form method="POST" action="{{ route('late.delete', $item->id) }}"
                                    onsubmit="return confirm('Are You Sure Want To Delete This?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="py-2 px-4 bg-red-500 hover:bg-red-600 transition duration-300 rounded-md text-white font-medium">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach

            </table>
        </div>

    </div>
@endsection

<script></script>
