<script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>

<script src="{$WEB_ROOT}/javascript/functions.js"></script>

{include file="{$DOC_ROOT}/templates/new/{$includedTpl}.tpl"}

<script type="text/javascript">
  //initTinyMCE();

  function verTr(Id){
    $('#tr_'+Id).toggle();
  }
</script>

