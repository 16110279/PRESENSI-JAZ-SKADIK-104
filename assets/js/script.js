$(function () {
	$('.tampilModalUbah').on('click', function () {


		$('#formModalLabel').html('Ubah Data Menu');
		$('.modal-footer button[type=submit]').html('Ubah Menu');
		$('.modal-body form').attr('action', 'http://localhost/jaz/menu/ubah');

		// console.log('ubah');

		const id = $(this).attr("data-id");

		$.ajax({
			url: 'http://localhost/jaz/menu/getubah',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				//			$('#id').val(id)
				$('#id').val(data.id)
				$('#menu').val(data.menu)
				// 			$('#jurusan').val(data.jurusan)
			}
		})


	});

	$('.tombolTambahData').on('click', function () {

		$('#formModalLabel').html('Tambah Data Menu');
		$('.modal-footer button[type=submit]').html('Tambah Menu');
		$('.modal-body form').attr('action', 'http://localhost/jaz/menu/tambah');

		// console.log('tamabh');

		$('#menu').val('');
		// 	$('#nama').val('');
		// 	$('#jurusan').val('');

	});


	$('.ubahSubmenuModal').on('click', function () {
		console.log('ubah submenu cuy');


		$('#formModalSubmenuLabel').html('Ubah Data Submenu');
		$('.modal-footer button[type=submit]').html('Ubah SubMenu');
		$('.modal-body form').attr('action', 'http://localhost/jaz/menu/ubahsubmenu');

		const id = $(this).attr("data-id");

		$.ajax({
			url: 'http://localhost/jaz/menu/getubahSubmenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				$('#id').val(id)
				$('#title').val(data.title)
				$('#menu_id').val(data.menu_id)
				$('#url').val(data.url)
				$('#icon').val(data.icon)
				$('#is_active').val(data.is_active)
				// 			$('#jurusan').val(data.jurusan)
			}
		})


	});

	$('.ubahManageUserModal').on('click', function () {
		console.log('ubah Manage User');


		$('#formModalSubmenuLabel').html('Ubah Data User');
		$('.modal-footer button[type=submit]').html('Simpan');
		$('.modal-body form').attr('action', 'http://localhost/jaz/admin/ubahuser');

		const id = $(this).attr("data-id");

		$.ajax({
			url: 'http://localhost/jaz/admin/getubahUser',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				$('#id').val(id)
				$('#username').val(data.username)
				$('#nama').val(data.name)
				$('#role').val(data.role_id)
				$('#is_active').val(data.is_active)
				// 			$('#jurusan').val(data.jurusan)
			}
		})


	});

	$('.buttonTambahSubmenu').on('click', function () {

		$('#formModalLabel').html('Tambah Data Menu');
		$('.modal-footer button[type=submit]').html('Tambah Menu');
		$('.modal-body form').attr('action', 'http://localhost/jaz/menu/tambahSubMenu');

		console.log('tamabh submenu');

		$('#title').val('')
		$('#menu').val('')
		$('#url').val('')
		$('#icon').val('')
		$('#is_active').val('')

		// $('#menu').val('');
		// 	$('#nama').val('');
		// 	$('#jurusan').val('');

	});


	$('.modalUbahKeperluan').on('click', function () {

		$('#modalKeperluanLabel').html('Ubah Data Keperluan');
		$('.modal-footer button[type=submit]').html('Ubah Keperluan');
		$('.modal-body form').attr('action', 'http://localhost/jaz/petugas/ubahKeperluan');

		// console.log('ubah');

		const id = $(this).attr("data-id");

		$.ajax({
			url: 'http://localhost/jaz/petugas/getubah',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				//			$('#id').val(id)
				$('#id_keperluan').val(data.id_keperluan)
				$('#nama_keperluan').val(data.nama_keperluan)
				$('#is_active').val(data.is_active)
			}
		})


	});


	$('.tombolCoba').on('click', function () {
		const id_member = ''

		$.ajax({
			url: 'http://localhost/jaz/petugas/autofill_ajax',
			data: {
				id_member: id_member
			},
			method: 'post',
			dataType: 'json',
			// data: "id_member=" + id_member,
			success: function (data) {

				$('#nama').val(data.nama_member);
				console.log('data');


			}
		})
	});





});
