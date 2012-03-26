<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('folderId_pk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->folderId_pk), array('view', 'id'=>$data->folderId_pk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folderName')); ?>:</b>
	<?php echo CHtml::encode($data->folderName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folderDescription')); ?>:</b>
	<?php echo CHtml::encode($data->folderDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateModified')); ?>:</b>
	<?php echo CHtml::encode($data->dateModified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy_fk')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy_fk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifiedBy_fk')); ?>:</b>
	<?php echo CHtml::encode($data->modifiedBy_fk); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('folderPath')); ?>:</b>
	<?php echo CHtml::encode($data->folderPath); ?>
	<br />

	*/ ?>

</div>