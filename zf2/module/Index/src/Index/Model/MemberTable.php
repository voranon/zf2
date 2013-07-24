<?php

namespace Index\Model;

use Zend\Db\TableGateway\TableGateway;

class MemberTable {
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

	public function getMember($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('member_id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function getId($email){

		$resultSet = $this->tableGateway->select(array('email' => $email));

		if( $resultSet->count() ){

			foreach($resultSet as $result){

				$output = $result->get_member_id();

			}

			return $output;

		}else{
			return 0;
		}



	}

	public function saveMember(Member $member)
	{

		date_default_timezone_set('America/Los_Angeles');

		$member_id = (int)$member->get_member_id();
		if ($member_id == 0) {

			$data = array(
					'email'  	    => $member->get_email(),
					'password'  	=> $member->get_password(),
					'member_type_id'=> $member->get_member_type_id(),
					'sort_by'		=> $member->get_sort_by(),
					'created_date'	=> date('Y-m-d H:i:s'),
					'last_modified' => date('Y-m-d H:i:s')

			);

			$this->tableGateway->insert($data);
		} else {

			$data = array(
					'email'  	    => $member->get_email(),
					'password'  	=> $member->get_password(),
					'member_type_id'=> $member->get_member_type_id(),
					'sort_by'		=> $member->get_sort_by(),
					'created_date'	=> $member->get_created_date(),
					'last_modified' => date('Y-m-d H:i:s')

			);

			if ($this->getMember($member_id)) {
				$this->tableGateway->update($data, array('member_id' => $member_id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

}

?>

