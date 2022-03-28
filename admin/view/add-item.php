<?php require admin_view('/static/header');

$veri =  item(get('vnum'));

$functions = new Functions();

$file = data_items($functions->itemToPng($getItem['vnum']));
if(file_exists($file)){
    $setItemImage = $functions->itemToPng($getItem['vnum']);
}
else{
    $setItemImage = '60001.png';
}


if (post('add_item')){
    $ekle = add_item();
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
                <form  class="form-horizontal form-row-seperated" action="" enctype="multipart/form-data" method="POST">
                    <?php if ( isset($ekle['result']) && $ekle['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?= $ekle['message']?>
                        </div>
                    <?php endif; ?>

                    <?php  if (isset($ekle['result']) && $ekle['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <?= $ekle['message'] ?>
                            <script>
                                setTimeout(function(){
                                    window.location.assign("<?= admin_url('item-list') ?>");
                                    //3 saniye sonra yönlenecek
                                },1500);
                            </script>
                        </div>
                    <?php endif; ?>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2><?=$functions->utf8($getItem['locale_name']);?> <small>

                                    </small>

                                </h2>

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
                                            <img style="margin-right: 10px" id="myItem" src="<?=data_items($setItemImage);?>" alt="">
                                            <br><br>

                                            <input type="file" name="item_logo" class="form-control col-md-7 col-xs-12">

                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Eşya Adı: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" required name="itemName" class="form-control col-md-7 col-xs-12" value="<?=$functions->utf8($getItem['locale_name']);?>">
                                            <input id="itemimage" type="hidden" class="form-control" name="itemImage" value="items/<?=$setItemImage;?>">
                                            <span class="help-block"> Eşyanın adını dilerseniz değiştirebilirsiniz... </span>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim Fiyatı: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" name="itemEp" placeholder="Örnek : 50" required>
                                            <span class="help-block"> Eşyanın birim fiyatını giriniz </span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" name="unit_price" value="1" required>
                                            <span class="help-block"> Eşyanın birim adedini giriniz. (1 birimin içinde kaç adet eşya olacağını belirler) </span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 1: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="count_1" placeholder="" value="1">
                                            <span class="help-block"> Birim miktarını giriniz <b style="color: darkred;font-size: 12px;"> (Buraya minimum 1 değerini girmek zorundasınız.)</b></span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="discount_1" placeholder="" value="0">
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 2: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="count_2" placeholder="" value="0">
                                            <span class="help-block"> Birim miktarını giriniz</span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="discount_2" placeholder="" value="0">
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 3: <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="count_3" placeholder="" value="0">
                                            <span class="help-block"> Birim miktarını giriniz</span>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="discount_3" placeholder="" value="0">
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 4:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="count_4" placeholder="" value="0">
                                            <span class="help-block"> Birim miktarını giriniz </span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="discount_4" placeholder="" value="0">
                                            <span class="help-block"> Miktar indirimi % olarak hesaplanır (yoksa 0 yazınız)</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Birim miktarı & İndirim - 5:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="count_5" placeholder="" value="0">
                                            <span class="help-block"> Birim miktarını giriniz </span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <input type="number" class="form-control" required name="discount_5" placeholder="" value="0">
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
                                                <?php foreach ($katet as $rowss):?>
                                                    <option value="<?=$rowss['id']?>"><?=$rowss['name']?></option>
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
                                                <option value="0" selected>Pasif</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Em Market</option>
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
                                                    <input type="hidden" name="time" class="md-check" value="0">
                                                    <input type="checkbox" name="time" id="checkbox2" class="md-check" value="1" >
                                                    <label for="checkbox2">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span><i style="color: red;" id="checkbox2Text"> Eşya Süreli Değil ! </i> </label>
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
                                                    <input type="checkbox" name="faq_status" id="checkbox1" class="md-check" value="1" >
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
                                            <input type="number" required class="form-control" name="day" placeholder="Gün" value="0">
                                            <span class="help-block"> Eşya Kaç Günlük </span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4">
                                            <input type="number" required class="form-control" name="hour" placeholder="Saat" value="0">
                                            <span class="help-block"> Eşya Kaç Saatlik </span>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4">
                                            <input type="number"  required class="form-control" name="second" placeholder="Dakika" value="0">
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
                                                    <input type="checkbox" name="popular" id="checkbox3" class="md-check" value="1" >
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
                                            <textarea class="form-control maxlength-handler" rows="8" name="description" required> <?= $veri['item_desc'] ?></textarea>
                                            <span class="help-block"> Eşya Açıklamasını Giriniz  </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Eşya Bilgisi:</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control maxlength-handler" rows="8" name="information" required><?= $veri['item_desc'] ?></textarea>
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
                                <h2><?=$functions->utf8($getItem['locale_name']);?> <small>



                                    </small></h2>

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
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" value="" name="attrValue1" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #2 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType2" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" name="attrValue2" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #3 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType3" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" name="attrValue3" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #4 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType4" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" name="attrValue4" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #5 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType5" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" name="attrValue5" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #6 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType6" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" name="attrValue6" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Efsun #7 Türü:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <select class="table-group-action-input form-control input-xlarge" name="attrType7" style="display: inline;">
                                                <?php foreach ($efsun as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-5">
                                            <input type="number" class="form-control input-small" name="attrValue7" placeholder="Efsun Değeri" style="display: inline-block;position: absolute;margin-left: 30px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Slot #1:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="table-group-action-input form-control input-xlarge" name="socket0" style="display: inline;">
                                                <?php $taslar = $functions->gameIn('taslar');?>
                                                <?php foreach ($taslar as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
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
                                                <?php foreach ($taslar as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
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
                                                <?php foreach ($taslar as $key=>$row):?>
                                                    <option value="<?=$key?>"><?=$row?></option>
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
                            <input type="hidden" name="vnum" value="<?= get('vnum') ?>">
                            <?php if (!permission('shop', 'item-add')): ?>
                                <span style="color: red"> İtem Ekleme İzniniz Bulunmamaktadır. </span>
                            <?php endif; ?>
                            <button value="1" <?= (!permission('shop', 'item-add')) ? 'disabled' : null;  ?>  type="submit" name="add_item" class="btn btn-success">Ekle</button>

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
        });
    </script>




    <!-- /page content -->


<?php require admin_view('/static/footer');
