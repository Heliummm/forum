<?php
class Community_model extends CI_Model
{
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
