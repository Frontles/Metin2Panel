<?php

$functions = new Functions();

$ticketclose = ticket_close(get('id'));

function ticket_close($arg){
    global $functions;
    $filtre = new Filter();
    global $db;
    $arg = $filtre->numberFilter($arg);
    if ($arg === false)
        header('Location:'. admin_url('add-event'));
    else
    {
        $controlsor = $db->prepare('SELECT event_flag,gameNotice FROM event_list WHERE event_id=:id');
        $controlsor->execute([
            'id'=>$arg
        ]);
        $control = $controlsor->fetch(PDO::FETCH_ASSOC);


        if (($controlsor->rowCount()) > 0)
        {
            $eventInfo = $control;
            $eventFlag = $control['event_flag'];
            $notice = explode("[END_ENTER]",$eventInfo['gameNotice'])[1];
            if ($functions->sendServer($notice)['connect'] === false){
                $result['result'] = false;
                $result['message'] = 'Oyun bağlantısı başarısız.';

            }
            else
            {
                $functions->sendServer("$eventFlag 0","EVENT");
                $result['result'] = true; ?>
                <script>
                    setTimeout(function(){
                        window.location.assign("<?= admin_url('account?id='. get('id')) ?>");
                        //3 saniye sonra yönlenecek
                    },1500);
                </script>
                <?php
            }
        }
        else{
            $result['result'] = false;
            $result['message'] = 'Bir Sorun oluştu ve işlem Başarısız.';

        }
    }
    return $result;
}

if ( isset($ticketclose['result']) && $ticketclose['result'] == ''): ?>
    <div style="width: 400px" class=" alert alert-danger" >
        <?= $ticketclose['message'] ?>
        <script>
            setTimeout(function(){
                window.location.assign("<?= admin_url('add-event') ?>");
                //3 saniye sonra yönlenecek
            },1500);
        </script>
    </div>
<?php endif; ?>
<?php  if (isset($ticketclose['result']) && $ticketclose['result'] ==true ):  ?>
    <div  style="width: 400px" class=" alert alert-success" role="alert">
        <?= $ticketclose['message']; ?>


    </div>
<?php endif; ?>