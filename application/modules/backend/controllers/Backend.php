<?php defined('BASEPATH') or exit('No direct script access allowed');


class Backend extends BackendController
{
	public $CI;
	protected $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_backend');
		$this->form_validation->set_rules('quisioner','Kuisioner','required|trim');
		$this->form_validation->set_rules('status','Status','required|trim');
	}


	public function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('t_user', ['user' => $this->session->userdata('user')])->row();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar', $data);
		$this->load->view('backend/Dashboard', $data);
		$this->load->view('footer');
	}

	public function quisDosen()
	{
		$data['title'] = "Daftar Kuis";
		$data['jtable'] = "Kuis Dosen";
		$data['quisdosen'] = $this->db->get('t_quisioner')->result_array();
		$data['quisdosendetail'] = $this->db->query("SELECT q.*,j.* from t_quisioner q join t_jenis_quisioner j on (q.id_jenis_quisioner=j.id_jenis_quisioner) where (j.id_jenis_quisioner='1401ea97-59ea-11ed-9d98-4d6a2da4ae7b') order by quisioner asc ")->result_array();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('backend/QuisionerDosen', $data);
		$this->load->view('footer');
	}

	public function fungsiInputQuisDosen()
	{

		if($this->form_validation->run()==false){
			$this->session->set_flashdata('message', '<div class="alert alert-Danger alert-dismissible fade show text-white" role="alert">Data Gagal Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/quisdosen'));

		}else{
		date_default_timezone_set('ASIA/JAKARTA');
		$quis = $this->input->post('quisioner');
		$stts = $this->input->post('status');
		$created_at = $this->input->post('created_up');
		$data = [
			'quisioner'				=> $quis,
			'id_jenis_quisioner'	=> '1401ea97-59ea-11ed-9d98-4d6a2da4ae7b',
			'status'				=> $stts,
			'created_up'			=> $created_at
		];
		$this->db->set('kd_quisioner', 'UUID()', FALSE);
		$this->m_backend->inputQuis($data);
		$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show text-white" role="alert">Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
				'id_jenis_quisioner'	=> '1401ea97-59ea-11ed-9d98-4d6a2da4ae7b',
				'status'				=> $stts,
				'created_up'			=> $created_at
			];
			$this->db->where('kd_quisioner', $kd_quis);
			$this->db->update('t_quisioner', $data);
			// $this->m_backend->editQuisDetail($data);
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show text-white" role="alert">Data Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url('backend/quisdosen'));
		}
	}
	public function deleteQuisDosen($kd_quis)
	{
		
			$this->db->where('kd_quisioner', $kd_quis);
			$this->db->delete('t_quisioner');
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show text-white" role="alert">Data Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
		$data['quismkdetail'] = $this->db->query("SELECT q.*,j.* from t_quisioner q join t_jenis_quisioner j on (q.id_jenis_quisioner=j.id_jenis_quisioner) where (j.id_jenis_quisioner='1c6c7528-59ea-11ed-9d98-4d6a2da4ae7b') order by quisioner asc")->result_array();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('backend/QuisionerMataKuliah', $data);
		$this->load->view('footer');
	}

	public function fungsiInputQuisMk()
	{
		date_default_timezone_set('ASIA/JAKARTA');
		$quis = $this->input->post('quisioner');
		$stts = $this->input->post('status');
		$created_at = $this->input->post('created_up');
		$data = [
			'quisioner'				=> $quis,
			'id_jenis_quisioner'	=> '1c6c7528-59ea-11ed-9d98-4d6a2da4ae7b',
			'status'				=> $stts,
			'created_up'			=> $created_at
		];
		$this->db->set('kd_quisioner', 'UUID()', FALSE);
		$this->m_backend->inputQuis($data);
		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show text-white" role="alert">Data berhasil ditamnahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
				'id_jenis_quisioner'	=> '1c6c7528-59ea-11ed-9d98-4d6a2da4ae7b',
				'status'				=> $stts,
				'created_up'			=> $created_at
			];
			$this->db->where('kd_quisioner', $kd_quis);
			$this->db->update('t_quisioner', $data);
			// $this->m_backend->editQuisDetail($data);
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show text-white" role="alert">Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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


	// ===========================================BEGIN ANS QUISIONER================================================

	public function AnswerQuisioner()
	{
		$data['title'] = "Response Mahasiswa";
		$data['jtable'] = "Response";
		$data['answer'] = $this->m_backend->getAnswerQuisioner();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('backend/AnswerQuisioner', $data);
		$this->load->view('footer');
	}

	public function deleteAnswerQuis($kd_answer_quis)
	{
		$this->m_backend->deleteAnswerQuis($kd_answer_quis);
		redirect(base_url('backend/hasildosen'));
	}

	// ==========================================END ANS QUISIONER=====================================================

	// ===========================================BEGIN ANSWER================================================
	public function getAnswer()
	{
		$data['title'] = "Options";
		$data['jtable'] = "Options";
		$data['answer'] = $this->m_backend->getAnswer();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('backend/Answer', $data);
		$this->load->view('footer');
	}

	public function fungsiInputAnswer()
	{
		$answer = $this->input->post('answer');
		$data = [
			'answer' => $answer
		];
		$this->db->set('id_answer', 'UUID()', false);
		$this->m_backend->inputAnswer($data);
		redirect(base_url('backend/getAnswer'));
	}

	public function fungsiEditAnswer($id_answer)
	{
		$id_answer = $this->input->post('id_answer');
		$answer = $this->input->post('answer');
		$arr = [
			'answer' => $answer,
		];

		$this->db->where('id_answer', $id_answer);
		$this->db->update('t_answer', $arr);
		redirect(base_url('backend/getAnswer'));
	}

	public function deleteAnswer($kd_quis)
	{
		$this->m_backend->deleteAnswer($kd_quis);
		redirect(base_url('backend/getAnswer'));
	}

	// ===========================================END ANSWER==========================================================================


	// ===========================================BEGIN MAHASISWA================================================
	public function getJenis()
	{
		$data['title'] = "Jenis Quisioner";
		$data['jtable'] = "Jenis Kuisioner";
		$data['jenis'] = $this->m_backend->getJenis();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('backend/Jenis', $data);
		$this->load->view('footer');
	}

	
	public function fungsiInputJenis()
	{
		$id=$this->input->post('id_jenis_quisioner');
		$jenis = $this->input->post('jenis_quisioner');
		$data=[
			'jenis_quisioner'=>$jenis
		];
		$this->db->set('id_jenis_quisioner', 'UUID()', false);
		$this->m_backend->inputJenis($data);
		redirect(base_url('backend/getJenis'));
	}


	public function fungsiEditJenis($id_jenis)
	{
		$id_jenis = $this->input->post('id_jenis_quisioner');
		$jenis_quisioner = $this->input->post('jenis_quisioner');
		$arr = [
			'jenis_quisioner' => $jenis_quisioner,
		];

		$this->db->where('id_jenis_quisioner', $id_jenis);
		$this->db->update('t_jenis_quisioner', $arr);
		redirect(base_url('backend/getJenis'));
	}

	public function deleteJenis($id_jenis)
	{
		$this->db->where('id_jenis_quisioner',$id_jenis);
		$this->db->delete('t_jenis_quisioner');
		redirect(base_url('backend/getJenis'));
	}

	// ===========================================END MAHASISWA==========================================================================

	// ========================================HASIL MK==============================================================================


	// ========================================END HASIL MK========================================================================

	// ========================================BEGIN HASIL DOSEN=====================================================================



	public function HasilMk()
	{
		$data['title'] = "Diagram Mata Kuliah";
		$data['data'] = $this->m_backend->getGrafikQuisMk();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('navbar');
		$this->load->view('backend/DiagramMk', $data);
		$this->load->view('footer', $data);
	}

	// ========================================END HASIL DOSEN=========================================================================

}
