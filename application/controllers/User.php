<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_user();
        $this->load->helper('tglindo');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $this->form_validation->set_rules('kd_surat', 'Kode Surat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['kirim_surat'] = $this->user->countKirimSurat();
            $data['total_surat'] = $this->user->countTotalSurat();
            $data['kirim_berkas'] = $this->user->countKirimBerkas();
            $data['total_berkas'] = $this->user->countTotalBerkas();
            $data['kd_surat'] = $this->user->getKdSurat();
            $data['kd_berkas'] = $this->user->getKdBerkas();
            $data['jenis_surat'] = $this->db->get('mst_surat')->result_array();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'jns_surat' => $this->input->post('jns_surat', true),
                'kd_surat' => $this->input->post('kd_surat', true),
                'no_surat' => $this->input->post('no_surat', true),
                'tuj_surat' => $this->input->post('tuj_surat', true),
                'tgl_surat' => $this->input->post('tgl_surat', true),
                'isi_surat' => $this->input->post('isi_surat', true),
                'sess_id' => $sess_id,
                'status' => 1
            );
            $this->db->insert('tb_surat', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/list_surat');
        }
    }

    public function add_berkas()
    {
        $this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['kirim_surat'] = $this->user->countKirimSurat();
            $data['total_surat'] = $this->user->countTotalSurat();
            $data['kirim_berkas'] = $this->user->countKirimBerkas();
            $data['total_berkas'] = $this->user->countTotalBerkas();
            $data['kd_surat'] = $this->user->getKdSurat();
            $data['kd_berkas'] = $this->user->getKdBerkas();
            $data['jenis_surat'] = $this->db->get('mst_surat')->result_array();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '12048';
                $config['upload_path'] = './assets/files/';
				$this->load->library('upload', $config);
				
                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'kd_berkas' => $this->input->post('kd_berkas', true),
                        'tuj_berkas' => $this->input->post('tuj_berkas', true),
                        'nama_berkas' => $this->input->post('nama_berkas', true),
                        'tgl_berkas' => $this->input->post('tgl_berkas', true),
                        'pesan' => $this->input->post('pesan', true),
                        'sess_id' => $sess_id,
                        'status_berkas' => 1,
                        'file_upload' => $new_file
					);
					
                    $this->db->insert('tb_berkas', $data);
                    $this->session->set_flashdata('message', 'Simpan berkas');
                    redirect('user/list_berkas');
                } else {

                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">Oops.. UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/index');
                }
            } else {

                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">Oops.. UPLOAD GAGAL !..  File Upload harus disertakan </div>');
				redirect('user/index');
				
            }
        }
    }

    public function profile()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['surat'] = $this->db->get_where('tb_surat', ['sess_id' => $this->session->userdata('id')])->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['id']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal</div>');
                    redirect('user/profile');
                }
            }
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->where('id', $id);
            $this->db->update('mst_user');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/profile');
        }
    }

    public function changePassword()
    {

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">GAGAL..... Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/profile');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('mst_user');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('user/profile');
            }
        }
    }

    public function list_surat()
    {
        $this->form_validation->set_rules('id_tb_surat', 'ID Surat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Surat';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['surat'] = $this->db->get_where('tb_surat', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['jenis_surat'] = $this->db->get('mst_surat')->result_array();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/list_surat', $data);
            $this->load->view('templates/footer');
        } else {
            $id_tb_surat = $this->input->post('id_tb_surat', true);
            $jns_surat = $this->input->post('jns_surat', true);
            $no_surat = $this->input->post('no_surat', true);
            $tuj_surat = $this->input->post('tuj_surat', true);
            $tgl_surat = $this->input->post('tgl_surat', true);
            $isi_surat = $this->input->post('isi_surat', true);

            $this->db->set('jns_surat', $jns_surat);
            $this->db->set('no_surat', $no_surat);
            $this->db->set('tuj_surat', $tuj_surat);
            $this->db->set('tgl_surat', $tgl_surat);
            $this->db->set('isi_surat', $isi_surat);
            $this->db->where('id_tb_surat', $id_tb_surat);
            $this->db->update('tb_surat');
            $this->session->set_flashdata('message', 'Update surat');
            redirect('user/list_surat');
        }
    }

    public function get_surat()
    {
        echo json_encode($this->user->getEditSurat($_POST['id_tb_surat']));
    }

    public function kirim_surat()
    {
        $id_tb_surat = $this->input->post('id_tb_surat', true);
        $status = 0;
        $this->db->set('status', $status);
        $this->db->where('id_tb_surat', $id_tb_surat);
        $this->db->update('tb_surat');
        $this->session->set_flashdata('message', 'Kirim surat');
        redirect('user/list_surat');
    }

    public function del_surat($id_tb_surat)
    {
        $this->db->where('id_tb_surat', $id_tb_surat);
        $this->db->delete('tb_surat');
        $this->session->set_flashdata('message', 'Hapus surat');
        redirect('user/list_surat');
    }

    public function list_berkas()
    {
        $this->form_validation->set_rules('id_berkas', 'ID Berkas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Berkas';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['berkas'] = $this->db->get_where('tb_berkas', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('user/list_berkas', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['file']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/files/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $id_berkas = $this->input->post('id_berkas', true);
                    $data['berkas_link'] = $this->db->get_where('tb_berkas', ['id_berkas' => $id_berkas])->row_array();
                    $old_file = $data['berkas_link']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/list_berkas');
                }
            }
            $id_berkas = $this->input->post('id_berkas', true);
            $tuj_berkas = $this->input->post('tuj_berkas', true);
            $nama_berkas = $this->input->post('nama_berkas', true);
            $tgl_berkas = $this->input->post('tgl_berkas', true);
            $pesan = $this->input->post('pesan', true);
            $this->db->set('tuj_berkas', $tuj_berkas);
            $this->db->set('nama_berkas', $nama_berkas);
            $this->db->set('tgl_berkas', $tgl_berkas);
            $this->db->set('pesan', $pesan);
            $this->db->where('id_berkas', $id_berkas);
            $this->db->update('tb_berkas');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/list_berkas');
        }
    }

    public function get_berkas()
    {
        echo json_encode($this->user->getEditBerkas($_POST['id_berkas']));
    }

    public function kirim_berkas()
    {
        $id_berkas = $this->input->post('id_berkas', true);
        $status_berkas = 0;
        $this->db->set('status_berkas', $status_berkas);
        $this->db->where('id_berkas', $id_berkas);
        $this->db->update('tb_berkas');
        $this->session->set_flashdata('message', 'Kirim berkas');
        redirect('user/list_berkas');
    }

    public function download_file()
    {
        $id_berkas = $this->input->post('id_berkas', true);
        $data = $this->db->get_where('tb_berkas', ['id_berkas' => $id_berkas])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_berkas($id_berkas)
    {
        $_id = $this->db->get_where('tb_berkas', ['id_berkas' => $id_berkas])->row();
        $query = $this->db->delete('tb_berkas', ['id_berkas' => $id_berkas]);
        if ($query) {
            unlink("assets/files/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/list_berkas');
    }


    public function surat_masuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['divisi_nm'] = $this->user->getDivisiName();
        $divisi_nm = $this->user->getDivisiName();
        $data['surat_masuk'] = $this->user->getSuratMasuk($divisi_nm);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/surat_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function berkas_masuk()
    {
        $data['title'] = 'Berkas Masuk';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['divisi_nm'] = $this->user->getDivisiName();
        $divisi_nm = $this->user->getDivisiName();
        $data['berkas_masuk'] = $this->user->getBerkasMasuk($divisi_nm);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('user/berkas_masuk', $data);
        $this->load->view('templates/footer');
    }
}
