<?php

declare(strict_types=1);

namespace App\Controller\Component;
use Cake\Auth\DefaultPasswordHasher;
use PHPMailer\PHPMailer\PHPMailer;
use Cake\I18n\FrozenTime;

/**
 * Data component
 */
class DataComponent extends CommonComponent
{
	/**
	 * Default configuration.
	 *
	 * @var array
	 */
	protected $_defaultConfig = [];
	public function initialize(array $config): void
	{
		//Stage
		$this->loadModel('Users');
	}

	//Lấy password
	public function getPws($email)
	{
		$query = $this->Users->find()
			->select([
				'Users.id',
				'Users.password',
			])
			->where([
				'Users.email' => $email,
				'Users.delete_flg' => 0
			]);

		return $query->toArray();
	}

	// Get thông tin Người dùng theo Email (lấy về dạng Arr)
	public function getUsersByEmailArr($email)
	{
		$query = $this->Users->find()
			->where([
				'email' => $email,
				'delete_flg' => 0,
			]);
		return $query->toArray();
	}

	//Kiểm tra Login
	public function checklogin($atribute)
	{
		$query = $this->Users->find()
			->select([
                'Users.full_name',
                'Users.password',
                'Users.birthday',
                'Users.sex',
                'Users.email',
                'Users.phone',
                'Users.address',
                'Users.created_at',
                'Users.created_by',
                'Users.updated_at',
                'Users.updated_by',
                'Users.delete_flg',
			])
			->where([
				'Users.email' => $atribute['email'],
				'Users.delete_flg' => 0,
			]);

		return $query->toArray();
	}

	// Get thông tin Người dùng theo Email
	public function getUsersByEmail($email)
	{
		$query = $this->Users->find()
			->where([
				'email' => $email,
			])
			->first();
		return $query;
	}

	//Check Del Flag bằng Email
	public function checkDelFlagByEmail($email)
	{
		$query = $this->Accounts->find()
			->select([
				'Accounts.del_flag'
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 1
			]);
		return $query->toArray();
	}

	//Check Users có bị khóa không
	public function checkUserLock($id)
	{
		$query = $this->Accounts->find()
			->where([
				'Accounts.id' => $id,
				'Accounts.del_flag' => 0,
			]);
		return $query->toArray();
	}

