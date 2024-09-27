@extends('layouts.app')

@section('title', 'Visitas')

@section('scripts')
<script>
    const modal = document.getElementById('myModal');
    const modal2 = document.getElementById('myModal2');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const closeButtonBtnEdit = document.getElementById('closeButtonBtnEdit');

    openModalBtn.addEventListener('click', function() {
        modal.style.display = 'flex';
    });


    closeModalBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    closeButtonBtnEdit.addEventListener('click', function() {
        modal2.style.display = 'none';
    });


    window.addEventListener('click', function(event) {
            if (event.target === modal || event.target === modal2) {
                modal.style.display = 'none';
                modal2.style.display = 'none';
            }
        });

    document.getElementById('form-create').addEventListener('submit', function(e) {
    e.preventDefault();
    modal.style.display = 'none'
    let formData = new FormData(this);

    fetch('{{ route('visitas.store') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        this.reset();
        const visits = data.visits;
        const tbody = document.getElementById('table-visits');
        console.log(visits);

        tbody.innerHTML = '';


        visits.forEach(visit => {
            const row = document.createElement('tr');
            row.classList.add('py-2');
            row.classList.add('border-b');


            const idCell = `<th class="px-6 py-4" scope="row">${visit.id}</th>`;
            const nameCell = `<th class="px-6 py-4">${visit.name}</th>`;
            const lastnameCell = `<th class="px-6 py-4">${visit.lastname}</th>`;
            const ciCell = `<th class="px-6 py-4">${visit.ci}</th>`;
            const stateCell = `<th class="px-6 py-4 ${visit.state === 1 ? ' text-green-500"> Activo' : ' text-red-500"> Inactivo'} </th>`;


            const actionCell = `
                <th class='px-6 py-4'>
                    <button value="${visit.id}" data-modal-show="edit-modal" data-modal-show="edit-modal" class="btn-edit" >Editar </button>
                </th>
            `;




            row.innerHTML = idCell + nameCell + lastnameCell + ciCell + stateCell + actionCell;


            tbody.appendChild(row);
        })
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
document.getElementById('form-edit').addEventListener('submit', function(e) {
    e.preventDefault();
    modal2.style.display = 'none'

    let formDataa = new FormData(this);
    const visitId = document.getElementById('idModalEdit').value;
    const routeUpdate = `/visitas/update/${visitId}`;


    fetch(routeUpdate, {
        method: 'POST',
        body: formDataa,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud');
        }
        return response.json();
    })
    .then(data => {
        const visits = data.visits;
        const tbody = document.getElementById('table-visits');
        console.log(visits)

        tbody.innerHTML = '';


        visits.forEach(visit => {
            const row = document.createElement('tr');
            row.classList.add('py-2');
            row.classList.add('border-b');


            const idCell = `<th class="px-6 py-4" scope="row">${visit.id}</th>`;
            const nameCell = `<th class="px-6 py-4">${visit.name}</th>`;
            const lastnameCell = `<th class="px-6 py-4">${visit.lastname}</th>`;
            const ciCell = `<th class="px-6 py-4">${visit.ci}</th>`;
            const stateCell = `<th class="px-6 py-4 ${visit.state === 1 ? ' text-green-500 "> Activo' : ' text-red-500 "> Inactivo'}</th>`;


            const actionCell = `
                <th class='px-6 py-4'>
                    <button value="${visit.id}" data-modal-target="edit-modal" class="btn-edit" >Editar</button>
                </th>
            `;


            row.innerHTML = idCell + nameCell + lastnameCell + ciCell + stateCell + actionCell;


            tbody.appendChild(row);
        });


        assignEditButtonListeners();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


function assignEditButtonListeners() {
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.value;
        });
    });
}

visitTable.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-edit')) {
        console.log(this)
        modal2.style.display = 'flex'
        const visitId = event.target.getAttribute('value');
        const routeEdit = `/visitas/${visitId}/edit`;
        fetch(routeEdit)
            .then(response => response.json())
            .then(data => {

                document.getElementById('idModalEdit').value = data.visit.id;
                document.getElementById('name2').value = data.visit.name;
                document.getElementById('lastname2').value = data.visit.lastname;
                document.getElementById('ci2').value = data.visit.ci;
                document.getElementById('phone2').value = data.visit.phone;
                document.getElementById('email2').value = data.visit.email;
                document.getElementById('time2').value = data.visit.time;
                document.getElementById('date2').value = data.visit.date;
                document.getElementById('state2').value = data.visit.state;
                const editModal = document.getElementById('edit-modal');
                editModal.classList.remove('hidden');
                editModal.setAttribute('aria-hidden', 'false');
            })
            .catch(error => console.error('Error al obtener los datos:', error));
    }
});



</script>
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
