<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
    public function countKirimSurat()
    {
        $sess_id = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(status) as status
                               FROM tb_surat
                               WHERE sess_id = '$sess_id' AND status = 0"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->status;
        } else {
            return 0;
        }
    }

    public function countTotalSurat()
    {
        $sess_id = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(status) as status
                               FROM tb_surat
                               WHERE sess_id = '$sess_id'"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->status;
        } else {
            return 0;
        }
    }

    public function countKirimBerkas()
    {
        $sess_id = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(status_berkas) as status_berkas
                               FROM tb_berkas
                               WHERE sess_id = '$sess_id' AND status_berkas = 0"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->status_berkas;
        } else {
            return 0;
        }
    }

    public function countTotalBerkas()
    {
        $sess_id = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(status_berkas) as status_berkas
                               FROM tb_berkas
                               WHERE sess_id = '$sess_id'"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->status_berkas;
        } else {
            return 0;
        }
    }

    public function getKdSurat()
    {
        $this->db->select('RIGHT(kd_surat,3) as kode', FALSE);
        $this->db->order_by('id_tb_surat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_surat');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = date('dmY') . '/' . $kodemax;
        return $kodejadi;
    }

    public function getKdBerkas()
    {
        $this->db->select('RIGHT(kd_berkas,3) as kode', FALSE);
        $this->db->order_by('id_berkas', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_berkas');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = 'FILES/' . date('dmY') . '/' . $kodemax;
        return $kodejadi;
    }

    public function getEditSurat($id_tb_surat)
    {
        $query = $this->db->get_where('tb_surat', ['id_tb_surat' => $id_tb_surat])->row_array();
        return $query;
    }

    public function getEditBerkas($id_berkas)
    {
        $query = $this->db->get_where('tb_berkas', ['id_berkas' => $id_berkas])->row_array();
        return $query;
    }

    public function getDivisiName()
    {
        $sess_id = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT (divisi_nm) as divisi
                               FROM mst_user
                               JOIN tb_struktural
                               ON mst_user.id = tb_struktural.user_id
                               WHERE tb_struktural.user_id = '$sess_id'"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->divisi;
        } else {
            return 0;
        }
    }
    public function getSuratMasuk($divisi_nm)
    {
        $this->db->select('*');
        $this->db->from('mst_divisi');
        $this->db->join('tb_surat', 'mst_divisi.nama_divisi = tb_surat.tuj_surat');
        $this->db->join('tb_struktural', 'tb_surat.sess_id = tb_struktural.user_id');
        $this->db->where('tb_surat.tuj_surat', $divisi_nm);
        $this->db->where('tb_surat.status', 0);
        return $query = $this->db->get()->result_array();
    }

    public function getBerkasMasuk($divisi_nm)
    {
        $this->db->select('*');
        $this->db->from('mst_divisi');
        $this->db->join('tb_berkas', 'mst_divisi.nama_divisi = tb_berkas.tuj_berkas');
        $this->db->join('tb_struktural', 'tb_berkas.sess_id = tb_struktural.user_id');
        $this->db->where('tb_berkas.tuj_berkas', $divisi_nm);
        $this->db->where('tb_berkas.status_berkas', 0);
        return $query = $this->db->get()->result_array();
    }
}
