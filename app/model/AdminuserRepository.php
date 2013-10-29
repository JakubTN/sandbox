<?php
/**
 * Table adminuser
 */
class AdminuserRepository extends Repository
{
	public function setPassword($id, $password)
	{
	    $this->getTable()->get($id)->update(array('password' => AdminAuthenticator::calculateHash($password)));
	}
}