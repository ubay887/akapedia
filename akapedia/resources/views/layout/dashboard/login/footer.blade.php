
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('succes'))
        toastr.success("{{ Session::get('succes') }}", "Succes")
    @elseif(Session::has('error'))
        toastr.danger("{{ Session::get('error') }}", "Error")
    @endif
</script>

</body>

</html>
