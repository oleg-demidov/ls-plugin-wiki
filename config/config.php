<?php
/**
 * Таблица БД
 */
$config['$root$']['db']['table']['wiki_wiki'] = '___db.table.prefix___wiki';
$config['$root$']['db']['table']['wiki_wiki_page'] = '___db.table.prefix___wiki_page';
$config['$root$']['db']['table']['wiki_wiki_punkt'] = '___db.table.prefix___wiki_punkt';

/**
 * Роутинг
 */
$config['$root$']['router']['page']['wiki'] = 'PluginWiki_ActionWiki';

$config['admin']['assets'] = [
    'js' => [
        //'assets/js/admin.js'
    ]
];


$config['$root$']['block']['wiki_panel'] = array(
    'action' => array(
        'wiki'
    ),
    'blocks' => array(
        'right' => array(
            'wiki' => array('priority' => 100,'params' => array('plugin' => 'wiki'))
        )
    ),
    'clear'  => false,
);

//$config['$root$']['jevix'] = array_merge_recursive((array)Config::Get('jevix'), require(dirname(__FILE__) . '/jevix.php'));

//$config['jevix']['default'] =  [
//    'cfgAllowTags'          => array(
//        // вызов метода с параметрами
//        array(
//            array('wiki'),
//        ),
//    ),
//    // Коротие теги типа
//    'cfgSetTagShort'        => array(
//        array(
//            array('wiki')
//        ),
//    ),
//    // Разрешённые параметры тегов
//    'cfgAllowTagParams'     => array(
//        array(
//            'wiki',
//            array('punkt' => '#text')
//        )
//    ),
//    'cfgSetTagCallbackFull' => array(
//        array(
//            'wiki',
//            array('_this_', 'PluginWiki_Wiki_CallbackParserTagWiki'),
//        )
//    )
//];


return $config;