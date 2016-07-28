<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/erqi/index.php/Admin/Goodstag/save/navTabId/listrole/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<input type="hidden" name="goodsid" value="<?php echo ($goodsid); ?>"/>
		<div class="pageFormContent" layoutH="60">
			
			<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['pareid'] == 0): ?><br><?php echo ($vo['tagname']); ?>: <?php else: ?>
					<input type="checkbox" name="rid[]" <?php if(in_array($vo['id'],$rids)): ?>checked<?php endif; ?> value="<?php echo ($vo["id"]); ?>"/><?php echo ($vo["tagname"]); endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>