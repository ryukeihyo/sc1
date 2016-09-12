
    <div class="m" id="sortlist" clstag="thirdtype|keycount|thirdtype|sortlist">
   
      <div class="mc" id="cate">

	<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_31491300_1472202341');$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_31491300_1472202341']):
        $this->_foreach['cat']['iteration']++;
?>
        <div class='item  <?php if ($this->_var['cat_0_31491300_1472202341']['id'] == $this->_var['category']): ?>current<?php endif; ?>'>
       <h3  onclick="tab(<?php echo ($this->_foreach['cat']['iteration'] - 1); ?>)"><b></b><?php echo htmlspecialchars($this->_var['cat_0_31491300_1472202341']['name']); ?></h3>
          <ul style=" <?php if ($this->_var['cat_0_31491300_1472202341']['id'] == $this->_var['category']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
          	<?php $_from = $this->_var['cat_0_31491300_1472202341']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_31491300_1472202341');if (count($_from)):
    foreach ($_from AS $this->_var['child_0_31491300_1472202341']):
?>
            <li><a href="<?php echo $this->_var['child_0_31491300_1472202341']['url']; ?>"><?php echo htmlspecialchars($this->_var['child_0_31491300_1472202341']['name']); ?></a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
           
          </ul>
        </div>
        
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
   
      </div>
    </div>
    
<script type="text/javascript">
obj_h4 = document.getElementById("cate").getElementsByTagName("h3")
obj_ul = document.getElementById("cate").getElementsByTagName("ul")
obj_img = document.getElementById("cate").getElementsByTagName("div")
function tab(id)
{ 
		if(obj_ul.item(id).style.display == "block")
		{
			obj_ul.item(id).style.display = "none"
			obj_img.item(id).className = "item"
			return false;
		}
		else(obj_ul.item(id).style.display == "none")
		{
			obj_ul.item(id).style.display = "block"
			obj_img.item(id).className = "item current"
		}
}
</script>
