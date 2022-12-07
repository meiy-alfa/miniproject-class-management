<?php
    class classes extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('classes_model');
            $this->load->model('year_model');
            $this->load->model('group_model');
            $this->load->model('level_model');
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "classes/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Kelas";
            // mengambil data dari model
            $data['items'] = $this->classes_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "classes/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Kelas";
            // variabel model yang akan dijadikan option
            $data['year_options']   = $this->year_model->get_all();
            $data['group_options']  = $this->group_model->get_all();
            $data['level_options']  = $this->level_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("classes/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->classes_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('classes'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "classes/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Kelas";
            // variabel model yang akan dijadikan option
            $data['year_options']   = $this->year_model->get_all();
            $data['group_options']  = $this->group_model->get_all();
            $data['level_options']  = $this->level_model->get_all();
            // variabel mengambil data dari model
            $data['item'] = $this->classes_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("classes/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->classes_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('classes'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->classes_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('classes'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('year_id', 'tahun pelajaran', 'required');
            $this->form_validation->set_rules('group_id', 'group kelas', 'required');
            $this->form_validation->set_rules('level_id', 'tingkat', 'required');
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
