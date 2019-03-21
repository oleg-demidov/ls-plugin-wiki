
{component_define_params params=[ 'oPunkt', 'attributes', 'classes' ]}


<div id="punkt{$oPunkt->getName()}" class="d-flex {$classes}" {cattr list=$attributes}> 
    <div class="mr-1"><b>{$oPunkt->getName()}.</b></div>
    <div><p class="mb-0">{$oPunkt->getText()}</p></div>
    

</div>
{if $oUserCurrent and $oUserCurrent->isAdministrator()}
    <div class="">{component "bs-button" com="link" url=$oPunkt->getUrlEdit() text={$aLang.common.edit}}</div>
{/if}