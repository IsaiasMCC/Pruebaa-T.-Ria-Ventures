@extends('layouts.app')

@section('title', 'Ejecutivos')

@section('scripts')
<script>
    const routeSave = "{{ route('ejecutivos.store') }}";
    const routeEdit = `/ejecutivos/`;
    window.routeUpdate = "{{ route('ejecutivos.update', ':id') }}";
</script>
<script src="{{ asset('js/executive.js') }}"></script>
@endsection

@section('content')
<div class="p-4 sm:ml-64 bg-gray-200">
    <div class="p-4 bg-white rounded-md">
        <div class="my-3">
            <p class="text-xl font-bold"> Ejecutivos </p>
        </div>

        <button id="openModalBtn"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Agregar
        </button>

        @include('executives.partials.ModalCreate')
        @include('executives.partials.ModalEdit')

        <!-- Tabla de Ejecutivos -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full mt-7 text-sm text-left rtl:text-right text-gray-500" id="executiveTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombres</th>
                        <th scope="col" class="px-6 py-3">Apellidos</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody id="table-executives" class="text-center">
                    @foreach ($executives as $executive)
                    <tr class="py-2 border-b">
                        <th class="px-6 py-4">{{ $executive->id }}</th>
                        <th class="px-6 py-4">{{ $executive->name }}</th>
                        <th class="px-6 py-4">{{ $executive->lastname }}</th>
                        @if ($executive->state == 1)
                        <th class="px-6 py-4 text-green-500"> Activo </th>
                        @else
                        <th class="px-6 py-4 text-red-500"> Inactivo </th>
                        @endif
                        <th class="px-6 py-4">
                            <button value="{{ $executive->id }}" class="btn-edit"> Editar </button>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
