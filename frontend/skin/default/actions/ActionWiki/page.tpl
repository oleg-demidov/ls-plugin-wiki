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
    </h3>
{/block}

{block 'layout_content'}
    <article class="ls-topic topic js-topic">
        {foreach $oPage->getPunkts() as $oPunkt}
            <div class="d-flex"> 
                <div class="mr-1"><b>{$oPunkt->getName()}.</b></div>
                <div><p>{$oPunkt->getText()}</p></div>
            </div>
            
        {/foreach}
    </article>
{/block}