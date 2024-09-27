
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

    fetch(routeSave, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        this.reset();
        const executives = data.executives;
        const tbody = document.getElementById('table-executives');
        console.log(executives);

        tbody.innerHTML = '';

        executives.forEach(executive => {
            const row = document.createElement('tr');
            row.classList.add('py-2');
            row.classList.add('border-b');

            const idCell = `<th class="px-6 py-4" scope="row">${executive.id}</th>`;
            const nameCell = `<th class="px-6 py-4">${executive.name}</th>`;
            const lastnameCell = `<th class="px-6 py-4">${executive.lastname}</th>`;
            const stateCell = `<th class="px-6 py-4 ${executive.state === 1 ? ' text-green-500"> Activo' : ' text-red-500"> Inactivo'} </th>`;

            const actionCell = `
                <th class='px-6 py-4'>
                    <button value="${executive.id}" data-modal-show="edit-modal" data-modal-show="edit-modal" class="btn-edit" >Editar </button>
                </th>
            `;

            row.innerHTML = idCell + nameCell + lastnameCell + stateCell + actionCell;

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
    const executiveId = document.getElementById('idModalEdit').value;

    const routeUpdateUrl = window.routeUpdate.replace(':id', executiveId);
    fetch(routeUpdateUrl, {
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
        const executives = data.executives;
        const tbody = document.getElementById('table-executives');

        tbody.innerHTML = '';

        executives.forEach(executive => {
            const row = document.createElement('tr');
            row.classList.add('py-2');
            row.classList.add('border-b');

            const idCell = `<th class="px-6 py-4" scope="row">${executive.id}</th>`;
            const nameCell = `<th class="px-6 py-4">${executive.name}</th>`;
            const lastnameCell = `<th class="px-6 py-4">${executive.lastname}</th>`;
            const stateCell = `<th class="px-6 py-4 ${executive.state === 1 ? ' text-green-500 "> Activo' : ' text-red-500 "> Inactivo'}</th>`;


            const actionCell = `
                <th class='px-6 py-4'>
                    <button value="${executive.id}" data-modal-target="edit-modal" class="btn-edit" >Editar</button>
                </th>
            `;


            row.innerHTML = idCell + nameCell + lastnameCell + stateCell + actionCell;


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


executiveTable.addEventListener('click', function(event) {
    if (event.target.classList.contains('btn-edit')) {
        console.log(this)
        modal2.style.display = 'flex'
        const executiveId = event.target.getAttribute('value');


        fetch(routeEdit + executiveId + "/edit")
            .then(response => response.json())
            .then(data => {
                document.getElementById('idModalEdit').value = data.executive.id;
                document.getElementById('name2').value = data.executive.name;
                document.getElementById('lastname2').value = data.executive.lastname;
                document.getElementById('phone2').value = data.executive.phone;
                document.getElementById('address2').value = data.executive.address;
                document.getElementById('position2').value = data.executive.position;
                document.getElementById('photoPreview2').src  = `storage/images/${data.executive.photo}`;
                document.getElementById('photoPreview2').classList.remove('hidden');
                document.getElementById('state2').value = data.executive.state;
            })
            .catch(error => console.error('Error al obtener los datos:', error));
    }
});



    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function() {
            const preview = document.getElementById('photoPreview');
            const preview2 = document.getElementById('photoPreview2');
            preview.src = reader.result;
            preview2.src = reader.result;
            preview.classList.remove('hidden');
            preview2.classList.remove('hidden');
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

