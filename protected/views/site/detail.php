<div class="row clearfix">
    <div class="content margin-auto">       
        <hr> 
        <div class="">
            <a href="<?php echo Yii::app()->baseUrl?>/site/product/<?php echo $product->category ?>" title=""><< Quay lại</a>
        </div> 
        <div class="xs-12">
            <div class="sm-6 xs-12 margin-md">
                <img class="md-11 xs-12" src="<?php echo $product->proImg ?>">
                
            </div>
            <div class="sm-6 xs-12 margin-md">
                <b><font size="6">
               <!--  <?php if ($product->category == 1): ?>
                    TRÀ MATCHA 
                <?php else: ?>
                    DỤNG CỤ PHA TRÀ
                <?php endif ?> -->
                <?php echo $product->proTitle; ?>
            </font>
        </b><br/>
        <font size="5" id="money" class="single margin-sm"><?php echo $product->proPrice ?> VNĐ</font><br> 
        <article class="margin-sm"><?php echo $product->proDescription; ?></article>
        <hr width="100%" size="3px" color="black" align="center"/>
        <div>
            
        
            <div class="align-left" style="margin-right:20px">
              <?php
                echo CHtml::ajaxButton(
                'Thêm vào giỏ', array("cart/add"),
                array('type' => 'POST',
                    'dataType' => 'json',
                    'data' => array(
                        'id'=>"$product->proId",
                        ),
                   
                    'success'=>'js:function(){ window.location.href = "'. Yii::app()->baseUrl .'/cart/view"; }',
                    'error'=>'js:function(){ alert("Thêm sản phẩm thất bại!"); }',
                    ),
                array('class'=>'button')
                );
                ?>  
            </div>
        
            

            <div class="clear"></div>
        </div>

            <hr width="100%" size="3px" color="black" align="center"/>
        </div>
    </div>
 
</div>
</div>
<br><br>

</div><br><br>	
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/slick.min.js"></script>
	  <script type="text/javascript">
	    $(document).ready(function(){

	    	$('#money').text(formatNumber($('#money').text()));

	      $('.extra').slick({
			  	dots: true,
			  	infinite: false,
			  	speed: 1000,
			  	slidesToShow: 4,
			  	slidesToScroll: 4,
			  	infinite: true,
			  	autoplay:true,
			  	autoplaySpeed: 1500,
			  	focusonselect:true,
			  	lazyLoad:"progressive",
			  	responsive: [
			    {
			      	breakpoint: 1024,
			      	settings: {
			      		slidesToShow: 3,
			        	slidesToScroll: 3,
			      	}
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2,
			      }
			    },
			    {
			      breakpoint: 400,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1,
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  	]
			});
	    });


	

</script>





