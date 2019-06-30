{**
 * Панель тестов
 *
 *}
 
{extends 'layouts/layout.base.tpl'}

{block 'layout_options' append}
    {*$layoutNav = [[
        hook       => 'panel',
        activeItem => $sMenuItemSelect,
        showSingle => true,
        items => [
            [ 'name' => 'wiki', 'url' => "", 'text' => 'dsfsdf']
        ]
    ]]*}
{/block}

{block 'layout_page_title'}
    <h2 class="page-header">
        {$oWiki->getTitle()}
    </h2>
    <h3>
        {$oPage->getTitle()} 
        {if $oUserCurrent and $oUserCurrent->isAdmin()}
            {component "bs-button" 
                classes = "btn-edit d-inline"
                com     = "link"
                url     = $oPage->getUrlEdit()
                text    = {component "bs-icon" icon="edit"}
                popover = [content => $aLang.common.edit] }
        {/if}

        
    </h3>
{/block}

{block 'layout_content'}
    <article class="ls-topic topic js-topic">
        <div class="d-table">
            {foreach $oPage->getPunkts() as $oPunkt}
                {component "wiki:punkt" oPunkt=$oPunkt classes="mt-4 "}
            {/foreach}
        </div>
    </article>
{/block}

{block "layout_modals" append}
    {component "bs-modal" id="punktModal" content="punkt"}
{/block}