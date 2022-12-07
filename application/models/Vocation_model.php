<?php
    class vocation_model extends CI_Model
    {
        public function get_all()
        {
            // mengambil database
            $query = $this->db->get('vocations');
            // mengambil semua data menjadi array
            $result = $query->result();
            // return data untuk dapat dikirim
            return $result;
        }

        public function get_item($id)
        {
            // mengambil database dengan where
            $this->db->where('id', $id);
            $query = $this->db->get('vocations');
            // mengambil satu data menjadi array
            $result = $query->row();
            // return data untuk dapat dikirim
            return $result;
        }

        public function create_item()
        {
            // mengambil data dari method POST
            $data['name']   = $this->input->post('name');
            $data['code']   = $this->input->post('code');
            // insert pada database
            $this->db->insert('vocations', $data);
        }

        public function update_item($id)
        {
            // mengambil data dari method POST
            $data['name']   = $this->input->post('name');
            $data['code']   = $this->input->post('code');
            // update pada database sesuai id
            $this->db->where('id', $id);
            $this->db->update('vocations', $data);
        }

        public function delete_item($id)
        {
            // delete pada database sesuai id
            $this->db->where('id', $id);
            $this->db->delete('vocations');
        }
    }
