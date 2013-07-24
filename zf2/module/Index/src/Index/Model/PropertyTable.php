<?php

namespace Index\Model;

use Zend\Db\TableGateway\TableGateway;

class PropertyTable {

	protected $property_tableGateway;
	protected $adapter;

	public function __construct(TableGateway $property_tableGateway,$adapter)
	{
		$this->property_tableGateway     = $property_tableGateway;
		$this->adapter                   = $adapter;
	}

	public function fetchAll()
	{

		$resultSet = $this->property_tableGateway->select();
		return $resultSet;
	}

	public function getProperty($id)
	{
		$id  = (int) $id;
		$rowset = $this->property_tableGateway->select(array('property_id' => $id));
		$property = $rowset->current();
		if (!$property) {
			throw new \Exception("Could not find row $id");
		}
		$statement = $this->adapter->query('select property_buyingcost_item_id,buyingcost_item_id,item_text,property_buyingcost_item_amount
											from property_buyingcost_items pbi
											inner join items i on pbi.buyingcost_item_id = i.id
											where pbi.property_id ='.$id);

		$buyingcost_items = $statement->execute();




		$property->set_buyingcost_items($buyingcost_items);
		return $property;
	}

	public function getMemberProperties($member_id)
	{
		$member_id  = (int)$member_id;
		$rowset = $this->property_tableGateway->select(array('member_id' => $member_id));
		$rows = $rowset;

		if (!$rows) {
			throw new \Exception("Could not find row $member_id");
		}
		return $rows;
	}

	public function saveProperty(Property $property)
	{
		date_default_timezone_set('America/Los_Angeles');




		$property_id = (int)$property->get_property_id();
		if ($property_id == 0) {

			$rowset = $this->property_tableGateway->select(array('member_id'    => $property->get_member_id(),
					'property_name'=> $property->get_property_name()
			));



			if( count( $rowset ) ){
				//throw new \Exception('This property name is already exist for member_id '.$property->get_member_id());
				return 0;
			}

			$data = array(
					'property_name'  	    => $property->get_property_name(),

					'property_street'       => $property->get_property_street(),
					'property_city'			=> $property->get_property_city(),
					'property_state'		=> $property->get_property_state(),
					'property_zip'			=> $property->get_property_zip(),
					'property_country'		=> $property->get_property_country(),


					'member_id'				=> $property->get_member_id(),
					'sort_by'				=> $property->get_sort_by(),
					'created_date'			=> date('Y-m-d H:i:s'),
					'last_modified' 		=> date('Y-m-d H:i:s')
			);

			$this->property_tableGateway->insert($data);

			//return insert id
			return $this->property_tableGateway->lastInsertValue;
		} else {
			if ($this->getProperty($property_id)) {

				$data = array(
						'property_name'  	    			=> $property->get_property_name(),

						'property_street'       			=> $property->get_property_street(),
						'property_city'						=> $property->get_property_city(),
						'property_state'					=> $property->get_property_state(),
						'property_zip'						=> $property->get_property_zip(),
						'property_country'					=> $property->get_property_country(),

						'property_mls'						=> $property->get_property_mls(),
						'property_style'					=> $property->get_property_style(),
						'property_squarefeet'				=> $property->get_property_squarefeet(),
						'property_lotsize'					=> $property->get_property_lotsize(),
						'property_yearbuilt'				=> $property->get_property_yearbuilt(),
						'property_lastremodel'  			=> $property->get_property_lastremodel(),
						'property_parking'					=> $property->get_property_parking(),
						'property_hoa'						=> $property->get_property_hoa(),

						'property_listingprice' 			=> $property->get_property_listingprice(),
						'property_initimprove'  			=> $property->get_property_initimprove(),
						'property_purchaseprice'			=> $property->get_property_purchaseprice(),
						'property_first_loanamount' 		=> $property->get_property_first_loanamount(),
						'property_first_loantype'   		=> $property->get_property_first_loantype(),
						'property_first_interestrate'		=> $property->get_property_first_interestrate(),
						'property_first_payment_frequency'	=> $property->get_property_first_payment_frequency(),
						'property_first_term'				=> $property->get_property_first_term(),
					    'property_first_interestonly_term'	=> $property->get_property_first_interestonly_term(),
						'property_second_loanamount' 		=> $property->get_property_second_loanamount(),
						'property_second_loantype'   		=> $property->get_property_second_loantype(),
						'property_second_interestrate'		=> $property->get_property_second_interestrate(),
						'property_second_payment_frequency'	=> $property->get_property_second_payment_frequency(),
						'property_second_term'				=> $property->get_property_second_term(),
						'property_second_interestonly_term'	=> $property->get_property_second_interestonly_term(),

						'member_id'							=> $property->get_member_id(),
						'sort_by'							=> $property->get_sort_by(),
						'created_date'						=> $property->get_created_date(),
						'last_modified'						=> date('Y-m-d H:i:s')
				);
				$this->property_tableGateway->update($data, array('property_id' => $property_id));
			return $property_id;
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function deleteProperty($property_id)
	{
		$this->property_tableGateway->delete(array('property_id' => $property_id));
	}


}

?>

