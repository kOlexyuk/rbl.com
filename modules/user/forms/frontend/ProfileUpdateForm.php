<?php

namespace app\modules\user\forms\frontend;

use app\modules\guid\models\UserRegion;
use app\modules\user\models\UserProfile;
//use app\models\UserServiceItem;
use app\modules\guid\models\UserService;
use app\modules\user\models\User;
use app\modules\user\Module;
use phpDocumentor\Reflection\Types\Object_;
use yii\base\Model;
use yii\db\ActiveQuery;

class ProfileUpdateForm extends Model
{
    public $id;
    public $email;
    public $phone;
    public $services;
    public $service_areas;
    public $note;
    public $photo;
    public $username;
    public $name;
    public $surname;
    public $status;
    public $role;
    public $service_id;
    public $service_area_empty;
    public $service_empty;
    protected  $profile;
    public  $added_service_ids;
    public  $deleted_service_ids;

    public $region_ids;
    public $regions;
    public $region_empty;
    public  $added_region_ids;
    public  $deleted_region_ids;

    public  $photo_person;

//    public $region_id;
    public $zip;
    public $address;
    public $language;
    public $web;
    public $profile_type;

    public $empty_user_photo = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAGFAmwDASIAAhEBAxEB/8QAHAABAQADAAMBAAAAAAAAAAAAAAEFBgcCAwQI/8QAPxABAAEDAwIDBQUFBgUFAAAAAAECAxEEMUEFIQYHgRITUWFxIpGhsdEjNkJzwRQkMjVSsjNyouHwJUNTgsL/xAAZAQEBAAMBAAAAAAAAAAAAAAAAAQIDBAX/xAAnEQEAAgICAgIBBAMBAAAAAAAAAQIDESExBBIyQTMiUmFxExRCUf/aAAwDAQACEQMRAD8A/ZIZWHuvPQwABgJAwYUBMGAgA3U5FTYXYgEFOBEMqZBMKgAKAnAqSAKAgoCAACgICiocrCCECgCCggu4CCkAhhUyAKmewHqKkABnsuQQUBJNlAQVMgAoId1AQwoCBkyAKAgLyCC5M5BBQVBTIiH3BkUVFgQDYARcgIKAAAgSCiygICpsBubAAYAAAAAFEkBU5AA3AAAADAKh2UVDkXHAiei4ZHQ+HOp9SiKtPob1yidqppxT989mf0vlh1W/7M3blixE7xNU1TH3NdslK9yyisz9NOHUNF5V6K1NM6nU3dR8aafsR+rPaTwd0fRf8Pp9iqc5zcj25/FpnyaR1DZGK09uJxTnGO8/B7adHqJiJixcmOJiiXebfT9Nax7GntUY29miIw9fUeoabpOjr1Gpri3ao3n4/KPjLX/tbnUVZf4v5cFroqoqmmqJpqjeJjEvFnfF3iCjxD1KL1qxFm1bj2KZxHtVR8ZYJ2VmZjctE8SKgyQ9FQAAwAqAAAHAAAAGAAFQBUAAAFQwAZDcwAcgAcm5gCDHyJBVDBMCBkwcACKKIoAGDAIHCggoIkigIoAguEFBYgEQUBBcAIKAnIpgEFIBDhWU6J4a13iC7FOltT7vOKr1fain1/RJmKxuVjlimW6R4X6j1vE6bTVTbzj3tX2aY9XR+heXnT+mUU16mmNbf3zXH2aZ+Ufq2qi3Fun2aYiI+EdnFfyfqrdGLfyc/wCl+Vlun2a9fqaq5z3t2YxH3z3bZ03wx0zpXfTaK3RVO9Ux7VX3yyw5LZLW7luisV6eMURG0YhcYXA1aZooKJLkHmH1LU6nxDqNNcuzVp7E0+7txtGaYmfrPeXX8ZYTxD4T0PiC3PvqPd6iI+zfo/xR9fjDdhvGO+5a7xNo4cS3GZ6/4W1vh67EX6fbs1Tim9R3pn9JYd61bRaNw5Na4lNhRUQyoCcCkgmBQEFMAgpgEFxgwCYFAQUwCCnyBBQEybqAgoCCgIbLEAId1MfIU3AEE5DuCgACAqgCCKgBwuyCqigiAAqCgCAKioAoACKAIoBFM9h0PwF4KiqLXUtfRM/xWbNUf9U/0a8l4xxuWVazadPk8JeXtevpp1fUqarVjeiztVX9fhDpWl0trRWabNm3TatUxiKaYxEPbFMQryr5LZJ3LrrWKoZUw1s0XIYAMgBkkAEUB6dVpbWssV2b1um7brjFVNUZiYcw8X+ALnS5r1egpqvaXeq3vVR+sOqvGaIxPzbKZJxzuGFqxZ+eY/AdC8b+BKaYu9R6dRif8V3T0x980/o57h61LxeNw5LRNZ0HIM2KfVQAyigGU9VNhUMqCIoAcCALlFO0gm4AKCALlFBFz3AEUOQRQFTJn54Fx8hAEAwuBOQXBwgCiTJIC4QBUCAWTHZNzcFEAWYITYBUDIAAKbooCGQFE4AVJkWmJmYiIzPwBtPgLwzHW+ozfv0+1pLGJqidqquI+jrtNMU0xEYiIjEQxPhbpFPRei6fTY+37Pt3J+NU95Zh5GW/vbbspX1hPiqENLYohkBRAUyAJKiAoigJkMgVRlzDzA8IxoK6upaSnGnrn9tRG1EzzHynLp71anT0aqzXauUxXbriaaqZ2mGzHecdtwxtX2jT8+z2kZLxF0evofV9RpKon2aZ9qiZ5pnZjM/c9iJiY3Di1riTCpAoogBCoCCplfyATAoIqGQVDK5AQAUTICoZBV2BBFSQFUTIIvCG5MiqJlQAlBFEUAAAAVBUEDgz2UEVF3gEFQUCADAAgqbALugAKgC7Mp4Z039r8QdPtYzE3qZmMZ27sUz/AIF/ezp3/PX/ALJY34rMrXuHaYVFeI7zkQ5BRO4C9hAFEAXgQBQTcF4EUAQnYHO/NfRU/wBy1dNMRVM1Wqp+Mbx/Vzt0/wA1p/8ASdH/AD//AMy5g9Xx53jhx5I/UqGcGXQ1h8QBRDP3gKmewKqAIAZkFQkAncAAAFQMiqhkEAAUQyCp2DIHY4UBJUkFD1E5EWUUgUAnuCACAqcACoKAZEA3MgbBsAAAuRPqABJsAz/gX96+nf8ANX/sqYCWyeXn716KPlX/ALJYZPhLKvyh2QNx4ruVPUUECVwAACLsigIu6ZBYEXIAi7AmCSSQaX5pUxPQbEzHeL8flLljqnml/kNn+fT+VTlT0/G/G5MnyAHU1KnqAAKCAAAAuUABUJAA3A3IIAIFAQOAFEUEBZBDsuyAKAEopgEFARchIILsYBAUVNzKoAoCIKAhlQEFgBCV3AQVADhQE3bL5efvbo/pX/sqa22ny1opq8T2pmO9NuuYn4TjH9Za8vwlnT5Q6+J6jxnaCoCkCAqKAIKCC4AQFAJEBeU4WUkGmeaX+Q2f59P5VOVOq+aX+Q2f59P5VOVPT8b8blyfIOVR1NJkVANhQEFhANwUEMhwAKYBDeF2AQFFTAKIhkAMioBkFx3BCZF/82FTZQEDOQFTc7CiBudwBJX0BU5MgIBwu4qAswIioACoAqbLAIKkAogAKgDbPLT95qP5VX9Gpts8s/3mo/lVNeX4Szp8oddBHjOxQSRVAA2AABAUAARcgAAcpKpINM80v8hs/wA+n8qnK3VPNL/IbP8APp/Kpyr0en4343Jk+Qqeg6moVOABU9FFEFESJ+SoegLwi+icAogAoAIbAHAL6AioCqICEKkfRQQn6KgCwJIKH4goIYEXuIooISIAQCpwAAAC7oCnqAIbByfAAFARUA5DdcAYbV5afvPR/KrYLofT46r1bS6OavYi9XFM1RxDrfRvBfTuiaujVaam5F2KZpzXXnMTu5s2SKxNZ+22lZmds/C4Qh5brUTlQAQBUAVBQBFA2SBQMCKAkhMA0zzS/wAhs/z6fyqcqdt8V+Hp8R6C3pvfxYim5FftTTnif1cq8UeHLnhvX02KrsXqK6PbpriMZ9Ho+NaPX0+3Nlid7YcNx2NIAIGAFOCQENlSAAAA3NgDkAFQADAAAAAYAAAMCSK8gybiEgAcAAGOwZFEUkRBUBfUwmVAAARQEWENgUADAAGwmF5AABkvDF+dN4g6fcjvMXqYx9Zx/V3WIxDgPS7vuOp6S5jPsXaKsfHEu/Rs8/yu4l04vtZEHE3r2EAXAgCmDkAE+BALgPggLgEBTlFAEUEqjs5T5o34r67ZtRHe3Yj8ZmXVp/wy5B5k3IueKLkRnNNqiJ+uM/1dXjfkasvxasqYHpuRTCKACAphAVSIRREXAACKCKigiiAYOTYAwqAKgoAgC4EPQFygbAGVQFIAAABFNwQMdlBBcEAh9BQSAAAUAwAIqHIAoAABTOJifg/QOhvxqdHYvR2i5RFcesZfn52vwX1COoeG9FXnNVFHu6vrT2/Rw+VHES34p7hnA2nccDpUTACooAAAAAEgIvIACLsAYPieoJO0uJeM9RGp8T6+qJzEXPY+6Mf0drvXabNqu5VOKaYmqZn4Q4H1PUxreo6nURGPfXarn31TP9Xb4sfqmWjLPEPlBXoOYOEUBAANhRUDZdxEFQFRUAF5AQVANgABTkAEBRFBCSFxkEIX8QDYAEUOQABQ5ARDcyABwZAAAyd8qnYBeEAFEAXkTkFQlQRUAMt28tvEFGg1degv1xTa1FUTbmqe0V/D1/o0laZmiYmmcTHeJhhesXr6yyrb1nb9DryxnhzWR1DomjvxV7c1Wqfan5xGJ/HLJPGmNcO2J3G1RURVTKgIL6IBwZFwBMpwpgEyqdlBOQwYAyTIlztGZ2Bq/mB1yOl9FuWaK8ajUfYpiN8fxT935uQR+TK+JeqV9V61q71Vc10e8qpt54oie0MVy9bDT0rpx3t7SCo3tYKgKEQAncAVcoKIJkAVBQTIcqAIAZBQQFBAAVFARc4RfuAEUAADgAUDHYADByIgoCYJADYVOBQyKCGxgEVFQFwhwoCKCoqKIi8wGyjqnlbqpvdDvWKpzNm7OO/E9/1bm5p5VdQptavW6ScRN2mLlM/OO0/nDpeXj5o9by7ac1hUhRpZooAi4RQQUAyigIvJkgEVMryCMb4j19PTOiazU1fwW5x9Z7R+MwyTSfNHqc2ek2dJTOKtRXme/wDDT3/PDOlfa0QxtOo25cE95R7ThDAAAoqKgIvCKgAKCG5yAeqyACBkDIsoCpgUDflAAA5FUTYEVPXBKwCKmyiiLgADAAGAAACRDcFMJyCKgcguBAVeE4AFEBFiBMgErsgAGexuAqdgGS8OdUno3WdNqva9mimrFfzpntLudq5Tcooqpn2qaoiYmOYfnrPZ1Hy48SxrtJHTtRX/AHixH7Oap/x0f9nF5NNx7w34ra4buqZHnulZEyoAGQAQFwCAoQAioAS4z486tHVfEN72J/Z2I9zTMTmJxnM/fM/c6P4z8QU9B6Tcqpqj+03Y9i1TPfvzPpDi+czmXb41OZtLRkt/yCD0HMomQF2EAIABcCGQVDICmEAUQAVAFwhkBRDIKYQBd0ncAFwICoZOwHKpuuAAAAAAJAAFE4VBBUAVFQAAUVAQMCgmFwICnIkQC8CfFdgQUAe7R6u9odVbv2K5t3bc5pqjh6UjdTrmHbPCfiSnxH06bvse7vW5im5Txn5SzjS/K3T+76Feu/8AyXp/CIhujxckRF5iHdWZmOT71TJlrZKnKpuCp6ABuuBMgYXCLyA8apxEyqTtIOIeKetXeudXvXblUTbtzNu3TTtFMTLEPZqP+Pc/5p/N63t1iIrEQ4Jnc7TgBkigCoHICoKInCoAAuwJgwoBgx3EAUQBeRAFRdwE5CQAAVFhAAXPzAA/MUAERRORV4DdBFAkVFAEFARUURAAFAAODACcignCgAEgIBsAu0iT9wOyeXtv2PCmlmP4prq/6pbJww3g6x7jwz0+nERm1FXb59/6s08W87tMu6vRgMDBkihAByACLuAIcKCJXMRTMy8tnhej9jX9JB+fb9UVXq6onMTVMw9a4xEfRHux04AlcIICgCC8gmRcAILgBMqmFARQEF2ATkXkBBUABeAQVABTAIKgChj6AfQwAASbAHICgAgiySKgSCAAEgCgbgGwAiouMpAAscpzsCooCLnucAIQKCLMTHwhkvDvR6uvdVs6SmfZpq711RvFMbuwaLwt0nRUURa0NmJpjtVVREz9cy0ZM0Y+PttrWbPq6RajT9L0lqNqLVNPb5RD7EiIpiIjtHC/B5Pc7dUJkAUUARU4AVFTgFSFQFeu9OLNf0l5lURMTE7A/PGcxBMu0de8I6DquiuW6dPbs34p/Z3aKcTTPo4zes16e7XauUzTcomaaqZ4mHr4skZI/pxWrNZ5eC7INzAAAMrsnIBAAqKgLsIbAZgUBJVAAWUBcoY7goqY7AgAAqSAbqighgPvBc4EWAABQAQMhwKQHJIIbAAZFEEX4IKZVADIAhldkMgKiigIIu4igkbmRY3Ub55U6SK9Zr78x9qiimiJx8ZnP5Q6XENV8uuiz0vocXbkTF7VTFyYn/Tj7P4Nql4+a0WvMw7aRqulNxGlmoigBlAFQyCoGQXgReQRRAJhxLxnZmx4n6hTiYibnt9/nGXbXNfNDok2r9nqdumPZriLdzEcxtP3dvSHT49vW/P205Y3DQkNh6jlFEBSRBTZUyCKJuZFVDkEUQAU3M9gAQCCAABQDKKAmO4CqcIAp2nhNgQwsCAsoqAKkgKcIAu4gAGSQXlABUFAABFwmVARQEFOQDCLuAi8Ps6d0XW9Wr9nSaa5e749qmn7MfWdoSZiOx8XzZLw70qes9Z0ulxM011Zrx/pjdt/SPK2uqKa+o6n2Y5tWef/ALf9m69K8PaDo1MRpNNRbq/171ffPdy38isRMR23Vx75lkLdum3RTTTEU0xGIj4Q80yrzXUIuUBQAAyAAZADJkAAAADDG+IemU9Y6PqdLVvXTmmfhVHePxZJKu+FidTtJjfD88VUzTM0zGJicTE8JjDtXVvBPS+sVTcuWIs3Zz+0sz7M+vEtL6t5Ya7Sfa0V6nWUY701fYq/SXp08iluJ4ck47R00nHY3fRq9BqdBc93qbFzT1/6blMw+fb5umJiemv+FABMKZAMAAnKicAYMKAY7mABMGwoILICYXBkBMCgCKZAMGcmQCIDIIG4AYJUEFABFAOEUEOQ5AAwABgCTPcPwAIFANxNwVHt02mu6u9Tas26rtyqe1FEZmW3dF8tNbrZoua2uNHanv7O9z7toYWvWncsoiZ6abiZnEd5lsHSfA3VerTExY/s1qcT7y/mnMfKOXTej+EemdGiJs6eK70R3u3ftVT+nozMU+zLjv5P7Ib4xf8ArUej+W/TtBMV6mJ1t2JzHt9qY9M9/VtlrT2rFEUW7dNuiNqaYxEPZA47WtbuW2KxHSYXAMWQAACAoigCbrAByAAICiKAABhJjKoCphQHz6vQafX25t6ixbvUzxXTEtP6x5YaPVTVXobtWkrx2oqzVTM/nDeExmWdb2p1LGaxPbiXV/B/VOjZm9ppuWojPvbP2qfX4MLv836GqoirdgeteCel9Xiquuz7m/Mf8Wz9mfu2l108merQ02xftcXG4dY8tdfopquaSunWWuKY7V/dtLUr+nuaW7VbvW6rdyntNFUYmHZW9bdS0zWY7eAgzYqAAIoIoACKCKgChhNwUABFTALAboC7JhdzAIR3XlAOVRQRUAFQBUAAMLyCbCgIEgAACxGX2dN6RrOr3YtaTT136ucR2j6ztDfOh+V9q17N3qdz31cd/c2+1PrPP4NV8tadyzrSbNB6f0zVdTve60unrv3MZmKY2+st36L5XVV+zc6lf9mN/c2Z7/SZ/Rv2i6fp+n2KbWns0WbdO1NMYfRhw38i08V4dFccR2+HpnRdH0e3NGk09Fmmd8bzPzl90R3Xgcs89tkRroRcgoABIAAdgAAAAACAOAAAAA+IAJuoCKAAbAAZA/FJUBMcPi6l0bR9Wt+71ent36ePajvH0nd9xhYnXSa2511nys/xXOm6jHPub0/hEx/Vo/Uej6zpN33er09dmrj2o7T9J5d8erUaSzq7VVq9bpu26oxNFcZiXTTyLV4nlrnHExw/PuyZdQ615Y6TVRVc0Fc6W7O1urvb/WGi9a8Na/oVf9609UUZxF2n7VE+v6u2ualupc9qTX6YpMm3yVuYJyHAAuU3UEBQTZRAAUEFAINzACSeigCKmBTIp6iG4AGAAQUkEVPUACQDIsd5bb4Y8Aarq8UX9XnS6Se8f664+UcerG1opG7LETPTWdB0/UdSv02dNZqvXJ/hphv/AEDywop9m71S57dXafcW57R8pnn0bn0vpGk6Pp/c6WxTap5xHer5zPL7uHn38i1uK9OmuOI5l6NJobGhs02tPaos2qdqKKcQ+jKbjk/tuURQRcp6qAbiAoSgEinIAACLugKZAAAAyGAAQBUAXIigioAuU4UkBAnYFE9QFz3AwBkyIC5eFy1TdpmmqmKqZ3iYzEvMBp3XfLjQdRiq5o5/sV+f9MfYn049HPes+GOodDuY1Nir3cziLtHemf8Az5u5PC7aovW6qK6aa6KoxNNUZiYdFM9qcdtVscS/Pexl0zxN5b2dRRc1HTMWL0Rn+z/wVfKPhP4ObX7FzTXa7V2ibdymcVU1RiYl6OPJXJG4c1qzXt4GU9V9WxiEGNj1BN1yHqAHqgKHqAGQ9QSCcHqeoAqQABgAMAAHIAACoApjOEbp5d+GKep6mrXamiKtPYqxRTMdqq/0hhe8Ujcsqx7TpkvA3gammLfUOo24qqmIqtWKo2+c/P5OgxTEQRTh5cPIvebzuXZWsVjUJ7MQqbDBkoICgcgCKBkTOVARUBcggKIoAABgAAg5BFDIAAAJkFCAARQBOFAEUAAAEBQz2AAABFBJiOWpeN/B1vrOnq1WloinXURnt/7kfCfn822yT3mGVbTSdwkxuNPzzVTVbqmmqJpqicTEx3iUb35leHKdNfo6nYp9m3dn2b0RxVxPq0Sez2KXi9dw4rR6zoAZsQTkBQADIAHqigGUAPgABwZACJMgBkyAGTIAZM9wA/o7l4U0tvR+Hun0W4xE2aa5+czETM/iDj8rqHRi+5ZeE4B5zoXhIkAFx3AA3ACQAMAAAAcmAAnsmwApgAODAAnKgBwgAoAJnsRwALPZAAWewAAAnJHcAVM5AFlMgAoAm2VABIADmVAHw9Z0NvqXS9VprkfYuUTEzjb5uDVRiqQd/i9WaMscPGJMg7nMZTIAsyZADJkAMmQA5MgD/9k=";

