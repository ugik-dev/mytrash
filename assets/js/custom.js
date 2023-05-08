$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

function buttonLoading(btn) {
	if (btn.prop("disabled")) {
		return;
	}
	btn.data("original-text", btn.html());
	btn.html(
		'<span class="loading open-circle"></span> ' + btn.data("loading-text")
	);
	btn.prop("disabled", true);
}

function buttonIdle(btn) {
	if (!btn.prop("disabled")) {
		return;
	}
	btn.html(btn.data("original-text"));
	btn.prop("disabled", false);
}

function arrayToAssociative(arr, key) {
	ret = [];

	if (data == null || !Array.isArray(data) || data.length == 0) {
		console.log("EMPTY ARRAY");
		return ret;
	}

	if (data[0][key] === undefined) {
		console.log("KEY NOT EXIST");
		return ret;
	}

	arr.forEach((e) => {
		ret[e[key]] = e;
	});

	return ret;
}

function capFirstLetter(str) {
	return str
		.split(" ")
		.map((str) => str[0].toUpperCase() + str.slice(1).toLowerCase())
		.reduce((acc, curr) => acc + curr + " ", "")
		.slice(0, -1);
}

function intToDay(val) {
	switch (val) {
		case 0:
			return "Minggu";
		case 1:
			return "Senin";
		case 2:
			return "Selasa";
		case 3:
			return "Rabu";
		case 4:
			return "Kamis";
		case 5:
			return "Jum'at";
		case 6:
			return "Sabtu";
	}
}

function empty(str) {
	if (str == null || str.trim() == "") {
		return true;
	} else {
		return false;
	}
}

MONTHS = [
	"Januari",
	"Februari",
	"Maret",
	"April",
	"Mei",
	"Juni",
	"Juli",
	"Agustus",
	"September",
	"Oktober",
	"November",
	"Desember",
];

function renderDate(date) {
	return `${date.getDate()} ${MONTHS[date.getMonth()]} ${date.getFullYear()}`;
}

function findAssociative(arr, field, value) {
	for (var key in arr) {
		var v = arr[key];
		if (v[field] && v[field] == value) {
			return v;
		}
	}
	return null;
}

function filterAssociative(arr, field, value) {
	var ret = [];
	for (var key in arr) {
		var v = arr[key];
		if (v[field] && v[field] == value) {
			ret.push(v);
		}
	}
	return ret;
}

function convertToRupiah(angka, dot = ",") {
	var rupiah = "";
	if (angka == null) return "0";
	var angkarev = angka.toString().split("").reverse().join("");
	for (var i = 0; i < angkarev.length; i++) {
		if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + dot;
	}
	rupiah = rupiah
		.split("", rupiah.length - 1)
		.reverse()
		.join("");
	return rupiah.length < 1 ? "0" : rupiah;
}
function convertToRupiahStatus(angka, status) {
	var rupiah = "";
	if (angka == null) return "0";
	var angkarev = angka.toString().split("").reverse().join("");
	for (var i = 0; i < angkarev.length; i++) {
		if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ",";
	}
	rupiah = rupiah
		.split("", rupiah.length - 1)
		.reverse()
		.join("");

	ret = rupiah.length < 1 ? "0" : rupiah;
	if (status == "3") {
		return '<del style="text-decoration-style: double;">' + ret + "";
	} else return ret;
}

function convertToRupiahV2(value, fixed) {
	return (
		"Rp" +
		parseFloat(value)
			.toFixed(fixed)
			.replace(".", ",")
			.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
	);
}

SWALSAVE = {
	title: "Konfirmasi simpan",
	text: "Yakin akan menyimpan data ini?",
	type: "info",
	showCancelButton: true,
	confirmButtonColor: "#18a689",
	confirmButtonText: "Ya, Simpan!",
};
function swalLoading() {
	Swal.fire({
		title: "Loading!..",
		// allowOutsideClick: false,
	});
	Swal.showLoading();
}
SWALDELETE = {
	title: "Konfirmasi hapus",
	text: "Yakin akan menghapus data ini?",
	type: "warning",
	showCancelButton: true,
	confirmButtonColor: "#DD6B55",
	confirmButtonText: "Ya, Hapus!",
};

function coloriseRealisasi(realisasi) {
	var realisasi = parseFloat(realisasi);
	if (realisasi <= 25)
		return `<span class="label label-danger">${realisasi}%</span>`;
	else if (realisasi > 25 && realisasi <= 50)
		return `<span class="label label-warning">${realisasi}%</span>`;
	else if (realisasi > 50 && realisasi <= 75)
		return `<span class="label label-info">${realisasi}%</span>`;
	return `<span class="label label-success">${realisasi}%</span>`;
}

function statusPesanan(status) {
	if (status == "0")
		return `<i class='font-sanicod-clock text-warning'> Waiting List</i>`;
	else if (status == "1")
		return `<i class='icofont-restaurant text-primary'> Sedang dibuat</i>`;
	else if (status == "2")
		return `<i class='icofont-check-circled text-success'> Selesai </i>`;
	else if (status == "3")
		return `<i class='icofont-close-circled text-danger'> Dibatalkan</i>`;
}

function statusPembayaran(status) {
	if (status == "0")
		return `<i class='font-sanicod-clock text-warning'>Belum Bayar </i>`;
	else if (status == "1")
		return `<i class='icofont-check-circled text-success'> Sudah Bayar </i>`;
	else if (status == "3")
		return `<i class='icofont-close-circled text-danger'> Dibatalkan</i>`;
}
function statusSession(status) {
	if (status == "0")
		return "<i class='font-sanicod-clock text-danger'> Belum dibayar</i>";
	else if (status == "1")
		return "<i class='icofont-restaurant text-success'> Sudah dibayar</i>";
}
function downloadButton(folder, file, use_nama = true) {
	if (file)
		return `<a class="btn btn-success btn-xs btn-download" href="${folder}${file}"><i class='fa fa-download'></i> ${
			use_nama ? file : "Download"
		}</a>`;
	return `Tidak Ada`;
}

function downloadButtonEn(folder, file, use_nama = true) {
	if (file)
		return `<a class="btn btn-success btn-xs btn-download" href="${folder}${file}"><i class='fa fa-download'></i> ${
			use_nama ? file : "Download"
		}</a>`;
	return `Not Complete`;
}

function downloadButtonV2(folder, file, override_nama) {
	if (file)
		return `<a class="btn btn-success btn-xs btn-download" href="${folder}${file}"><i class='fa fa-download'></i> ${
			override_nama ? override_nama : file
		}</a>`;
	return `Tidak Ada`;
}

function saveConfirmation(title, text, button) {
	return {
		title: title,
		text: text,
		type: "info",
		showCancelButton: true,
		confirmButtonColor: "#18a689",
		confirmButtonText: button,
	};
}

function deleteConfirmation(title, text, button) {
	return {
		title: title,
		text: text,
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#ec4758",
		confirmButtonText: button,
	};
}

function renderBreadcrumb(data) {
	var breadcrumb = $("#breadcrumb");
	breadcrumb.empty();
	data.forEach((e) => {
		if (e[0])
			breadcrumb.append(
				`<li class="breadcrumb-item"><a href="${e[0]}">${e[1]}</a></li>`
			);
		else
			breadcrumb.append(
				`<li class="breadcrumb-item active"><strong>${e[1]}</strong></li>`
			);
	});
}

/* Tanpa Rupiah */
