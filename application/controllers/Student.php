<?php
    class student extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('student_model');
            $this->load->model('year_model');
            $this->load->model('vocation_model');
            $this->load->model('level_model');
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Siswa";
            // mengambil data dari model
            $data['items'] = $this->student_model->get_new();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function s_active()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/list_active";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Siswa Aktif";
            // mengambil data dari model
            $data['items'] = $this->student_model->get_active();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function absen()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/list_absen";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Absen Kelas";
            // mengambil data dari model
            $data['items'] = $this->student_model->get_absen();
            $data['items_id'] = $this->student_model->get_absen_item();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function absen_option()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/form_absen";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Pilih Absen";
            // variabel model yang akan dijadikan option
            $data['year_options']       = $this->year_model->get_all();
            $data['vocation_options']   = $this->vocation_model->get_all();
            $data['level_options']      = $this->level_model->get_all();
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

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("student/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->student_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('student'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "student/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Siswa";
            // variabel mengambil data dari model
            $data['item'] = $this->student_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("student/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->student_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('student'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->student_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('student'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('fullname', 'nama lengkap', 'required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[11]|max_length[11]|is_unique[students.nis]');
            $this->form_validation->set_rules('gender', 'jenis kelamin', 'required');
            $validation_result = $this->form_validation->run();

            if ($validation_result === false) {
                $this->session->set_flashdata ([
                    'errors' => validation_errors(),
                    'inputs' => $this->input->post()
                ]);
                return redirect(site_url($redirect_url));
            }
        }
    }
