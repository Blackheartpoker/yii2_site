<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 28.09.2016
 * Time: 15:44
 */
namespace frontend\components;

use yii\base\Component;
use Yii;

class Common extends Component{


    const EVENT_NOTIFY = 'notify_admin';

    public function sendMail($subject,$body,$email="romanenkodp@mail.ru",$name){
        \Yii::$app->mail->compose()
            ->setFrom([ \Yii::$app->params['supportEmail'] => \Yii::$app->name])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();

        $this->trigger(self::EVENT_NOTIFY);
    }

    public function notifyAdmin($event){

        print "Notify Admin";
    }


}