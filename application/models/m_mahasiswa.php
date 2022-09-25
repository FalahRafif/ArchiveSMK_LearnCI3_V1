<?php

class m_mahasiswa extends CI_model {

    //mengambil data dari database
    public function tampil_data(){

        //memanggil data dari tabel mahasiswa
        return $this->db->get('tb_mahasiswa');
    }
 
    //mengirim data ke database
    public function input_data($data, $table){
        $this->db->insert($table, $data);
    }

    //menghapus data mahasiswa
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //edit data
    public function edit_data($where, $table)
    {
        //mengambil data sesuai id
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table){
        //mengupdate data 
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_data($id = NULL){
        //mencari data sesuai id nya
        $query = $this->db->get_where('tb_mahasiswa', ['id' => $id])->row();
        return $query;
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*'); //memanggil seluruh data
        $this->db->from('tb_mahasiswa'); //dari tabel
        //yang mirip seperti
        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('tgl_lahir', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('no_telp', $keyword);

        //mengembalika hasil query
        return $this->db->get()->result();
        
        

    }
}