<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before {
        content: "";
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
                                <span>Yöneticiler</span>
                            </div>
                            <div class="iv-right col-6 text-md-right">
                                <span><a href="/admin/yonetici_ekle" class="btn btn-xs btn-secondary">Yönetici Ekle</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="data-tables">
                        <table class="table table-hover data-table">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="1">ID</th>
                                    <th>İsim</th>
                                    <th>Eposta</th>
                                    <th>Oluşum Tarihi</th>
                                    <th width="1" class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row):?>
                                <tr>
                                    <td><?php echo sprintf('%03d', $row->YID);?></td>
                                    <td><?php echo $row->isim;?></td>
                                    <td><?php echo $row->eposta;?></td>
                                    <td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?></td>
                                    <td>
                                        <button class="btn btn-secondary btn-xs" type="button"  data-toggle="dropdown">
                                            <i class="ti-menu"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/admin/yonetici_duzenle/<?php echo $row->YID;?>">Düzenle</a>
                                            <a class="dropdown-item" href="/admin/yonetici_sifre_degistir/<?php echo $row->YID;?>">Şifre Değiştir</a>
                                            <a class="dropdown-item" href="/admin/yonetici_sil/<?php echo $row->YID;?>">Sil</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>