const ajaxRequest = (method, callback) => {
	const ajax = new XMLHttpRequest();

	ajax.onreadystatechange = () => {
		if( ajax.readyState == 4 && ajax.status == 200 ){
			callback(ajax.responseText);
		}
	}

	ajax.open('POST', `${BASEURL}/mahasiswa/${method}`, true);
	ajax.send();
}


const editData = data => {
	const { id, name, nim, email, study } = JSON.parse(data);
	formId.value = id;
	formName.value = name;
	formNim.value = nim;
	formEmail.value = email;
	formStudy.value = study;
}


const renderData = datas => {
	let cont = '';
	if(datas != '[]'){
		JSON.parse(datas).forEach(data => {
			cont += `<li class="list-group-item fs-5">
				${data.name}
				<a href="${BASEURL}/mahasiswa/delete/${data.id}" class="badge fs-6 text-bg-danger text-decoration-none float-end" onclick="return confirm('Yakin?')">Hapus</a>
				<a href="${BASEURL}/mahasiswa/edit/${data.id}" class="badge fs-6 text-bg-success text-decoration-none float-end mx-2 editModal" data-bs-toggle="modal" data-bs-target="#formModal" data-id="${data.id}">Edit</a>
				<a href="${BASEURL}/mahasiswa/detail/${data.id}" class="badge fs-6 text-bg-primary text-decoration-none float-end">Detail</a>
			</li>`;
		});
	} else cont += `Tidak ditemukan data dengan kata "${keyword.value}"`;

	document.querySelector('.list-group').innerHTML = cont;
}


let timeOut;
const searchData = () => {
	timeOut && clearTimeout(timeOut);
	timeOut = setTimeout(() => {
		ajaxRequest(`search/${keyword.value}`, renderData)
	}, 200);
}


window.onload = () => {
	const formModalAction = document.querySelector('#formModal form');
	const formModalLabel = document.getElementById('formModalLabel');
	const btnSubmit = document.querySelector('button[type=submit]');

	document.querySelector('.addData').onclick = () => {
		formModalAction.action = `${BASEURL}/mahasiswa/add`;

		formModalLabel.innerHTML = 'Tambah Data Mahasiswa';
		btnSubmit.innerHTML = 'Tambah Data';

		formName.value = '';
		formNim.value = '';
		formEmail.value = '';
		formStudy.value = '';
	}

	document.querySelectorAll('.editModal').forEach(el => {
		el.onclick = function(){
			formModalAction.action = `${BASEURL}/mahasiswa/edit`;

			formModalLabel.innerHTML = 'Ubah Data Mahasiswa';
			btnSubmit.innerHTML = 'Ubah Data';

			const id = this.dataset.id;
			ajaxRequest(`get_data/${id}`, editData);
		}
	});

	keyword.oninput = searchData;
};
