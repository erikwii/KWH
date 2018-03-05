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

    <script>
        var $cariJadwal;
        <?php if (isset($siswa) && $siswa != false && isset($isi) && $isi == 'pages/orangtua/orangtua'): ?>
            <?php foreach ($siswa as $sis): ?>
                var $cariJadwalSiswa<?php echo "".$sis->IDsiswa.""?>;
            <?php endforeach;?>
        <?php endif;?>

        $(document).ready(function() {
            <?php if (isset($nav_active)) {
                switch ($nav_active) {
                    case 'beranda':
                        echo "console.log('Selamat Datang di MyKaramel.com');";
                        break;
                    case 'registrasi':
                        echo "console.log('Registrasi untuk melakukan pendaftaran siswa baru.');";
                        echo "console.log('Mari bergabung bersama keluarga Karamel Education');";
                        break;
                    case 'jadwal':
                        if ($title == 'Agenda') {
                            echo "console.log('Jika kau tak kuat menahan lelahnya belajarnya, maka bersiaplah menahan pedihnya kebodohan. ~Imam Syafii');";
                        }else{
                            echo "console.log('Atur jadwal mu bulan ini!');";
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            }
            ?>
            var dateText;

            // Time Picker Initialization
            $('#waktuEdit, #waktu').pickatime({
                twelvehour: false
            });


            $('input').on('change', function(){
                var current = $(this).val();
                dateText = current;
            });

            $("#bulan").change(function () {
                console.log(this.value);
                month = this.value;
                window.location.href = '<?php echo base_url("admin/search_month/") ?>' + month;
            });

            $("#bulanp").change(function () {
                console.log(this.value);
                month = this.value;
                window.location.href = '<?php echo base_url("pengajar/search_month/") ?>' + month;
            });
            
            $("#bulano").change(function () {
                console.log(this.value);
                month = this.value;
                window.location.href = '<?php echo base_url("orangtua/search_month/") ?>' + month;
            });

            $('#search').pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                labelMonthNext: 'Bulan Berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Silahkan pilih bulan',
                labelYearSelect: 'Silahkan pilih tahun',
                today: 'Tanggal Hari Ini',
                clear: 'Reset',
                close: 'Tutup',
                selectMonths: true,
                selectYears: true,
                formatSubmit: 'yyyy/mm/dd',
                onClose: function(){
                    $(document.activeElement).blur();
                },
                onSet: function(context) {
                    if($('#search').val() != ''){
                        window.location.href = '<?php echo base_url("Admin/search_jadwal/") ?>' + dateText;
                    }
                }
            });

            $cariJadwal = $('#cariJadwal, #cariJadwalPengajar').pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                labelMonthNext: 'Bulan Berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Silahkan pilih bulan',
                labelYearSelect: 'Silahkan pilih tahun',
                today: 'Tanggal Hari Ini',
                clear: 'Reset',
                close: 'Tutup',
                formatSubmit: 'yyyy/mm/dd',
                onClose: function(){
                    $(document.activeElement).blur();
                }
            });



            $('#search_pengajar').pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                labelMonthNext: 'Bulan Berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Silahkan pilih bulan',
                labelYearSelect: 'Silahkan pilih tahun',
                today: 'Tanggal Hari Ini',
                clear: 'Reset',
                close: 'Tutup',
                selectMonths: true,
                selectYears: true,
                formatSubmit: 'yyyy/mm/dd',
                onClose: function(){
                    $(document.activeElement).blur();
                },
                onSet: function(context) {
                    window.location.href = '<?php echo base_url("Pengajar/search_jadwal/") ?>' + dateText;
                }
            });
            
            <?php if (isset($siswa) && $siswa != false && isset($isi) && $isi == 'pages/orangtua/orangtua'): ?>
                <?php foreach ($siswa as $sis): ?>
            $cariJadwalSiswa<?php echo $sis->IDsiswa?> = $('#cariJadwal<?php echo $sis->IDsiswa?>').pickadate({
                        monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                        weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                        weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                        labelMonthNext: 'Bulan Berikutnya',
                        labelMonthPrev: 'Bulan sebelumnya',
                        labelMonthSelect: 'Silahkan pilih bulan',
                        labelYearSelect: 'Silahkan pilih tahun',
                        today: 'Tanggal Hari Ini',
                        clear: 'Reset',
                        close: 'Tutup',
                        selectMonths: true,
                        selectYears: true,
                        formatSubmit: 'yyyy/mm/dd',
                        onClose: function(){
                            $(document.activeElement).blur();
                        }
                    });
                <?php endforeach ?>
            <?php endif;?>

            var d = new Date();
            var years = d.getFullYear();
            var month = d.getMonth();

            $('#tanggal, #tanggalEdit').pickadate({
                monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                labelMonthNext: 'Bulan Berikutnya',
                labelMonthPrev: 'Bulan sebelumnya',
                labelMonthSelect: 'Silahkan pilih bulan',
                labelYearSelect: 'Silahkan pilih tahun',
                today: 'Tanggal Hari Ini',
                clear: 'Reset',
                close: 'Tutup',
                selectMonths: true,
                selectYears: true,
                formatSubmit: 'yyyy/mm/dd',
                min: new Date(years,month,1),
                onClose: function(){
                    $(document.activeElement).blur();
                }
            });

            $("#addAkun").click(function(){
                $('#addAkunModal').modal('show');
            });

            $("#upgradeAkun").click(function(){
                $('#upgradeCalonOrangtuaModal').modal('show');
            });

            $("#nonaktifkanAkun").click(function(){
                $('#nonaktifkanAkunModal').modal('show');
            });

            $("#aktifkanAkun").click(function(){
                $('#aktifkanAkunModal').modal('show');
            });

            $("#upgrdBtnDiv #nonaktifkanAkun").click(function(){
                $('#nonaktifkanAkunModal').modal('show');
            });

            $("#upgrdBtnDiv #aktifkanAkun").click(function(){
                $('#aktifkanAkunModal').modal('show');
            });

            $("#editAkun").click(function(){
                $('#editAkunModal').modal('show');
            });

            $("#addMapel, #addRuangan, #addKelas, #addProgram").on('click',function(){
                $('#addModalM').modal('show');
            });
            
            $("#editMapel, #editRuangan, #editKelas, #editProgram").on('click',function(){
                var id_edit = $('#idMe').val();
                if (this.id == 'editProgram') {
                    edit_program(id_edit);
                } else {
                    $('#editModalM').modal('show');
                }
            });

            $("#deleteMapel, #deleteRuangan, #deleteKelas, #deleteProgram").on('click',function(){
                $('#deleteMmodal').modal('show');
            });

            $("#addJadwal").click(function(){
                $('#addJadwalModal').modal('show');
            });

            $("#editJadwal").click(function(){
                $('#editJadwalModal').modal('show');
            });

            $("#deleteJadwal").click(function(){
                $('#deleteJadwalModal').modal('show');
            });

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