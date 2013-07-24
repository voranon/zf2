<?php

namespace Index\Model;

use Zend\Db\TableGateway\TableGateway;

class PropertybuyingcostitemTable {
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

	public function getProperty_buyingcost_item($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('property_buyingcost_item_id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}


	public function getId($property_id,$buyingcost_item_id){

		$resultSet = $this->tableGateway->select(array('property_id' 		=> $property_id,
													   'buyingcost_item_id'	=> $buyingcost_item_id
													  ));

		if( $resultSet->count() ){

			foreach($resultSet as $result){

				$output = $result->get_property_buyingcost_item_id();

			}

			return $output;

		}else{
			return 0;
		}



	}

	public function saveProperty_buyingcost_item(Propertybuyingcostitem $property_buyingcost_item)
	{
		date_default_timezone_set('America/Los_Angeles');
		$property_buyingcost_item_id = (int)$property_buyingcost_item->get_property_buyingcost_item_id();
		if ($property_buyingcost_item_id == 0) {


			$data = array(

					'property_id'  	    				=> $property_buyingcost_item->get_property_id(),
					'buyingcost_item_id'  				=> $property_buyingcost_item->get_buyingcost_item_id(),
					'property_buyingcost_item_amount'	=> $property_buyingcost_item->get_property_buyingcost_item_amount(),
					'sort_by'							=> $property_buyingcost_item->get_sort_by(),
					'created_date'						=> date('Y-m-d H:i:s'),
					'last_modified' 					=> date('Y-m-d H:i:s')

			);

			$this->tableGateway->insert($data);
			return $this->tableGateway->lastInsertValue;
		} else {

			if ($this->getProperty_buyingcost_item($property_buyingcost_item_id)) {
					$data = array(
							'property_id'  	    				=> $property_buyingcost_item->get_property_id(),
							'buyingcost_item_id'  				=> $property_buyingcost_item->get_buyingcost_item_id(),
							'property_buyingcost_item_amount'	=> $property_buyingcost_item->get_property_buyingcost_item_amount(),
							'sort_by'							=> $property_buyingcost_item->get_sort_by(),
							'created_date'						=> date('Y-m-d H:i:s'),
							'last_modified' 					=> date('Y-m-d H:i:s')
				);
				$this->tableGateway->update($data, array('property_buyingcost_item_id' => $property_buyingcost_item_id));
				return $property_buyingcost_item_id;
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}
	public function deleteProperty_buyingcost_item($property_buyingcost_item_id){

		$this->tableGateway->delete(array(
											'property_buyingcost_item_id' 		=> $property_buyingcost_item_id,
										));

	}






}

?>

