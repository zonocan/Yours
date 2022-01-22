<?php
require_once(ROOT_PATH .'/Models/Db.php');
class User extends Db {
    private $table = 'fashion';
    public function __construct($dbh = null){
    parent::__construct($dbh);
  }

/**
* Fashionテーブルからすべてデータを取得
*
*@param integer $page ページ番号
*@return Array $result 全選手データ
*/




//アカウント作成に使う
//新規登録
public function create_acount($data):Array{
  var_dump($_SESSION);
  $sql='INSERT INTO users_acount(profeal_photo,name,email,user_name,nicke_name,password)';
  $sql .=' VALUES(:profeal_photo, :name, :email, :user_name, :nicke_name, :password)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':profeal_photo',$_SESSION['profeal_photo'],PDO::PARAM_STR);
  $sth->bindParam(':name',$data['name'],PDO::PARAM_STR);
  $sth->bindParam(':email',$data['email'],PDO::PARAM_STR);
  $sth->bindParam(':user_name',$data['user_name'],PDO::PARAM_STR);
  $sth->bindParam(':nicke_name',$data['nicke_name'],PDO::PARAM_STR);
  $sth->bindParam(':password',$data['password'],PDO::PARAM_STR);
  $sth ->execute();
  //var_dump($sth->errorInfo());
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}


//log_in機能
//ユーザーidとパスワードで
public function log_in($user){
  //var_dump($user);
  $sql='SELECT id FROM users_acount';
  $sql .=' WHERE user_name = :user_name AND password = :password';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':user_name',$user['user_name']);
  $sth->bindParam(':password',$user['password']);
  $sth->execute();
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

//投稿機能
public function post_fashion($data){
  // var_dump($data);
  $sql='INSERT INTO main_Reviw(user_id,review_photo,contribute)';
  $sql .=' VALUES(:user_id, :review_photo, :contribute)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':user_id',$_SESSION['id'],PDO::PARAM_STR);
  $sth->bindParam(':review_photo',$data['review_photo'],PDO::PARAM_STR);
  $sth->bindParam(':contribute',$data['contribute'],PDO::PARAM_STR);
  //var_dump($data,$_SESSION);
  $sth ->execute();
}


public function post_user_name():Array{
  $sql='SELECT users_acount.id as user_form_id, main_Reviw.id as reviw_id,profeal_photo,user_name,contribute,review_photo,main_Reviw.created_at FROM main_Reviw';
  $sql .=' INNER JOIN users_acount';
  $sql .=' ON users_acount.id = main_Reviw.user_id';
  $sql .=' ORDER BY created_at DESC';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
   //var_dump($result);
  return $result;
}


//一つだけデータを送るやつ
public function get_reviw($id=0){
  $sql='SELECT * FROM main_Reviw';
  $sql .=' INNER JOIN users_acount';
  $sql .='  ON users_acount.id = main_Reviw.user_id';
  $sql .='  WHERE main_Reviw.id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$id,PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  //var_dump($result);
  return $result;
}

public function users_reviw($id=0):Array{
  $sql='SELECT * FROM main_Reviw';
  $sql .=' INNER JOIN users_acount';
  $sql .='  ON users_acount.id = main_Reviw.user_id';
  $sql .='  WHERE main_Reviw.user_id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$id,PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  //var_dump($result);
  return $result;
}

//投稿の内容
public function post_contents():Array{
  $sql='SELECT * FROM main_Reviw';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

//プロフィール写真の表示
public function profeal_img(){
  $sql='SELECT profeal_photo FROM users_acount WHERE id';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

//購入機能のテーブル
public function purchase($data){
  //var_dump($data);
  $sql='INSERT INTO purchase(to_user_id, review_id, from_user_id)';
  $sql.= ' VALUES (:to_user_id,:reviw_id, :from_user_id)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':to_user_id',$data['id'],PDO::PARAM_INT);
  $sth->bindParam(':reviw_id',$data['reviw'],PDO::PARAM_INT);
  $sth->bindParam(':from_user_id',$data['from'],PDO::PARAM_INT);
  $sth->execute();
}

public function findby_purchase_items():Array{
  $sql = 'SELECT user_name ,profeal_photo FROM users_acount';
  $sql.= ' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

/*public function get_user_name():Array{
  $sql = 'SELECT user_name ,profeal_photo FROM users_acount';
  $sql.= ' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}*/

public function findby_purchased_user(){
  $sql = 'SELECT user_name ,profeal_photo FROM users_acount';
  $sql.= ' WHERE (id = :id)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}
//DM機能の送信
public function dm_send($user){
  $sql='INSERT INTO DM(from_user_id, to_user_id, message)';
  $sql.= ' VALUES (:from_user_id, :to_user_id, :message)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':to_user_id',$user['to_id'],PDO::PARAM_STR);
  $sth->bindParam(':from_user_id',$user['from_id'],PDO::PARAM_STR);
  $sth->bindParam(':message',$user['message'],PDO::PARAM_STR);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

public function find_dm(){
  $sql='SELECT to_user_id,message FROM DM';
  $sql.=' WHERE (to_user_id = :to and from_user_id = :from) or (to_user_id = :from and from_user_id = :to)';
  $sql.=' ORDER BY created_at ASC';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':to',$_SESSION['id']);
  $sth->bindParam(':from',$_SESSION['from']);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}
//dmのルーム取得(購入者)
public function create_dm_room($data){
  $sql = 'INSERT INTO DM_room(to_user, from_user)';
  $sql.= ' VALUES (:to_user, :from_user)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':to_user', $data['id'],PDO::PARAM_INT);
  $sth->bindParam(':from_user', $data['from'],PDO::PARAM_INT);
  $sth->execute();
}

public function dm_room(){
  $sql = 'SELECT from_user ,profeal_photo,user_name FROM DM_room';
  $sql.=' INNER JOIN users_acount';
  $sql.=' ON users_acount.id = from_user';
  $sql.=' WHERE to_user = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$_SESSION['id']);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

//いいね機能
public function favarite($data){
  //var_dump($data);
  $sql='INSERT INTO favarite(to_user_id, review_id, from_user_id)';
  $sql.= ' VALUES (:to_user_id,:reviw_id, :from_user_id)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':to_user_id',$data['id'],PDO::PARAM_INT);
  $sth->bindParam(':reviw_id',$data['reviw'],PDO::PARAM_INT);
  $sth->bindParam(':from_user_id',$data['from'],PDO::PARAM_INT);
  var_dump($data);
  $sth->execute();
}

public function findBy_favarite(){
  $sql='SELECT to_user_id ,profeal_photo,user_name FROM favarite';
  $sql .=' INNER JOIN users_acount';
  $sql .=' ON users_acount.id = to_user_id';
  $sql .=' WHERE from_user_id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$_SESSION['id']);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  //var_dump($result);
  return $result;
}

public function findBy_favarite_post(){
  $sql='SELECT to_user_id ,profeal_photo,user_name FROM favarite';
  $sql .=' INNER JOIN users_acount';
  $sql .=' ON users_acount.id = to_user_id';
  $sql .=' WHERE from_user_id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$_SESSION['id']);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  //var_dump($result);
  return $result;
}
//DMするユーザーのidの取得
public function findBy_dm_user_Id($user){
  //var_dump($user);
  $sql='SELECT id FROM users_acount';
  $sql .=' WHERE user_name = :user_name AND password = :password';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':user_name',$user['user_name']);
  $sth->bindParam(':password',$user['password']);
  $sth->execute();
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

//ユーザーネームの取得
public function get_user_name():Array{
  $sql = 'SELECT user_name ,profeal_photo FROM users_acount';
  $sql.= ' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $_SESSION['id'],PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

public function dm_user_name($user){
  $sql = 'SELECT user_name,profeal_photo FROM users_acount';
  $sql.= ' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$user['id'],PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

public function findmyUser():Array{
  $sql = 'SELECT * FROM main_Reviw';
  $sql.= ' WHERE user_id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id',$_SESSION['id'],PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

//データの更新
public function updatemyuser($user){
  $sql = 'UPDATE main_Reviw SET contribute=:contribute';
  $sql.= ' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $user['Reviw_id'], PDO::PARAM_INT);
  //$sth->bindParam(':review_photo', $user['review_photo'], PDO::PARAM_STR);
  $sth->bindParam(':contribute', $user['contribute'], PDO::PARAM_STR);
  $sth->execute();
}


//論理削除じゃないやつ
public function delete_review($id=0){
  $sql ='DELETE * FROM main_Reviw';
  $sql.=' WHERE :id = Reviw_id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam('id',$id['Reviw_id']);
  $sth->execute();
}


public function countAll():Int {
  $sql = 'SELECT count(*) as count FROM fashion';
  $sth =$this->dbh->prepare($sql);
  $sth->execute();
  $count = $sth->fetchColumn();
  return $count;
}

public function findALl($page = 0):Array {
  $sql = 'SELECT * FROM Fashion';
  $sql .=' WHERE del_flg=0';
  $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function findById($id = 0):Array{
  //var_dump($id);
  $sql = 'SELECT * FROM '.$this->table;
  $sql .=' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


//データを消した時（論理削除）
public function delFlg($id){
  $sql = 'UPDATE Fashion SET del_flg = 1 WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
}


//データの更新をする時
public function update($id,$fashion){
  //var_dump($id);
  //var_dump($Fashion);
  $sql = 'UPDATE fashion SET name=:name, club=:club, birth=:birth, height=:height, weight=:weight, uniform_num=:uniform_num, position=:position WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->bindParam(':name', $fashion['name'], PDO::PARAM_STR);
  $sth->bindParam(':club', $fashion['club'], PDO::PARAM_STR);
  $sth->bindParam(':birth', $fashion['birth'], PDO::PARAM_STR);
  $sth->bindParam(':height', $fashion['height'], PDO::PARAM_INT);
  $sth->bindParam(':weight', $fashion['weight'], PDO::PARAM_INT);
  $sth->bindParam(':uniform_num', $fashion['uniform_num'], PDO::PARAM_INT);
  $sth->bindParam(':position', $fashion['position'], PDO::PARAM_STR);
  $sth->execute();

}

}





 ?>
