<?php
/*****************************************************************************
 *         In the name of God the Most Beneficent the Most Merciful          *
 *___________________________________________________________________________*
 *   This program is free software: you can redistribute it and/or modify    *
 *   it under the terms of the GNU General Public License as published by    *
 *   the Free Software Foundation, either version 3 of the License, or       *
 *   (at your option) any later version.                                     *
 *___________________________________________________________________________*
 *   This program is distributed in the hope that it will be useful,         *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of          *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           *
 *   GNU General Public License for more details.                            *
 *___________________________________________________________________________*
 *   You should have received a copy of the GNU General Public License       *
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.   *
 *___________________________________________________________________________*
 *                             Created by  Qti3e                             *
 *        <http://Qti3e.Github.io>    LO-VE    <Qti3eQti3e@Gmail.com>        *
 *****************************************************************************/

namespace core\database\drivers;

use core\database\driver;

/**
 * Class mysqli
 * @package core\database\drivers
 */
class mysqli_driver implements driver{
	/**
	 * @var \mysqli
	 */
	protected $object;
	/**
	 * @var bool
	 */
	private $error = false;
	/**
	 * @var
	 */
	private $errorDetail;

	public function __construct() {
		$this->object   =   new \mysqli(db_host,db_user,db_pass,db_name,db_port);
		if(mysqli_connect_errno()){
			$this->error = true;
			$this->errorDetail = mysqli_connect_error();
		}
	}

	/**
	 * @return void
	 */
	public function close() {
		$this->object->close();
	}

	/**
	 * @return \mysqli
	 */
	public function getObject() {
		return $this->object;
	}

	/**
	 * @return string
	 */
	public function getErrorDetail() {
		return $this->errorDetail;
	}

	/**
	 * @return bool
	 */
	public function isError() {
		return $this->error;
	}

	/**
	 * @param $query
	 *
	 * @return bool|\mysqli_result
	 */
	public function query($query){
		return $this->object->query($query);
	}
}