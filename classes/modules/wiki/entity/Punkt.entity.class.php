<?php

class PluginWiki_ModuleWiki_EntityPunkt extends EntityORM
{
    protected $aRelations = array(
        'page' => array( self::RELATION_TYPE_BELONGS_TO, 'PluginWiki_ModuleWiki_EntityPage', 'page_id' )
    );
    
    protected $aBehaviors = array(
        /**
         * Дополнительные поля
         */
        'property' => 'ModuleProperty_BehaviorEntity',
        'category' => [
            'class' => 'ModuleCategory_BehaviorEntity',
            'target_type' => 'wiki'
        ]
    );
    
    public function getUrl($bAbsolute = true) {
        $oCategory = $this->category->getCategory();
        if($oCategory){
            return Router::GetPath('wiki/'.$oCategory->getUrlFull());
        }
        return parent::getUrl($bAbsolute);
    }
    
    public function _getPrimaryKeyValue() {
        return $this->_getDataOne('topic_id');
    }
   
    public function getUrlEdit() {
        return Router::GetPath('admin/plugin/wiki/page/signs/punkt_edit/'. $this->getId());
    }
}