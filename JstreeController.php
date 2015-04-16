<?php

/* Security measure */
if (!defined('IN_CMS'))
    exit();

class JSTreeController extends PluginController
{
    
    function __construct()
    {
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/jstree/views/sidebar'));
        $this->Tree = new Tree();
    }
    
    function index()
    {
        $test             = new Tree();
        $nodes            = $this->Tree->getnodes(1, 0, true);
		
        $this->display('jstree/views/index', array(
            'nodes' => $nodes
        ));
    }
    
    
} // end class