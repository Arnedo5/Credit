
<!-- Form register -->
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

<!-- Validate track -->
@if ($errors->has('track'))
    <script type="text/javascript">createNoty('error','topRight',"Selecciona un mèdote d'entrega",3000)</script>
@endif

<!-- Error Admin -->
@if (\Session::get('message'))
    <script type="text/javascript">createNoty('error','topRight','{{ \Session::get('message') }}',7000)</script>
@endif

@if (\Session::get('status'))
    <script type="text/javascript">createNoty('success','topRight','{{ \Session::get('status') }}',7000)</script>
@endif
    
<!-- Product Category -->
@if ($errors->has('PRCNAME'))
    <script type="text/javascript">createNoty('error','topRight',"Categoria de producte ja activa",3000)</script>
@endif

<!-- Products -->
@if ($errors->has('PRDNAME'))
    <script type="text/javascript">createNoty('error','topRight',"Comprova el nom del producte",3000)</script>
@endif
