<style type="text/css">
</style>
 <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav sn-bg-1 custom-scrollbar" style="overflow-x: hidden !important;">
            <!-- Logo -->
            <li class="mr-auto">
                    <!-- <div class="logo-wrapper waves-light">
                    </div> -->
            </li>
            <!--/. Logo -->


            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect arrow-r" style="min-width: 250px" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Beranda</a>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r" style="min-width: 250px" href="https://karameleducation.wordpress.com/" target="_blank"><i class="fa fa-info"></i>Tentang Karamel</a>
                    </li>
                    <?php
                    if(!isset($_SESSION["username"])){
                        echo "
                        <li>
                            <a class='collapsible-header waves-effect arrow-r' style='min-width: 250px' href='".base_url('registrasi')."'> <i class='fa fa-user'></i>Registrasi</a>
                        </li>
                        
                        <li>
                            <a class='collapsible-header waves-effect arrow-r' style='min-width: 250px' data-toggle='modal' data-target='#loginModal'><i class='fa fa-sign-in'></i>Masuk</a>
                        </li>";
                    }else{
                        if(isset($_SESSION["level"]) && $_SESSION["level"] == 1){
                            echo"
                            <li >
                                <a href='".site_url("admin")."' class='collapsible-header waves-effect arrow-r' style='min-width: 250px'><i class='fa fa-rocket'></i>My Karamel</a> 
                            </li>";
                        }else if(isset($_SESSION["level"]) && $_SESSION["level"] == 2){
                            echo"
                            <li >
                                <a href='".site_url("pengajar")."' class='collapsible-header waves-effect arrow-r' style='min-width: 250px'><i class='fa fa-rocket'></i>My Karamel</a> 
                            </li>";
                        }else if(isset($_SESSION["level"]) &&$_SESSION["level"] == 3){
                            echo"
                             <li >
                                <a href='".site_url("orangtua")."' class='collapsible-header waves-effect arrow-r' style='min-width: 250px'><i class='fa fa-rocket'></i>My Karamel</a> 
                            </li>";
                        }else if(isset($_SESSION["level"]) && $_SESSION["level"] == 4){
                            echo"
                             <li >
                                <a href='".site_url("murid")."' class='collapsible-header waves-effect arrow-r' style='min-width: 250px'><i class='fa fa-rocket'></i>My Karamel</a> 
                            </li>";
                        }

                        echo "
                        <li>
                            <a href='".site_url("beranda/logout")."' class='collapsible-header waves-effect arrow-r' style='min-width: 250px'><i class='fa fa-sign-out'></i>Logout</a> 
                        </li>";
                    }
                ?>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->

        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg navbar-dark scrolling-navbar double-nav">
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn navbar-brand mr-auto">
                <p style="cursor: pointer" id="navBrand"><b>Karamel Education</b></p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                
                <?php
                    if ($nav_active == "beranda"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Beranda</span></a>
                </li>

                <?php
                    if ($nav_active == "tentang_karamel"){
                        echo "<li class='nav-item active'>";
                    }else{
                        echo "<li class='nav-item'>"; 
                    }
                ?>
                    <a class="nav-link" href="https://karameleducation.wordpress.com/" target="_blank"><i class="fa fa-info"></i> <span class="clearfix d-none d-sm-inline-block">Tentang Karamel</span></a>
                </li>
                <?php

                    if(!isset($_SESSION["username"])){
                        if ($nav_active == "registrasi"){
                            echo "<li class='nav-item active'>";
                        }else{
                            echo "<li class='nav-item'>"; 
                        }
                        echo "<a class='nav-link' href='".base_url("registrasi")."'><i class='fa fa-user'></i> <span class='clearfix d-none d-sm-inline-block'>Registrasi</span></a>";
                    }
                    
                ?>
                </li>
                </li>
                <?php
                    if(isset($_SESSION["username"])){
                        if(isset($_SESSION["level"]) && $_SESSION["level"] == 1){
                            echo"
                            <li class='nav-item'>
                                <a href='".base_url("admin")."' class='nav-link'><i class='fa fa-rocket'></i><span class='clearfix d-none d-sm-inline-block'>My Karamel</span></a> 
                            </li>"; 
                        }else if(isset($_SESSION["level"]) && $_SESSION["level"] == 2){
                            echo"
                            <li class='nav-item'>
                                <a href='".base_url("pengajar")."' class='nav-link'><i class='fa fa-rocket'></i><span class='clearfix d-none d-sm-inline-block'>My Karamel</span></a> 
                            </li>"; 
                        }else if(isset($_SESSION["level"]) &&$_SESSION["level"] == 3){
                            echo"
                            <li class='nav-item'>
                                <a href='".base_url("orangtua")."' class='nav-link'><i class='fa fa-rocket'></i><span class='clearfix d-none d-sm-inline-block'>My Karamel</span></a> 
                            </li>"; 
                        }else if(isset($_SESSION["level"]) && $_SESSION["level"] == 4){
                            echo"
                            <li class='nav-item'>
                                <a href='".base_url("murid")."' class='nav-link'><i class='fa fa-rocket'></i><span class='clearfix d-none  d-sm-inline-block'>My Karamel</span></a> 
                            </li>"; 
                        }
                        echo "
                        <li class='nav-item'>
                            <a href='".site_url("beranda/logout")."' class='nav-link'><i class='fa fa-sign-out'></i><span class='clearfix d-none d-sm-inline-block'>Logout</span></a> 
                        </li>";
                        
                    }else{
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' data-toggle='modal' data-target='#loginModal'><i class='fa fa-sign-in'></i><span class='clearfix d-none d-sm-inline-block'>Masuk</span></a>
                        </li>";
                    }
                ?>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

        <!--Modal: Login Form-->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="login">
            <div class="modal-dialog cascading-modal" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header blue lighten-1 white-text">
                        <h4 class="title"><i class="fa fa-user"></i> Masuk</h4>
                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <div class="err">

                        </div>
                        <form id="loginFrm" action="<?php echo site_url("beranda/login") ?>">
                        <div class="md-form form-sm">
                            <i class="fa fa-envelope prefix"></i>

                            <input type="text" id="username" name="username" class="form-control">
                            <label for="username">Username</label>

                        </div>

                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input  type="password" id="password" name="password" class="form-control password" data-toggle="password">
                            <label for="password">Password</label>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" class="filled-in" id="showHide">
                            <label for="showHide" id="showHideLabel">Show Password</label>
                        </div>

                            <center>
                                <div id="loader"></div>
                            </center>

                        <div class="text-center mt-2">
                            <button class="btn btn-rounded btn-info" id="loginBtn">Masuk<i class="fa fa-sign-in ml-1"></i></button>
                        </div>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <div class="options text-center text-md-right mt-1">
                            <p>Belum memiliki akun? <a href="<?php echo base_url("registrasi")?>">Daftar sekarang</a></p>
                        </div>
                    </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: Login Form-->

 <script>
     //submit login
     $('#loginFrm').submit(function(e) {
         e.preventDefault();

         $('#loginBtn').hide();
         $('#loader').css('display', 'block');

         $.ajax({
             type: 'post',
             url: $(this).attr("action"),
             data: $(this).find('input, textarea').serialize(),
             dataType: 'json',
             success: function(data) {
                 console.log(data);
                 if(data.status ==  'fail'){
                     toastr["error"](data.msg);
                     $('#loader').css('display', 'none');
                     $('#loginBtn').show();
                 }else{
                     setTimeout(function() {
                         $('#loader').fadeOut("slow").hide();
                         window.location.href = "<?php echo base_url()?>";
                         $('#loginBtn').show();
                     }, 1000);

                 }
             }
         });
     });

     $(document).ready(function(){
         $("#loginModal").on('shown.bs.modal', function(){
             $(this).find('#username').focus();
         });
         $('#navBrand').on('click',function () {
             window.location.href = "<?php echo base_url()?>";
         });
     });

 </script>

                                                