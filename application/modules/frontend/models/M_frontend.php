<?php 
class M_frontend extends CI_Model{
     // =======================================BEGIN QUIS DOSEN=====================================================
    public function getJenis()
    {
        return $this->db->get('t_jenis_quisioner')->result_array();
    }
    public function getQuisionerDosen()
    {
        $this->db->select('q.*,j.*');
        $this->db->from('t_quisioner q');
        $this->db->join('t_jenis_quisioner j','q.id_jenis_quisioner=j.id_jenis_quisioner');
        $this->db->where('j.id_jenis_quisioner=1');
        $this->db->order_by('q.id_jenis_quisioner');
        return $this->db->get()->result_array();

    }
     public function getQuisionerMk()
    {
        $this->db->select('q.*,j.*');
        $this->db->from('t_quisioner q');
        $this->db->join('t_jenis_quisioner j','q.id_jenis_quisioner=j.id_jenis_quisioner');
        $this->db->where('j.id_jenis_quisioner=2');
        $this->db->order_by('q.id_jenis_quisioner');
        return $this->db->get()->result_array();

    }


    public function findQuis(){
        return $this->db->get_where('kd_quisioner')->row_array();
    }

    

    public function inputQuisionerDosen()
    {
        $this->db->select('aq.*,q.*,a.*,d.*,m.*');
        $this->db->from('t_answer_quisioner aq');
        $this->db->join('t_nim m','aq.nim=m.nim');
        $this->db->join('t_quisioner q','aq.kd_quisioner=q.kd_quisioner');
        $this->db->join('t_dosen_pengampu d','aq.kd_dosen_pengampuh=d.kd_dosen_pengampuh');
        $this->db->join('t_answer a','aq.id_answer=a.id_answer');
        $this->db->insert('t_answer_quisioner');

        
    }

    public function inputQuisionerMK()
    {
        $this->db->select('aq.*,q.*,a.*,d.*,m.*');
        $this->db->from('t_answer_quisioner aq');
        $this->db->join('t_nim m', 'aq.nim=m.nim');
        $this->db->join('t_quisioner q', 'aq.kd_quisioner=q.kd_quisioner');
        $this->db->join('t_dosen_pengampu d', 'aq.kd_dosen_pengampuh=d.kd_dosen_pengampuh');
        $this->db->join('t_answer a', 'aq.id_answer=a.id_answer');
        $this->db->insert('t_answer_quisioner');
    }
   
}