<?php

/* Security measure */
if (!defined('IN_CMS')) { exit(); }

?>

<div id="jstree">
<?php echo $nodes; ?>
</div>
<div id="event_result"></div>

<script type="text/javascript">
$(function() {

    $('#jstree')

    // open a node with a single click on its icon
    .delegate("i", "click", function(e, data) {
        // only toggle on icon click
		if (!$(this).hasClass("jstree-ocl")) {
            $(this).jstree("toggle_node", this);
        }
    })

    // on double click open link in new tab or window
    .bind("dblclick", '.jstree-anchor', function(e) {
        var url = $(e.target).closest("a").attr('href');
        window.open(url, '_blank');
    })

    // listen for event
    .on('changed.jstree', function(e, data) {

        var i, j, page_id = [];

        for (i = 0, j = data.selected.length; i < j; i++) {
            page_id.push(data.instance.get_node(data.selected[i]).id);
        }
        $('#event_result').html('<?php echo __('selected'); ?>'  + '&nbsp;' + page_id.join(', '));
    })

    // create the instance
    .jstree({
        "state": {
            "key": "jstree"
        },
        "plugins": ["state"],
        "core": {
            "data": window.treeData,
            "check_callback": true,
            "themes": {
                'icons': true,
                "variant": "large",
                "stripes": true,
            }
        },
        "rules": {
            "multitree": true,
            "draggable": "all"
        },
        "types": {
            "root": {
                "icon": "<?php echo URL_PUBLIC; ?>wolf/plugins/jstree/images/home.png"
            },
            "page": {
                "icon": "<?php echo ICONS_URI; ?>page-32.png"
            },
        },
        "contextmenu": {
            "items": function($node) {
                var tree = $("#jstree").jstree(true);
                return {
                    "Copy": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "<?php echo __('copy'); ?>",
                        "action": function(obj) {
                            tree.copy($node);
                        }
                    },
                    "Paste": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "<?php echo __('paste'); ?>",
                        "action": function(obj) {
                            tree.paste($node);
                        }
                    },
                    "Rename": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "<?php echo __('rename'); ?>",
                        "action": function(obj) {
                            tree.edit($node);
                        }
                    },
                    "Create": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "<?php echo __('create'); ?>",
                        "action": function(obj) {
                            $node = tree.create_node($node);
                            tree.open_node($node, function() {;
                            }, true);
                        }
                    },
                    "Remove": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "<?php echo __('remove'); ?>",
                        "action": function(obj) {
                            tree.delete_node($node);
                        }
                    }
                };
            }
        },
        "plugins": ["themes", "types", "state", "dnd", "contextmenu"]
    });

});
</script>
