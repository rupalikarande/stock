var manageCategoriesTable;
$(document).ready(function() {
	// active top navbar categories
	$('#navExpence').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchexpencerecords.php',
		'order': []
	}); // manage categories Data Table
}); 