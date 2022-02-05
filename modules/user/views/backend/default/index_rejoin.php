<?php

use app\modules\user\Module;
use app\modules\user\models\backend\User;
use app\modules\user\widgets\backend\grid\RoleColumn;
use app\widgets\grid\ActionColumn;
use app\widgets\grid\LinkColumn;
use app\widgets\grid\SetColumn;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\user\forms\backend\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (YII_ENV_DEV) echo __FILE__;
$this->title = Module::t('module', 'ADMIN_USERS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'ADMIN_USERS_ADD'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            'id',
//            [
//                'filter' => DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'date_from',
//                    'attribute2' => 'date_to',
//                    'type' => DatePicker::TYPE_RANGE,
//                    'separator' => '-',
//                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
//                ]),
//                'attribute' => 'created_at',
//                'format' => 'datetime',
//                'filterOptions' => [
//                    'style' => 'max-width: 180px',
//                ],
//            ],
//            [
//                'class' => LinkColumn::className(),
//                'attribute' => 'username',
//            ],
//            'email:email',
//            [
//                'class' => SetColumn::className(),
//                'filter' => User::getStatusesArray(),
//                'attribute' => 'status',
//                'name' => 'statusName',
//                'cssCLasses' => [
//                    User::STATUS_ACTIVE => 'success',
//                    User::STATUS_WAIT => 'warning',
//                    User::STATUS_BLOCKED => 'default',
//                ],
//            ],
//            [
//                'class' => RoleColumn::className(),
//                'filter' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'),
//                'attribute' => 'role',
//            ],
//
//            ['class' => ActionColumn::className()],
//        ],
//    ]); ?>

    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2>Users List</h2>
                <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
            </div>
            <div class="row">
                <div class="col-lg-12 users-list">
                    <div class="page-header bg-white mb-4 p-4 border">
                        <select class="form-control select2-no-search page-select">
                            <option value="0">SelectOptions</option>
                            <option value="1">Active</option>
                            <option value="2">Online</option>
                            <option value="3">Blocked</option>
                            <option value="4">Suspended</option>
                            <option value="4">A-Z</option>
                        </select>
                        <div class="page-options d-flex mt-3 mt-sm-0 ml-0 ml-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control br-tl-3 br-bl-3" placeholder="search">
                                <div class="input-group-append ">
                                    <button type="button" class="btn btn-primary br-tr-3  br-br-3">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="user-tabel table-responsive border-top">
                                <table class="table card-table table-bordered table-hover table-vcenter text-nowrap">
                                    <tbody>
                                    <tr>
                                        <th ></th>
                                        <th>Name</th>
                                        <th>Membership Status</th>
                                        <th>Member Since</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class=""><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/25.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Jane Pearson</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>December-05-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/male/9.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Jason Porter</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>December-01-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/25.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Teresa Wood</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>November-29-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/16.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Mary Butler</a></td>
                                        <td><a href="#" class="badge badge-info">Paused</a></td>
                                        <td>November-29-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/27.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Janice Lane</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>November-25-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/male/26.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Anthony Miller</a></td>
                                        <td><a href="#" class="badge badge-info">Pasused</a></td>
                                        <td>November-24-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/9.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Denise Elliott</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>November-21-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/16.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Rose Cook</a></td>
                                        <td><a href="#" class="badge badge-danger">Blocked</a></td>
                                        <td>November-15-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/male/17.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Terry Tucker</a></td>
                                        <td><a href="#" class="badge badge-success">Active,paused</a></td>
                                        <td>November-14-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/6.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Grace Knight</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>November-11-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/26.jpg" ></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Elizabeth Martin</a></td>
                                        <td><a href="#" class="badge badge-success">Active,paused</a></td>
                                        <td>November-05-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/17.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Michelle Schultz</a></td>
                                        <td><a href="#" class="badge badge-danger">Blocked</a></td>
                                        <td>November-01-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/21.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Crystal Austin</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>October-25-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/male/32.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Douglas Ray</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>October-24-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/12.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Teresa Reyes</a></td>
                                        <td><a href="#" class="badge badge-info">Paused</a></td>
                                        <td>October-22-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/4.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Emma Wade</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>October-21-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/27.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Carol Henderson</a></td>
                                        <td><a href="#" class="badge badge-danger">Blocked</a></td>
                                        <td>October-19-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/male/20.jpg" ></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Christopher Harvey</a></td>
                                        <td><a href="#" class="badge badge-success">Active</a></td>
                                        <td>October-17-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/female/5.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Deborah Alvarado</a></td>
                                        <td><a href="#" class="badge badge-success">Active,Paused</a></td>
                                        <td>October-15-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="avatar avatar-md  d-block brround cover-image" data-image-src="../assets/images/users/male/10.jpg"></span></td>
                                        <td><a href="userprofile.html" class="text-dark">Gregory Hunt</a></td>
                                        <td><a href="#" class="badge badge-danger">Blocked</a></td>
                                        <td>October-12-2018</td>
                                        <td>
                                            <a href="userprofile.html" class="btn btn-purple btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <ul class="pagination mb-0">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</div>
