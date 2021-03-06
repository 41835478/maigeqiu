<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'app_id'); ?>
		<?php echo $form->dropDownList($model, 'app_id', $model->getAppList()); ?>
		<?php echo $form->error($model,'app_id'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<select name="Category[parent_id]" id="Category_parent_id">
		<?php $treeArr = Category::getTree(); echo $treeArr;?>
		</select>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'listorder'); ?>
		<?php echo $form->textField($model,'listorder'); ?>
		<?php echo $form->error($model,'listorder'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
