<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js')  }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')  }}"></script>
    <script src="{{ asset('admin/assets/vendor/font-awesome/css/all.js')  }}"></script>
	<script src="{{ asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')  }}"></script>
    <script src="{{ asset('admin/assets/scripts/klorofil-common.js')  }}"></script>
    <script src="{{ asset('admin/assets/scripts/ckeditor.js')  }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('succes'))
            toastr.success("{{ Session::get('succes') }}", "Succes")
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", "error")
        @endif
    </script>

    @yield('js')

</body>

</html>
