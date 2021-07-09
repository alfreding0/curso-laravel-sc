<script src="{{ asset('materialize/js/materialize.js') }}" ></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        M.Sidenav.init(elems, {});

        var elemDate = document.querySelectorAll('.datepicker');
        M.Datepicker.init(elemDate, {
            format: 'yyyy-mm-dd'
        });

        var elemSelect = document.querySelectorAll('select');
        M.FormSelect.init(elemSelect, {});
    });

    function showProgress(){
        var elem = document.getElementById('modal-wait');
        M.Modal.init(elem, {
            'dismissible' : false,
            'opacity' : 0.2
        });
        var instance = M.Modal.getInstance(elem);
        instance.open();
    }
</script>
