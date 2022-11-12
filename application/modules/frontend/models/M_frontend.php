<?php
class M_frontend extends CI_Model
{
    // =======================================BEGIN QUIS DOSEN=====================================================
    public function getJenis()
    {
        return $this->db->get('t_jenis_quisioner')->result_array();
    }
    public function getQuisionerDosen()
    {
        $query = $this->db->query("SELECT q.kd_quisioner,q.quisioner,q.status,q.created_up,jq.id_jenis_quisioner,jq.jenis_quisioner FROM t_quisioner q JOIN t_jenis_quisioner jq ON (q.id_jenis_quisioner=jq.id_jenis_quisioner) WHERE jq.id_jenis_quisioner='1' AND q.status='1' ORDER BY id_jenis_quisioner");
        return $query->result_array();
        // return $this->db->get()->result_array();
    }
    public function getQuisionerMk()
    {
        $this->db->select('q.*,j.*');
        $this->db->from('t_quisioner q');
        $this->db->join('t_jenis_quisioner j', 'q.id_jenis_quisioner=j.id_jenis_quisioner');
        $this->db->where("j.id_jenis_quisioner='2'");
        $this->db->order_by('q.id_jenis_quisioner');
        return $this->db->get()->result_array();
    }


    public function findQuis()
    {
        return $this->db->get_where('kd_quisioner')->row_array();
    }



    public function inputQuisionerDosen($data)
    {
        $this->db->select('aq.*,q.*,a.*,d.*,m.*');
        $this->db->from('t_answer_quisioner aq');
        $this->db->join('t_mahasiswa m', 'aq.nim=m.nim');
        $this->db->join('t_quisioner q', 'aq.kd_quisioner=q.kd_quisioner');
        $this->db->join('t_dosen_pengampu d', 'aq.kd_dosen_pengampuh=d.kd_dosen_pengampuh');
        $this->db->join('t_answer a', 'aq.id_answer=a.id_answer');
        $this->db->get();
        $this->db->insert('t_answer_quisioner', $data);
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


    function simpan_quis($kd,$nim, $quis, $dosen, $answer, $comments, $waktu)
    {
        // $author = $this->session->userdata('nama');
        $hsl = $this->db->query("INSERT INTO t_answer_quisioner(kd_answer_quisioner,nim,kd_quisioner,kd_dosen_pengampuh,id_answer,comments,waktu) VALUES ('$kd','$nim','$quis','$dosen','$answer','$comments','$waktu')");
        return $hsl;
    }
}
