<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_backend extends CI_Model
{

    // ============================================================BEGIN QUIS=================================================
    function getQuisionerDosen()
    {
        $query = $this->db->query("SELECT q.kd_quisioner,q.quisioner,q.status,q.created_up,jq.id_jenis_quisioner,jq.jenis_quisioner FROM t_quisioner q JOIN t_jenis_quisioner jq ON (q.id_jenis_quisioner=jq.id_jenis_quisioner) WHERE jq.id_jenis_quisioner='1' ORDER BY q.status='1' DESC");
        return $query->result_array();
    }
    function getQuisionerMataKuliah()
    {
        $query = $this->db->query("SELECT q.kd_quisioner,q.quisioner,q.status,q.created_up,jq.id_jenis_quisioner,jq.jenis_quisioner FROM t_quisioner q JOIN t_jenis_quisioner jq ON (q.id_jenis_quisioner=jq.id_jenis_quisioner) WHERE jq.id_jenis_quisioner='2' ORDER BY q.status='1' DESC");
        return $query->result_array();
    } 
    
    function getQuisionerTracer()
    {
    $query = $this->db->query("SELECT q.kd_quisioner,q.quisioner,q.status,q.created_up,jq.id_jenis_quisioner,jq.jenis_quisioner FROM t_quisioner q JOIN t_jenis_quisioner jq ON (q.id_jenis_quisioner=jq.id_jenis_quisioner) WHERE jq.id_jenis_quisioner='3' ORDER BY q.status='1' DESC");
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
        return $query->result_array();
    }

    function inputJenis($data)
    {
        $this->db->select('*');
        $this->db->from('t_jenis_quisioner');
        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 't_jenis_quisioner');
    }


    // ======================================================END JENIS================================================================


    // ======================================================BEGIN ANSWER============================================================
    function getAnswer()
    {
        $this->db->select('*');
        $this->db->from('t_answer');
        $this->db->ORDER_BY('id_answer');
        $query = $this->db->get();
        return $query->result_array();
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
    function getMahasiswa()
    {
        $this->db->select('*');
        $this->db->from('v_mahasiswa');
        $query = $this->db->get();
        return $query->result_array();
    }
    // ==========================================================END MAHASISWA=======================================================

    // ==========================================================BEGIN DOSEN=======================================================
    function getDosen()
    {
        $this->db->select('*');
        $this->db->from('t_dosen');
        $query = $this->db->get();
        return $query->result_array();
    }

    // ==========================================================END DOSEN===============================================================

    // ==========================================================BEGIN MATA KULIAH=======================================================
    function getMk()
    {
        $this->db->select('*');
        $this->db->from('t_mata_kuliah');
        $query = $this->db->get();
        return $query->result_array();
    }
    // ==========================================================END MATA KULIAH=======================================================

    // ========================================================BEGIN ANS QUIS=======================================================
    function getAnswerQuisioner()
    {
        $this->db->select("") ;
        
    }


    function deleteAnswerQuis($kd_answer_quisioner)
    {
        $this->db->where('kd_answer_quisioner', $kd_answer_quisioner);
        $this->db->delete('t_answer_quisioner');
    }
    // =============================================================END ANS QUIS==================================================================

    function getuser()
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->join('t_level', 't_user.id_level=t_level.id_level');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getLevel()
    {
        $this->db->select('*');
        $this->db->from('t_level');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    function inputUser($data)
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 't_user');
    }


}
