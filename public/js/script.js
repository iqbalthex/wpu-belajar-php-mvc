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
			getData(id);
		}
	});
};

const getData = id => {
	const ajax = new XMLHttpRequest();

	ajax.onreadystatechange = () => {
		if( ajax.readyState == 4 && ajax.status == 200 ){
			const { id, name, nim, email, study } = JSON.parse(ajax.responseText);
			formId.value = id;
			formName.value = name;
			formNim.value = nim;
			formEmail.value = email;
			formStudy.value = study;
		}
	}

	ajax.open('POST', `${BASEURL}/mahasiswa/get_data/${id}`, true);
	ajax.send();
}
