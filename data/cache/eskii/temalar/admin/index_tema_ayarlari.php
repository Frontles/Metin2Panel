<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before {
		content: "";
	}
.responsive {
  width: 100%;
  height: auto;
}
.zoom {
	-webkit-transform: scale(1.0);
	transform: scale(1.0);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.zoom:hover {
	-webkit-transform: scale(1.0);
	transform: scale(1.0);
}
</style>

<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-6">
								<span>Tema Yönetimi</span>
							</div>
						</div>
					</div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="card-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <img class="card-img-top img-fluid zoom" src="<?php echo base_url();?>/uploads/temalar/index1.jpg" alt="image">
                                <div class="card-body">
                                    <center><h5 class="title">aqua</h5></center>
				<?php if($this->config->item('index_secimi') == 'index'):?>
                    <a href="javascript:void(0);" class="btn btn-flat btn-danger btn-lg btn-block">Varsayılan Olarak Ayarlı</a>
                <?php else:?>
					<a href="<?php echo base_url('admin/index1_sec');?>" class="btn btn-flat btn-primary btn-lg btn-block">Temayı Seç</a></a>
                <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <img class="card-img-top img-fluid zoom" src="<?php echo base_url();?>/uploads/temalar/index2.jpg" alt="image">
                                <div class="card-body">
                                    <center><h5 class="title">rock</h5></center>
				<?php if($this->config->item('index_secimi') == 'index2'):?>
                    <a href="javascript:void(0);" class="btn btn-flat btn-danger btn-lg btn-block">Varsayılan Olarak Ayarlı</a>
                <?php else:?>
					<a href="<?php echo base_url('admin/index2_sec');?>" class="btn btn-flat btn-primary btn-lg btn-block">Temayı Seç</a></a>
                <?php endif;?>
				
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <img class="card-img-top img-fluid zoom" src="<?php echo base_url();?>/uploads/temalar/myindex.jpg" alt="image">
                                <div class="card-body">
                                    <center><h5 class="title">Kendi İndeximi Kullanacağım</h5></center>
									<p class="card-text">Nasıl Kullanılır : FTP içerisinden kendinize ait index dosyalarınızı /temalar/myindex içerisine attıktan sonra index.html veya index.php dosyanızın ismini tema.php olarak güncelleyiniz.(tema.php içerisinde bulunan css ve resim urllerini düzenlemeniz gerekir.)<br> anasayfa linkiniz : <b><?php echo base_url();?>site</b> </p>
				<?php if($this->config->item('index_secimi') == 'myindex'):?>
                    <a href="javascript:void(0);" class="btn btn-flat btn-danger btn-lg btn-block">Varsayılan Olarak Ayarlı</a>
                <?php else:?>
					<a href="<?php echo base_url('admin/index3_sec');?>" class="btn btn-flat btn-primary btn-lg btn-block">Temayı Seç</a></a>
                <?php endif;?>
                                </div>
                            </div>
                        </div>

                        <!--<div class="col-lg-6 col-md-6 mt-5">
                            <div class="card card-bordered">
                                <img class="card-img-top img-fluid zoom" src="<?php echo base_url();?>/uploads/temalar/8.jpg" alt="image">
                                <div class="card-body">
                                    <center><h5 class="title">Merkür</h5></center>
				<?php if($this->config->item('tema_secimi') == 'default8'):?>
                    <a href="javascript:void(0);" class="btn btn-flat btn-danger btn-lg btn-block">Varsayılan Olarak Ayarlı</a>
                <?php else:?>
					<a href="<?php echo base_url('admin/tema8_sec');?>" class="btn btn-flat btn-primary btn-lg btn-block">Temayı Seç</a></a>
                <?php endif;?>
					</div>
                </div>-->
            </div>
            </div> 

			</div>              </div> 

			</div> </div> 
			
			</div>

        <!-- main content area end -->