	// Insert data vào bảng tạm
	public function insertDataTemp($dataTemp)
	{
		$pwsResetTemp = [];
		$pwsResetTemp['email'] = $dataTemp['email'];
		$pwsResetTemp['token'] = $dataTemp['token'];
		$pwsResetTemp['expDate'] = $dataTemp['expDate'];

		$dataPwsResetTemp = $this->PasswordResetTemp->newEntity($pwsResetTemp);

		if ($dataPwsResetTemp->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $dataPwsResetTemp->getErrors(),
			];
		};
		return $this->PasswordResetTemp->save($dataPwsResetTemp);
	}

	// Get thông tin Admin
	public function getDataAdmin()
	{
		$query = $this->Accounts->find()
			->where([
				'Accounts.role' => 'admin',
				'Accounts.del_flag' => 0
			])
			->order('Accounts.created_at ASC')
			->first();
		return $query;
	}

	// Get thông tin member (bao gồm Avatar)
	public function getDataMemberByEmail($email)
	{
		$query = $this->Accounts->find()
			->select([
				'Members.id',
				'Members.full_name',
				'Members.date_of_birth',
				'Members.address',
				'Members.position',
				'Members.workplace',
				'Members.curriculum_vitae',
				'Members.career_objective',
				'Members.created_at',
				'Members.created_by',
				'Members.updated_at',
				'Members.last_modified_by',
				'Members.del_flag',
				'Accounts.id',
				'Accounts.username',
				'Accounts.password',
				'Accounts.email',
				'Accounts.phone_number',
				'Accounts.role',
				'Accounts.members_id',
				'Accounts.created_at',
				'Accounts.created_by',
				'Accounts.updated_at',
				'Accounts.last_modified_by',
				'Accounts.del_flag',
				'Images.url',
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->join([
				'table' => 'images',
				'alias' => 'Images',
				'type' => 'inner',
				'conditions' => ['Images.members_id = Members.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'Images.del_flag' => 0,
				'Images.image_type' => 'avartar',
			]);

		return $query->toArray();
	}

	// Get thông tin liên hệ
	public function getDataContactByEmail($email)
	{
		$query = $this->Contacts->find()
			->select([
				'Accounts.email',
				'Members.id',
				'Members.full_name',
				'Contacts.id',
				'Contacts.github_link',
				'Contacts.facebook_link',
				'Contacts.linkedin_link',
				'Contacts.instagram_link',
				'Contacts.email_link',
				'Contacts.members_id',
				'Contacts.created_at',
				'Contacts.created_by',
				'Contacts.updated_at',
				'Contacts.last_modified_by',
				'Contacts.del_flag',
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Contacts.members_id = Members.id']
			])
			->join([
				'table' => 'accounts',
				'alias' => 'Accounts',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'Contacts.del_flag' => 0,
			]);

		return $query->toArray();
	}

	// Get thông tin các công nghệ được sử dụng của member
	public function getDataTechnologyByEmail($email)
	{
		$query = $this->Technologies->find()
			->select([
				'Accounts.email',
				'Members.id',
				'Members.full_name',
				'Technologies.id',
				'Technologies.title',
				'Technologies.name',
				'Technologies.members_id',
				'Technologies.created_at',
				'Technologies.created_by',
				'Technologies.updated_at',
				'Technologies.last_modified_by',
				'Technologies.del_flag'
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Technologies.members_id = Members.id']
			])
			->join([
				'table' => 'accounts',
				'alias' => 'Accounts',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'Technologies.del_flag' => 0,
			])
			->order('Technologies.id ASC');

		return $query->toArray();
	}

	// Get thông tin hình ảnh hiển thị carousel
	public function getDataCarousel()
	{
		$query = $this->Images->find()
			->select([
				'Images.id',
				'Images.url',
				'Images.priority',
				'Images.image_type',
				'Images.description',
				'Images.members_id',
				'Images.blogs_id',
				'Images.created_at',
				'Images.created_by',
				'Images.updated_at',
				'Images.last_modified_by',
				'Images.del_flag'
			])
			->where([
				'Images.image_type' => 'carousel',
				'Images.del_flag' => 0,
			])
			->order('Images.priority ASC');

		return $query->toArray();
	}

	// Get thông tin kinh nghiệm làm việc
	public function getDataExperiencesByEmail($email)
	{
		$query = $this->Experiences->find()
			->select([
				'Accounts.email',
				'Members.id',
				'Members.full_name',
				'Experiences.id',
				'Experiences.company_name',
				'Experiences.start_date',
				'Experiences.end_date',
				'Experiences.position',
				'Experiences.skills',
				'Experiences.company_address',
				'Experiences.members_id',
				'Experiences.created_at',
				'Experiences.created_by',
				'Experiences.updated_at',
				'Experiences.last_modified_by',
				'Experiences.del_flag'
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Experiences.members_id = Members.id']
			])
			->join([
				'table' => 'accounts',
				'alias' => 'Accounts',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'Experiences.del_flag' => 0,
			])
			->order('Experiences.start_date DESC');

		return $query->toArray();
	}

	// Get thông tin học tập
	public function getDataEducationsByEmail($email)
	{
		$query = $this->Educations->find()
			->select([
				'Accounts.email',
				'Members.id',
				'Members.full_name',
				'Educations.id',
				'Educations.school_name',
				'Educations.start_date',
				'Educations.end_date',
				'Educations.skills',
				'Educations.field_of_study',
				'Educations.gpa',
				'Educations.school_address',
				'Educations.members_id',
				'Educations.created_at',
				'Educations.created_by',
				'Educations.updated_at',
				'Educations.last_modified_by',
				'Educations.del_flag'
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Educations.members_id = Members.id']
			])
			->join([
				'table' => 'accounts',
				'alias' => 'Accounts',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'Educations.del_flag' => 0,
			])
			->order('Educations.start_date DESC');

		return $query->toArray();
	}

	// Get thông tin Activities And Societies
	public function getDataActivitiesAndSocietiesByEmail($email)
	{
		$query = $this->ActivitiesAndSocieties->find()
			->select([
				'Accounts.email',
				'Members.id',
				'Members.full_name',
				'ActivitiesAndSocieties.id',
				'ActivitiesAndSocieties.name',
				'ActivitiesAndSocieties.members_id',
				'ActivitiesAndSocieties.created_at',
				'ActivitiesAndSocieties.created_by',
				'ActivitiesAndSocieties.updated_at',
				'ActivitiesAndSocieties.last_modified_by',
				'ActivitiesAndSocieties.del_flag'
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['ActivitiesAndSocieties.members_id = Members.id']
			])
			->join([
				'table' => 'accounts',
				'alias' => 'Accounts',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'ActivitiesAndSocieties.del_flag' => 0,
			])
			->order('ActivitiesAndSocieties.id ASC');

		return $query->toArray();
	}

	// Get thông tin Blogs
	public function getDataBlogsByEmail($email)
	{
		$query = $this->Blogs->find()
			->select([
				'Accounts.email',
				'Members.id',
				'Members.full_name',
				'Blogs.id',
				'Blogs.title',
				'Blogs.date_of_writing',
				'Blogs.tags',
				'Blogs.description',
				'Blogs.blog_link',
				'Blogs.members_id',
				'Blogs.created_at',
				'Blogs.created_by',
				'Blogs.updated_at',
				'Blogs.last_modified_by',
				'Blogs.del_flag',
				'Images.url',
				'Images.description',
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Blogs.members_id = Members.id']
			])
			->join([
				'table' => 'accounts',
				'alias' => 'Accounts',
				'type' => 'inner',
				'conditions' => ['Accounts.members_id = Members.id']
			])
			->join([
				'table' => 'images',
				'alias' => 'Images',
				'type' => 'inner',
				'conditions' => ['Images.blogs_id = Blogs.id']
			])
			->where([
				'Accounts.email' => $email,
				'Accounts.del_flag' => 0,
				'Members.del_flag' => 0,
				'Blogs.del_flag' => 0,
				'Images.image_type' => 'blog',
			])
			->order('Blogs.date_of_writing DESC');

		return $query->toArray();
	}

	// Get link theo file_key
	public function getDataLinkByFileKey($fileKey)
	{
		$query = $this->Links->find()
			->select([
				'Links.id',
				'Links.link',
				'Links.source_url',
				'Links.file_key',
				'Links.access_count',
				'Links.created_at',
				'Links.created_by',
				'Links.updated_at',
				'Links.last_modified_by',
				'Links.del_flag'
			])
			->where([
				'Links.file_key' => $fileKey,
				'Links.del_flag' => 0
			]);

		return $query->toArray();
	}
	// Update Data Link
	public function updateDataLink($datalink)
	{
		// Get link theo file_key
		$link = $this->getDataLinkByFileKey($datalink['file_key']);

		// Cập nhật access_count của data link
		$link[0]['access_count'] = $datalink['access_count'];
		
		// Lưu data đã cập nhật
		return $this->Links->save($link[0]);
	}

	// Lưu log truy cập
	public function insertDataLinkAccessLogs($datalink)
	{
		$linkAccessLogs = [];
		$linkAccessLogs['link_id'] = $datalink['id'];
		$linkAccessLogs['access_ip'] = $datalink['access_ip'];
		$linkAccessLogs['user_agent'] = $datalink['user_agent'];
		$linkAccessLogs['device_type'] = $datalink['device_type'];

		$dataLinkAccessLogs = $this->LinkAccessLogs->newEntity($linkAccessLogs);

		if ($dataLinkAccessLogs->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $dataLinkAccessLogs->getErrors(),
			];
		};
		return $this->LinkAccessLogs->save($dataLinkAccessLogs);
	}

	// Get Data Members
	public function getAllMembers()
	{
		$query = $this->Members->find()
			->select([
				'Members.id',
				'Members.full_name',
				'Members.date_of_birth',
				'Members.address',
				'Members.position',
				'Members.workplace',
				'Members.curriculum_vitae',
				'Members.career_objective',
				'Members.created_at',
				'Members.created_by',
				'Members.updated_at',
				'Members.last_modified_by',
				'Members.del_flag',
			])
			->where([
				'Members.del_flag' => 0,
			])
			->order('Members.id DESC');;

		return $query;
	}

	// Get Data Account
	public function getAllAccount()
	{
		$query = $this->Accounts->find()
			->select([
				'Accounts.id',
				'Accounts.username',
				'Accounts.password',
				'Accounts.email',
				'Accounts.phone_number',
				'Accounts.role',
				'Accounts.members_id',
				'Accounts.created_at',
				'Accounts.created_by',
				'Accounts.updated_at',
				'Accounts.last_modified_by',
				'Accounts.del_flag',
			])
			->where([
				'Accounts.del_flag' => 0,
			])
			->order('Accounts.id DESC');;

		return $query;
	}

	// Get Data Members theo ID
	public function getDataMemberById($id)
	{
		$query = $this->Members->find()
			->select([
				'Members.id',
				'Members.full_name',
				'Members.date_of_birth',
				'Members.address',
				'Members.position',
				'Members.workplace',
				'Members.curriculum_vitae',
				'Members.career_objective',
				'Members.created_at',
				'Members.created_by',
				'Members.updated_at',
				'Members.last_modified_by',
				'Members.del_flag',
			])
			->where([
				'Members.id' => $id,
				'Members.del_flag' => 0,
			])
			->order('Members.id DESC');;

		return $query->toArray();
	}

	// Update Data Member
	public function updateDataMember($dataMember, $atribute){

		// Check và get những data thay đổi
		$member = $this->Members->patchEntity($dataMember, $atribute);

		// Trường hợp xảy ra lỗi
		if ($member->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $member->getErrors(),
			];
		}

		return $this->Members->save($member);
	}

	// Add Data Member
	public function addDataMember($atribute){

		$atribute['created_by'] = $_SESSION['dataLogin']['username'];
		$atribute['last_modified_by'] = $_SESSION['dataLogin']['username'];

		// Convert ngày sinh
		if (!empty($atribute['date_of_birth'])){
			$atribute['date_of_birth'] = date('Y-m-d H:i:s', strtotime($atribute['date_of_birth']));
		}

		$member = $this->Members->newEntity($atribute);

		// Trường hợp xảy ra lỗi
		if ($member->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $member->getErrors(),
			];
		}

		return $this->Members->save($member);
	}

	// Get Data Blogs
	public function getAllBlogs()
	{
		$query = $this->Blogs->find()
			->select([
				'Blogs.id',
				'Blogs.title',
				'Blogs.date_of_writing',
				'Blogs.tags',
				'Blogs.description',
				'Blogs.blog_link',
				'Blogs.members_id',
				'Blogs.created_at',
				'Blogs.created_by',
				'Blogs.updated_at',
				'Blogs.last_modified_by',
				'Blogs.del_flag',
				'Members.id',
				'Members.full_name',
				'Members.date_of_birth',
				'Members.address',
				'Members.position',
				'Members.workplace',
				'Members.curriculum_vitae',
				'Members.career_objective',
				'Members.created_at',
				'Members.created_by',
				'Members.updated_at',
				'Members.last_modified_by',
				'Members.del_flag',
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Blogs.members_id = Members.id']
			])
			->where([
				'Blogs.del_flag' => 0,
				'Members.del_flag' => 0,

			])
			->order('Blogs.id DESC');;

		return $query;
	}

	// Get Data Blogs theo ID
	public function getDataBlogById($id)
	{
		$query = $this->Blogs->find()
			->select([
				'Blogs.id',
				'Blogs.title',
				'Blogs.date_of_writing',
				'Blogs.tags',
				'Blogs.description',
				'Blogs.blog_link',
				'Blogs.members_id',
				'Blogs.created_at',
				'Blogs.created_by',
				'Blogs.updated_at',
				'Blogs.last_modified_by',
				'Blogs.del_flag',
				'Members.id',
				'Members.full_name',
				'Members.date_of_birth',
				'Members.address',
				'Members.position',
				'Members.workplace',
				'Members.curriculum_vitae',
				'Members.career_objective',
				'Members.created_at',
				'Members.created_by',
				'Members.updated_at',
				'Members.last_modified_by',
				'Members.del_flag',
			])
			->join([
				'table' => 'members',
				'alias' => 'Members',
				'type' => 'inner',
				'conditions' => ['Blogs.members_id = Members.id']
			])
			->where([
				'Blogs.id' => $id,
				'Blogs.del_flag' => 0,
				'Members.del_flag' => 0,
			])
			->order('Blogs.id DESC');;

		return $query->toArray();
	}

	// Update Data Member
	public function updateDataBlog($dataBlog, $atribute){

		// Check và get những data thay đổi
		$blog = $this->Blogs->patchEntity($dataBlog, $atribute);

		// Trường hợp xảy ra lỗi
		if ($blog->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $blog->getErrors(),
			];
		}

		return $this->Blogs->save($blog);
	}

	// Add Data Blog
	public function addDataBlog($atribute){

		$atribute['created_by'] = $_SESSION['dataLogin']['username'];
		$atribute['last_modified_by'] = $_SESSION['dataLogin']['username'];

		// Convert ngày viết bài
		if (!empty($atribute['date_of_writing'])){
			$atribute['date_of_writing'] = date('Y-m-d H:i:s', strtotime($atribute['date_of_writing']));
		}

		$blog = $this->Blogs->newEntity($atribute);

		// Trường hợp xảy ra lỗi
		if ($blog->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $blog->getErrors(),
			];
		}

		return $this->Blogs->save($blog);
	}

	// Get Data Images
	public function getAllImages()
	{
		$query = $this->Images->find()
			->select([
				'Images.id',
				'Images.url',
				'Images.priority',
				'Images.image_type',
				'Images.description',
				'Images.members_id',
				'Images.blogs_id',
				'Images.created_at',
				'Images.created_by',
				'Images.updated_at',
				'Images.last_modified_by',
				'Images.del_flag',
			])
			->where([
				'Images.del_flag' => 0,
			])
			->order('Images.id DESC');;

		return $query;
	}

	// Get Data Images theo ID
	public function getDataImagesById($id)
	{
		$query = $this->Images->find()
			->select([
				'Images.id',
				'Images.url',
				'Images.priority',
				'Images.image_type',
				'Images.description',
				'Images.members_id',
				'Images.blogs_id',
				'Images.created_at',
				'Images.created_by',
				'Images.updated_at',
				'Images.last_modified_by',
				'Images.del_flag',
			])
			->where([
				'Images.id' => $id,
				'Images.del_flag' => 0,
			])
			->order('Images.id DESC');;

		return $query->toArray();
	}

	// Update Data Image
	public function updateDataImage($dataImage, $atribute){

		// Check và get những data thay đổi
		$image = $this->Images->patchEntity($dataImage, $atribute);

		// Trường hợp xảy ra lỗi
		if ($image->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $image->getErrors(),
			];
		}

		return $this->Images->save($image);
	}

	// Add Data Image
	public function addDataImage($atribute){

		$atribute['created_by'] = $_SESSION['dataLogin']['username'];
		$atribute['last_modified_by'] = $_SESSION['dataLogin']['username'];

		$image = $this->Images->newEntity($atribute);

		// Trường hợp xảy ra lỗi
		if ($image->hasErrors()) {
			return [
				'result' => 'invalid',
				'data' => $image->getErrors(),
			];
		}

		return $this->Images->save($image);
	}

	/**
	 * Convert định dạng FrozenTime sang Kiểu format time chỉ định
	 *
	 */
	public function convertFormatTime($date, $stringFormat)
	{
		// Tạo một đối tượng FrozenTime từ chuỗi ngày tháng
		$frozenTime = new FrozenTime($date);

		// Định dạng lại thời gian theo format chỉ định
		$timeAfterFormat = $frozenTime->format($stringFormat);

		return $timeAfterFormat;
	}
}