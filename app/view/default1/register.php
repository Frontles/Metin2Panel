
<?php require view('header') ?>

<div id="popup_bg"></div>
<!-- confirm box -->
<div id="confirm" class="popup">
    <h1 class="popup_question" id="confirm_question">confirm</h1>
    <div class="popup_links">
        <a href="javascript:void(0)" class="popup_button" id="confirm_button"></a>
        <a href="javascript:void(0)" class="popup_hide" id="confirm_hide" onclick="UI.hidePopup()">Cancel
        </a>
        <div style="clear: both;"></div>
    </div>
</div>
<!-- alert box-->



<div class="main_b_holder">
    <!-- Important Notices.End -->
    <div id="content">
        <!-- BODY Content start here -->
        <aside id="right">
            <div id="content_ajax">
                <article class="page_article">
                    <h2 class="head">Kayıt Ol</h2>
                    <div class="body">
                        <div class="error-holder">
                            <div class="container_3 red wide fading-notification" align="left">
                            </div>
                        </div>
                        <form action="" method="POST" class="page_form">


                            <div class="bg-light">
                                <center>
                                    <?php
                                    if ($err =error()): ?>
                                        <div  class="box alert alert-danger" >
                                            <?=$err?>
                                        </div>
                                    <?php endif; ?>
                                    <?php  if ($succ =success()): ?>
                                        <div class="box alert alert-success" role="alert">
                                            <?=$succ?>
                                        </div>
                                    <?php endif; ?>

                                </center>

                                <table>
                                    <tbody>
                                    <tr>
                                        <td style="width: 150px;">
                                            <label class="register-input" for="register-email">Kullanıcı Adı:</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control grunge" name="login" minlength="5" id="login" value="<?= post('login') ?>" required maxlength="16"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="register-input" for="register-email">Şifre:</label>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control grunge" minlength="5" name="password" id="pass"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="register-input" for="register-email">Şifre Tekrar:</label>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control grunge" minlength="5" name="password2" id="pass2" required maxlength="30"/>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="register-input" for="register-email">Mail Adresi:</label>
                                        </td>
                                        <td>
                                            <input type="email" class="form-control grunge"value="<?= post('email') ?>" name="email" id="email" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="register-input" for="register-email">İsim Soyisim:</label>
                                        </td>
                                        <td>
                                            <input id="name" type="text" name="name" class="form-control grunge" value="<?= post('name') ?>" maxlength="30" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="register-input" for="register-email">Karakter Silme Kodu:</label>
                                        </td>
                                        <td>
                                            <input id="ksk" type="text" name="ksk" class="form-control grunge"  value="<?= post('ksk') ?>" maxlength="7" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="register-input" for="register-email">Telefon:</label>
                                        </td>
                                        <td>
                                            <input type="text" id="phone" name="phone" class="form-control grunge" value="<?= post('phone') ?>" maxlength="10" placeholder="555-555-55-55"/>
                                        </td>
                                    </tr>
                                    <!--
                                    <tr>
                                       <td>
                                           <label class="register-input" for="register-email">Kontrol:</label>
                                       </td>
                                       <td>
                                            GOOGLE RECAPTCHA BRAYA GELCEK
                                        </td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td></td>
                                        <td>
                                            <span class="warfg_btn"><input type="submit" name="login_submit" value="Kayıt Ol"></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </article>
            </div>

            <!-- Sidebar here    -->
        </aside> <?php require 'sidebar.php' ?>
        <div class="clear"></div>
        <!-- BODY Content end here -->
    </div>
</div>

<?php require view('footer') ?>