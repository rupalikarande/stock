var manageCategoriesTable;
$(document).ready(function() {
	// active top navbar categories
	$('#navStockEntry').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchstockinout.php',
		'order': []
	}); // manage categories Data Table
}); 