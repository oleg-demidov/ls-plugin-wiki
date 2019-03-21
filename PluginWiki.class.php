<?php
/**
 * 
 * @author Oleg Demidov
 *
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginWiki extends Plugin
{

    
    public function Init()
    {
        $this->Lang_AddLangJs([
            'plugin.wiki.markitup.punkt'
        ]);
        
        $this->Component_Add('wiki:editor');
        $this->Component_Add('wiki:punkt');
        
        $this->Viewer_AppendScript(Plugin::GetTemplatePath('wiki'). '/assets/js/init.js');
    }

    public function Activate()
    {
        $this->Category_CreateTargetType('wiki', 'Документация', array(), true);

        
        
        return true;
    }

    public function Deactivate()
    {
        
        return true;
    }
    
    public function Remove()
    {
        
        $this->Category_RemoveTargetType('wiki');
        return true;
    }
}