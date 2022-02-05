<?php


namespace app\modules\guid\models;


use Yii;
use yii\helpers\Url;

class Util
{
    public static function  toArrayForJson(array $data)
    {
        $objArr = [];
        foreach ( $data as $key=>$val ){
            $obj= new ToJson();
            $obj->label = $val;
            $obj->value = $val;
            $obj->id = $key;
            $objArr[] = $obj;
        }
        return $objArr;
    }

    public static function toShortString($txt , $length= 400 , $offset=0)
    {
        return substr($txt, $offset, $length).((strlen($txt) > $length)?'...':'');
    }


    public static function getProfileListView1($profileList)
    {
        $profileListView = '';

                       foreach ($profileList as $puser) {
                     $profileListView .='<div class="row user-card">';
                           $profileListView .='<div class="col-md-2 col-lg-2 col-sm-3">';
                           $profileListView .=("<img src=".$puser['photo']." class='panel-image-right' alt='...' style='width:100px;'>");
                           $profileListView .="</div>";
                           $profileListView .="<div class='col-md-9 col-lg-9 col-sm-9'>";
                           $profileListView .="<ul>";
                           $profileListView .='<li class="text-success mb-30 profile-username"><strong>'.$puser['username'].'</strong></li>';
                           $profileListView .='<li class="text-info mb-30 profile-service">'.$puser['services'].'</li>';
                           $profileListView .='<li class="text-info mb-30 profile-region">'.$puser['regions'].'</li>';
                           $profileListView .='<li class="text-info mb-30 profile-note">'.Util::toShortString($puser['note']).'</li>';
                           $profileListView .="</ul>
                         </div>
                         <div class='col-md-1 col-lg-1 col-sm-3'>
                             <a type='button' class='btn btn-info' href='";
                           $profileListView .=Url::current([$puser['id']."/profile"])."'>".Yii::t('app','Info')."</a>
                         </div>
                     </div>";

                           //                             <a type='button' class='btn btn-info' href='".Url::current(['profile', 'id'=>$puser['id']])."'>Info</a>
         }
        return $profileListView;
        
    }


    public static function PhoneEmailValidation()
    {

    }

    public static function showStars($stars_cnt){
        $stars = "";
        $dec = $stars_cnt - floor($stars_cnt);
        $floor = floor($stars_cnt);
        for($i=1;$i<6;$i++){
            if($i<=$floor + 1) {
                if($i<=$floor)
                    $stars .= '<small class="fa fa-star text-warning"></small>';
                elseif($dec > 0 )
                    $stars .= '<small class="fa fa-star fa-star-half-o text-warning"></small>';
                else
                    $stars.= '<small class="fa fa-star-o text-warning"></small>';
            }
            else
                $stars.= '<small class="fa fa-star-o text-warning"></small>';
        }
        return $stars;
    }

    public static function base64_to_jpeg($base64_string, $output_file = null ) {
        // open the output file for writing
        $output_file = $output_file ?? self::getTempFile();
        $ifp = fopen( $output_file, 'wb' );
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        // clean up the file resource
        fclose( $ifp );
        return    str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/',$output_file ) );;
    }

    /**
     * Create a temp file and get full path
     * @param string $prefix (optional) Name prefix
     * @return string Full temp file path
     * @throws \yii\web\NotFoundHttpException When tmp directory doesn't exist or failed to create
     */
   static  function getTempFile ( $prefix = 'prof' ) {
     //   $tmpDir = \Yii::$app->homeUrl.'/tmp';
        $tmpDir = 'tmp';
        if ( !is_dir($tmpDir) && (!@mkdir($tmpDir) && !is_dir($tmpDir)) ) {
            throw new \yii\web\NotFoundHttpException ('temp directory does not exist');
        }
        $file = tempnam( $tmpDir, $prefix );
        if(rename($file, $file.'.jpg')) {
            // \Yii::getAlias('@webroot')
            $file = strtolower($file.'.jpg');
         //   $fi = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/',$file) );
            return  $file;
        }
    }
}

class ToJson
{
    public $label;
    public $value ;
    public $id ;
}

