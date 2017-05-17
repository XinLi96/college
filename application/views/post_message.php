<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>申请</title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/money_apply.css">
</head>

<body data-type="widgets">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
    <?php include('header.php');?>
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row">

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">消息发送</div>
                    </div>
                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="message/post_mess" method="post">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">收件人 <span class="tpl-form-line-small-title">Recieve</span></label>
                                <div class="am-u-sm-9">
                                    <select name="recieve" id="">
                                        <?php foreach($result as $row){?>
                                        <option value="<?php echo $row->user_name;?>"><?php echo $row->user_name;?></option><!-- 将所有人用下拉列表显示 -->
                                        <?php }?>
                                    </select>
<!--                                    <input type="text" class="tpl-form-input" name="title" id="user-name" placeholder="">-->
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">发送时间 <span class="tpl-form-line-small-title">Time</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="am-form-field tpl-form-no-bg" name="time" placeholder="发送时间" data-am-datepicker="" readonly="">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">消息内容</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" rows="10" name="details" id="user-intro" placeholder="消息内容"></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">发送消息</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>