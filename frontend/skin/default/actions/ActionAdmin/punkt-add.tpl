<h3>Добавить/редактировать пункт в <a href="{router page="admin/plugin/wiki/page/{$oPage->getCode()}/list"}">{$oPage->getTitle()}</a></h3>

{component 'admin:p-form'
    isEdit=$oPunkt 
    action=Router::GetPathWebCurrent() 
    submit=[ name => 'punkt_submit' ] 
    form=[
        [ field => 'hidden',     name => 'punkt[page_id]',  value => $oPage->getId() ],
        [ field => 'text',     name => 'punkt[name]',  label => 'Номер' ],
        {component 'tinymce'  
            value={($oPunkt)?$oPunkt->getTextSource():''}  
            name = 'punkt[text_source]'  
            label = 'Текст'}

        
]}

