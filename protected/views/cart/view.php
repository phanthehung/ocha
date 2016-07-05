<?php $total = 0; ?>

    <div class="content margin-auto">
    	<hr>
			<div class="md-7 margin-sm">
				<font size="6">Thông tin liên hệ</font>
			</div>
			<hr>        		 
			<font size="4"><a style="color:rgb(111,173,34)" href="<?php echo Yii::app()->baseUrl ?>/site/product/1" title="">  < Tiếp tục mua hàng</a></font>
        
            <div class="text-center">
                <h1><font size="6">Danh sách giỏ hàng</font></h1>
                <font size="4"><?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?></font>
            </div>
            <div class="row clearfix">
                <div class="xs-12">
                	
	                    <div class="xs-2 hidden-sm">
	                        Item<hr width="92%">
	                    </div>

	                    <div class="xs-7 md-4  sm-6">
	                        Sản phẩm<hr width="92%">
	                    </div>
	                    <div class="xs-2 hidden-xs">
	                        Giá<hr width="92%">
	                    </div>
	                    <div class="xs-2">
	                        Số lượng<hr width="92%">
	                    </div>
	                    <div class="xs-3 sm-2">
	                        Tổng<hr width="92%">
	                    </div>
	                    <?php if (isset($cart)): ?>
	                     
                    	
                    		
                    	
	                   	<?php foreach ($cart as $value): ?>
	                        <div class="xs-2 hidden-sm">
	                            <img style="width:92%" src="<?php echo $value->proImg ?>">
	                        </div>
	                        <div class="xs-7 md-4 sm-6">
	                            <font size="4"><a href="<?php echo Yii::app()->baseUrl ?>/site/detail/<?php echo $value->proId ?>"><?php echo $value->proTitle ?></a></font>
	                        </div>
	                        <div class="xs-2  hidden-xs" id="numberic">
	                            <font size="4"><script type="text/javascript">
						            	document.write(formatNumber(<?php echo $value->proPrice;?>));
						            </script></font>
	                        </div>
	                        <div class="xs-2  ">
	                            <input id="<?php echo $value->proId ?>" class="text-center" onchange="update(<?php echo $value->proId ?>)" style="width:60%" type="text" value="<?php echo $value->quantity ?>"> <font size="4"> </font></input>
	                        </div>
	                        <div class="xs-3 sm-2">
	                            <font size="4">
	                            	<script type="text/javascript">
						            	document.write(formatNumber(<?php echo $value->proPrice*$value->quantity; ?>));
						            </script>
	                            </font>
	                        </div>
	                        <?php $total += $value->proPrice*$value->quantity; ?>
	                        <hr>
	                   	<?php endforeach ?>
	                   	<div class="clear"></div>
	                   	<div>
                        	<div class="xs-6">
	                         	<font size="4" >Subtotal</font>
		                    </div>	                    
	                        <div class="xs-6">
	                            <font class="align-right" size="4" >
	                            	<script type="text/javascript">
						            	document.write(formatNumber(<?php echo $total ?>));
						            </script>
	                             VNĐ </font>
	                        </div>
                        </div>
	                    

                        <div class="clear"></div>
                        <div>
                        	<div class="xs-6 margin-sm">
		                    	<div class="button"><a href="<?php echo Yii::app()->baseUrl?>/cart/clear" class="">Clear</a></div>
		                    </div>
	                        <div class="xs-6 margin-sm">

	                        	<div class="button align-right"><a href="<?php echo Yii::app()->baseUrl?>/cart/checkout/0" class="">Checkout</a></div>
	                        </div>
                        </div>
                        
                        
                        <div class="clear"></div>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </div>
 	<script type="text/javascript">
       	function update($id){
        	$value = $("#"+$id).val();
        	jQuery.ajax({
         		'type':'POST',
        		'dataType':'json',
                'data':{'id':$id,'value':$value},
                'success':function($id){ location.reload(); },
                'error':function($id){ alert("Failed!"); },
                'url':"<?php echo Yii::app()->baseUrl?>/cart/update",
                'cache':false
            });
       	};
    </script>   
