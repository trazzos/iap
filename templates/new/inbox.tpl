<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-comments-o"></i>
        </div>

    </div>
    <div class="portlet-body">
        <div id="tblContent">
		<div class="row-fluid inbox">
					<div class="span2">
						<ul class="inbox-nav margin-bottom-10">
							<!--<li class="compose-btn">
								<a href="javascript:;" data-title="Compose" class="btn green"> 
								<i class="icon-edit"></i> Redactar
								</a>
							</li>-->
							<li class="inbox active">
								<a href="javascript:;" class="btn" data-title="Inbox" onClick="cargaInbox('entrada','{$courseMId}')">Entrada(3)</a>
								<b></b>
							</li>
							<li class="sent"><a class="btn" href="javascript:;" onClick="cargaInbox('enviados','{$courseMId}')" data-title="Sent">Enviados</a><b></b></li>
							<li class="draft"><a class="btn" href="javascript:;" onClick="cargaInbox('borrador','{$courseMId}')" data-title="Draft">Borrador</a><b></b></li>
							<li class="trash"><a class="btn" href="javascript:;" onClick="cargaInbox('eliminados','{$courseMId}')" data-title="Trash">Eliminados</a><b></b></li>
						</ul>
					</div>
					<div class="span10">
						<div class="inbox-header">
							<h1 class="pull-left">Inbox</h1>
							<form action="#" class="form-search pull-right">
								<div class="input-append">
									<input class="form-control" style="float:left" type="text" placeholder="Search Mail">
									<button class="btn green" type="button">Search</button>
								</div>
							</form>
						</div>
						<div class="inbox-loading"></div>
						<div class="inbox-content" id="contentInbox">
							{include file="{$DOC_ROOT}/templates/lists/inbox.tpl"}
						</div>
					</div>
				</div>
		
		</div>
    </div>
</div>