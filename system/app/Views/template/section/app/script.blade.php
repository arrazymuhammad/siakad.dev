<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="{{url('public/plugins/tether.min.js')}}"></script>
		<script src="{{url('public/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{url('public/plugins/jquery.cookie.js')}}"></script>
		<script src="{{url('public/plugins/jquery.validate.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<script src="{{url('public/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		<script src="{{url('public/plugins/notify/notify.min.js')}}"></script>
		<script src="{{url('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{url('public/plugins/moment.js')}}"></script>
		<script src="{{url('public/plugins/dattimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
		<script src="{{url('public/js/laravel.js')}}"></script>
		<script src="{{url('public/plugins/charts-home.js')}}"></script>
		<script src="{{url('public/js/front.js')}}"></script>
		<script>
			$(".slimscroll").slimScroll({
			    height: "calc(100vh - 205px)",
			    width: "100%"
			});
			$(".slimscroll-body").slimScroll({
			    height: "calc(100vh - 176px)",
			    width: "100%"
			});
			$(".table-datatable").dataTable({
			"sDom": "<'row'<'hidden-lg-down col-lg-6'l><'col-12 col-lg-6'f>r>t<'row'<'col-6'i><'col-6'p>>",
			"sPaginationType": "full_numbers",
			});
		</script>
		@yield('custom_script')
		@stack('custom_script')
