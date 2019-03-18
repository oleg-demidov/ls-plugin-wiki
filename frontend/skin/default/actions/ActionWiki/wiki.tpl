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
{/block}

{block 'layout_content'}
    
    <ul class="nav flex-column">
        {foreach $oWiki->getPages() as $oPage}
            <li class="nav-item">
                <a class="nav-link" href="{router page="wiki/{$oWiki->getCode()}/{$oPage->getCode()}"}">{$oPage->getTitle()}</a>
            </li>
        {/foreach}
    </ul>
{/block}