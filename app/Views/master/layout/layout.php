<!DOCTYPE html>
<html>
<head>
    <?php echo $header?>

    <style>
        #topSearch .input-prepend{border:1px solid #eee;}
    </style>
    <script>
        function topBarSearch(){
            v1 = $("#topSearch #s2").val();
            v2 = $("#topSearch #s5").val();
        }

        $(document).ready(function(){
            $("#topSearch input[type='text']").keydown(function(ev) {
                //
                if (ev.which = '13') {
                    topBarSearch();
                }
            });
        });

        var cont_url = "<?php echo $cont_url?>";

    </script>

</head>



<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <ul class="nav pull-left notifcation-center visible-xs visible-sm">
                <li class="dropdown">
                    <a href="#main-menu" data-webarch="toggle-left-side">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
            <!-- BEGIN LOGO -->
            <a href="/master/">
                <img src="/assets/webarch/img/master_logo.png" class="logo" alt="" data-src="/assets/webarch/img/master_logo.png" data-src-retina="/assets/webarch/img/master_logo.png" width="106" height="21" />
            </a>
            <!-- END LOGO -->
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">

            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">
                <div class="chat-toggler sm">
                    <a href="/master/config/myinfo">
                        <div class="profile-pic">
                            <img src="/assets/webarch/img/user.jpg" alt="" data-src="" data-src-retina="" width="35" height="35" />
                        </div>
                        <span><?php echo $SS_Mname?></span>
                    </a>
                </div>
                <ul class="nav quick-section">
                    <li class="quicklinks">
                        <a href="/master/login/?logout=1" class="logout-btn">
                            <i class="fa fa-sign-out-alt"></i> LOGOUT
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->

<!-- BEGIN CONTAINER -->
<div class="page-container row">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">

            <!-- END MINI-PROFILE -->

            <!-- BEGIN SIDEBAR MENU -->
            <p class="menu-title sm">MENU <span class="pull-right"><a href="javascript:;"><i class="fa fa-redo"></i></a></span></p>
            <ul>

                <li <?php if($uri_segment_2=='')echo "class='active'";?>> <a href="/master/"><i class="fa fa-th-large"></i> <span class="title">대쉬보드</span></a></li>

                <?php
                foreach($master_menu as $code=>$menu){
                    if(isset($menu["sub"]) && sizeof($menu["sub"]))$menu1_link = "javascript:;";
                    else $menu1_link = $menu["link"];
                    if(!$menu["link"])$menu["link"] = "javascript:alert('준비중입니다.');"
                    ?>

                    <li <?php if($uri_segment_2==$code)echo "class='active'";?>>
                        <a href="<?php echo $menu1_link?>"> <i class="fa <?php echo $menu["icon"]?>"></i> <span class="title"><?php echo $menu["name"]?></span> <span class="fa fa-chevron-left"></span> </a>
                        <?php if(isset($menu["sub"]) && sizeof($menu["sub"])){?>
                            <ul class="sub-menu">
                                <?php foreach($menu["sub"] as $sub){
                                    if(!$sub["link"])$sub["link"] = "javascript:alert('준비중입니다.');"
                                    ?>
                                    <li> <a href="<?php echo $sub["link"]?>"><?php echo $sub["name"]?></a></li>
                                <?php }?>
                            </ul>
                        <?php }?>
                    </li>
                <?php }
                ?>

                <li > <a href="/master/config/myinfo"><i class="fa fa-user"></i> <span class="title">나의 정보수정</span></a></li>

            </ul>


            <div class="side-bar-widgets">
                <!--
                  <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="material-icons">add</i></a></span></p>
                  <ul class="folders">
                    <li>
                      <a href="#">
                        <div class="status-icon green"></div>
                        My quick tasks </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="status-icon red"></div>
                        To do list </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="status-icon blue"></div>
                        Projects </a>
                    </li>
                    <li class="folder-input" style="display:none">
                      <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="">
                    </li>
                  </ul>
                   -->

                <!--
               <p class="menu-title">현황 </p>
               <div class="status-widget">
                 <div class="status-widget-wrapper">
                   <div class="title">방문</div>
                   <p id='leftStateVisit'>0명</p>
                 </div>
               </div>

               <div class="status-widget">
                 <div class="status-widget-wrapper">
                   <div class="title">금일 가입</div>
                   <p id='leftStateJoin'>0명</p>
                 </div>
               </div>

               <div class="status-widget">
                 <div class="status-widget-wrapper">
                   <div class="title">이번달 정산</div>
                   <p id='leftStateRefund'>0원</p>
                 </div>
               </div>

               <div class="status-widget">
                 <div class="status-widget-wrapper">
                   <div class="title">현재 적립금</div>
                   <p id='leftStateCash'>0원</p>
                 </div>
               </div>
                -->

            </div>
            <div class="clearfix"></div>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <a href="#" class="scrollup">Scroll</a>
    <div class="footer-widget">
        Copyright © 2021-2021 <br>WEBS. <br>All rights reserved.
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>


        <?php if($messageFlag=='edit'){?>
            <script>
                Messenger.options = {extraClasses: 'messenger-fixed messenger-on-top',theme: 'flat'}
                Messenger().post({message:"저장되었습니다.",hideAfter: 3,showCloseButton: true});
            </script>
        <?php }else if ($messageFlag=='delete'){?>
            <script>
                Messenger.options = {extraClasses: 'messenger-fixed messenger-on-top',theme: 'flat'}
                Messenger().post({message:"삭제되었습니다.",type: 'error',hideAfter: 3,showCloseButton: true});
            </script>
        <?php }?>

        <?php foreach($views as $v){
                echo $v;
        }?>

    </div>

    <!-- END CONTAINER -->
</div>

<div class="modal" tabindex="-1" role="dialog" id='thumbView'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>