@extends('layouts.app')

@section('title', 'Visitas')

@section('scripts')
<script>
    const  routeStore = "{{ route('visitas.store') }}";
    const routeEdit = `/visitas/`;
</script>
<script src="{{ asset('js/visits.js') }}"></script>
@endsection

@section('content')

<div class="p-4 sm:ml-64 bg-gray-200">
    <div class="p-4 bg-white rounded-md">
        <div class="my-3">
            <p class="text-xl font-bold"> Visitas </p>
        </div>

        <button id="openModalBtn"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Agregar
        </button>

        @include('visits.partials.ModalCreate')
        @include('visits.partials.ModalEdit')

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full mt-7 text-sm text-left rtl:text-right text-gray-500 " id="visitTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NOMBRES
                        </th>
                        <th scope="col" class="px-6 py-3">
                            APELLIDOS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ESTADO
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <span class="">Acción</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="table-visits" class="text-center">
                    @foreach ($visits as $visit)
                    <tr class="py-2 border-b">
                        <th class="px-6 py-4" scope="row"> {{ $visit->id }}</th>
                        <th class="px-6 py-4"> {{ $visit->name }} </th>
                        <th class="px-6 py-4"> {{ $visit->lastname }} </th>
                        <th class="px-6 py-4"> {{ $visit->ci }} </th>
                        @if ($visit->state == 1)
                        <th class="px-6 py-4 text-green-500"> Activo </th>
                        @else
                        <th class="px-6 py-4 text-red-500"> Inactivo </th>
                        @endif
                        <th class="px-6 py-4">

                            <button value="{{ $visit->id }}"
                                class="btn-edit"> editar </button>

                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
