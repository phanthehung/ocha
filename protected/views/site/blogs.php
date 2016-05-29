<div class="row clearfix"> 
	<div class="content margin-auto">       
		<hr>
		<div class="md-5 margin-sm">
			<font color="#6FAD22" size="6">Ocha blog</font>
		</div>
		<div class="md-7">
            <!-- <form class="align-right" method="post" action="<?php echo Yii::app()->baseUrl?>/site/search">
                <input type="text" placeholder="Tìm kiếm..." name="search">
                <input type="submit" value="Search" class="button">
            </form> -->
        </div>
        <hr>        
        <div>
        	<?php foreach ($blogs as $blog): ?>
        		<div class="xs-12 margin-sm">
        			<a href="<?php echo Yii::app()->baseUrl ?>/site/blog/<?php echo $blog->ID; ?>">
        				<img class="xs-12 md-2 sm-3" src="<?php echo Yii::app()->baseUrl ?>/<?php echo $blog->imgUrl; ?>">
        				<div class="md-1 ">&nbsp</div>
        				<div class="xs-12 md-9 sm-9">

        					<div class="">
        						<font size="5"><b><?php echo $blog->title; ?></b></font><br/>
        						<b class="text"><?php echo $blog->description;?></b>
        					</div>
        				</div>				      	
        			</a>
        		</div>
        	<?php endforeach ?>
        </div>
        
    </div>
</div> 
<div class="clear"></div>
<div class="align-center text-center margin-sm margin-auto">	
	<div class="xs-12">
        	   		
        	   	   	
        	<?php $this->widget('CLinkPager', array(
        		'pages' => $pages,
        		'prevPageLabel' => 'Trước',
        		'nextPageLabel' => 'Sau',
        		'firstPageLabel' => '<<',
        		'lastPageLabel' => '>>',
        		'header' => '',
        		'maxButtonCount' => 5,
        		'selectedPageCssClass' => 'notlink',
        		'internalPageCssClass'=>'link',
        		'previousPageCssClass'=>'link',
        		'nextPageCssClass'=>'link',
        		)) ?>
    </div>
</div>