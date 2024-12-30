<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Community_model');
    }

    // Tampilkan semua data
    public function index()
    {
        $data['communities'] = $this->Community_model->get_all();
        $this->load->view('community_list', $data);
    }

    // Tambah data
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('community_form');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            ];
            $this->Community_model->insert($data);
            redirect('community');
        }
    }

    // Edit data
    public function edit($id)
    {
        $data['community'] = $this->Community_model->get_by_id($id);

        if (empty($data['community'])) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('community_form', $data);
        } else {
            $update_data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            ];
            $this->Community_model->update($id, $update_data);
            redirect('community');
        }
    }

    // Hapus data
    public function delete($id)
    {
        $this->Community_model->delete($id);
        redirect('community');
    }
}
