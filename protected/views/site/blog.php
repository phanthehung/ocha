
<div class="content margin-auto">        
    <hr>
    <div class="">
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" title="">< Quay lại</a>
    </div> 
    <div>
        <div class="xs-12 margin-sm">
           
        </div>
        <div class="md-12 margin-sm">
            <b><font size="6"><?php echo $blog->title; ?></font></b><br/>
            <article><?php echo $blog->content; ?></article>
            <hr width="100%" size="3px" color="black" align="center"/>
            <div class="blogs" >
                
                <ul >Bài viết cũ hơn
                    <?php foreach ($oldPost as $value): ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl?>/site/blog/<?php echo $value->ID?>"><?php echo $value->title?></a>
                        </li>
                    <?php endforeach ?>
                </ul>  
            </div> 
        </div>
    </div>

</div>
</div>


