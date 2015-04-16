<?php

/* Security measure */
if (!defined('IN_CMS'))
    exit();

class Tree
{
    
    public function getnodes($parent_id, $level, $return = false)
    {
        // get all children of the page (parent_id)
        $children = Page::childrenOf($parent_id);
        
        foreach ($children as $index => $child) {
            $children[$index]->has_children  = Page::hasChildren($child->id);
            $children[$index]->children_rows = $this->getnodes($child->id, $level + 1, true);
        }
        
        $content = new View('../../plugins/jstree/views/children', array(
            'root' => Record::findByIdFrom('Page', 1),
            'children' => $children,
            'level' => $level + 1
        ));
        
        if ($return)
            return $content;
        
        echo $content;
    }
    
      
} // end class
