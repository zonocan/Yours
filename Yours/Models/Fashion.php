<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Fashion extends Db {
    private $table = 'Fashion';
    public function __construct($dbh = null){
    parent::__construct($dbh);
  }

/**
* Fashionテーブルからすべてデータを取得
*
*@param integer $page ページ番号
*@return Array $result 全選手データ
*/


//fashion_usersに情報の転送
//新規登録に使う
public function new_register():Array{
  $sql='INSERT INTO users(name,birth,addres,tel,email)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':name',$name,PDO::PARAM_STR);
  $sth->bindParam(':birth',$birth,PDO::PARAM_STR);
  $sth->bindParam(':addres',$addres,PDO::PARAM_STR);
  $sth->bindParam(':tel',$tel,PDO::PARAM_INT);
  $sth->bindParam(':email',$email,PDO::PARAM_STR);
  $sth ->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

//アカウント作成に使う
public function create_acount():Array{
  $sql='INSERT INTO users(profeal_photo,user_name,nicke_name,password)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':profeal_photo',$profeal_photo,PDO::PARAM_STR);
  $sth->bindParam(':user_name',$user_name,PDO::PARAM_STR);
  $sth->bindParam(':nicke_name',$nicke_name,PDO::PARAM_STR);
  $sth->bindParam(':password',$password,PDO::PARAM_INT);
  $sth ->execute();
  $result = $sth->fetchALL(PDO::FETCH_ASSOC);
  return $result;
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

//論理削除じゃないやつ
public function all_delFlg(){
  $sql = 'DELETE FROM Fashion_tmp';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
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

//log_in機能
public function log_in():Array{
  $sql='SELECT * FROM user WHERE email = email';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
}

//国の追加

class Country extends Db{
  private $table = 'countries';
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }

public function findCountryId():Array {
  $sql = 'SELECT * FROM countries';
  $sth = $this->dbh->prepare($sql);
  //$sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
}



//ゴールの追加
class Goals extends Db{
  private $table = 'goals';
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }

public function Goals_Id($id = 0):Array {
  $sql = 'SELECT kickoff,countries.name AS country,goals.goal_time AS time';
  $sql .= ' FROM Fashion,goals INNER JOIN pairings ON goals.pairing_id = pairings.id';
  $sql .= ' INNER JOIN countries ON countries.id = pairings.enemy_country_id';
  $sql .= ' WHERE Fashion.id = :id AND Fashion.id = goals.Fashion_id AND del_flg = 0 ORDER BY kickoff';
  //$sql .=' WHERE id = :id';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':id', $id, PDO::PARAM_INT);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

}



 ?>
