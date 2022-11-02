<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_backend extends CI_Model
{

    // ============================================================BEGIN QUIS=================================================
    function getQuisionerDosen()
    {
        $query = $this->db->query("SELECT q.kd_quisioner,q.quisioner,q.status,q.created_up,jq.id_jenis_quisioner,jq.jenis_quisioner FROM t_quisioner q JOIN t_jenis_quisioner jq ON (q.id_jenis_quisioner=jq.id_jenis_quisioner) WHERE jq.id_jenis_quisioner='1' ORDER BY id_jenis_quisioner");
        return $query->result_array();
    }
    function getQuisionerMataKuliah()
    {
        $query = $this->db->query("SELECT q.kd_quisioner,q.quisioner,q.status,q.created_up,jq.id_jenis_quisioner,jq.jenis_quisioner FROM t_quisioner q JOIN t_jenis_quisioner jq ON (q.id_jenis_quisioner=jq.id_jenis_quisioner) WHERE jq.id_jenis_quisioner='2' ORDER BY id_jenis_quisioner");
        return $query->result_array();
    }
    function inputQuis($data)
    {
        $this->db->select('*');
        $this->db->from('t_quisioner');
        $this->db->join('t_jenis_quisioner', 't_jenis_quisioner.id_jenis_quisioner = t_quisioner.id_jenis_quisioner');
        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 't_quisioner');
    }

    public function deleteAllQmk($kd)
    {
        $this->db->where_in('kd_quisioner', $kd);
        $this->db->delete('t_quisioner');
    }
    // ===================================================END QUIS================================================================================

    // ====================================================BEGIN JENIS============================================================================
    function getJenis()
    {
        $this->db->select('*');
        $this->db->from('t_jenis_quisioner');
        $query = $this->db->get();
        return $query->result();
    }

    function inputJenis($data)
    {
        $this->db->select('*');
        $this->db->from('t_jenis_quisioner');
        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 't_jenis_quisioner');
    }

    function deleteJenis($kd_jenis)
    {
        $this->db->where('id_jenis_quisioner', $kd_jenis);
        $this->db->delete('t_jenis_quisioner');
    }

    // ======================================================END JENIS================================================================


    // ======================================================BEGIN ANSWER============================================================
    function getAnswer()
    {
        $this->db->select('*');
        $this->db->from('t_answer');
        $this->db->ORDER_BY('id_answer');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    function inputAnswer($data)
    {
        $this->db->select('*');
        $this->db->from('t_answer');
        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 't_answer');
    }

    function deleteAnswer($kd_answer)
    {
        $this->db->where('id_answer', $kd_answer);
        $this->db->delete('t_answer');
    }

    // ==========================================================END ANSWER=======================================================

    // ==========================================================BEGIN MAHASISWA=======================================================
    function getMhs()
    {
        $this->db->select('*');
        $this->db->from('t_mahasiswa');
        $query = $this->db->get();
        return $query->result();
    }

    function inputMhs()
    {
        $this->db->select('*');
        $this->db->from('t_mahasiswa');
        $this->db->insert($this->db->dbprefix . 't_mahasiswa');
    }

    function deleteMhs($kd_mhs)
    {
        $this->db->where('id_mahasiswa', $kd_mhs);
        $this->db->delete('t_mahasiswa');
    }
    // ==========================================================END MAHASISWA=======================================================

    // ==========================================================BEGIN DOSEN=======================================================
    function getDosen()
    {
        $this->db->select('*');
        $this->db->from('t_dosen_pengampu');
        $query = $this->db->get();
        return $query->result();
    }

    function inputDosen()
    {
        $this->db->select('*');
        $this->db->from('t_dosen_pengampu');
        $this->db->insert($this->db->dbprefix . 't_dosen_pengampu');
    }

    function editDosen($kd_)
    {
        $this->db->where('kd_dosen_pengampu', $kd_);
        $query = $this->db->get('t_dosen_pengampu');
        return $query->row();
    }

    function deleteDosen($kd_)
    {
        $this->db->where('kd_dosen', $kd_);
        $this->db->delete('t_dosen_pengampu');
    }
    // ==========================================================END DOSEN===============================================================

    // ==========================================================BEGIN MATA KULIAH=======================================================
    function getMk()
    {
        $this->db->select('*');
        $this->db->from('t_mk');
        $query = $this->db->get();
        return $query->result();
    }

    function inputMk($data)
    {
        $this->db->select('*');
        $this->db->from('t_mk');
        $this->db->insert($this->db->dbprefix . 't_mk');
    }

    function editMk($kd_mk)
    {
        $this->db->where('kd_mk', $kd_mk);
        $query = $this->db->get('t_mk');
        return $query->row();
    }

    function deleteMk($kd_mk)
    {
        $this->db->where('kd_mk', $kd_mk);
        $this->db->delete('t_mk');
    }
    // ==========================================================END MATA KULIAH=======================================================

    // ==========================================================BEGIN COMMENTS=======================================================
    function getComments()
    {
        $this->db->select('*');
        $this->db->from('t_comments');
        $query = $this->db->get();
        return $query->result();
    }

    function inputComments()
    {
        $this->db->select('*');
        $this->db->from('t_comments');
        $this->db->insert($this->db->dbprefix . 't_comments');
    }

    function editComments($kd_comments)
    {
        $this->db->where('kd_comments', $kd_comments);
        $query = $this->db->get('t_comments');
        return $query->row();
    }

    function deleteComments($kd_comments)
    {
        $this->db->where('kd_comments', $kd_comments);
        $this->db->delete('t_comments');
    }
    // ==========================================================END COMMENTS=======================================================

    // ========================================================BEGIN ANS QUIS=======================================================
    function getAnswerQuisioner()
    {

        return $this->db->query("SELECT aq.*,m.*,d.*,q.*,a.* FROM t_answer_quisioner aq join t_mahasiswa m on aq.nim=m.nim join t_dosen_pengampu d on aq.kd_dosen_pengampuh=d.kd_dosen_pengampuh join t_quisioner q on aq.kd_quisioner=q.kd_quisioner join t_answer a on aq.id_answer=a.id_answer ORDER BY aq.nim ASC")->result_array();
    }


    function deleteAnswerQuis($kd_answer_quisioner)
    {
        $this->db->where('kd_answer_quisioner', $kd_answer_quisioner);
        $this->db->delete('t_answer_quisioner');
    }
    // =============================================================END ANS QUIS==================================================================


    // ===================================count=======================================
    function getGrafikQuisMk()
    {
        $this->db->select('kd_dosen_pengampu', 'id_answer');
        $this->db->from('t_answer_quisioner');
        $this->db->ORDER_BY('kd_dosen_pengampu');
        return $this->db->get()->result();
    }
    // =============================================endcount=============================================

}