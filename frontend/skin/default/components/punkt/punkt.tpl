
{component_define_params params=[ 'oPunkt', 'attributes', 'classes' ]}


<div id="punkt{$oPunkt->getName()}" class="d-table-row {$classes}" {cattr list=$attributes}> 
    <div class="pr-2 d-table-cell align-top"><b>{$oPunkt->getName()}.</b></div>
    <div>
        <p class="mb-0 d-table-cell align-top">{$oPunkt->getText()}</p>
        {if $oUserCurrent and $oUserCurrent->isAdministrator()}
            <div class="">{component "bs-button" com="link" url=$oPunkt->getUrlEdit() text={$aLang.common.edit}}</div>
        {/if}
    </div>
    

</div>
