<?php
    class group_model extends CI_Model
    {
        public function get_all()
        {
            // mengambil database dengan metode join
            $this->db->select('groups.*, vocations.code as kompetensi, teams.title as kelompok, students.fullname as siswa, students.nis as nis');
            $this->db->from('groups');
            $this->db->join('vocations','vocations.id = groups.vocation_id');
            $this->db->join('teams','teams.id = groups.team_id');
            $this->db->join('students','students.id = groups.student_id');
            $query = $this->db->get();
            // mengambil semua data menjadi array
            $result = $query->result();
            // return data untuk dapat dikirim
            return $result;
        }

        public function get_item($id)
        {
            // mengambil database dengan where
            $this->db->where('id', $id);
            $query = $this->db->get('groups');
            // mengambil satu data menjadi array
            $result = $query->row();
            // return data untuk dapat dikirim
            return $result;
        }

        public function create_item()
        {
            // mengambil data dari method POST
            $data['student_id']     = $this->input->post('student_id');
            $data['vocation_id']    = $this->input->post('vocation_id');
            $data['team_id']        = $this->input->post('team_id');
            // insert pada database
            $this->db->insert('groups', $data);
        }

        public function update_item($id)
        {
            // mengambil data dari method POST
            $data['student_id']     = $this->input->post('student_id');
            $data['vocation_id']    = $this->input->post('vocation_id');
            $data['team_id']        = $this->input->post('team_id');
            // update pada database sesuai id
            $this->db->where('id', $id);
            $this->db->update('groups', $data);
        }

        public function delete_item($id)
        {
            // delete pada database sesuai id
            $this->db->where('id', $id);
            $this->db->delete('groups');
        }
    }
