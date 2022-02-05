<?php
namespace app\modules\main\models;

use app\modules\guid\models\Region;
use app\modules\guid\models\Service;
use app\modules\guid\models\ServiceArea;
use app\modules\guid\models\Util;
use app\modules\user\forms\frontend\ProfileSearch;
use app\modules\user\models\User;
use app\modules\user\models\UserProfile;
use yii\base\Model;
use yii\db\Exception;

class StartForm extends Model
{
   public $regionList;
   public $service_areaList;
   public $serviceList;

    public $region;
    public $service_area;
    public $service;

    public $popular_search;
    public $popular_profile;

   public function __construct($config = [])
   {
       $this->regionList = Util::toArrayForJson(Region::getRegionList());
       $this->service_areaList = Util::toArrayForJson(ServiceArea::getServiceAreaList());
       $this->serviceList = Util::toArrayForJson(Service::getServiceList());
       $this->popular_search = Service::getServiceListWithCount(15) ; // Service::find()->asArray()->limit(15)->all();
       try {
           $this->popular_profile = ProfileSearch::getProfileList();
       } catch (Exception $e) {
       }
       parent::__construct($config);
   }
}