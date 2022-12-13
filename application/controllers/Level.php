<?php
    class level extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('level_model');

            if (empty($this->session->user_id))
            {
                redirect('auth/login');
            }
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "level/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Tingkat";
            // mengambil data dari model
            $data['items'] = $this->level_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "level/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Tingkat";
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("level/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->level_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('level'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "level/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Tingkat";
            // variabel mengambil data dari model
            $data['item'] = $this->level_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("level/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->level_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('level'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->level_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('level'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('level', 'nama tingkatan', 'required|max_length[5]|is_unique[levels.level]');
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
