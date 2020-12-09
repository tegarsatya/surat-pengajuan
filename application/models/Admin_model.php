<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

    public function countJmlUser()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as jml_user
                               FROM mst_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_user;
        } else {
            return 0;
        }
    }

    public function countUserAktif()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as user_aktif
                               FROM mst_user
                               WHERE is_active = 1"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->user_aktif;
        } else {
            return 0;
        }
    }

    public function countUserTakAktif()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as user_tak_aktif
                               FROM mst_user
                               WHERE is_active = 0"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->user_tak_aktif;
        } else {
            return 0;
        }
    }

    public function countUserPerbulan()
    {
        $query = $this->db->query(
            "SELECT CONCAT(YEAR(date_created),'/',MONTH(date_created)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
                FROM mst_user
                WHERE CONCAT(YEAR(date_created),'/',MONTH(date_created))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                GROUP BY YEAR(date_created),MONTH(date_created);"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_bulanan;
        } else {
            return 0;
        }
    }

    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getUserAktif()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->order_by('id', 'DESC');
        $this->db->where('is_active', 1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getUserNonAktif()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->order_by('id', 'DESC');
        $this->db->where('is_active', 0);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getUserEdit($id)
    {
        $query = $this->db->get_where('mst_user', ['id' => $id])->row_array();
        return $query;
    }

    public function getEditStruktur($id_struktur)
    {
        $query = $this->db->get_where('tb_struktural', ['id_struktur' => $id_struktur])->row_array();
        return $query;
    }

    public function getEditJabatan($id_jabatan)
    {
        $query = $this->db->get_where('mst_jabatan', ['id_jabatan' => $id_jabatan])->row_array();
        return $query;
    }

    public function getEditDivisi($id_divisi)
    {
        $query = $this->db->get_where('mst_divisi', ['id_divisi' => $id_divisi])->row_array();
        return $query;
    }

    function getKodePegawai()
    {
        $this->db->select('RIGHT(kode_pegawai,4) as kode', FALSE);
        $this->db->order_by('id_struktur', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_struktural');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = date('mY') . $kodemax;
        return $kodejadi;
    }
    function getKodeSurat()
    {
        $this->db->select('RIGHT(kode_surat,3) as kode', FALSE);
        $this->db->order_by('id_surat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mst_surat');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = 'SUR-' . date('mY') . $kodemax;
        return $kodejadi;
    }

    public function getEditSurat($id_surat)
    {
        $query = $this->db->get_where('mst_surat', ['id_surat' => $id_surat])->row_array();
        return $query;
    }

    public function getEditEsurat($id_tb_surat)
    {
        $query = $this->db->get_where('tb_surat', ['id_tb_surat' => $id_tb_surat])->row_array();
        return $query;
    }

    public function getEditBerkas($id_berkas)
    {
        $query = $this->db->get_where('tb_berkas', ['id_berkas' => $id_berkas])->row_array();
        return $query;
    }

    public function getAllSurat()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->join('tb_surat', 'mst_user.id = tb_surat.sess_id');
        $this->db->join('tb_struktural', 'mst_user.id = tb_struktural.user_id');
        $this->db->where('tb_surat.status', 0);
        return $query = $this->db->get()->result_array();
    }

    public function getAllBerkas()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->join('tb_berkas', 'mst_user.id = tb_berkas.sess_id');
        $this->db->join('tb_struktural', 'mst_user.id = tb_struktural.user_id');
        $this->db->where('tb_berkas.status_berkas', 0);
        return $query = $this->db->get()->result_array();
    }
}
