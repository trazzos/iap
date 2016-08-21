

<ul id="sort-box" class="sorts">
    <li>
        <div class="content-header">
            <div class="content-header-left">
                <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" /></a>
                <h2>Foro =>{$asunto} </h2>

            </div>
            <div class="content-header-right">
                {if $positionId != 0}
                    <h2><a href="{$WEB_ROOT}/edit-modules-course/id/{$id}">Regresar</a></h2>
                {else}
                    <h2><a href="{$WEB_ROOT}/forum-modules-student/id/{$id}">Regresar</a></h2>
                {/if}

            </div>

        </div>
        <div class="content-in" id="tab">
            {include file="boxes/status_no_ajax.tpl"}
            {if ($asunto== "Foro de Discusion") && ($User.type == "student")}
            {else}
                <a href="{$WEB_ROOT}/add-topic/id/{$topicId}"  onclick="return parent.GB_show('Agregar Topico', this.href,450,700) "><div class="btnAdd" id="btnAddSubject"></div></a>
            {/if}
            <div id="tblContent">{include file="lists/topicsub.tpl"}</div>

            <br />
            {if $coursesCount}
                <div id="pagination" class="lnkPages">
                    {include file="footer-pages-links.tpl"}
                </div>
            {/if}
        </div>
    </li>
</ul>

<input type="hidden" id="viewPage" name="viewPage" value="{$arrPage.currentPage}" />