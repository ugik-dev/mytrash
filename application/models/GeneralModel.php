<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GeneralModel extends CI_Model
{
    public function refPayment($filter = [], $by_id = true)
    {
        $this->db->select("*");

        $this->db->from('ref_payment as u');
        if (!empty($filter['id_ref_payment'])) $this->db->where('id_ref_payment', $filter['id_ref_payment']);
        $res = $this->db->get();
        if ($by_id) return DataStructure::keyValue($res->result_array(), 'id_ref_payment');
        return $res->result_array();
    }

    public function getPesanan($filter = [], $key = false)
    {
        $this->db->select("*");

        $this->db->from('pesanan as p');
        $this->db->join('user as u', 'p.id_user = u.id_user', 'LEFT');
        if (!empty($filter['id_user'])) $this->db->where('p.id_user', $filter['id_user']);
        if (!empty($filter['id_pesanan'])) $this->db->where('p.id_pesanan', $filter['id_pesanan']);
        // if (!empty($filter['id_ses'])) $this->db->where('id_ses', $filter['id_ses']);
        $res = $this->db->get();
        if ($key) return $res->result_array();
        return DataStructure::keyValue($res->result_array(), 'id_pesanan');
    }

    public function getAllPesanan($filter = [])
    {
        // die();
        $this->db->select("u.*, m.*, p.id_pesanan, p.id_menu, p.qyt, p.status_pesanan, harga_pesanan, nama_pesanan, waktu_pesanan, dapur_id, ud.nama as nama_dapur");
        $this->db->from('ses_pemesanan as u');
        $this->db->join('meja as m', 'm.id_meja = u.id_meja', 'LEFT');
        $this->db->join('pesanan as p', 'p.id_ses = u.id_ses', 'LEFT');
        $this->db->join('user as ud', 'ud.id_user = p.dapur_id', 'LEFT');
        // $this->db->join('menu as mn', 'p.id_menu = mn.id_menu');
        if (!empty($filter['token'])) $this->db->where('u.token', $filter['token']);
        if (!empty($filter['date'])) $this->db->where('DATE(u.waktu)', $filter['date']);
        if (!empty($filter['id_ses'])) $this->db->where('u.id_ses', $filter['id_ses']);
        $res = $this->db->get();
        // echo json_encode($res->result_array());
        // die();
        return DataStructure::groupByRecursive2(
            $res->result_array(),
            ['id_ses'],
            ['id_pesanan'],
            [
                ['id_ses', 'nama_pemesan', 'ip_address', 'mobile_type', 'id_meja', 'nama_meja', 'waktu', 'waktu_pembayaran', 'penerima', 'total_tagihan', 'sub_total', 'pajak', 'uang_diterima', 'ses_status'],
                ['id_pesanan', 'id_menu', 'qyt', 'status_pesanan', 'nama_pesanan', 'harga_pesanan', 'nama_dapur'],
            ],
            ['children']
        );
    }

    public function getAllPesanan2($filter = [], $key = false)
    {
        // echo (isset($filter['status']));
        // die();
        $this->db->select("u.*,ud.nama as nama_dapur,m.nama_meja, sum(qyt) as total_qyt,sum(qyt*harga) as total_harga");

        $this->db->from('ses_pemesanan as u');
        $this->db->join('meja as m', 'm.id_meja = u.id_meja', 'LEFT');
        $this->db->join('pesanan as p', 'p.id_ses = u.id_ses', 'LEFT');
        $this->db->join('user as ud', 'ud.id_user = p.dapur_id', 'LEFT');
        $this->db->join('menu as mn', 'p.id_menu = mn.id_menu', 'LEFT');
        $this->db->group_by('u.id_ses');
        if (!empty($filter['id_ses'])) $this->db->where('u.id_ses', $filter['id_ses']);
        if (isset($filter['status'])) {
            if ($filter['status'] == '0') $this->db->where('u.ses_status', '0');
            if ($filter['status'] == '1') $this->db->where('u.ses_status', '1');
        }
        if (!empty($filter['date_start'])) $this->db->where('u.waktu >= "' . $filter['date_start'] . ' 00:00:00"');
        if (!empty($filter['date_end'])) $this->db->where('u.waktu <= "' . $filter['date_end'] . ' 23:59:59"');
        if (!empty($filter['date'])) {
            $this->db->where('u.waktu >= "' . $filter['date'] . ' 00:00:00"');
            $this->db->where('u.waktu <= "' . $filter['date'] . ' 23:59:59"');
        }
        $res = $this->db->get();
        if ($key) return $res->result_array();
        else
            return DataStructure::keyValue($res->result_array(), 'id_ses');
    }


    public function addPemesanan($data)
    {

        $this->db->insert('pesanan', DataStructure::slice($data, [
            'nama_pemesan',  'id_user', 'longitude', 'latitude', 'est_berat', 'est_berat_rp', 'status_pesanan',
            'real_berat', 'real_berat_rp', 'jarak', 'jarak_rp', 'payment_id', 'jenis_layanan', 'organik', 'nonorganik', 'logamberat'

        ], TRUE));

        ExceptionHandler::handleDBError($this->db->error(), "Tambah", "Pesanan");
        $id_meja = $this->db->insert_id();
        return $id_meja;
    }
    public function editPesanan($data)
    {
        // echo 'ok';
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', DataStructure::slice($data, [
            'nama_pemesan',  'id_user', 'longitude', 'latitude', 'est_berat', 'est_berat_rp', 'status_pesanan',
            'real_berat', 'real_berat_rp', 'jarak', 'jarak_rp',
            'payment_method', 'payment_name', 'file_payment',
        ], TRUE));
        ExceptionHandler::handleDBError($this->db->error(), "edit", "Pesanan");

        // $id_meja = $this->db->insert_id();

        return $data['id_pesanan'];
    }
    public function pushPesanan($data)
    {
        // echo 'ok';
        foreach ($data as $d) {
            $this->db->insert('pesanan', $d);
        }
    }
}
