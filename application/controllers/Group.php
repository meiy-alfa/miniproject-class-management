<?php
    class group extends CI_Controller
    {
        public function __construct() 
        {
            parent::__construct();
            $this->load->model('group_model');
            $this->load->model('vocation_model');
            $this->load->model('team_model');
            $this->load->model('student_model');

            if (empty($this->session->user_id))
            {
                redirect('auth/login');
            }
        }

        public function index()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "group/list";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Daftar Group";
            // mengambil data dari model
            $data['items'] = $this->group_model->get_all();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create()
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "group/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Tambah Group";
            // variabel model yang akan dijadikan option
            $data['vocation_options']   = $this->vocation_model->get_all();
            $data['team_options']       = $this->team_model->get_all();
            $data['student_options']    = $this->student_model->get_new();
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function create_process()
        {
            // mengambil validasi
            $this->get_validate("group/create");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Ditambahkan"]);
            // mengambil model
            $this->group_model->create_item();
            // mengalihkan ke halaman lain
            redirect(site_url('group'));
        }

        public function update($id)
        {
            // variabel alamat halaman yang akan dibuka
            $data['page_name']  = "group/form";
            // variabel nama judul tab yang akan ditampilkan
            $data['page_title'] = "Edit Siswa";
            // variabel model yang akan dijadikan option
            $data['vocation_options']   = $this->vocation_model->get_all();
            $data['team_options']       = $this->team_model->get_all();
            $data['student_options']    = $this->student_model->get_all();
            // variabel mengambil data dari model
            $data['item'] = $this->group_model->get_item($id);
            // mengambil halaman main.php sebagai akses menampilkan halaman
            $this->load->view('main', $data);
        }

        public function update_process($id)
        {
            // mengambil validasi
            $this->get_validate("group/update/$id");
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["message" => "Sukses !!! Data Berhasil Diedit"]);
            // variabel mengambil data dari model
            $this->group_model->update_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('group'));
        }

        public function delete_process($id)
        {
            // mengirimkan alert hasil validasi menggunakan metode flashdata
            $this->session->set_flashdata(["messageDel" => "Data Berhasil Dihapus"]);
            // variabel mengambil data dari model
            $this->group_model->delete_item($id);
            // mengalihkan ke halaman lain
            redirect(site_url('group'));
        }

        public function get_validate($redirect_url)
        {
            $this->form_validation->set_rules('student_id', 'siswa', 'required|is_unique[groups.student_id]');
            $this->form_validation->set_rules('vocation_id', 'kompetensi', 'required');
            $this->form_validation->set_rules('team_id', 'kelompok kelas', 'required');
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