    public $show_contact;

    /**
     * @var User
     */
    private $_user;

    /**
     * @param User $user
     * @param array $config
     */
    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        $this->id = $user->getId();
        $this->profile = $user->getProfile();
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->status = $user->status;
        $this->role = $user->role;
        $this->services = $user->getServices()->all();
        $this->regions = $user->getRegions()->all();
        $this->service_id = null;
        $this->username = $this->_user->username;
        $this->name = $this->profile->name;
        $this->surname = $this->profile->surname;
        $this->photo =   $this->profile->photo == ""? $this->empty_user_photo :$this->profile->photo; //
        $this->note = $this->profile->note;
        $this->address = $this->profile->address;
        $this->zip = $this->profile->zip;
        $this->language = $this->profile->language;
        $this->web = $this->profile->web;
        $this->show_contact = $this->_user->show_contact;
        $this->profile_type = $this->profile->profile_type;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
//            ['username', 'unique', 'targetClass' => self::className(), 'message' => Module::t('module', 'ERROR_USERNAME_EXISTS')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'email'],
            ['email', 'safe'],
            ['phone', 'safe'],
            ['photo', 'safe'],
            ['language', 'safe'],
            ['web', 'safe'],
            ['address', 'safe'],
            ['zip', 'safe'],
            ['services', 'safe'],
            ['regions', 'safe'],
            ['profile_type', 'safe'],
//            ['service_items', 'safe'],
            [['deleted_service_ids','added_service_ids','deleted_region_ids','added_region_ids','name', 'surname', 'note'],'safe'],
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => Module::t('module', 'ERROR_EMAIL_EXISTS'),
                'filter' => function (ActiveQuery $query) {
                        $query->andWhere(['<>', 'id', $this->_user->id]);
                    },
            ],
            ['email', 'string', 'max' => 255],

            [
                'phone',
                'unique',
                'targetClass' => User::className(),
                'message' => Module::t('module', 'ERROR_PHONE_EXISTS'),
                'filter' => function (ActiveQuery $query) { $query->andWhere(['<>', 'id', $this->_user->id]); },
            ],
            ['phone', 'string'],
            ['show_contact', 'safe']

        ];
    }

    /**
     * @return bool
     */
    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->show_contact = $this->show_contact;
            $user->save();

            $profile = $this->profile;
            $profile->note = $this->note;
            $profile->name = $this->name;
            $profile->surname = $this->surname;
            $profile->photo = $this->photo;

            $profile->language = $this->language;
            $profile->web = $this->web;

            $profile->address = $this->address;
            $profile->zip = $this->zip;
            $profile->profile_type = $this->profile_type;

            $profile->save();


            UserService::deleteAll([
                'AND',
                ['=', 'user_id',  $user->id],
            ]);

           if($this->services)
            foreach ($this->services as $ads["id"]){
                if(is_numeric( $ads["id"])) {
                    $userService = new UserService();
                    $userService->user_id =  $user->id; // \Yii::$app->user->identity->id;
                    $userService->service_id = $ads["id"];
                    $userService->save();
                }
            }


            UserRegion::deleteAll([
                'AND',
//                ['in', 'region_id',  $deleted_region],
                ['=', 'user_id',  $user->id],
            ]);

//            foreach ($this->regions as $adr){
//                if(is_numeric( $adr)) {
//                    $userRegion = new UserRegion();
//                    $userRegion->user_id =  $user->id; // \Yii::$app->user->identity->id;
//                    $userRegion->region_id = $adr;
//                    $userRegion->save();
//                }
//            }

            $regin_radius = json_decode($this->added_region_ids) ;
            foreach ( $regin_radius as $key => $val){
                if(is_numeric( $key)) {
                    $userRegion = new UserRegion();
                    $userRegion->user_id =  $user->id; // \Yii::$app->user->identity->id;
                    $userRegion->region_id = $key;
                    $userRegion->radius = $val;
                    $userRegion->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }



}




