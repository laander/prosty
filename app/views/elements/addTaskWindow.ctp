<?php echo $this->Html->css('jqueryui.css'); ?>
<?php echo $this->Html->css('costBenefit.css'); ?>
<?php echo $this->Javascript->link("/js/costBenefit.js", false); ?>
<?php echo $this->Javascript->link("/js/jqueryui-1.8.7.js", false); ?>

<div style='display:none'>
	<div id='addTask' style='padding:10px; background:#fff;color:#000;'>		
		<?php echo $this->Form->create('Task', array('action'=>'add'));?>
			<?php	
				echo $this->Form->hidden('milestone_id');
				echo $this->Form->input('title');
			?>
			
			<?php echo $this->Html->link("Show more options", array(), array('class'=>'showMore', 'rel'=>'advancedOptions')); ?>
			<div class="advancedOptions">
				<?php echo $this->Html->link("Show less", array(), array('class'=>'showLess', 'rel'=>'advancedOptions')); ?>
				<?php echo $this->Form->input('description', array('rows'=>1));	?>
				
				<div id="costBenefit">
					<div class="slideContainer">
						<p class="header">Importance of feature</p>
						<p class="slideTags left">Careless</p>
						<div class="slider"></div>
						<p class="slideTags right">Very important</p>
						<?php echo $this->Form->hidden('priority');?>
					</div>
				
					<div class="slideContainer">
						<p class="header">Difficulty of implementation</p>
						<p class="slideTags left">Very difficult</p>
						<div class="slider"></div>
						<p class="slideTags right">Piece of cake</p>
						<?php echo $this->Form->hidden('estimate'); ?>
					</div>
				
					<input type="hidden" id="conclusion"/>
					<p id="humanScore"></p>
				</div>
				
				
			</div>
		<?php echo $this->Form->end(__('Submit', true));?>		
	</div>
</div>