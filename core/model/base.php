<?php
    class Model {

        public static function query($sql)
		{
			$db = DB::connect();
			$result = $db -> prepare($sql);
			$result -> execute();
			$result = $result -> fetchAll(PDO::FETCH_ASSOC);
			return $result;
        }

        public static function select($value,$condition)
		{
			$model = new static();
			$db = DB::connect();
            $sql = "select ".$value." from $model->table ".$condition;
			$result = $db -> prepare($sql);
			$result -> execute();
			$result = $result -> fetchAll(PDO::FETCH_ASSOC);
			return $result;
        }
        
        public static function where($value,$condition)
		{
			$model = new static();
			$db = DB::connect();
            $sql = "select ".$value." from $model->table where ".$condition;
			$result = $db -> prepare($sql);
			$result -> execute();
			$result = $result -> fetchAll(PDO::FETCH_ASSOC);
			return $result;
        }

        public static function insert(array $properties){
			$model = new static();
			$db = DB::connect();

			$keys = "";
            $valuess = "";
            $flag = 0;
            foreach($properties as $key => $value)
            {
                $flag ++;
                if($flag == sizeof($properties))
                {
                    $keys .= $key;
                    $valuess .= "'$value'";    
                }
                else
                {
                    $keys .= $key.",";
                    $valuess .= "'$value',";
                }
            }

            $sql = "INSERT INTO $model->table ($keys) values($valuess)";
			$stmt = $db->exec($sql);

			return $stmt;
		}

        public static function delete($id){
			$model = new static();
			$db = DB::connect();
			$sql = "DELETE from $model->table where id=".$id;
            $stmt = $db->exec($sql);
            return $stmt;
		}

        public static function update(array $properties,$condition){
			$model = new static();
            $db = DB::connect();
            
            $combine = "";
            $flag = 0;

			foreach($properties as $key => $value){
                $flag ++;
                if($flag == sizeof($properties))
                {
                    $combine .= $key."="."'$value'";
                }
                else
                {
                    $combine .= $key."="."'$value',";
                }
            }

            $sql = "UPDATE $model->table SET $combine WHERE ".$condition;
            $result = $db -> prepare($sql);
            $result -> execute();
            
			return $result;
        }

    }
?>