@if ($errors->has('USRLOGIN'))
        <script type="text/javascript">
            createNoty();
            function createNoty() {
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    theme: 'mint',
                    text: 'Error, usuari incorrecta!',
                    timeout: 3000,
                    progressBar: true,
                    closeWith: ['click', 'button'],
                    animation: {
                        open: 'noty_effects_open',
                        close: 'noty_effects_close'
                    }
                }).show()
            }
        </script>
@endif

