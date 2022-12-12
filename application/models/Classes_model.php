<?php
    class classes_model extends CI_Model
    {
        public function get_all()
        {
            // mengambil database dengan metode join
            $this->db->select('class.*, years.year as tapel, teams.title as angkatan, levels.level as tingkat');
            $this->db->from('class');
            $this->db->join('years','years.id = class.year_id');
            $this->db->join('teams','teams.id = class.team_id');
            $this->db->join('levels','levels.id = class.level_id');
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
            $query = $this->db->get('class');
            // mengambil satu data menjadi array
            $result = $query->row();
            // return data untuk dapat dikirim
            return $result;
        }

        public function get_team()
        {
            // mengambil database
            $this->db->select("teams.id, teams.title");
            $this->db->from('teams');
            $this->db->join('groups', 'groups.team_id = teams.id');
            $this->db->group_by("teams.id");
            $this->db->order_by("title", "desc");
            $query = $this->db->get();
            // mengambil semua data menjadi array
            $result = $query->result();
            // return data untuk dapat dikirim
            return $result;
        }

        public function create_item()
        {
            // mengambil data dari method POST
            $data['year_id']    = $this->input->post('year_id');
            $data['team_id']    = $this->input->post('team_id');
            $data['level_id']   = $this->input->post('level_id');
            // insert pada database
            $this->db->insert('class', $data);
        }

        public function update_item($id)
        {
            // mengambil data dari method POST
            $data['year_id']    = $this->input->post('year_id');
            $data['team_id']    = $this->input->post('team_id');
            $data['level_id']   = $this->input->post('level_id');
            // update pada database sesuai id
            $this->db->where('id', $id);
            $this->db->update('class', $data);
        }

        public function delete_item($id)
        {
            // delete pada database sesuai id
            $this->db->where('id', $id);
            $this->db->delete('class');
        }
    }
