<?php
    class student_model extends CI_Model
    {
        public function get_all()
        {
            // mengambil database
            $query = $this->db->get('students');
            // mengambil semua data menjadi array
            $result = $query->result();
            // return data untuk dapat dikirim
            return $result;
        }

        public function get_item($id)
        {
            // mengambil database dengan where
            $this->db->where('id', $id);
            $query = $this->db->get('students');
            // mengambil satu data menjadi array
            $result = $query->row();
            // return data untuk dapat dikirim
            return $result;
        }

        public function create_item()
        {
            // mengambil data dari method POST
            $data['fullname']   = $this->input->post('fullname');
            $data['nis']        = $this->input->post('nis');
            $data['gender']     = $this->input->post('gender');
            // insert pada database
            $this->db->insert('students', $data);
        }

        public function update_item($id)
        {
            // mengambil data dari method POST
            $data['fullname']   = $this->input->post('fullname');
            $data['nis']        = $this->input->post('nis');
            $data['gender']     = $this->input->post('gender');
            // update pada database sesuai id
            $this->db->where('id', $id);
            $this->db->update('students', $data);
        }

        public function delete_item($id)
        {
            // delete pada database sesuai id
            $this->db->where('id', $id);
            $this->db->delete('students');
        }
    }
