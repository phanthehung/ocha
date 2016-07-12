<?php $this->beginContent(Rights::module()->appLayout); ?>


		<?php $this->renderPartial('/_flash'); ?>
		<?php $this->renderPartial('/_menu'); ?>
		<?php echo $content; ?>


<?php $this->endContent(); ?>