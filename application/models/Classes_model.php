<?php
    class classes_model extends CI_Model
    {
        public function get_all()
        {
            // mengambil database dengan metode join
            $this->db->select('classes.*, years.year as tapel, vocations.code as kompetensi, teams.title as kelompok, levels.level as tingkat');
            $this->db->from('classes');
            $this->db->join('years','years.id = classes.year_id');
            $this->db->join('groups','groups.id = classes.group_id');
            $this->db->join('levels','levels.id = classes.level_id');
            $this->db->join('vocations','vocations.id = groups.vocation_id');
            $this->db->join('teams','teams.id = groups.team_id');
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
            $query = $this->db->get('classes');
            // mengambil satu data menjadi array
            $result = $query->row();
            // return data untuk dapat dikirim
            return $result;
        }

        public function create_item()
        {
            // mengambil data dari method POST
            $data['year_id']    = $this->input->post('year_id');
            $data['group_id']   = $this->input->post('group_id');
            $data['level_id']   = $this->input->post('level_id');
            // insert pada database
            $this->db->insert('classes', $data);
        }

        public function update_item($id)
        {
            // mengambil data dari method POST
            $data['year_id']    = $this->input->post('year_id');
            $data['group_id']   = $this->input->post('group_id');
            $data['level_id']   = $this->input->post('level_id');
            // update pada database sesuai id
            $this->db->where('id', $id);
            $this->db->update('classes', $data);
        }

        public function delete_item($id)
        {
            // delete pada database sesuai id
            $this->db->where('id', $id);
            $this->db->delete('classes');
        }
    }
