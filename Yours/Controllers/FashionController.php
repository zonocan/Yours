<?php
require_once(ROOT_PATH .'/Models/Fashion.php'); //Fashion.phpへ
require_once(ROOT_PATH .'/Models/Goal.php'); //Goal.phpへ繋がっている

class FashionController{//Fashionに関してのclass関数ー＞viewで呼び起こす時に使う
  private $request; //リクエストパラメーター(GET,POST)
  private $fashion; //Fashionモデル
  private $goal;   //Goalモデル

  public function __construct() {
    //__construct関数を呼び出している
    //new FashionControllerでこの部分は出力できる
    //
    //リクエストパラメーターの取得
    $this->request['get'] = $_GET;//ここでGetの受け渡しの定義
    $this->request['post'] = $_POST;//ここでPostの受け渡しを定義


    //モデルオブジェクトの作成
    $this->Fashion = new Fashion();
    //別モデルと連携
    $dbh = $this->Fashion->get_db_handler();
    $this->Goal = new Goal($dbh);
}



  //Fashions_usersへの情報の転送
  //新規登録
   public function New_register(){
     $register = $this->Fashion->new_register($this->request['post']);
   }

   //Fashions_usersへの情報の転送
   //アカウント作成
   public function Create_acount(){
     $register = $this->Fashion->create_acount($this->request['post']);
   }

  public function index() {//index関数をfunctionで呼び出している
    $page = 0;
    if (isset($this->request['get']['page'])) {
      $page = $this->request['get']['page'];
    }

    $Fashions = $this->Fashion->findAll($page); //findALlはデータの中の選手全員
    $Fashions_count = $this->Fashion->countAll();
    $params = [
      'Fashions' => $Fashions,
      'pages' => $Fashions_count / 20
    ];
    return $params;
  }

  public function view() {
    if(empty($this->request['get']['id'])){
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }

    $Fashion = $this->Fashion->findById($this->request['get']['id']); //findByIdは設定（ボタンを押した選手を引き出す時）
    $params =[
      'Fashions' => $Fashion
    ];
    return $params;
  }


  //論理削除した時
   public function Del_flg(){
    $del_flg = $this->Fashion->delFlg($this->request['get']['id']);
  }

   //論理削除でないとき
   public function ALL_delFlg(){
     $all_delFlg = $this->Fashion->all_delFlg($this->request['get']['id']);
   }

 //編集した時
  public function Update(){
    //var_dump($_POST);
    //var_dump($_GET);
   $del_flg = $this->Fashion->update($this->request['get']['id'],$this->request['post']);
 }

}



?>
