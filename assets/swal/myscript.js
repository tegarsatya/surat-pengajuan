const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
		title: flashData + ' sukses',
		text: '',
		type: 'success'
	});
}
