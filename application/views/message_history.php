<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="widgets">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
   <?php include('header.php');?>
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">消息列表</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                <div class="am-form-group tpl-table-list-select">

                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">

                                </div>
                            </div>

                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>收件人</th>
                                        <th>发送人</th>
                                        <th>消息内容</th>
                                        <th>发送时间</th>
                                    </tr>
                                    <?php foreach($result as $row){?>
                                        <tr>
                                            <th style="color: <?php if($user_name==$row->mess_rec){echo 'red';}?>"><?php echo $row->mess_rec;?></th>
                                            <th><?php echo $row->mess_post;?></th>
                                            <th><?php echo $row->mess_con;?></th>
                                            <th><?php echo $row->mess_time;?></th>
                                        </tr>
                                    <?php }?>
                                    </thead>
                                    <tbody>

                                    <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">

<!--                                <div class="am-fr">-->
<!--                                    <ul class="am-pagination tpl-pagination">-->
<!--                                        <li class="am-disabled"><a href="#">«</a></li>-->
<!--                                        <li class="am-active"><a href="#">1</a></li>-->
<!--                                        <li><a href="#">2</a></li>-->
<!--                                        <li><a href="#">3</a></li>-->
<!--                                        <li><a href="#">4</a></li>-->
<!--                                        <li><a href="#">5</a></li>-->
<!--                                        <li><a href="#">»</a></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>