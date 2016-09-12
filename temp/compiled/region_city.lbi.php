
<div class="region_city">
  <div class="selectcity">
    <div style="float:left;font-size:12px;"> <?php echo $this->_var['address_title']; ?> </div>
    <div class="province" onmouseover="document.getElementById('citybox_childmenu').style.display='block';this.className='province_cur';"  id="province_box"> 
    	<font id="province"><?php echo $this->_var['fullname']; ?></font>
        <input type="hidden" name="store_province_id" id="store_province_id" value="">
    </div>
    <?php if ($this->_var['from'] == 'list'): ?><?php endif; ?> 
  </div>
  <div class="childmenu" id="citybox_childmenu"  >
    <div class="citybox_close" onclick="javascript:document.getElementById('citybox_childmenu').style.display='none';document.getElementById('province_box').className='province';"></div>
    <div class="cityul"> 
     <?php $_from = $this->_var['shownames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('pid', 'names');if (count($_from)):
    foreach ($_from AS $this->_var['pid'] => $this->_var['names']):
?>
      <div class=<?php if ($this->_var['pid'] == 1): ?>"licur"<?php else: ?>"li"<?php endif; ?> onclick="javascript:get_regions(<?php echo $this->_var['pid']; ?>, 0)" id="city_li_<?php echo $this->_var['pid']; ?>" style="display:<?php if ($this->_var['names']): ?>block<?php else: ?>none<?php endif; ?>"><?php echo $this->_var['names']; ?><i></i></div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    <div style="clear:both;"></div>
    <?php $_from = $this->_var['divlevels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('did', 'levels');if (count($_from)):
    foreach ($_from AS $this->_var['did'] => $this->_var['levels']):
?>
    <div class="childli" id="city_box_<?php echo $this->_var['did']; ?>" style="display:<?php if ($this->_var['did'] == 1): ?>block<?php else: ?>none<?php endif; ?>"> <?php $_from = $this->_var['levelsinfo'][$this->_var['levels']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('iid', 'infos');if (count($_from)):
    foreach ($_from AS $this->_var['iid'] => $this->_var['infos']):
?> <a href="javascript:void(0);" onclick="get_regions(<?php echo $this->_var['did']; ?>, '<?php echo $this->_var['iid']; ?>');" style="text-decoration:none;"><?php echo $this->_var['infos']; ?></a> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
</div>
