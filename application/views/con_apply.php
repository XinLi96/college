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
                        <div class="widget-title am-fl">外联申请</div>
                    </div>
                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="conn/post_apply" method="post" enctype="multipart/form-data">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">赞助商家 <span class="tpl-form-line-small-title">Company</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="company" id="user-name" placeholder="请输入商家名称">
                                    <small>请填写赞助商家。</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">申请时间 <span class="tpl-form-line-small-title">Time</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="am-form-field tpl-form-no-bg" name="time" placeholder="申请时间" data-am-datepicker="" readonly="">
                                    <small>申请时间为必填</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">申请人 <span class="tpl-form-line-small-title">Author</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="user" placeholder="申请人姓名">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">外联金额 <span class="tpl-form-line-small-title">SEO</span></label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="money" placeholder="申请金额">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">申请图片 <span class="tpl-form-line-small-title">Images</span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
<!--                                            <img src="assets/img/a5.png" alt="">-->
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 添加商标图片或条幅图片</button>
                                        <input id="doc-form-file" name="img" type="file">
                                    </div>

                                </div>
                            </div>
<!--                            <div class="am-form-group">-->
<!--                                <label for="user-intro" class="am-u-sm-3 am-form-label">金额明细</label>-->
<!--                                <div class="am-u-sm-9">-->
<!--                                    <textarea class="" rows="10" name="details" id="user-intro" placeholder="金额明细"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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