<?php

$config['$root$']['jevix'] = array_merge_recursive((array)Config::Get('jevix'), 
    [
        'default' => [
            'cfgAllowTags'              => array(
                // вызов метода с параметрами
                array(
                    array(
                        'wiki'
                    ),
                ),
            ),
            'cfgSetTagShort'        => array(
                array(
                    array('wiki')
                ),
            ),
            'cfgAllowTagParams'         => array(
                // вызов метода
                array(
                    'img',
                    array(
                        'class'  => '#text',//array('image-center', 'w-100', 'rounded')
                    )
                ),
                array(
                    'wiki',
                    array('punkt' => '#text')
                ),
            ),
            'cfgSetTagCallbackFull' => array(
                array(
                    'wiki',
                    array('_this_', 'PluginWiki_Wiki_CallbackParserTagWiki'),
                ),
            )
        ]
        
        
    ]
);

//$config['$root$']['jevix']['default']['cfgAllowTags'][0][0][] = 'wiki';

//print_r($config['$root$']['jevix']);

return $config;