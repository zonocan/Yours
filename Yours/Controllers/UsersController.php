<?php
require_once(ROOT_PATH .'/Models/user.php'); //user.phpへ
require_once(ROOT_PATH .'/Models/Goal.php'); //Goal.phpへ繋がっている

class UsersController{//Userに関してのclass関数ー＞viewで呼び起こす時に使う
  private $request; //リクエストパラメーター(GET,POST)
  private $user; //userモデル
  private $goal;   //Goalモデル

  public function __construct() {
    //__construct関数を呼び出している
    //new userControllerでこの部分は出力できる
    //
    //リクエストパラメーターの取得
    $this->request['get'] = $_GET;//ここでGetの受け渡しの定義
    $this->request['post'] = $_POST;//ここでPostの受け渡しを定義


    //モデルオブジェクトの作成
    $this->user = new User();
    //別モデルと連携
    $dbh = $this->user->get_db_handler();
    //$this->Goal = new Goal($dbh);
}



   //Users_usersへの情報の転送
   //アカウント作成
   public function Create_acount(){
     $register = $this->user->create_acount($this->request['post']);
   }

  //ログイン機能
   public function Log_in(){
     $register = $this->user->log_in($this->request['post']);
     return $register;
   }

   //新規投稿機能
   public function Post_Fashion(){
     $register = $this->user->post_fashion($this->request['post']);
   }

   //ユーザーidの表示
   public function Post_user_name(){
     $user = $this->user->post_user_name();
     return $user;
   }

   //ユーザーの投稿内容の表示
   public function Post_contents(){
     $register = $this->user->post_contents($this->request);
     return $register;
   }

   //プロフィール写真の表示
   public function Profeal_img(){
      $register = $this->user->profeal_img($this->request);
      return $register;
   }

   //いいね機能
   public function Favarite(){
      $register = $this->user->favarite($this->request['post']);
   }

   public function FindBy_favarite(){
     $register = $this->user->findBy_favarite($this->request);
     //var_dump($register);
     return $register;
   }

   //購入機能のテーブル
   public function Purchase(){
      $register = $this->user->purchase($this->request['post']);
   }

   //DMルームのテーブル
   public function Create_dm_room(){
      $register = $this->user->create_dm_room($this->request['post']);
   }

   public function Dm_room(){
     $register = $this->user->dm_room($this->request);
      var_dump($register);
     return $register;
   }

   public function Dm_send(){
    $register = $this->user->dm_send($this->request['post']);
   }

   public function Dm_user_name(){
    $register = $this->user->dm_user_name($this->request['get']);
    return $register;
   }

   public function Find_dm(){
     $register = $this->user->find_dm($this->request);
     return $register;
  }
   //ユーザーネームの取得
   public function Get_user_name(){
     $register = $this->user->get_user_name();
     return $register;
   }

   //一つだけデータを送るやつ
   public function Get_reviw(){
     $register = $this->user->get_reviw($this->request['get']['id']);
     return $register;
   }

   public function Users_reviw(){
     $register = $this->user->users_reviw($this->request['get']['id']);
     return $register;
   }

   public function FindmyUser(){
     $register = $this->user->findmyUser($this->request);
     return $register;
   }

   public function Updatemyuser(){
     $register = $this->user->updatemyuser($this->request['post']);
     return $register;
   }

   public function Delete_review(){
     $register = $this->user->delete_review($this->request['post']);
   }

   public function Findby_purchase_items(){
     $register = $this->user->findby_purchase_items($this->request);
     return $register;
   }

   public function Findby_purchased_user(){
     $register = $this->user->findby_purchased_user($this->request);
     return $register;
   }

  public function index() {//index関数をfunctionで呼び出している
    $page = 0;
    if (isset($this->request['get']['page'])) {
      $page = $this->request['get']['page'];
    }

    $Users = $this->user->findAll($page); //findALlはデータの中の選手全員
    $Users_count = $this->user->countAll();
    $params = [
      'Users' => $Users,
      'pages' => $Users_count / 20
    ];
    return $params;
  }

  public function view() {
    if(empty($this->request['get']['id'])){
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }

    $User = $this->User->findById($this->request['get']['id']); //findByIdは設定（ボタンを押した選手を引き出す時）
    $params =[
      'Users' => $User
    ];
    return $params;
  }


  //論理削除した時
   public function Del_flg(){
    $del_flg = $this->User->delFlg($this->request['get']['id']);
  }

   //論理削除でないとき
   public function ALL_delFlg(){
     $all_delFlg = $this->User->all_delFlg($this->request['get']['id']);
   }

 //編集した時
  public function Update(){
    //var_dump($_POST);
    //var_dump($_GET);
   $del_flg = $this->User->update($this->request['get']['id'],$this->request['post']);
 }

}



?>
