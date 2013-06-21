<div class="sliders view">
<h2><?php  echo __('Slider'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtitle'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['subtitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($slider['Slider']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slider'), array('action' => 'edit', $slider['Slider']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Slider'), array('action' => 'delete', $slider['Slider']['id']), null, __('Are you sure you want to delete # %s?', $slider['Slider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sliders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slider'), array('action' => 'add')); ?> </li>
	</ul>
</div>
