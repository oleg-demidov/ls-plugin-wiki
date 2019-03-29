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



return $config;