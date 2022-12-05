<?php
    class student_model extends CI_Model
    {
        public function get_all()
        {
            $query = $this->db->get('students');
            $result = $query->result();
            return $result;
        }
    }