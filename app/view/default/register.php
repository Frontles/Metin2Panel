<?php  require view('static/header');
if (post('login_submit')){
    $kayit =kayit_ol();
}
?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head">Kayıt Ol</h2>
            <div class="body">
                <center>
                    <?php  if ( isset($kayit['result']) && $kayit['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?=$kayit['message']?>
                        </div>
                    <?php endif; ?>
                    <?php  if (isset($kayit['result']) && $kayit['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <?=$kayit['message']?>

                            <script>
                                setTimeout(function(){
                                    window.location.assign("<?= site_url('login') ?>");
                                    //3 saniye sonra yönlenecek
                                }, 2000);

                            </script>
                        </div>
                    <?php endif; ?>

                </center>
                <form action="" method="POST" class="page_form">
                    <div class="bg-light">
                        <table>
                            <tbody>
                            <tr>
                                <td style="width: 150px;">
                                    <label class="register-input" for="register-email"><?=$lng[22]?>:</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control grunge" name="login" id="login" required maxlength="16"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email"><?=$lng[23]?>:</label>
                                </td>
                                <td>
                                    <input type="password" class="form-control grunge" name="password" id="pass"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email"><?=$lng[94]?>:</label>
                                </td>
                                <td>
                                    <input type="password" class="form-control grunge" name="password2" id="pass2" required maxlength="30"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email"><?=$lng[78]?>:</label>
                                </td>
                                <td>
                                    <input type="email" class="form-control grunge" name="email" id="email" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email"><?=$lng[95]?>:</label>
                                </td>
                                <td>
                                    <input id="name" type="text" name="name" class="form-control grunge" onkeypress="return textonly2(event,'#name')" maxlength="30" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email"><?=$lng[96]?>:</label>
                                </td>
                                <td>
                                    <input id="ksk" type="text" name="ksk" class="form-control grunge" minlength="4"  maxlength="7" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email"><?=$lng[97]?>:</label>
                                </td>
                                <td>
                                    <input type="text" id="phone" name="phone" class="form-control grunge" onkeypress="return numberonly(event,'#phone')" maxlength="10" placeholder="555-555-55-55"/>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <span class="warfg_btn"><input type="submit"   name="login_submit" value="<?=$lng[10]?>"></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </article>
    </div>
</aside>


<?php  require view('sidebar') ?>
<?php  require view('static/footer') ?>