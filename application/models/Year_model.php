<?php
    class year_model extends CI_Model
    {
        public function get_all()
        {
            // mengambil database
            $query = $this->db->get('years');
            // mengambil semua data menjadi array
            $result = $query->result();
            // return data untuk dapat dikirim
            return $result;
        }

        public function get_item($id)
        {
            // mengambil database dengan where
            $this->db->where('id', $id);
            $query = $this->db->get('years');
            // mengambil satu data menjadi array
            $result = $query->row();
            // return data untuk dapat dikirim
            return $result;
        }

        public function create_item()
        {
            // mengambil data dari method POST
            $data['year']  = $this->input->post('year');
            // insert pada database
            $this->db->insert('years', $data);
        }

        public function update_item($id)
        {
            // mengambil data dari method POST
            $data['year']  = $this->input->post('year');
            // update pada database sesuai id
            $this->db->where('id', $id);
            $this->db->update('years', $data);
        }

        public function delete_item($id)
        {
            // delete pada database sesuai id
            $this->db->where('id', $id);
            $this->db->delete('years');
        }
    }
