<?php

namespace app\modules\user\models;


use app\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property string $note
 * @property string $photo
 * @property string $name
 * @property string $surname
 * @property int $view_count
 * @property string $language
 * @property string $web
 *
 * @property User $id0
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'view_count'], 'integer'],
//            [['note', 'photo', 'name', 'surname'], 'string'],
//            [['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg , gif'],
//            ['photo', 'file', 'types' => 'jpg,jpeg,png,gif', 'allowEmpty' => true],
            [['note', 'photo', 'name', 'surname', 'address', 'zip', 'language','web'], 'safe'],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'note' => Yii::t('app', 'Note'),
            'photo' => Yii::t('app', 'Photo'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'view_count'=>Yii::t('app', 'View count'),
            'address'=>Yii::t('app', 'Address'),
            'zip'=>Yii::t('app', 'ZIP'),
             'language'=>Yii::t('app', 'Language'),
            'web'=>Yii::t('app', 'Web'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    public function eventView()
    {
        if(!self::is_bot()) {
            $this->view_count += 1;
            $this->save();
        }
    }


    private static function is_bot()
    {
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $options = array(
                'YandexBot', 'YandexAccessibilityBot', 'YandexMobileBot','YandexDirectDyn',
                'YandexScreenshotBot', 'YandexImages', 'YandexVideo', 'YandexVideoParser',
                'YandexMedia', 'YandexBlogs', 'YandexFavicons', 'YandexWebmaster',
                'YandexPagechecker', 'YandexImageResizer','YandexAdNet', 'YandexDirect',
                'YaDirectFetcher', 'YandexCalendar', 'YandexSitelinks', 'YandexMetrika',
                'YandexNews', 'YandexNewslinks', 'YandexCatalog', 'YandexAntivirus',
                'YandexMarket', 'YandexVertis', 'YandexForDomain', 'YandexSpravBot',
                'YandexSearchShop', 'YandexMedianaBot', 'YandexOntoDB', 'YandexOntoDBAPI',
                'Googlebot', 'Googlebot-Image', 'Mediapartners-Google', 'AdsBot-Google',
                'Mail.RU_Bot', 'bingbot', 'Accoona', 'ia_archiver', 'Ask Jeeves',
                'OmniExplorer_Bot', 'W3C_Validator', 'WebAlta', 'YahooFeedSeeker', 'Yahoo!',
                'Ezooms', '', 'Tourlentabot', 'MJ12bot', 'AhrefsBot', 'SearchBot', 'SiteStatus',
                'Nigma.ru', 'Baiduspider', 'Statsbot', 'SISTRIX', 'AcoonBot', 'findlinks',
                'proximic', 'OpenindexSpider','statdom.ru', 'Exabot', 'Spider', 'SeznamBot',
                'oBot', 'C-T bot', 'Updownerbot', 'Snoopy', 'heritrix', 'Yeti',
                'DomainVader', 'DCPbot', 'PaperLiBot'
            );

            foreach($options as $row) {
                if (stripos($_SERVER['HTTP_USER_AGENT'], $row) !== false) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     * @return PQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PQuery(get_called_class());
    }

    public static function getProfileList(){
       return  self::find()->asArray()->limit(15)->all();
    }






}
