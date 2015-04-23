<?php
 $parent = isset($_POST['id']) ? (int)$_POST['id'] : 0;
 $result = array();
 $data = array();
 
 try {
	$db = new PDO('sqlite:data/treeview-city.sqlite');
    foreach($db->query('SELECT c.* ,
						(SELECT COUNT(*) FROM city c2 WHERE c2.parent = c.id) as child_count
						FROM city c WHERE c.parent='.$parent)
			as $row)
	{
		
			$item = array(
				'name' => $row['name'] ,
				'type' => $row['child_count'] > 0 ? 'folder' : 'item',
				'additionalParameters' =>  array('id' => $row['id'])
			);
			if($row['child_count'] > 0)
				 $item['additionalParameters']['children'] = true;
			else {
				if(mt_rand(0, 3) == 0)
					$item['additionalParameters']['item-selected'] = true;
			}

			$data[$row['id']] = $item;
	}

	$result['status'] = 'OK';
	$result['data'] = $data;
	
 }
 catch(PDOException $ex) {
     $result['status'] = 'ERR';
	 $result['message'] = $ex->getMessage();
 }


echo json_encode($result);