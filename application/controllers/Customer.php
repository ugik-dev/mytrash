<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('SecurityModel', 'GeneralModel', 'DapurModel'));
        // var_dump($this->session->userdata());
        $this->SecurityModel->roleOnlyGuard('customer');
    }
    public function index()
    {
        $data = [
            'page' => 'customer/history'
        ];
        $this->load->view('template/index2', $data);
    }
    public function history()
    {
        $dataContent = $this->GeneralModel->getPesanan(['id_user' => $this->session->userdata('login')['id_user']]);

        $data = [
            'page' => 'customer/history',
            'dataContent' => ['transaction' => $dataContent]
        ];
        $this->load->view('template/index3', $data);
    }
    public function getListPesanan()
    {
        try {
            $filter = $this->input->get();
            $pesanan_anda =   $this->GeneralModel->getAllPesananItem($filter);
            echo json_encode(['error' => false, 'data' => $pesanan_anda]);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        } // } else {
        //     redirect(base_url());
        // }
    }

    public function terima()
    {
        try {
            $id = $this->input->get()['id_pesanan'];
            $valid_data =   $this->GeneralModel->getAllPesananItem(['id_pesanan' => $id])[$id];
            if ($valid_data['status_pesanan'] != 0)
                throw new UserException('Pesanan sudah diterima atau dibatalkan', UNAUTHORIZED_CODE);

            $this->DapurModel->edit_pesanan($id, 1);
            $valid_data =   $this->GeneralModel->getAllPesananItem(['id_pesanan' => $id])[$id];
            echo json_encode(['error' => false, 'data' => $valid_data]);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
    public function selesai()
    {
        try {
            $id = $this->input->get()['id_pesanan'];
            $valid_data =   $this->GeneralModel->getAllPesananItem(['id_pesanan' => $id])[$id];
            if ($valid_data['status_pesanan'] == 3)
                throw new UserException('Pesanan sudah dibatalkan', UNAUTHORIZED_CODE);

            $this->DapurModel->edit_pesanan($id, 2);
            $valid_data =   $this->GeneralModel->getAllPesananItem(['id_pesanan' => $id])[$id];
            echo json_encode(['error' => false, 'data' => $valid_data]);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }
    public function batalkan()
    {
        try {
            $id = $this->input->get()['id_pesanan'];
            $valid_data =   $this->GeneralModel->getAllPesananItem(['id_pesanan' => $id])[$id];
            if ($valid_data['status_pesanan'] ==  "2")
                throw new UserException('Pesanan sudah selesai', UNAUTHORIZED_CODE);

            $this->DapurModel->edit_pesanan($id, 3);
            $valid_data =   $this->GeneralModel->getAllPesananItem(['id_pesanan' => $id])[$id];
            echo json_encode(['error' => false, 'data' => $valid_data]);
        } catch (Exception $e) {
            ExceptionHandler::handle($e);
        }
    }

    public function order_meja($id)
    {
        // var_dump($this->session->userdata());
        $data = [
            'page' => '/pages/input_name',
            'dataContent' => [
                'nama_meja' => $id
            ]
        ];
        $this->load->view('template/index', $data);
    }

    public function process_one_sampah()
    {
        $this->SecurityModel->roleOnlyGuard('customer', true);
        $post = $this->input->post();
        if (!empty($post)) {
            $dataSess = $this->session->userdata('login');
            if (!empty($dataSess)) {
                // die();
                $data_pemesan = [
                    'nama_pemesan' => $post['nama_pemesan'],
                    'est_berat' => $post['est_berat'],
                    'jarak' => $post['jarak'],
                    'alamat' => $post['alamat'],
                    'phone' => $post['phone'],
                    'longitude' => $post['longitude'],
                    'latitude' => $post['latitude'],
                    'id_user' => $dataSess['id_user'],
                    'status_pesanan' => 1,
                    'est_berat_rp' => $post['est_berat'] * 4000,
                    'jarak_rp' => ceil($post['jarak']) * 5000,
                ];

                if (!empty($post['organik'])) $data_pemesan['organik'] = 1;
                else $data_pemesan['organik'] = 2;

                if (!empty($post['nonorganik'])) $data_pemesan['nonorganik'] = 1;
                else $data_pemesan['nonorganik'] = 2;

                if (!empty($post['logamberat'])) $data_pemesan['logamberat'] = 1;
                else $data_pemesan['logamberat'] = 2;
                // echo json_encode($data_pemesan);
                // die();
                $id = $this->GeneralModel->addPemesanan($data_pemesan);
                echo json_encode(['error' => false, 'data' => ['id' => $id]]);
            } else {
                // redirect(base_url('order'));
                echo "Session tidak ada atau tidak expired";
            }
        }
    }

    public function process_two_sampah()
    {
        if (!empty($this->session->userdata()['login'])) {
            $data = $this->input->post();
            $dataContent = $this->GeneralModel->getPesanan(['id_user' => $this->session->userdata('login')['id_user'], 'id_pesanan' => $data['id_pesanan']]);
            // echo $dataContent;
            // die();
            if (!empty($dataContent))
                if (!empty($_FILES['file_payment']['name'])) {
                    $s =  FileIO::upload('file_payment', 'payment', '');
                    if (!empty($s['filename'])) {
                        $data['file_payment'] = $s['filename'];
                        $data['status_pesanan'] = 2;
                        $this->GeneralModel->editPesanan($data);
                    } else {
                        throw new UserException('Gagal Upload, terjadi kesalahahn!!', UNAUTHORIZED_CODE);
                    }
                } else {
                    throw new UserException('Gagal, tidak melampirkan bukti bayar!!', UNAUTHORIZED_CODE);
                }

            // echo json_encode($pesanan);
            echo json_encode(array('error' => false, 'data' => $data));
        }
    }

    public function cart()
    {
        if (!empty($this->session->userdata()['pemesanan'])) {
            $id_ses = $this->session->userdata()['pemesanan']['id_ses'];
            $pesanan_anda =   $this->GeneralModel->getAllPesanan(['id_ses' =>  $id_ses]);
            // echo json_encode($pesanan_anda);
            // die();
            if (!empty($pesanan_anda))
                $data = [
                    'page' => '/pages/list_pesanan',
                    'dataContent' => [
                        'dataSes' => $pesanan_anda[$id_ses]
                    ]
                ];
            else
                $data = [
                    'page' => '/pages/error',
                    'dataContent' => [
                        'message' => "Maaf anda belum memiliki pesanan! klik tombol dibawah untuk melakuka besanan.",
                        'button' => '<a href=' . base_url('order') . ' class="book-now text-center"><i class="icofont-double-left"></i>Buka Menu</a>'
                    ]
                ];
            $this->load->view('template/index', $data);
            // echo json_encode($pesanan_anda);
        } else {
            redirect(base_url());
        }
    }

    public function order_sampah()
    {
        $data = [
            'page' => 'customer/order_sampah',

        ];
        $this->load->view('template/index3', $data);
    }

    public function order_sampah_two($id)
    {
        $dataContent = $this->GeneralModel->getPesanan(['id_user' => $this->session->userdata('login')['id_user'], 'id_pesanan' => $id]);
        $refPayment = $this->GeneralModel->refPayment();
        if (!empty($dataContent[$id])) {
            $data = [
                'page' => 'customer/order_sampah2',
                'dataContent' => $dataContent[$id],
                'refPayment' => $refPayment

            ];
            // echo json_encode($data);
            // die();
            $this->load->view('template/index3', $data);
        }
    }
}
