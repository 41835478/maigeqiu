<!--头部开始-->
    <div class="header clearfix">
        <div id="logo"><h1><a href="/">成人保健品</a></h1></div>
		<div id="wa"><img src="images/ww.png"/></div>
        <div id="nav">
            <ul>
                <li <?php if(empty($_GET['cat'])) : ?>class="def"<?php endif; ?>><a href="/">首页</a></li>
                <?php foreach($cats as $id => $cat) : ?>
                <li <?php if(isset($_GET['cat']) && $id == $_GET['cat']) : ?>class="def"<?php endif; ?>><a href="<?php echo $this->createUrl('index', array('cat' => $id)); ?>"><?php echo $cat['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<!--头部结束-->

<form action="<?php echo Yii::app()->baseUrl; ?>" method="get">
    <input id="keyword" name="keyword" type="text" placeholder="请输入关键词" />
    <label><input name="price" type="radio" value="10" />10元</label>
    <label><input name="price" type="radio" value="15" />15元</label>
    <label><input name="price" type="radio" value="20" />20元</label>
    <label><input name="price" type="radio" value="30" />30元</label>
    <label><input name="price" type="radio" value="50" />50元</label>
    <button type="submit">搜索</button>
    <input name="r" type="hidden" value="site/search" />
</form>

<?php if($dataProvider !== null) : ?>
<!--主体产品开始-->
    <div class="product_list">
      <ul>
        <?php foreach($dataProvider->data as $key => $val) : ?>
        <li>
          <div class="pro_info">
          <h2 class="pro_tit"><strong>【打折商品】</strong><a target="_blank" href="<?php echo $val['url']; ?>"><?php echo $val['title']; ?></a></h2>
              <div class="pic"><a target="_blank" href="<?php echo $val['url']; ?>"><img src="<?php echo $val['image_url']; ?>_310x310.jpg" alt="<?php echo $val['title']; ?>" height="280" width="280"></a></div>
              <ins class="our_price">￥<?php echo $val['sale_price']; ?></ins> 
          </div>
          <div class="buy_pro"> 
              <a class="buy_now" target="_blank" href="<?php echo $val['url']; ?>">去购买</a> 
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
<!--主体产品开始-->
<!--产品翻页开始-->
   <div id="pages">
     <form>
      <div class="page_box">
         <ul>
            <?php 
            $this->widget('CLinkPager',array(
               'header'=>'',  
               'firstPageLabel' => '首页',  
               'lastPageLabel' => '末页',  
               'prevPageLabel' => '上一页',  
               'nextPageLabel' => '下一页',  
               'pages' => $pager,  
               'maxButtonCount'=>5,  
               'cssFile'=>false,
               'htmlOptions'=>array(
              // 'template'=>'<li><a href="{url}">{lable}</a></li>'
               )
            ));  
            ?>
         </ul>
      <div>
      </form>
   </div>
<!--产品翻页end-->
<?php endif; ?>
