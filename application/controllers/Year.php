<?php
    class year extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('year_model');
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "year/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Tapel";
            // mengambil data dari model
            $data['items'] = $this->year_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "year/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Tapel";
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("year/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->year_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('year'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "year/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Tapel";
            // variabel mengambil data dari model
            $data['item'] = $this->year_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("year/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->year_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('year'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->year_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('year'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('year', 'tahun pelajaran', 'required|min_length[9]|max_length[9]|is_unique[years.year]');
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
