<?php

class PluginWiki_ActionWiki extends ActionPlugin
{
    /**
     * Текущий пользователь
     *
     * @var ModuleUser_EntityUser|null
     */
    protected $oUserCurrent = null;
    
    protected $oWiki = null;    


    /**
     * Инициализация
     *
     * @return string
     */
    public function Init()
    {
        
        $this->oUserCurrent = $this->User_GetUserCurrent();
        
//        if(!$this->oUserCurrent and Router::GetParam(0) !== 'index'){
//            return Router::Action(Router::GetAction(), Router::GetActionEvent(), ['index']);
//        }
        
        $this->oWiki = $this->PluginWiki_Wiki_GetWikiByFilter([
            'code' => Router::GetActionEvent(),
        ]);
        
        
        
    }

    /**
     * Регистрация евентов
     */
    protected function RegisterEvent()
    {
        
        $this->AddEventPreg(
                '/^([a-z_0-9]{1,100})?$/i', '/^$/i', ['EventWiki', 'wiki']
        );
        $this->AddEventPreg( '/^([a-z_0-9]{1,100})?$/i',  '/^([a-z_0-9]{1,100})?$/i',['EventPage', 'wikipage']);
        $this->AddEventPreg( '/^ajax-punkt?$/i', 'EventAjaxPunkt');
           
    }
    
    public function EventPage() {
        if(!$this->oWiki){
            return Router::ActionError($this->Lang_Get('plugin.wiki.messages.no_wiki'));
        }
        
        if(!$oPage = $this->PluginWiki_Wiki_GetPageByCode($this->GetParam(0))){
            return Router::ActionError($this->Lang_Get('plugin.wiki.messages.no_wiki'));
        }
        
        $this->SetTemplateAction('page');        
        $this->Viewer_Assign('oWiki', $this->oWiki);
        $this->Viewer_Assign('oPage', $oPage);
    }
    
    
    public function EventWiki() {
        if(!$this->oWiki){
            return Router::ActionError($this->Lang_Get('plugin.wiki.messages.no_wiki'));
        }
        
        $this->SetTemplateAction('wiki');        
        $this->Viewer_Assign('oWiki', $this->oWiki);
                
    }
    
    public function EventAjaxPunkt() {
        $this->SetTemplateAction(false); 
        $this->Viewer_SetResponseAjax('json');$this->Logger_Notice( 'hjhjhj');
        
        if(!$oPunkt = $this->PluginWiki_Wiki_GetPunktByName(getRequest('punkt'))){
            return false;
        }

        $this->Viewer_Assign('gp', 1);
        $VLocal = $this->Viewer_GetLocalViewer();
        $VLocal->Assign('oPunkt', $oPunkt, true);
        $this->Viewer_AssignAjax('html', $VLocal->Fetch("component@wiki:punkt"));
    }
}