<?php require admin_view('/static/header');

if (post('edit_item')){
    $guncel= edit_item();
}
    
?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class=""tab>
            <div class="clearfix"></div>
            <div class="admin-tab">
                <ul tab-list>
                    <li>
                        <a href="#">Genel Özellikler</a>
                    </li>
                    <li>
                        <a href="#">Efsunlar ve Taşlar</a>
                    </li>

                </ul>
            </div>
            <div class="tab-container">
                <?php if ( isset($guncel['result']) && $guncel['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?= $guncel['message']?>
                    </div>
                <?php endif; ?>

                <?php  if (isset($guncel['result']) && $guncel['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?= $guncel['message'] ?>
                        <script>
                            setTimeout(function(){
                                window.location.assign("<?= admin_url('item-list') ?>");
                                //3 saniye sonra yönlenecek
                            },1500);
                        </script>
                    </div>
                <?php endif; ?>
                <form  class="form-horizontal form-row-seperated" enctype="multipart/form-data" action="" method="POST">
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2><?=$itemcek['item_name'];?></h2>

                                <div class="clearfix"></div>
                            </div>

                            <br />
                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">


                                    <div class="form-group" style="margin-bottom: 30px;">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Eşya Resmi:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <img width="150px" style="margin-right: 10px" id="myItem" src="<?=  URL . '/' .  $itemcek['item_image']  ?>" onerror="this.src='<?= URL . '/data/items/60001.png' ?>'"  >
                                            <br><br>
                                            <input type="hidden" name="eski_yol" value="<?= $itemcek['item_image'] ?>">
                                            <input type="file" name="item_logo" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Eşya Adı: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="itemName" class="form-control col-md-7 col-xs-12" value="<?=$itemcek['item_name'];?>">

                                            <span class="help-block"> Eşyanın adını dilerseniz değiştirebilirsiniz... </span>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim Fiyatı: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number"  value="<?= $itemcek['coins']?>" class="form-control" name="itemEp" placeholder="Örnek : 50" required>
                                            <span class="help-block"> Eşyanın birim fiyatını giriniz </span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number"  value="<?= $itemcek['unit_price']?>" class="form-control" name="unit_price"  required>
                                            <span class="help-block"> Eşyanın birim adedini giriniz. (1 birimin içinde kaç adet eşya olacağını belirler) </span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 1: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" value="<?= $itemcek['count_1']?>" name="count_1" placeholder="">
                                            <span class="help-block"> Birim miktarını giriniz <b style="color: darkred;font-size: 12px;"> (Buraya minimum 1 değerini girmek zorundasınız.)</b></span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" value="<?= $itemcek['discount_1']?>" name="discount_1" placeholder="" required>
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 2: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['count_2']?>" class="form-control" name="count_2" placeholder="" required>
                                            <span class="help-block"> Birim miktarını giriniz</span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['discount_2']?>" class="form-control" name="discount_2" placeholder="" required>
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 3: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['count_3']?>" class="form-control" name="count_3" placeholder="" required>
                                            <span class="help-block"> Birim miktarını giriniz</span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['discount_3']?>" class="form-control" name="discount_3" placeholder="" required>
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 4:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['count_4']?>" class="form-control" name="count_4" placeholder="" required>
                                            <span class="help-block"> Birim miktarını giriniz </span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['discount_4']?>" class="form-control" name="discount_4" placeholder="" required>
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 5:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['count_5']?>" class="form-control" name="count_5" placeholder="" required>
                                            <span class="help-block"> Birim miktarını giriniz </span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" value="<?= $itemcek['discount_5']?>" class="form-control" name="discount_5" placeholder="" required>
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"">Kategori :
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="table-group-action-input form-control input-xlarge" name="itemCategory">
                                                <?php
                                                $kate = $db->prepare("SELECT id,name FROM shop_menu WHERE alone = :alone OR NOT mainmenu = :mainmenu");
                                                $kate->execute(array(':alone'=>'0',':mainmenu'=>'0'));
                                                $kate->setFetchMode(PDO::FETCH_ASSOC);
                                                $katet = $kate->fetchAll();
                                                ?>
                                                <?php foreach ($katet as $itemcekss):?>
                                                    <option <?= $itemcek['kategori_id']==$itemcekss['id']? 'selected':null; ?> value="<?=$itemcekss['id']?>"><?=$itemcekss['name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"">Durumu :
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="table-group-action-input form-control input-xlarge" name="status">
                                                <option <?= $itemcek['durum'] == 0 ? 'selected' : null; ?> value="0">Pasif</option>
                                                <option <?= $itemcek['durum'] == 1 ? 'selected' : null; ?> value="1">Aktif</option>
                                                <option <?= $itemcek['durum'] == 2 ? 'selected' : null; ?> value="2">Em Market</option>
                                            </select>
                                            <span class="help-block"> Eşyanın Aktiflik Durumu ! </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Süreli Eşya  :
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="md-checkbox-list">
                                                <div class="md-checkbox has-info">

                                                    <input type="checkbox" name="time"   id="checkbox2" class="md-check" <?= $itemcek['item_time'] == 1 ? 'checked' : null; ?> value="1" >
                                                    <label for="checkbox2">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <?php if($itemcek['item_time']== 1): ?>
                                                        <span class="box"></span><i style="color: blue;" id="checkbox2Text"> Eşya Süreli ! </i> </label>
                                                        <?php else : ?>
                                                        <span class="box"></span><i style="color: red;" id="checkbox2Text"> Eşya Süreli Değil ! </i> </label>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                            <span class="help-block col-md-9 col-sm-9 col-xs-12"> Ekleyeceğiniz eşya süreli ise bunu işaretlemelisiniz ! Aşağıya manuel süre yazabilir ya da boş bırakarak item'in oyundaki süresi otomatik çekilir</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Efsun Seçimi  :
                                        </label>
                                        <div class="col-md-8">
                                            <div class="md-checkbox-list">
                                                <div class="md-checkbox has-info">
                                                    <input type="hidden" name="faq_status" class="md-check" value="0">
                                                    <input type="checkbox" name="faq_status" id="checkbox1" class="md-check" <?= $itemcek['faq_status']== 1 ? 'checked': null; ?> value="1" >
                                                    <label for="checkbox1">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span></label>
                                                </div>
                                            </div>
                                            <span class="help-block col-md-9 col-sm-9 col-xs-12"> Oyuncuların bu eşyada efsun seçmelerini istiyorsanız işaretleyiniz.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Süresi :
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-2 col-sm-2 col-xs-4">
                                            <input type="number" class="form-control" name="day" placeholder="Gün" required value="0">
                                            <span class="help-block"> Eşya Kaç Günlük </span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4">
                                            <input type="number" class="form-control" name="hour" placeholder="Saat" required value="0">
                                            <span class="help-block"> Eşya Kaç Saatlik </span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4">
                                            <input type="number" class="form-control" name="second" placeholder="Dakika" required value="0">
                                            <span class="help-block"> Eşya Kaç Dakikalık </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sevilen Ürün  :
                                        </label>
                                        <div class="col-md-8">
                                            <div class="md-checkbox-list">
                                                <div class="md-checkbox has-info">
                                                    <input type="hidden" name="popular" class="md-check" value="0">
                                                    <input type="checkbox" <?= $itemcek['popularite']== 1 ? 'checked': null; ?> name="popular" id="checkbox3" class="md-check" value="1" >
                                                    <label for="checkbox3">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span></label>
                                                </div>
                                            </div>
                                            <span class="help-block"> Sevilen ürün olarak seçmek için işaretleyiniz.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Eşya Açıklaması:</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control maxlength-handler" rows="8" name="description" required> <?= $itemcek['description'] ?></textarea>
                                            <span class="help-block"> Eşya Açıklamasını Giriniz  </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Eşya Bilgisi:</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control maxlength-handler" rows="8" name="information" required><?= $itemcek['information'] ?></textarea>
                                            <span class="help-block"> Eşya Bilgisini Giriniz (Max. 100) </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2><?=$itemcek['item_name'];?></h2>

                                <div class="clearfix"></div>
                            </div>

                            <br />
                            <div class="tab-pane" id="tab_meta">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #1 Türü:
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType1" style="display: inline;">
                                                <?php $efsun = $functions->gameIn('efsunlar');?>
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option <?= $key == $itemcek['attrtype1'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue1'] ?>" name="attrValue1" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #2 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType2" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option <?= $key == $itemcek['attrtype2'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue2'] ?>" name="attrValue2" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #3 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType3" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option <?= $key == $itemcek['attrtype3'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue3'] ?>" name="attrValue3" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #4 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType4" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option <?= $key == $itemcek['attrtype4'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue4'] ?>" name="attrValue4" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #5 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType5" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option <?= $key == $itemcek['attrtype5'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue5'] ?>" name="attrValue5" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #6 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge"  name="attrType6" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option value="<?=$key?>" <?= $key == $itemcek['attrtype6'] ? 'selected' : null; ?>><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue6'] ?>" name="attrValue6" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #7 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType7" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$val):?>
                                                    <option <?= $key == $itemcek['attrtype7'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="<?= $itemcek['attrvalue7'] ?>" name="attrValue7" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Slot #1:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="table-group-action-input form-control input-xlarge" name="socket0" style="display: inline;">
                                                <?php $taslar = $functions->gameIn('taslar');?>
                                                <?php foreach ($taslar as $key=>$val):?>
                                                    <option <?= $key == $itemcek['socket0'] ? 'selected' : null; ?> value="<?=$key?>" ><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Slot #2:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="table-group-action-input form-control input-xlarge" name="socket1" style="display: inline;">
                                                <?php foreach ($taslar as $key=>$val):?>
                                                    <option <?= $key == $itemcek['socket1'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Slot #3:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="table-group-action-input form-control input-xlarge" name="socket2" style="display: inline;">
                                                <?php foreach ($taslar as $key=>$val):?>
                                                    <option <?= $key == $itemcek['socket2'] ? 'selected' : null; ?> value="<?=$key?>"><?=$val?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="id" value="<?= get('id') ?>">
                            <input type="hidden" name="vnum" value="<?= $itemcek['vnum'] ?>">
                            <button value="1"  type="submit" name="edit_item" class="btn btn-success">Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function () {

            $('#checkbox1').change(function () {
                if($(this).is(":checked")) {
                    $('#checkbox1Text').text('Aktif');
                    $('#checkbox1Text').css('color','blue');
                }else{
                    $('#checkbox1Text').text('Pasif');
                    $('#checkbox1Text').css('color','red');
                }
            });
            $('#checkbox2').change(function () {
                if($(this).is(":checked")) {
                    $('#checkbox2Text').text('Eşya Süreli !');
                    $('#checkbox2Text').css('color','blue');


                }else{
                    $('#checkbox2Text').text('Eşya Süreli Değil !');
                    $('#checkbox2Text').css('color','red');

                }
            });
            $('#itemAdd').submit(function (event) {
                event.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    dataType: 'json',
                    type: 'post',
                    data: data,
                    processData: false,
                    success: function(result){
                        if(result.result === true){
                            notify('success',"İtem başarıyla eklendi.");
                        }else{
                            notify('error',result.message);
                        }
                    }
                });
            });
        });
    </script>




    <!-- /page content -->


<?php require admin_view('/static/footer');
