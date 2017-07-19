$userId = Yii::$app->user->id;
$data = $cache->getOrSet($key, function () use ($userId){
	return function($date, $type) {
	    $dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
	    $result = [];

	    if (!empty($dataList)) {
	        foreach ($dataList as $dataItem) {
	            $result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
	        }
	    }

	    return $result;
	}
});
