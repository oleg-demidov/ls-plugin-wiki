
{component_define_params params=[ 'oPunkt', 'attributes', 'classes' ]}


<div id="punkt{$oPunkt->getName()}" class="d-table-row {$classes}" {cattr list=$attributes}> 
    <div class="pr-2 d-table-cell align-top"><b>{$oPunkt->getName()}.</b></div>
    <div>
        <p class="mb-0 d-table-cell align-top">{$oPunkt->getText()}
        {if $oUserCurrent and $oUserCurrent->isAdministrator()}
            {component "bs-button" 
                classes = "btn-edit d-inline"
                com     = "link"
                url     = $oPunkt->getUrlEdit()
                text    = {component "bs-icon" icon="edit"}
                popover = [content => $aLang.common.edit] }
        {/if}</p>
    </div>
    

</div>
