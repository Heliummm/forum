<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('main_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'form_validation', 'upload'));
    }

    // Beranda utama
    public function index() {
        $data['title'] = 'Beranda';
        $this->load->view('templates/header', $data);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }

    // Modul Login
    public function login() {
        $data['title'] = 'Login';

        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->Main_model->check_user($email, $password);

                if ($user) {
                    $this->session->set_userdata('user_id', $user['user_id']);
                    $this->session->set_userdata('user_name', $user['name']);
                    redirect('main/index');
                } else {
                    $data['error'] = 'Email atau password salah.';
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/footer');
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->set_flashdata('success', 'Anda telah logout.');
        redirect('main/login');
    }

    // Modul Forum Diskusi
    public function forum($category_id = null) {
        $data['title'] = 'Forum Diskusi';
        $data['categories'] = $this->Main_model->get_categories();
        $data['posts'] = $this->Main_model->get_posts($category_id);

        $this->load->view('templates/header', $data);
        $this->load->view('forum/index', $data);
        $this->load->view('templates/footer');
    }

    public function view_post($post_id) {
        $data['title'] = 'Detail Postingan';
        $data['post'] = $this->main_model->get_post_by_id($post_id);
        $data['comments'] = $this->main_model->get_comments($post_id);

        $this->load->view('templates/header', $data);
        $this->load->view('forum/view_post', $data);
        $this->load->view('templates/footer');
    }

    // Modul Galeri
    public function gallery() {
        $data['title'] = 'Galeri Karya';
        $data['artworks'] = $this->main_model->get_artworks();

        $this->load->view('templates/header', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('templates/footer');
    }

    public function upload_artwork() {
        $data['title'] = 'Unggah Karya';

        if ($this->input->post()) {
            $config['upload_path']   = './uploads/artworks/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mp3';
            $config['max_size']      = 20480; // Maksimum 20MB

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('artwork_file')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $file_data = $this->upload->data();

                $artwork_data = [
                    'user_id' => $this->session->userdata('user_id'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'file_path' => 'uploads/artworks/' . $file_data['file_name'],
                    'created_at' => date('Y-m-d H:i:s')
                ];

                if ($this->Main_model->save_artwork($artwork_data)) {
                    $this->session->set_flashdata('success', 'Karya berhasil diunggah!');
                    redirect('main/gallery');
                } else {
                    $data['error'] = 'Gagal menyimpan data karya ke database.';
                }
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('gallery/upload', $data);
        $this->load->view('templates/footer');
    }

    // Modul Komunitas
    public function community() {
        $data['title'] = 'Komunitas';
        $data['communities'] = $this->main_model->get_communities();

        $this->load->view('templates/header', $data);
        $this->load->view('community/index', $data);
        $this->load->view('templates/footer');
    }

    public function create_community() {
        if ($this->input->post()) {
            $create = $this->Main_model->create_community();
            if ($create) {
                $this->session->set_flashdata('success', 'Komunitas berhasil dibuat!');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat membuat komunitas.');
            }
            redirect('main/community');
        }

        $data['title'] = 'Buat Komunitas';
        $this->load->view('templates/header', $data);
        $this->load->view('community/create', $data);
        $this->load->view('templates/footer');
    }

    // Modul Register
    public function register() {
        $this->load->library('form_validation');

        // Validasi form
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $this->load->view('auth/register');
        } else {
            // Jika validasi berhasil
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->Main_model->insert_user($data); // Simpan pengguna baru
            redirect('main/login'); // Arahkan ke halaman login
        }
    }

    // Modul Profil
    public function profile() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $data['user'] = $this->Main_model->get_user_by_id($this->session->userdata('user_id'));
        $this->load->view('auth/profile', $data);
    }
}
