<?php

namespace Index\Model;

use Zend\Db\TableGateway\TableGateway;

class ItemTable {
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function get_Items($item_type){

		$where = array(
						'item_type'	=> $item_type,
						'active'    => '1'
					  );

		$resultSet = $this->tableGateway->select($where);
		return $resultSet;

	}

    public function get_Item_value($item_type,$item_name){
		$where = array(
					     'item_type' => $item_type,
				         'item_name' => $item_name,
				         'active'    => '1'
					  );
		$resultSet = $this->tableGateway->select($where);
		if( $resultSet->count() ){

			foreach($resultSet as $result){
				$output = $result['item_value'];
			}
			return $output;

		}else{
			return 0;
		}


    }

    public function get_Item_text($item_type,$item_name){
    	$where = array(
    			'item_type' => $item_type,
    			'item_name' => $item_name,
    			'active'    => '1'
    	);
    	$resultSet = $this->tableGateway->select($where);
    	if( $resultSet->count() ){

    		foreach($resultSet as $result){
    			$output = $result['item_text'];
    		}
    		return $output;

    	}else{
    		return '';
    	}
    }

    public function get_Item_attribute1($item_type,$item_name){
    	$where = array(
    			'item_type' => $item_type,
    			'item_name' => $item_name,
    			'active'    => '1'
    	);
    	$resultSet = $this->tableGateway->select($where);
    	if( $resultSet->count() ){

    		foreach($resultSet as $result){
    			$output = $result['attribute1'];
    		}
    		return $output;

    	}else{
    		return '';
    	}
    }

    public function get_Item_attribute2($item_type,$item_name){
    	$where = array(
    			'item_type' => $item_type,
    			'item_name' => $item_name,
    			'active'    => '1'
    	);
    	$resultSet = $this->tableGateway->select($where);
    	if( $resultSet->count() ){

    		foreach($resultSet as $result){
    			$output = $result['attribute2'];
    		}
    		return $output;

    	}else{
    		return '';
    	}
    }



}

?>