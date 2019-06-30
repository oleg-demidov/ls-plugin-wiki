<?php

class PluginWiki_ModuleWiki_EntityPage extends EntityORM
{
    
    protected $aRelations = array(
        'wiki' => array( self::RELATION_TYPE_BELONGS_TO, 'PluginWiki_ModuleWiki_EntityWiki', 'wiki_id' ),
        'punkts' => array( self::RELATION_TYPE_HAS_MANY, 'PluginWiki_ModuleWiki_EntityPunkt', 'page_id' )
    );
    protected $aBehaviors = array(
        /**
         * Дополнительные поля
         */
        'category' => [
            'class' => 'ModuleCategory_BehaviorEntity',
            'target_type' => 'wiki'
        ]
    );
    
    public function __construct($aParam) {
        if(array_key_exists('test', Engine::getInstance()->GetPlugins())){
            $this->aBehaviors['category']['target_type'] =  'test';
        }
        parent::__construct($aParam);
        
    }
    
    public function getCountPunkts() {
        return count($this->getPunkts());
    }
    
    public function getUrl() {
        return '/wiki/'.$this->getWiki()->getCode().'/'.$this->getCode();
    }
   
    public function getUrlEdit() {
        return Router::GetPath('admin/plugin/wiki/'.$this->getWiki()->getCode().'/page_edit/'. $this->getId());
    }
}