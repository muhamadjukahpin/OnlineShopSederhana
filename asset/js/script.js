$(document).ready(function () {
	const base_url = "http://localhost/olshop/";

	$('.showNewMenuModal').on('click', function (e) {
		e.preventDefault();
		$('#addNewMenuLabel').html('Add New Menu');
		$('.modal-footer button[type=submit]').html('Add Menu');
		$('.modal-body form').attr("action", base_url + "menu/addMenu");

		$('#id').val("");
		$('#menu_id').val("");
		$('#menu').val("");

	});

	$('.showEditMenu').on('click', function (e) {
		e.preventDefault();
		$('#addNewMenuLabel').html('Edit Menu');
		$('.modal-footer button[type=submit]').html('Edit Menu');
		$('.modal-body form').attr("action", base_url + "menu/editMenu");

		const id = $(this).data('id');
		console.log(id);


		$.ajax({

			url: base_url + 'menu/getedit',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#menu_id').val(data.menu_id);
				$('#menu').val(data.menu);

			}

		});


	});



	$('.showNewSubmenuModal').on('click', function (e) {
		e.preventDefault();
		$('#addNewSubmenuLabel').html('Add New Submenu');
		$('.modal-footer button[type=submit]').html('Add Submenu');
		$('.modal-body form').attr("action", base_url + "menu/addSubmenu");

		$('#id').val("");
		$('#menu_id').val("");
		$('#title').val("");
		$('#url').val("");
		$('#icon').val("");

	});

	$('.showEditSubmenu').on('click', function (e) {
		e.preventDefault();
		$('#addNewSubmenuLabel').html('Edit Submenu');
		$('.modal-footer button[type=submit]').html('Edit Submenu');
		$('.modal-body form').attr("action", base_url + "menu/editSubmenu");

		const id = $(this).data('id');


		$.ajax({

			url: base_url + 'menu/geteditSubmenu',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#menu_id').val(data.menu_id);
				$('#title').val(data.title);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
			}

		});


	});





	$('.showNewRoleModal').on('click', function (e) {
		e.preventDefault();
		$('#addNewRoleLabel').html('Add New Role');
		$('.modal-footer button[type=submit]').html('Add Role');
		$('.modal-body form').attr("action", base_url + "admin/addRole");

		$('#id').val("");
		$('#role_id').val("");
		$('#role').val("");

	});


	$('.showEditRole').on('click', function (e) {
		e.preventDefault();
		$('#addNewRoleLabel').html('Edit Role');
		$('.modal-footer button[type=submit]').html('Edit Role');
		$('.modal-body form').attr("action", base_url + "admin/editRole");

		const id = $(this).data('id');


		$.ajax({

			url: base_url + 'admin/geteditRole',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#role_id').val(data.role_id);
				$('#role').val(data.role);
			}

		});


	});
	$('.showAddress').on('click', function (e) {
		e.preventDefault();
		$('#addNewAddressLabel').html('Add New Address');
		$('.modal-footer button[type=submit]').html('Add Address');
		$('.modal-body form').attr("action", base_url + "user/addAddress");

		$('#id').val("");
		$('#name').val("");
		$('#street_name').val("");
		$('#id_province').val("")
		$('#province').val("");
		$('#id_city').val("");
		$('#city_name').val("");
		$("#id_city").prop("disabled", true);
		$('#sub_district').val("");
		$('#urban_village').val("");
		$('#no_hp').val("");
		$('#label').val("");
		$('#description').val("");

	});


	$('.showEditAddress').on('click', function (e) {
		e.preventDefault();
		$('#addNewAddressLabel').html('Edit Address');
		$('.modal-footer button[type=submit]').html('Edit Address');
		$('.modal-body form').attr("action", base_url + "user/editAddress");

		const id = $(this).data('id');


		$.ajax({

			url: base_url + 'user/geteditAddress',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#email').val(data.email);
				$('#name').val(data.name);
				$('#street_name').val(data.street_name);
				$('#id_province').val(data.id_province);
				$('#province').val(data.province);
				$('#id_city').val(data.id_city);
				$("#id_city").prop("disabled", false);
				$('#city_name').val(data.city_name);
				$('#sub_district').val(data.sub_district);
				$('#urban_village').val(data.urban_village);
				$('#no_hp').val(data.no_hp);
				$('#label').val(data.label);
				$('#description').val(data.description);
			}

		});


	});

	$('.form-check-input').on('click', function (e) {
		e.preventDefault();
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: base_url + 'admin/changeaccess',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			method: 'post',
			// dataType: 'json',
			success: function () {
				document.location.href = base_url + 'admin/roleAccess/' + roleId;
			}
		});

	});


	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

	$('.showDes').on('click', function (e) {
		e.preventDefault();
		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'user/getitem',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.description').html(data.description);
			}

		});

	});

	$('.editRole').on('click', function (e) {
		e.preventDefault();
		const id = $(this).data('id');

		$.ajax({
			url: base_url + 'admin/getuser',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#role_id').val(data.role_id)
			}
		});
	});


	var $id_province = $("#id_province");

	$.getJSON(`${base_url}user/province`, function (data) {
		$.each(data, function (i, value) {
			$.each(value.results, function (i, val) {
				$id_province.append(`<option value="${val.province_id}">${val.province}</option>`);
			});
		});

	});



	$("#id_province").on("change", function (e) {
		e.preventDefault();
		var $province = $("#province");
		$prov = $('option:selected', this).text();
		$province.val($prov);

		var option = $('option:selected', this).val();
		$('#id_city option:gt(0)').remove();
		if (option === '') {
			alert('null');
			$("#id_city").prop("disabled", true);
		} else {
			$("#id_city").prop("disabled", false);
			getKota(option);
		}
	});

	function getKota(idprov) {
		var $id_city = $("#id_city");

		$.getJSON(`${base_url}user/city/${idprov}`, function (data) {
			$.each(data, function (i, value) {
				$.each(value.results, function (j, val) {
					$id_city.append(`<option value="${val.city_id}">${val.type} ${val.city_name}</option>`);
				});
			});

		});

	}

	$('#id_city').on('change', function (e) {
		e.preventDefault();
		$("#city_name").prop("disabled", false);
		var $city = $("#city_name");
		$c = $('option:selected', this).text();
		$city.val($c);
	});

});
