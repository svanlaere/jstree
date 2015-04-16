<?php
defined('IN_CMS') || exit();

Plugin::setInfos(array(
    'id' => 'jstree',
    'title' => __('jsTree'),
    'description' => __('jsTree concept plugin'),
    'license' => 'GPL',
    'website' => 'http://www.wolfcms.org/forum',
    'version' => '0.0.0',
    'require_wolf_version' => '0.7.5'
));

if (!defined("JSTREE_DIR")) {
    define('JSTREE_DIR', PLUGINS_ROOT . '/jstree');
}

Plugin::addController('jstree', __('jsTree'));

AutoLoader::addFile('Tree', JSTREE_DIR . '/Tree.php');

Plugin::addJavascript('jstree', 'js/jstree.min.js');