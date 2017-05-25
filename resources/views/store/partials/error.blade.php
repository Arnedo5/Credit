
@if ($errors->has('USRLOGIN'))
    <script type="text/javascript">createNoty('error','topRight','Usuari incorrecta!',4000)</script>
@endif
@if ($errors->has('USRNAME'))
    <script type="text/javascript">createNoty('error','topRight',"Longitud del nom d'usuari incorrecta!",4000)</script>
@endif
@if ($errors->has('USRLASTNAME'))
    <script type="text/javascript">createNoty('error','topRight',"Longitud dels cognoms incorrectes",4000)</script>
@endif
@if ($errors->has('USRMAIL'))
    <script type="text/javascript">createNoty('error','topRight','Correu actualment en ús',4000)</script>
@endif
@if ($errors->has('password'))
    <script type="text/javascript">createNoty('error','topRight','La contrasenya ha que tindre una longitud mínima de 6 caràcters',7000)</script>
@endif
@if ($errors->has('USRCITY'))
    <script type="text/javascript">createNoty('error','topRight','Longitud de la ciutat incorrecta!',4000)</script>
@endif
@if ($errors->has('USRDIRECTION'))
    <script type="text/javascript">createNoty('error','topRight','Longitud de la dirreció incorrecta!',4000)</script>
@endif
@if ($errors->has('USRIMG'))
    <script type="text/javascript">createNoty('error','topRight',"Extensió d'imatge incorrecta",3000)</script>
@endif
@if ($errors->has('USRMOBILE'))
    <script type="text/javascript">createNoty('error','topRight',"Telèfon incorrecta!",3000)</script>
@endif
@if(Auth::check())
    @if(Auth::user()->USRSTATUS < 1)
        <script type="text/javascript">
            redirect();
        </script>
        redirect()
    @endif 
@endif 
    
