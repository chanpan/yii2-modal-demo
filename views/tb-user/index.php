<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    echo kartik\grid\GridView::widget([
        'dataProvider'=>$dataProvider,
        'columns'=>[
            [
                'format'=>"raw",
                'attribute'=>'email',
                'value'=>function($model){
                    return Html::button(md5($model->email), 
                            [
                                "data-id"=>$model->id,
                                "class"=>"btn btn-sm btn-primary btnModal"
                            ]
                    );
                }
            ],[
                'attribute'=>'username',
                'value'=>function($model){
                    return md5($model->username);
                }
            ]
                    
        ],
        'hover'=>true            
    ]);

echo yii\bootstrap\Modal::widget([
    'id'=>'modal-user'
]);            
$this->registerJs("
   $('.btnModal').click(function(){
        var id = $(this).attr('data-id');
        var url = '".Url::to(['/tb-user/user-profile'])."';
        var data = {id:id};
        $.get(url,data,function(res){
            $('#modal-user').modal('show');//show modal 
            $('#modal-user .modal-content').html(res);//add value
        });
   }); 
");            
?>
