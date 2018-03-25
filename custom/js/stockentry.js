var manageCategoriesTable;
$(document).ready(function() {
	// active top navbar categories
	$('#navStockEntry').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchstockrecords.php',
		'order': []
	}); // manage categories Data Table
}); 