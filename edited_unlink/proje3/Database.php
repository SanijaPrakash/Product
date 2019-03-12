<?php
// declare(strict_types=1);
/**
 * Created by Sanija K
 * User: vinam
 * Date: 11/3/19
 * Time: 10:00 AM
 */
class Database{

	private $conn;
	private $debug;

	/**
	*
	**/

	function __construct(){

		$this->connect();
	}

 	/**
     * @param integer $debug
     * @return void
     */

    public function setDebug($debug): void {
        $this->debug = $debug;
    }

	/**
	* @return void
	**/

	public function connect(): void {

		$this->conn=new mysqli(
			"localhost",
			"root",
			"vinam@123",
			"student",
			 3306
		);

		if(!$this->conn){
			die($this->conn->error_log("error"));
		}
	}

	/**
	*@param Int $id
	*@param Int $limit
	*@return array
	**/

	public function select($id=0,$limit=7): array {
		$unUsed=array(0=>"conn",1=>"debug");
		$classVariables=array_keys(get_class_vars(get_called_class()));
		$variables=array_diff($classVariables, $unUsed);
		$tbl_feilds=implode(",",$variables);
		$sql="select ".$tbl_feilds." from ".get_called_class();
		$sql=$id>0 ? $sql." where id=".$id." limit 1 ":$sql." limit $limit";
		if($this->debug==1){
			echo "SQL QUERY : ".$sql."\n";
		}
		$result=$this->conn->query($sql);
		return $result->fetch_all(1);
	}

	/**
	*@param array $data
	*@return int
	**/

	public function insert($data) : int {

		$unUsed=array(0=>"conn",1=>"debug");
		$classVariables=array_keys(get_class_vars(get_called_class()));
		$variables=array_diff($classVariables, $unUsed);
		$sql="insert into ".get_called_class()." SET ";
		foreach ($data as $key => $value) {
			if(in_array($key, $variables)){				
				$sql.=$key." = '".$value."',";
			}
		}
		$sql=rtrim($sql,",");
		if($this->debug==1){
			echo "SQL QUERY : ".$sql."\n";
		}
		$result=$this->conn->query($sql);
		return $result;
	}

	/**
	*@param Int $id
	*@return int
	**/

	public function delete($id) : int {

		$result=$this->select($id);
		if(!empty($result)){
			$result = $result[0];
		}
		$image_name=$result['image'];
		$directory="uploads/";
		$filepath=$directory.$image_name;
		unlink($filepath);
		$sql=" delete from ".get_called_class()." ";
		$sql.=" where id= ".$id;
		if($this->debug==1){
			echo "SQL QUERY : ".$sql."\n";
		}
		$result=$this->conn->query($sql);
		return $result;
	}

}
?>
