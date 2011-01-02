<?php // Request necessary js logic for modal window and cost-benefit/priority analyzer slider ?>
<?php echo $this->Javascript->link("/js/jqueryui-1.8.7.js", false); ?>
<?php echo $this->Javascript->link("/js/jquery.colorbox-min.js", false); ?>

<?php // Form is to be showed as modal box using js and is therefore hidden på default ?>
<div id="colorbox-keeper">
	<div id="context-tasks-quickadd" style='padding:10px; background:#fff;color:#000;'>		
		<?php echo $this->Form->create('Task', array('action'=>'add')); ?>
			<?php	
				echo $this->Form->hidden('milestone_id');
				echo $this->Form->input('title');
				echo $this->Form->input('description', array('rows' => 1));
			?>
			<div id="context-tasks-costbenefit">
				<div class="slide-wrapper">
					<div class="slide-container">
						<p class="header">Importance of feature</p>
						<div class="slider"></div>
						<p class="slide-tag left">Careless</p>
						<p class="slide-tag right">Very important</p>
						<?php echo $this->Form->hidden('priority', array("value" => 3));?>
					</div>
				
					<div class="slide-container">
						<p class="header">Difficulty of implementation</p>
						<div class="slider"></div>
						<p class="slide-tag left">Very difficult</p>
						<p class="slide-tag right">Piece of cake</p>
						<?php echo $this->Form->hidden('estimate', array("value" => 3)); ?>
					</div>
				</div>	
			
				<input type="hidden" id="conclusion"/>
				<div class="verdict">
					<div class="task-costbenefit-icon"></div>
					<p id="human-verdict"></p>
				</div>
				
			</div>
		<?php echo $this->Form->end(__('Submit', true));?>		
	</div>
</div>