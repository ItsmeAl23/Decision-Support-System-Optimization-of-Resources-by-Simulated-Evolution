$(document).ready(function(){
	$('#btn-cari').hide();

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		$('#container-ajax').load('assets/ajax/data-alternatif.php?keyword=' + $('#keyword').val());
	});

});