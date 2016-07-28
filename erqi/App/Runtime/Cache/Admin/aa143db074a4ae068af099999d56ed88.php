<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/erqi/index.php/Admin/Goods/index" method="post">
	<input type="hidden" name="pageNum" value="<?php echo ((isset($currentPage) && ($currentPage !== ""))?($currentPage):'1'); ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST['_order']); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST['_sort']); ?>"/>
</form>
<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					<b>搜索</b> &nbsp; 关键字：<input type="text" size="10" name="keyword" value="<?php echo ($_POST['keyword']); ?>" /> 
                   
                </td>
				<td>
					<div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="/erqi/index.php/Admin/Goods/add" target="dialog" width="550" height="380" rel="user_msg" title="添加用户信息"><span>添加</span></a></li>
			<li><a class="delete" href="/erqi/index.php/Admin/Goods/del/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>/navTabId/listgod" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="/erqi/index.php/Admin/Goods/edit/id/<?php echo (C("TMPL_L_DELIM")); ?>item_id<?php echo (C("TMPL_R_DELIM")); ?>"  width="550" height="380" target="dialog"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="40">编号</th>
				<th width="80">类别</th>
				<th width="80">名称</th>
				<th width="40">价格</th>
				<th width="40">促销价格</th>
				<th width="40">添加时间</th>
				<th width="40">商品图片</th>
				<th width="40">库存</th>
				<th width="40">浏览次数</th>
				<th width="40">销售数量</th>
				<th width="150">状态</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr target="item_id" rel="<?php echo ($vo["id"]); ?>">
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["category_name"]); ?></td>
					<td><?php echo ($vo["goods_name"]); ?></td>
					<td><?php echo ($vo["shop_price"]); ?></td>
					<td><?php echo ($vo["promote_price"]); ?></td>
					<td><?php echo ($vo["goods_add_time"]); ?></td>
					<td><img src="/erqi/Public/uploads/<?php echo ($vo["goods_img"]); ?>" width="100px" height="100px"></td>
					<td><?php echo ($vo["goods_stock"]); ?></td>
					<td><?php echo ($vo["goods_number"]); ?></td>
					<td><?php echo ($vo["goods_volume"]); ?></td>
					<td><form>
						<input type="checkbox" <?php echo ($vo['is_promote'] == 1 ? 'checked' : ''); ?> name="is_promote">促销 
						<input type="checkbox" <?php echo ($vo['is_onsale'] == 0 ? 'checked' : ''); ?> name="is_onsale">上架 &nbsp;|&nbsp;
						<a href="/erqi/index.php/Admin/GoodsImg/index/id/<?php echo ($vo["id"]); ?>" target="navTab" rel="listupload" title="图片管理">编辑图片</a> | 
						<a href="/erqi/index.php/Admin/Goodstag/index/goodsid/<?php echo ($vo["id"]); ?>/typename/<?php echo ($vo["category_name"]); ?>" target="dialog" width="550" height="380" rel="user_msg" title="编辑商品属性">编辑属性</a>
					</form>
						
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<script type="text/javascript">
		function fun () {

		}
	</script>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak(<?php echo (C("TMPL_L_DELIM")); ?>numPerPage:this.value<?php echo (C("TMPL_R_DELIM")); ?>)">
				<option value="10" <?php if($numPerPage == 10): ?>selected<?php endif; ?>>10</option>
				<option value="15" <?php if($numPerPage == 15): ?>selected<?php endif; ?>>15</option>
				<option value="20" <?php if($numPerPage == 20): ?>selected<?php endif; ?>>20</option>
				<option value="25" <?php if($numPerPage == 25): ?>selected<?php endif; ?>>25</option>
				<option value="30" <?php if($numPerPage == 30): ?>selected<?php endif; ?>>30</option>
			</select>
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>
</div>