<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>社团管理</title>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="index">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;">社团联合会管理系统</a>
        </div>
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">

            <!-- 其它功能-->
            <div class="am-fr tpl-header-navbar">
                <ul>
                    <!-- 欢迎语 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="">欢迎你, <span> <?php echo $this->session->userdata('user_name');?></span> </a
                    </li>


                    <!-- 退出 -->
                    <li class="am-text-sm">
                        <?php
                        $user_id = $this->session->userdata('user_id');
                        if($user_id){
                            echo '<a href="user/logout">
                                      <span class="am-icon-sign-out"></span> 退出
                                      </a>';
                        }
                        ?>

                    </li>
                </ul>
            </div>
        </div>

    </header>
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        <div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <img src="assets/img/user04.png" alt="">
                </div>
                <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                    <?php echo $this->session->userdata('user_name');?>
          </span>
                <a href="user/change" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
            </div>
        </div>

        <!-- 菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-link">
                <a href="Welcome/index" class="active">
                    <i class="am-icon-home sidebar-nav-link-logo"></i>社团首页
                </a>
            </li>


            <li class="sidebar-nav-link">
                <a href="notice/message">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i>公告历史
                </a>
            </li>
            <?php
            $user_flag = $this->session->userdata('user_flag');
            if($user_flag==5){
                echo '<li class="sidebar-nav-link">
                <a href="user/view_st">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i>查看社团
                </a>
            </li>';
            }
            ?>
            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i>
                    <?php
                    if($user_flag==1){
                        echo '事务申请';
                    }else if($user_flag==2||$user_flag==3||$user_flag==4){
                        echo '事务审核';
                    }else if($user_flag==5){
                        echo '公告';
                    }
                    ?>
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <?php
                            if($user_flag==1){
                                echo '<a href="Welcome/money_apply">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 财务申请
                                      </a>';
                            }else if($user_flag==2){
                                echo '<a href="fd/shenhe">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 财务审核
                                      </a>
                                      <a href="fd/history">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 审核历史
                                      </a>';
                            }else if($user_flag==5){
                                echo '<a href="Welcome/post_notice">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 发布公告
                                      </a>';
                            }
                        ?>

                    </li>

                    <li class="sidebar-nav-link">
                        <?php
                        if($user_flag==1){
                            echo '<a href="Welcome/active_apply">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动申请
                                      </a>';
                        }else if($user_flag==4){
                            echo '<a href="active/shenhe">
                                  <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动审核
                                  </a>
                                  <a href="active/history">
                                  <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 审核历史
                                  </a>
                                  <a href="record/shenhe">
                                  <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动记录确认
                                  </a>
                                  <a href="record/history">
                                  <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动记录历史
                                  </a>
                                  ';
                        }
                        ?>
                    </li>

                    <li class="sidebar-nav-link">
                        <?php
                            if($user_flag==1){
                                echo '<a href="Welcome/record_apply">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动记录提交
                                      </a>';
                            }
                        ?>
                    </li>

                    <li class="sidebar-nav-link">
                        <?php
                        if($user_flag==1){
                            echo '<a href="Welcome/con_apply">
                                      <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 外联申请
                                      </a>';
                        }else if($user_flag==3){
                            echo '<a href="conn/shenhe">
                                  <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 外联审核
                                  </a>
                                  <a href="conn/history">
                                  <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 审核历史
                                  </a>
                                  ';
                        }
                        ?>
                    </li>
                </ul>
            </li>
            <?php
                if($user_flag==1||$user_flag==5){
                    echo '<li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 申请历史
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="fd/history">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 财务历史
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="active/history">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动历史
                            </a>
                        </li>
                        
                        <li class="sidebar-nav-link">
                            <a href="record/history">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动记录
                            </a>
                        </li>
                        
                        <li class="sidebar-nav-link">
                            <a href="conn/history">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 外联历史
                            </a>
                        </li>
                    </ul>
                </li>';
                }
            ?>
            <li class="sidebar-nav-link">
                <a href="Welcome/reg">
                    <i class="am-icon-clone sidebar-nav-link-logo"></i> 注册
                    <!--                    <span class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm">6</span>-->
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="Welcome/login">
                    <i class="am-icon-key sidebar-nav-link-logo"></i> 登录
                </a>
            </li>


        </ul>
    </div>
</div>
</div>
</div>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/amazeui.datatables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>