<?php

namespace common\models;

use backend\models\Message;
use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "sgx_lang".
 *
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property integer $default
 * @property integer $date_update
 * @property integer $date_create
 */
class Lang extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'name'], 'required'],
            [['default'], 'integer'],
            [['url', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'name' => 'Name',
            'default' => 'Default',
            'date_update' => 'Date Update',
            'date_create' => 'Date Create',
        ];
    }





    static function getDefaultLang()
    {
        return Lang::find()->where('`default` = :default', [':default' => 1])->one();
    }

    static function getLangs()
    {
        return Lang::find()->all();
    }

    public function Validates()
    {
        $getDefault = Lang::getDefaultLang();
        if($this->default == 1){
            if ( $getDefault->id !== $this->id &&  $getDefault !== null ) {
                $getDefault->default = '0';
                $getDefault->save();
            }

            $current = "<?php return '$this->url';";
            file_put_contents(dirname(__DIR__).'/config/default-lang.php', $current);

            $this->save();
            return $this->url;
        }else{
            if ( $getDefault->id === $this->id ) {
                Yii::$app->session->setFlash('error', 'Update error.');
                return false;
            }else{
                $this->save();
                return $getDefault->url;
            }
        }


    }
    public function ValidateLangs()
    {
        $getLangs = Lang::getLangs();
        $current = '';
        foreach ($getLangs as $lang){
            $current.= '"'.$lang->url.'",';
        }
        $current = "<?php return [$current];";
        file_put_contents(dirname(__DIR__).'/config/languages.php', $current);
        return true;
    }

    public function ValidatesDelete()
    {
        $getDefault = Lang::getDefaultLang();
        if($getDefault->id === $this->id)
        {
            return false;
        }else{
            Message::deleteAll('`language` = :language', [':language' => $this->url]);
            return true;
        }
    }


}
