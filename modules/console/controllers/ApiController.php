<?php


namespace modules\console\controllers;


use Craft;
use craft\db\Query;
use craft\elements\User;
use craft\helpers\App;
use craft\records\User as UserRecord;
use GuzzleHttp\Client;
use yii\console\Controller;

class ApiController extends Controller
{

    public function actionFetch()
    {
        $source = App::env('API_FETCH_URL');

        $target = App::env('API_STORE_PATH');

        $json = (new Client())->get($source)->getBody();

        if(!empty($json)){
            file_put_contents($target.'/api.json', $json);
        }
    }

}