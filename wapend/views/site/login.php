<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



  <div class="page-container">
    
    <div class="page-index" style="background-color: #f2f2f2;">
        <!-- 弹出登陆--> 
        <div class="ui basic modal yx-login">
          <div class="ui icon header">
            <img src="/static/img/logo.png">
          </div>
          <div class="actions" style="text-align: center;">
              <div class="yx-input">
                    <i class="search icon"></i>
                    <div class="ui large inverted transparent input">
                        <input type="text" placeholder="请输入账号" value="">
                    </div>      
              </div>
              <div class="yx-input">
                    <i class="search icon"></i>
                    <div class="ui large inverted transparent input">
                        <input type="password" placeholder="请输入密码" value="">
                    </div>
              </div>
              <div class="btn-login _orange">登  陆</div>
          </div>
        </div>

      <div class="page-top _orange-red" style="padding-bottom: 0;">
            <div class="_card" style="margin-bottom: -30px;">
              <p>个人信息</p><span><img src="/img/info.png"/></span>
            </div>
      </div> <!-- top -->
      
      <div class="tpl-card">
          <div class="my-card">
            <div class="_card order">
              <p class="order-p">我的订单</p><span>查看更多 ></span>
              <div class="shouhuo">

                <div class="shouhuo-li">
                  <img class="order-img" src="/img/order1.png" />
                  <p class="order-p">待付款</p>
                </div>
                <div class="shouhuo-li">
                  <img class="order-img" src="/img/order2.png" />
                  <p class="order-p">预约中</p>
                </div>
                <div class="shouhuo-li">
                  <img class="order-img" src="/img/order3.png" />
                  <p class="order-p">待评价</p>
                </div>

              </div>
            </div>
            <div class="_card">
              <p class="_card-p">我的关注</p><span><img src="/img/info.png"/></span>
            </div>
            <div class="_card">
              <p class="_card-p">我的收藏</p><span><img src="/img/info.png"/></span>
            </div>
          </div>

      </div> 
    </div>
    
    
    
  </div>
<script type="text/javascript">
  $('.ui.modal').modal('show')
</script>
