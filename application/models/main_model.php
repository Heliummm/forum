<?php
class Main_model extends CI_Model {

public function get_categories() {
    return $this->db->get('categories')->result_array();
}

public function get_posts($category_id = null) {
    if ($category_id) {
        $this->db->where('category_id', $category_id);
    }
    return $this->db->get('posts')->result_array();
}

public function get_post_by_id($post_id) {
    return $this->db->get_where('posts', ['post_id' => $post_id])->row_array();
}

public function get_comments($post_id) {
    return $this->db->get_where('comments', ['post_id' => $post_id])->result_array();
}

public function get_artworks() {
    return $this->db->get('gallery')->result_array();
}

public function save_artwork($data) {
    if (!$this->db->insert('gallery', $data)) {
        log_message('error', 'Database error: ' . $this->db->error());
        return false;
    }
    return true;
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
                    redirect('index.php/main/gallery');
                } else {
                    $data['error'] = 'Gagal menyimpan data karya ke database.';
                }
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('gallery/upload', $data);
        $this->load->view('templates/footer');
    }

public function get_communities() {
    return $this->db->get('communities')->result_array();
}

public function create_community() {
    $data = [
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'category' => $this->input->post('category'),
        'created_by' => $this->session->userdata('user_id'),
    ];
    return $this->db->insert('communities', $data);
}
public function check_user($email, $password) {
    // Query untuk mengambil pengguna berdasarkan email
    $this->db->where('email', $email);
    $query = $this->db->get('users');

    if ($query->num_rows() === 1) {
        $user = $query->row_array();

        // Verifikasi password dengan password_hash
        if (password_verify($password, $user['password'])) {
            return [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ];
        }
    }

    return false;
}
public function insert_user($data) {
    return $this->db->insert('users', $data);
}
public function get_user_by_id($id) {
    return $this->db->get_where('users', ['id' => $id])->row_array();
}
// Ambil semua data
public function get_all()
{
    return $this->db->get('communities')->result_array();
}

// Ambil data berdasarkan ID
public function get_by_id($id)
{
    return $this->db->get_where('communities', ['id' => $id])->row_array();
}

// Tambah data
public function insert($data)
{
    return $this->db->insert('communities', $data);
}

// Update data
public function update($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('communities', $data);
}

// Hapus data
public function delete($id)
{
    $this->db->where('id', $id);
    return $this->db->delete('communities');
}
}
?>