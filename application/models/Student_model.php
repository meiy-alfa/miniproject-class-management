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

        public function get_new()
        {
            // mengambil database
            $data = $this->db->get('groups');
            $result_data = $data->result();
            foreach ($result_data as $id_data) :
            $check = $id_data->student_id;
            $this->db->where_not_in('id', $check);
            endforeach;
            // mengambil database
            $this->db->order_by("nis", "asc");
            $query = $this->db->get('students');
            // mengambil semua data menjadi array
            $result = $query->result();
            // return data untuk dapat dikirim
            return $result;
        }

        public function get_active()
        {
            // mengambil database dengan metode join
            $this->db->select("students.*, groups.*, vocations.*, teams.*, GROUP_CONCAT(levels.level ORDER BY levels.level asc SEPARATOR ' / ') as levs");
            $this->db->from('students');
            $this->db->join('groups','groups.student_id = students.id');
            $this->db->join('vocations','vocations.id = groups.vocation_id');
            $this->db->join('teams','teams.id = groups.team_id');
            $this->db->join('class','class.team_id = teams.id');
            $this->db->join('levels','levels.id = class.level_id');
            $this->db->group_by('fullname');
            $query = $this->db->get();
            $result = $query->result();
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
