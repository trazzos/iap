 <ul id="sort-box" class="sorts">
  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/icons/22/display.png" alt="" />
            <h2>Canal de IAP</h2>
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
					<div style="float:left; width:600px;">
					<iframe width="480" height="296" src="http://www.ustream.tv/embed/recorded/{$actual.embed}?wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent; padding-left:20px">    </iframe>
          </div>
					<div style="float:left; width:400px; padding:10px; font-size:14px">
          	Ver otras grabaciones <br />
            {foreach from=$recordings item=item}
            &raquo; <a style="color:#666" href="{$WEB_ROOT}/recorded/id/{$item.recordingId}">{$item.date} - {$item.title}</a> <br />
            {/foreach}
          </div>
         
        </div>
 </li>
   
 </ul>
                           

