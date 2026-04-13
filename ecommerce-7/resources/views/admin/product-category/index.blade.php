<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">Daftar Kategori Produk</h3>
                        <a href="{{ route('product-categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Kategori
                        </a>
                    </div>
                    <table id="productCategoriesTable" class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Nama Kategori</th>
                                <th class="px-6 py-3">Slug</th>
                                <th class="px-6 py-3">Jumlah Produk</th>
                                <th class="px-6 py-3">Jumlah Stok</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productCategories as $category)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $category->id }}</td>
                                    <td class="px-6 py-4">{{ $category->name }}</td>
                                    <td class="px-6 py-4">{{ $category->slug }}</td>
                                    <td class="px-6 py-4">{{ $category->products_count }}</td>
                                    <td class="px-6 py-4">{{ $category->total_stock }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('product-categories.edit', $category->id) }}" class="bg-yellow-600 transition hover:bg-yellow-900 text-white rounded-md px-3 py-1.5">Edit</a>
                                        <form action="{{ route('product-categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 transition hover:bg-red-900 text-white rounded-md px-3 py-1.5">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    @endpush

    @push('scripts')
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#productCategoriesTable').DataTable();
            });
        </script>
    @endpush
</x-app-layout>
