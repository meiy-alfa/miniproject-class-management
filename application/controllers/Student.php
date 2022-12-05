<?php
    class student extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('student_model');
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Siswa";
            // mengambil data dari model
            $data['items'] = $this->student_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Siswa";
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }
    }