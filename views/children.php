<ul>
<?php if ($level == 1 ): ?>
<li data-jstree='{"type":"root"}' id="page_1"><a href="<?php echo URL_PUBLIC; echo (USE_MOD_REWRITE == false) ? '?' : ''; echo $root->path(); echo ($root->path() != '') ? URL_SUFFIX : ''; ?>"><?php echo $root->title; ?></a></li>
<?php endif; ?>
<?php foreach($children as $child): ?> 
<li data-jstree='{"type":"page"}' id="page_<?php echo $child->id; ?>"><a href="<?php echo URL_PUBLIC; echo (USE_MOD_REWRITE == false) ? '?' : ''; echo $child->path(); echo ($child->path() != '') ? URL_SUFFIX : ''; ?>"><?php echo $child->title; ?></a>
<?php if ($child->has_children): ?>
<?php echo $child->children_rows; ?>
<?php endif; ?>
</li>
<?php endforeach; ?>
</ul>
