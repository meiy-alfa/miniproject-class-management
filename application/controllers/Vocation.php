<?php
    class vocation extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('vocation_model');
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "vocation/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Kompetensi";
            // mengambil data dari model
            $data['items'] = $this->vocation_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "vocation/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Kompetensi";
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("vocation/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->vocation_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('vocation'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "vocation/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Kompetensi";
            // variabel mengambil data dari model
            $data['item'] = $this->vocation_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("vocation/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->vocation_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('vocation'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->vocation_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('vocation'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('name', 'nama kompetensi', 'required|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('code', 'kode kompetensi', 'required|min_length[2]|max_length[5]');
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
