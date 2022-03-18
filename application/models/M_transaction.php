<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_transaction extends CI_Model
{
    public function get_data()
    {
        $this->db->select('tbl_transaction.id,
        tbl_transaction.qty,
        tbl_transaction.total_price,
        tbl_transaction.propinsi,
        tbl_transaction.kabupaten,
        tbl_transaction.kecamatan,
        tbl_transaction.alamat,
        tbl_transaction.discount,
        tbl_transaction.tanggal,
        tbl_employe.employe_name,
        tbl_company.company_name,
        tbl_product.product_name,
        tbl_product.product_code,
        tbl_product.price');
        $this->db->from('tbl_transaction');
        $this->db->join('tbl_employe', 'tbl_employe.id=tbl_transaction.sales_id', 'left');
        $this->db->join('tbl_company', 'tbl_company.id=tbl_transaction.customer_id', 'left');
        $this->db->join('tbl_product', 'tbl_product.id=tbl_transaction.product_id', 'left');
        $query = $this->db->get();
        return $query;
    }

    public function get_transaction($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaction');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_product()
    {
        $this->db->distinct();
        $this->db->select('id');
        $this->db->select('product_name');
        $this->db->from('tbl_product');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_company()
    {
        $this->db->distinct();
        $this->db->select('id');
        $this->db->where('type', 1);
        $this->db->select('company_name');
        $this->db->from('tbl_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_employe()
    {
        $this->db->distinct();
        $this->db->select('id');
        $this->db->select('employe_name');
        $this->db->from('tbl_employe');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_keyword($keyword, $perpage, $start)
    {
        $this->db->select('tbl_transaction.id,
        tbl_transaction.qty,
        tbl_transaction.total_price,
        tbl_transaction.propinsi,
        tbl_transaction.kabupaten,
        tbl_transaction.kecamatan,
        tbl_transaction.alamat,
        tbl_transaction.discount,
        tbl_transaction.tanggal,
        tbl_employe.employe_name,
        tbl_company.company_name,
        tbl_product.product_name,
        tbl_product.product_code,
        tbl_product.price');
        $this->db->from('tbl_transaction');
        $this->db->join('tbl_employe', 'tbl_employe.id=tbl_transaction.sales_id', 'left');
        $this->db->join('tbl_company', 'tbl_company.id=tbl_transaction.customer_id', 'left');
        $this->db->join('tbl_product', 'tbl_product.id=tbl_transaction.product_id', 'left');
        $this->db->limit($perpage, $start);
        $this->db->like('employe_name', $keyword);
        $this->db->or_like('company_name', $keyword);
        $this->db->or_like('product_name', $keyword);
        $this->db->or_like('product_code', $keyword);
        return $this->db->get();
    }

    public function count_data()
    {
        $this->db->from('tbl_transaction');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }



    public function get_data_product($id)
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('tbl_product');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_stock($id)
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->where('product_id', $id);
        $this->db->from('tbl_stock');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_province()
    {
        $this->db->distinct();
        $this->db->select('id_prov');
        $this->db->select('provinsi');
        $this->db->from('tbl_wilayah');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_city()
    {
        $this->db->distinct();
        $this->db->select('id_kab');
        $this->db->select('kabupaten');
        $this->db->from('tbl_wilayah');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_kecamatan()
    {
        $this->db->distinct();
        $this->db->select('id_kec');
        $this->db->select('kecamatan');
        $this->db->from('tbl_wilayah');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_kelurahan()
    {
        $this->db->distinct();
        $this->db->select('kelurahan');
        $this->db->from('tbl_wilayah');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_province_name($id = '')
    {
        $this->db->select('provinsi');
        $this->db->from('tbl_wilayah');
        $this->db->where('id_prov', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_city_name($id = '')
    {
        $this->db->select('kabupaten');
        $this->db->from('tbl_wilayah');
        $this->db->where('id_kab', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_district_name($id = '')
    {
        $this->db->select('kecamatan');
        $this->db->from('tbl_wilayah');
        $this->db->where('id_kec', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
