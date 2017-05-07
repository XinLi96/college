<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>社团管理</title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="index">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
    <?php include('header.php');?>


    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

        <div class="container-fluid am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 首页</div>
                    <p class="page-header-description">黑龙江大学社团联合会授权制作。</p>
                </div>
            </div>

        </div>

        <div class="row-content am-cf">
            <div class="row  am-cf">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">社团公告</div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        <div class="widget-body am-fr">
                            <div class="am-fl">
                                <div class="widget-fluctuation-period-text" id="notice">
                                    <?php echo $notice->notice_con;?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <?php
                    $user_flag = $this->session->userdata('user_flag');
                    if($user_flag==2 || $user_flag==3 || $user_flag==4){
                        echo '<div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                    <div class="widget widget-primary am-cf">
                        <div class="widget-statistic-header">
                            社团总申请数量
                        </div>
                        <div class="widget-statistic-body">
                            <div class="widget-statistic-value">
                                <strong>';
                            echo $num;

                        echo '</strong>件
                          </div>
                            <div class="widget-statistic-description">
                                待审核...
                            </div>
                            <span class="widget-statistic-icon am-icon-credit-card-alt"></span>
                        </div>
                    </div>
                </div>';
                    }
                ?>
                <?php
                    if($user_flag == 2){
                        echo '<div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                    <div class="widget widget-purple am-cf">
                        <div class="widget-statistic-header">
                            社团总资金
                        </div>
                        <div class="widget-statistic-body">
                            <div class="widget-statistic-value">
                                ￥1512.3
                            </div>
                            <div class="widget-statistic-description">

                            </div>
                            <span class="widget-statistic-icon am-icon-support"></span>
                        </div>
                    </div>
                </div>';
                    }
                ?>

            </div>


        </div>
    </div>
</div>

</body>

</html>