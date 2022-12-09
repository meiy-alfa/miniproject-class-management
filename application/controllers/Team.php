<?php
    class team extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('team_model');
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "team/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Angkatan";
            // mengambil data dari model
            $data['items'] = $this->team_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "team/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Angkatan";
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("team/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->team_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('team'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "team/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Angkatan";
            // variabel mengambil data dari model
            $data['item'] = $this->team_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("team/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->team_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('team'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->team_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('team'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('title', 'nama angkatan', 'required|max_length[4]|is_unique[teams.title]');
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
