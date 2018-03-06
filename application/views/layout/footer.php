<!--Footer-->
<footer id="footer" class="page-footer white center-on-small-only">

    <!--Social buttons-->
    <div class="text-center mb-3 wow fadeIn" data-wow-delay="0.2s">
        <a id="footer-social-facebook" target="_blank" href="https://web.facebook.com/sahabatcerdasKE?ref=br_rs" class="icons-sm fb-ic"><i class="fa fa-facebook left"></i></a>
        <a id="footer-social-twitter" target="_blank" href="https://twitter.com/karamel_edu" class="icons-sm tw-ic"><i class="fa fa-twitter left"></i></a>
        <a id="footer-social-instagram" target="_blank" href="https://instagram.com/karamel_edu" class="icons-sm"><i class="fa fa-instagram pink-text left"></i></a>
    </div>
    <!--/.Social buttons-->
    
    <!--/.Social buttons-->
    
    <!--Copyright-->
    <div class="footer-copyright wow fadeIn primary-color-dark" data-wow-delay="0.2s">
        <div class="container-fluid">
            &copy;
            <?php echo date('Y');?> Copyright: .Native -<a href="<?php echo base_url('beranda') ?>"> Karamel Education </a>
        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
    <!-- Page Script -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/mdb.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/karamel.js')."?v=".date("Ymd") ?>"></script>
    
    <?php if (isset($nav_active) && $nav_active == "keuangan"):?>
    <!-- Keuangan Script -->
    <script>
        // Small chart
        $(function () {
            $('.min-chart#chart-sales').easyPieChart({
                barColor: "#4caf50",
                onStep: function (from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        });
        
        <?php 
            $array = "";
            $month = '"';
            foreach ($chart as $key => $value) {
                $array = $array.$value.",";
                $month = $month.$key.'","';
            }
            $array = rtrim($array,",");
            $month = rtrim($month,',"');
            $month = $month.'"';
        ?>
        //Main chart
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: [<?php echo $month ?>],
                datasets: [{
                    label: "Keuntungan Bulanan",
                    fillColor: "#fff",
                    backgroundColor: 'rgba(255, 255, 255, .3)',
                    borderColor: 'rgba(255, 99, 132)',
                    data: [<?php echo $array ?>],
                }]
            },
            options: {
                legend: {
                    labels: {
                        fontColor: "#fff",
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true,
                            color: "rgba(255,255,255,.25)"
                        },
                        ticks: {
                            fontColor: "#fff",
                        },
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: true,
                            color: "rgba(255,255,255,.25)"
                        },
                        ticks: {
                            fontColor: "#fff",
                        },
                    }],
                }
            }
        });
    </script>
    <?php endif; ?>
    <script>
        $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
    </script>

    <?php if(isset($script_captcha)){
        echo $script_captcha; // javascript recaptcha 
    } ?>

    <?php
        if(isset($err_massages)){
            if(isset($_SESSION['login_err']) && $_SESSION['login_err'] === true){
                echo "
                <script> 

                    document.getElementById('login').classList.remove('fade');
                    $(document).ready(function() {
                        $('#login').modal('show');
                        toastr['error']('".$err_massages."');
                        document.getElementById('login').classList.add('fade');
                    });

                </script>";
                unset(
                    $_SESSION['login_err'],
                    $_SESSION['user_err'],
                    $_SESSION['pass_err']
                ); 


            }else if(isset($_SESSION['jadwal_err']) && $_SESSION['jadwal_err'] == true){
                echo "
                <script> 

                    document.getElementById('tambahJadwal').classList.remove('fade');
                    $(document).ready(function() {
                        $('#tambahJadwal').modal('show');
                        toastr['error']('".$err_massages."');
                        document.getElementById('tambahJadwal').classList.add('fade');
                    });

                </script>";
                unset(
                   $_SESSION['jadwal_err_tanggal'],
                    $_SESSION['jadwal_err_waktu'],
                    $_SESSION['jadwal_err_IDruangan'],
                    $_SESSION['jadwal_err_IDmapel'],
                    $_SESSION['jadwal_err_IDpengajar'],
                    $_SESSION['jadwal_err_IDkelas']
                ); 
            }elseif (isset($_SESSION['error']) || $_SESSION['error'] == true) {
                echo "
                <script> 
                    $(document).ready(function() {
                        toastr['error']('".$_SESSION['err_massages']."');
                    });
                </script>";
                unset(
                    $_SESSION['err_massages'],
                    $_SESSION['error']
                );
            }else{
                echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['error']('".$err_massages."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['reg_err_username'],
                    $_SESSION['reg_err_email'],
                    $_SESSION['reg_err_name'],
                    $_SESSION['reg_err_telp'],
                    $_SESSION['reg_err_alamat']
                );
            }

        }else if(isset($_SESSION['succ_massages'])){
            echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['success']('".$_SESSION['succ_massages']."');
                    });
                    
                </script>
                ";

                 unset(
                    $_SESSION['succ_massages']
                );
        }

        if(isset($_SESSION['deletew']) && isset($_SESSION['deletef'])){
             echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['warning']('".$_SESSION['deletew']."');
                        toastr['success']('".$_SESSION['deletef']."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['deletef'],
                    $_SESSION['deletew']
                );
        }elseif(isset($_SESSION['deletex'])){
            echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['error']('".$_SESSION['deletex']."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['deletex']
                );
        }elseif(isset($_SESSION['deletef'])){
            echo "
                <script>
                    
                    $(document).ready(function() {
                        toastr['success']('".$_SESSION['deletef']."');
                    });
                    
                </script>
                ";
                unset(
                    $_SESSION['deletef'],
                    $_SESSION['deskripsi'],
                    $_SESSION['judul']
                );
        }
    ?>

</body>
</html>