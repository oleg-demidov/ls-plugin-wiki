<?php

class PluginWiki_ActionAdmin_EventPage extends Event
{
    protected $oUserCurrent = null;
    
    protected $oWiki = null;

    public function Init()
    { 
        $this->oUserCurrent = $this->User_GetUserCurrent();
        
        if(!$this->oWiki = $this->PluginWiki_Wiki_GetWikiByCode( $this->sCurrentEvent )){
            $this->Message_AddError('Нет такой документации');
            Router::LocationAction("admin/plugin/wiki/list");
        }
    }

   
    public function EventList()
    {
        $this->SetTemplateAction('page-list');
        
        $aPages = $this->PluginWiki_Wiki_GetPageItemsByWikiId( $this->oWiki->getId() );
        
        $this->Viewer_Assign('aPages', $aPages);  
        $this->Viewer_Assign('oWiki', $this->oWiki);  
    }
    
    public function EventAdd() {
        
        $this->SetTemplateAction('page-add'); 
        
        $oPage = $this->PluginWiki_Wiki_GetPageById( $this->GetParam(1) );
        
        if(isPost()){ 
            if(!$oPage){
                $oPage = Engine::GetEntity('PluginWiki_Wiki_Page' );
            }
            
            $oPage->_setData(getRequest('page'));
            $oPage->setCategories(getRequest('categories'));
                                   
            if($oPage->_Validate()){ 
                if($oPage->Save()){
                    
                    $this->Message_AddNoticeSingle($this->Lang_Get('common.success.save'),'',true);
                    Router::LocationAction("admin/plugin/wiki/". $this->oWiki->getCode() . '/pages');
                    
                }else{
                    $this->Message_AddErrorSingle($this->Lang_Get('common.error.system.base'));
                }
            }else{
                foreach($oPage->_getValidateErrors() as $aError){
                    $this->Message_AddError($aError[0], $this->Lang_Get('common.error.error'));
                }
            }  
                      
        }
        
        if($oPage){
            $_REQUEST['page'] = $oPage->_getData();
        }
        $this->Viewer_Assign('oWiki', $this->oWiki); 
        $this->Viewer_Assign('oPage', $oPage);
    }
    
    public function EventRemove() {
        $this->SetTemplate(false);
        
        $oPage = $this->PluginWiki_Wiki_GetPageById( $this->GetParam(1) );
        
        if($oPage){
            $this->Security_ValidateSendForm();
            /**
             * Удаляем
             */
            if ($oPage->Delete()) {
                $this->Message_AddNotice('Удаление прошло успешно', null, true);
            } else {
                $this->Message_AddError('Возникла ошибка при удалении', null, true);
            }

            
        }
        
        Router::LocationAction("admin/plugin/wiki/". $this->oWiki->getCode() . '/pages');
        
         
    }
    
    
}