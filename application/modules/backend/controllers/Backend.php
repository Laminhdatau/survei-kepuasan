<?php defined('BASEPATH') or exit('No direct script access allowed');


class Backend extends BackendController
{
	public $CI;
	protected $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_backend');
		$this->form_validation->set_rules('quisioner', 'Kuisioner', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		


	}


	public function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('t_user', ['user' => $this->session->userdata('user')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar', $data);
		$this->load->view('backend/Dashboard');
		$this->load->view('template/footer');
	}

	public function quisDosen()
	{
		$data['title'] = "Daftar Kuis";
		$data['jtable'] = "Kuis Dosen";
		$data['quisdosen'] = $this->db->get('t_quisioner')->result_array();
		$data['quisdosendetail'] = $this->db->query("SELECT q.*,j.* from t_quisioner q join t_jenis_quisioner j on (q.id_jenis_quisioner=j.id_jenis_quisioner) where (j.id_jenis_quisioner='1') order by quisioner asc ")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/QuisionerDosen', $data);
		$this->load->view('template/footer');
	}

	public function fungsiInputQuisDosen()
	{

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-Danger alert-dismissible fade show text-white" role="alert">Data Gagal Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/quisdosen'));
		} else {
			date_default_timezone_set('ASIA/JAKARTA');
			$quis = $this->input->post('quisioner');
			$stts = $this->input->post('status');
			$created_at = $this->input->post('created_up');
			$data = [
				'quisioner'				=> $quis,
				'id_jenis_quisioner'	=> '1',
				'status'				=> $stts,
				'created_up'			=> $created_at
			];
			$this->db->set('kd_quisioner', 'UUID()', FALSE);
			$this->m_backend->inputQuis($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/quisdosen'));
		}
	}

	public function fungsieditquisdosen()

	{

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-white" role="alert">Data Gagal diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		} else {
			$kd_quis = $this->input->post('kd_quisioner');
			$quis = $this->input->post('quisioner');
			$stts = $this->input->post('status');
			$created_at = $this->input->post('created_up');
			$data = [
				'kd_quisioner' => $kd_quis,
				'quisioner'				=> $quis,
				'id_jenis_quisioner'	=> '1',
				'status'				=> $stts,
				'created_up'			=> $created_at
			];
			$this->db->where('kd_quisioner', $kd_quis);
			$this->db->update('t_quisioner', $data);
			// $this->m_backend->editQuisDetail($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/quisdosen'));
		}
	}
	public function deleteQuisDosen($kd_quis)
	{

		$this->db->where('kd_quisioner', $kd_quis);
		$this->db->delete('t_quisioner');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('backend/quisdosen'));
	}



	// ===========================================END QUISIONER================================================

	// =============================================BEGIN QUIS MK==================================================

	public function quisMK()
	{

		$data['title'] = "Daftar Kuis";
		$data['jtable'] = "Kuis Matakuliah";
		$data['quismk'] = $this->db->get('t_quisioner')->result_array();
		$data['quismkdetail'] = $this->db->query("SELECT q.*,j.* from t_quisioner q join t_jenis_quisioner j on (q.id_jenis_quisioner=j.id_jenis_quisioner) where (j.id_jenis_quisioner='2') order by quisioner asc")->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/QuisionerMataKuliah', $data);
		$this->load->view('template/footer');
	}

	public function fungsiInputQuisMk()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$quis = $this->input->post('quisioner');
		$stts = $this->input->post('status');
		$created_at = $this->input->post('created_up');
		$data = [
			'quisioner'				=> $quis,
			'id_jenis_quisioner'	=> '2',
			'status'				=> $stts,
			'created_up'			=> $created_at
		];
		$this->db->set('kd_quisioner', 'UUID()', FALSE);
		$this->m_backend->inputQuis($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('backend/quismk'));
	}

	public function fungsieditquismk()
	{
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-white" role="alert">Data Gagal diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		} else {
			$kd_quis = $this->input->post('kd_quisioner');
			$quis = $this->input->post('quisioner');
			$stts = $this->input->post('status');
			$created_at = $this->input->post('created_up');
			$data = [
				'kd_quisioner' => $kd_quis,
				'quisioner'				=> $quis,
				'id_jenis_quisioner'	=> '2',
				'status'				=> $stts,
				'created_up'			=> $created_at
			];
			$this->db->where('kd_quisioner', $kd_quis);
			$this->db->update('t_quisioner', $data);
			// $this->m_backend->editQuisDetail($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil di update <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/quismk'));
		}
	}
	public function deleteQuismk($kd_quis)
	{
		$this->db->where('kd_quisioner', $kd_quis);
		$this->db->delete('t_quisioner');
		redirect(base_url('backend/quismk'));
	}

	public function deleteAllQuisMk()
	{
		$kd = $_POST['kd_quisioner']; // Ambil data kd yang dikirim oleh view.php melalui form submit
		$this->m_backend->deleteAllQmk($kd); // Panggil fungsi delete dari model
		redirect(base_url('backend/quisdosen'));
	}
	// ===================================================END QUIS MK=================================================

	// ===========================================BEGIN ANSWER================================================
	public function getAnswer()
	{
		$data['title'] = "Options";
		$data['jtable'] = "Options";
		$data['answer'] = $this->m_backend->getAnswer();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/Answer', $data);
		$this->load->view('template/footer');
	}

	public function fungsiInputAnswer()
	{
		$id_answer = $this->input->post('id_answer');
		$answer = $this->input->post('answer');
		$data = [
			'id_answer' => $id_answer,
			'answer' => $answer
		];
		$this->m_backend->inputAnswer($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('backend/getAnswer'));
	}

	public function fungsiEditAnswer($id_answer)
	{
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-white" role="alert">Data Gagal ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('Backend/getAnswer'));
		} else {


			$id_answer = $this->input->post('id_answer');
			$answer = $this->input->post('answer');
			$arr = [
				'answer' => $answer,
			];

			$this->db->where('id_answer', $id_answer);
			$this->db->update('t_answer', $arr);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/getAnswer'));
		}
	}

	public function deleteAnswer($id_answer)
	{
		$this->m_backend->deleteAnswer($id_answer);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('backend/getAnswer'));
	}

	// ===========================================END ANSWER==========================================================================


	// ===========================================BEGIN JENIS================================================
	public function getJenis()
	{
		$data['title'] = "Jenis Quisioner";
		$data['jtable'] = "Jenis Kuisioner";
		$data['jenis'] = $this->m_backend->getJenis();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/Jenis', $data);
		$this->load->view('template/footer');
	}


	public function fungsiInputJenis()
	{
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-white" role="alert">Data Gagal ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		} else {
			$id = $this->input->post('id_jenis_quisioner');
			$jenis = $this->input->post('jenis_quisioner');
			$data = [
				'jenis_quisioner' => $jenis
			];
			$this->db->set('id_jenis_quisioner', 'UUID()', false);
			$this->m_backend->inputJenis($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/getJenis'));
		}
	}


	public function fungsiEditJenis($id_jenis)
	{
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-white" role="alert">Data Gagal diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		} else {


			$id_jenis = $this->input->post('id_jenis_quisioner');
			$jenis_quisioner = $this->input->post('jenis_quisioner');
			$arr = [
				'jenis_quisioner' => $jenis_quisioner,
			];

			$this->db->where('id_jenis_quisioner', $id_jenis);
			$this->db->update('t_jenis_quisioner', $arr);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/getJenis'));
		}
	}

	public function deleteJenis($id_jenis)
	{
		$this->db->where('id_jenis_quisioner', $id_jenis);
		$this->db->delete('t_jenis_quisioner');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('backend/getJenis'));
	}

	// ===========================================END JENIS==========================================================================


	// ========================================BEGIN MAHASISWA=====================================================================



	public function getMahasiswa()
	{
		$data['title'] = "Mahasiswa";
		$data['mhs'] = $this->m_backend->getMahasiswa();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/Mahasiswa', $data);
		$this->load->view('footer', $data);
	}

	// ========================================END Mahasiswa=========================================================================

	// ========================================BEGIN dosen=====================================================================



	public function getDosen()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->m_backend->getDosen();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/Dosen', $data);
		$this->load->view('footer', $data);
	}

	// ========================================END dosen=========================================================================

	// ========================================BEGIN Mk=====================================================================

	public function getMk()
	{
		$data['title'] = "Mk";
		$data['Mk'] = $this->m_backend->getMk();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/Matakuliah', $data);
		$this->load->view('footer', $data);
	}

	// ========================================END Mk=========================================================================

	public function Hasil()
	{
		$this->load->view('header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/AnswerQuisioner');
		$this->load->view('template/footer');
	}

	public function GetUser()
	{
		$data['user'] = $this->m_backend->getUser();
		$data['userl'] = $this->m_backend->getLevel();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('backend/User', $data);
		$this->load->view('template/footer');
	}
	public function fungsiinputuser()
	{
		
			$id = $this->input->post('kd_user', true);
			$user = $this->input->post('user', true);
			$pass = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
			$passs = $this->input->post('pass', true);
			$status = $this->input->post('status', true);
			$idx = $this->input->post('idx', true);
			$level = $this->input->post('id_level', true);
			$data = [
				'user' => $user,
				'password' => $pass,
				'pass' => $passs,
				'status' => '1',
				'idx' => '1',
				'id_level' => $level
			];
			$this->db->set('kd_user', 'UUID()', false);
			$this->m_backend->inputUser($data);
			// $this->db->insert('t_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/getUser'));
		// }
	}

	public function fungsiupdateuser($id)
	{
			$id = $this->input->post('kd_user');
			$user = $this->input->post('user');
			$pass = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$status = $this->input->post('status');
			$passs = $this->input->post('pass');
			$idx = $this->input->post('idx');
			$level = $this->input->post('id_level');
			$data = [
				'user' => $user,
				'password' => $pass,
				'pass' => $passs,
				'status' => 1,
				'idx' => 1,
				'id_level' => $level
			];
			$this->db->where('kd_user', $id);
			$this->db->update('t_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/getUser'));
		
	}
	public function deleteUser($kd_user)
	{
		$this->db->where('kd_user', $kd_user);
		$this->db->delete('t_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-white" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('backend/getUser'));
	}
}
