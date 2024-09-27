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

    fetch(routeStore, {
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
        fetch(routeEdit + `${visitId}/edit`)
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
