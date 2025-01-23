<?php
class User
{
	public $id;
	public $name;
	public $role_id;
	public $password;
	public $email;
	public $full_name;
	public $created_at;
	public $photo;
	public $verify_code;
	public $inactive;
	public $mobile;
	public $updated_at;
	public $ip;
	public $email_verified_at;
	public $remember_token;

	public function __construct($id, $name, $email, $photo, $mobile)

	{
		$this->id = $id;
		$this->name = $name;
		//$this->role_id = $role_id;
		//$this->password = $password;
		$this->email = $email;
		//$this->full_name = $full_name;
		//$this->created_at = $created_at;
		$this->photo = $photo;
		//$this->verify_code = $verify_code;
		//$this->inactive = $inactive;
		$this->mobile = $mobile;
		//$this->updated_at = $updated_at;
		//$this->ip = $ip;
		//$this->email_verified_at = $email_verified_at;
		//$this->remember_token = $remember_token;
	}


	public function save()
	{
		global $db, $tx;

		$result = $db->query("insert into {$tx}users(name,role_id,password,email,full_name,created_at,photo,verify_code,inactive,mobile,updated_at,ip,email_verified_at,remember_token)values('$this->name','$this->role_id','$this->password','$this->email','$this->full_name','$this->created_at','$this->photo','$this->verify_code','$this->inactive','$this->mobile','$this->updated_at','$this->ip','$this->email_verified_at','$this->remember_token')");

		return $result;
	}


	public function update()
	{
		global $db, $tx;

		$result = $db->query("update {$tx}users set name='$this->name',role_id='$this->role_id',password='$this->password',email='$this->email',full_name='$this->full_name',created_at='$this->created_at',photo='$this->photo',verify_code='$this->verify_code',inactive='$this->inactive',mobile='$this->mobile',updated_at='$this->updated_at',ip='$this->ip',email_verified_at='$this->email_verified_at',remember_token='$this->remember_token' where id='$this->id'");

		return $result;
	}


	public static function delete($id)
	{
		global $db, $tx;

		$result = $db->query("delete from {$tx}users where id={$id}");

		return $result;
	}


	public static function search($id)
	{
		global $db, $tx;

		$sql = $db->query("select * from {$tx}users where id='$id'");

		$result = $sql->fetch_object();

		return $result;
	}


	
	public static function displayAll()
	{
		global $db, $base_url, $tx;

		$sql = $db->query("select * from {$tx}users");

		$result=$sql->fetch_all();

		return $result;

	}



	public static function display()
	{
		global $db, $base_url, $tx;

		$result = $db->query("select * from {$tx}users");

		while ($row = $result->fetch_object()) {
			echo "<tr>
					<td>$row->id</td>
					<td><img src='{$base_url}/img/Users/$row->photo' height='50' width='50' class='rounded-circle' alt=''></td>
					<td>$row->name</td>
					<td>$row->email</td>
					<td>$row->mobile</td>
					 <td>
                  <div class='table-actions d-flex align-items-center gap-3 fs-6'>
                    <a href='{$base_url}/user/views/$row->id' class='text-primary' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Views'><i class='bi bi-eye-fill'></i></a>
                    <a href='{$base_url}/user/edit/$row->id' class='text-warning' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Edit'><i class='bi bi-pencil-fill'></i></a>
                    <a href='{$base_url}/user/delete/$row->id' class='text-danger' data-bs-toggle='tooltip' data-bs-placement='bottom' aria-label='Delete'><i class='bi bi-trash-fill'></i></a>
                  </div>
                </td>
				</tr>";
		}
		return $result;
	}


	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}users $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}






}

					// <td>$row->Role Id</td>
					// <td>$row->Password</td>
					// <td>$row->Full Name</td>
					// <td>$row->Created At</td>
					// <td>$row->Verify Code</td>
					// <td>$row->Inactive</td>
					// <td>$row->Updated At</td>
					// <td>$row->Ip</td>
					// <td>$row->Email Verified At</td>
					// <td>$row->Remember Token</td>

?>