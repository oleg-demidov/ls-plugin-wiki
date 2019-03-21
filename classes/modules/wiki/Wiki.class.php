<?php

class PluginWiki_ModuleWiki extends ModuleORM
{
    
    
    public function Init() {
        parent::Init(); 
    }
    
    /**
     * Обработка тега wiki в тексте
     * <pre>
     * <wiki punkt="2.2.2" />
     * </pre>
     *
     * @param string $sTag Тег на ктором сработал колбэк
     * @param array $aParams Список параметров тега
     * @return string
     */
    public function CallbackParserTagWiki($sTag, $aParams)
    {
        $sText = '';
        if (isset($aParams['punkt'])) {
            if($oPunkt = $this->PluginWiki_Wiki_GetPunktByFilter(['name' => $aParams['punkt']])){
                $sText .= "<a href=\"{$oPunkt->getPage()->getUrl()}#punkt{$aParams['punkt']}\" data-wiki-punkt>{$oPunkt->getName()}</a> ";
            }
        }
        return $sText;
    }
    
    public function ParsePunkt($sText, &$aError = null) {
        $this->Text_LoadJevixConfig('punkt');
        $sResult = $this->Text_GetJevix()->parse($sText, $aError);
        return $sResult;
    }
}