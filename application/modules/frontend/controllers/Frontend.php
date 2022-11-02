<?php defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends FrontendController
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('m_frontend');
	}
	// ======================================================BEGIN QUIS DOSEN======================================================
	public function index()
	{
		$data['title'] = "HALAMAN MAHASISWA";
		$data['user'] = $this->db->get_where('t_user', ['user' => $this->session->userdata('user')])->row();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function getQuisDosen()
	{
		$data['title'] = "Kuisioner Dosen";
		$data['quisdosen'] = $this->m_frontend->getQuisionerDosen();
		// $data['option']=$this->m_frontend->getAnswer();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('kuis_dosen', $data);
		$this->load->view('footer');
	}


	public function InputQuisDosen()
	{

		$kd_answer = $this->input->post('kd_answer_quisioner');
		$nim = $this->input->post('nim');
		$kd_quis = $this->input->post('kd_quisioner');
		$kd_dosen = $this->input->post('kd_dosen_pengampuh');
		$id_option = $this->input->post('id_answer');
		$comments = $this->input->post('comments');
		$waktu = $this->input->post('waktu');

		$data = array(
			'nim' => $nim,
			'kd_quisioner' => $kd_quis,
			'kd_dosen_pengampuh' => $kd_dosen,
			'id_answer' => $id_option,
			'comments' => $comments,
			'waktu' => date('Y-m-d H:i:s')
		);
		$this->db->set('kd_answer_quisioner', 'UUID()', false);
		$this->m_frontend->inputQuisionerDosen($data);
	}

	// ==============================================END QUISIONER DOSEN======================================================

	// =========================================BEGIN QUIS MATA KULIAH=========================================

	public function getQuisMK()
	{
		$data['title'] = "Kuisioner Mata Kuliah";

		$data['quismk'] = $this->m_frontend->getQuisionerMk();
		$this->load->view('header', $data);

		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('kuis_mk', $data);
		$this->load->view('footer');
	}

	public function InputQuisMk()
	{

		$kd_answer = $this->input->post('kd_answer_quisioner');
		$nim = $this->input->post('nim');
		$kd_quis = $this->input->post('kd_quisioner');
		$kd_dosen = $this->input->post('kd_dosen_pengampuh');
		$id_option = $this->input->post('id_answer');
		$comments = $this->input->post('comments');
		$waktu = $this->input->post('waktu');

		$data = array(
			'nim' => $nim,
			'kd_quisioner' => $kd_quis,
			'kd_dosen_pengampuh' => $kd_dosen,
			'id_answer' => $id_option,
			'comments' => $comments,
			'waktu' => date('Y-m-d H:i:s')
		);
		$this->db->set('kd_answer_quisioner', 'UUID()', false);
		$this->m_frontend->inputQuisionerDosen($data);
	}


	// ==========================================END QUIS MATA KULIA=======================================================


	// ==========================================BEGIN MATA KULIAH===================================================

	public function getMk()
	{
		$data['title'] = "Quisioner Mata Kuliah";

		$this->load->view('header', $data);
		$this->load->view('navbar');
		$this->load->view('sidebar', $data);
		$this->load->view('kuis_mk', $data);
		$this->load->view('footer');
	}

	// =========================================END MATA KULIAH =======================================================

	public function getLap()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('laporan');
		$this->load->view('footer');
	}

	public function getJawab()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('jawab');
		$this->load->view('footer');
	}
}
