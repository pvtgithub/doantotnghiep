</!DOCTYPE html>
<html>
<head>
	@include('admin.layouts.head')
</head>
<body>
	@include('admin.layouts.sidebar')
	@include('admin.layouts.header')
	@yield('main-content')
	<script src="{{URL::asset('style_admin/js/main.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processBill.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processDelete.js')}}"></script>
	<script src="{{URL::asset('assets/js/getSelect.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processUser.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processCustomer.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processCategory.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processProduct.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processBlog.js')}}"></script>
	<script src="{{URL::asset('style_admin/js/processImage.js')}}"></script>
	<script src="{{URL::asset('//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js')}}"></script>

	<script type="text/javascript">
		$(document).ready( function () {
			$('#dataTables-example').DataTable();
		} );
	</script>
</body>
</html>