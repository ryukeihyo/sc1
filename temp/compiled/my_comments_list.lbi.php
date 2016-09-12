<div id="content01">
<?php $_from = $this->_var['comments']['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
  <dl id="tab5">
	<div class="pingjia-list">
	<table width="100%">
		<tr>
			<td width="100"><img src="themes/68ecshopcom_360buy/images/grade/<?php echo $this->_var['value']['user_rank']['rank_id']; ?>.gif" />
	<?php if ($this->_var['value']['hide_username'] == 1): ?>匿名<?php else: ?><?php echo $this->_var['value']['user_name']; ?><?php endif; ?></td>
	<td style="padding:0 20px;">
	<p> <?php if ($this->_var['value']['comment_rank']): ?><img src="themes/68ecshopcom_360buy/images/stars<?php echo $this->_var['value']['comment_rank']; ?>.gif" style="float:left"/><?php endif; ?> </p></br>
	<p><?php echo $this->_var['value']['content']; ?></p>
	<div class="tags">
	<?php $_from = $this->_var['value']['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'name');if (count($_from)):
    foreach ($_from AS $this->_var['name']):
?> 
          <span><?php echo $this->_var['name']; ?></span>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
	</td>
	<td width="158" valign="top" align="right" style="padding-right:15px;"><?php echo $this->_var['value']['add_time_str']; ?></td>
		</tr>
	<?php if ($this->_var['value']['comment_reps']): ?>
      <tr>
        <th>客服回复：</th>
        <td> <?php $_from = $this->_var['value']['comment_reps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
          <div style="color:#F00; padding:10px 0 10px 0"><?php echo $this->_var['val']['content']; ?></div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </td>
      </tr>
     <?php endif; ?>
	 
	</table>
	</div>
	
	<p class="pull-right cphf"><a  onClick="show_good()">回复(0)</a></p>
	
</dl>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


</div>