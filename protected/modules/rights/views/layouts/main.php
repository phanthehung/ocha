<?php $this->beginContent(Rights::module()->appLayout); ?>


		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>


<?php $this->endContent(); ?>