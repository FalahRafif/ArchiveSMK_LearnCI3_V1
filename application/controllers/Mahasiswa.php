<?php

class Mahasiswa extends CI_Controller{

    public function index(){

        //mengambil data mahasiswa dari model
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();
        
        //head
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		//content
		$this->load->view('mahasiswa', $data);
		//js

		//footer
		$this->load->view('templates/footer');
    }
    public function tambah_aksi(){

        //menangkap data post dari input mahasiswa
        $nama           = $this->input->post('nama');
        $nim            = $this->input->post('nim');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $jurusan        = $this->input->post('jurusan');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $no_telp        = $this->input->post('no_telp');
        //mengambil foto
        $foto           = $_FILES['foto'];
        if ( !isset($foto)){}else{
            $config['upload_path']      = './assets/foto'; //menaru file foto
            $config['allowed_types']    = 'jpg|png|gif'; //extension foto yg di bolehkan (extension selain foto juga bisa)

            //mengload library upload
            $this->load->library('upload', $config);
            //jika upload gagal
            if ( !$this->upload->do_upload('foto')){
                $this->session->set_flashdata('message',
                '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    foto gagal di tambahkan , ektension foto mungkin salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                '); 
                die();
            
            //jika berhasil
            }else{
                $foto = $this->upload->data('file_name');
            }
        }

        //memasukan data tersebut ke dalam array
        $data = [
            'nama'      =>$nama,
            'nim'       =>$nim,
            'tgl_lahir' =>$tgl_lahir,
            'jurusan'   =>$jurusan,
            'alamat'    =>$alamat,
            'email'     =>$email,
            'no_telp'   =>$no_telp,
            'foto'      =>$foto
        ];

        
        //mengirim ke modal untuk di proses
        $this->m_mahasiswa->input_data($data, 'tb_mahasiswa');
        $this->session->set_flashdata('message',
        '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('mahasiswa/index');

    }

    //menghapus mahasiswa
    public function hapus($id){
        $where = ['id' => $id];
        $this->m_mahasiswa->hapus_data($where, 'tb_mahasiswa');
        // $this->session->set_flashdata('message',
        // '
        // <div class="alert alert-danger alert-dismissible fade show" role="alert">
        //     Data Berhasil di hapus
        //     <button type="   button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //     </button>
        // </div>
        // ');
        redirect('mahasiswa/index');
    }  

    //memubuat edit
    public function edit($id){
        $where = ['id' =>$id];
        $data['mahasiswa'] = $this->m_mahasiswa->edit_data($where, 'tb_mahasiswa')->result();

       

        //head
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		//content
		$this->load->view('edit', $data);
		//js

		//footer
		$this->load->view('templates/footer');
    }

    public function update(){
        $id         = $this->input->post('id');
        $nama       = $this->input->post('nama');
        $nim        = $this->input->post('nim');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $jurusan    = $this->input->post('jurusan');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $no_telp    = $this->input->post('no_telp');

        //mengambil foto
        $foto           = $_FILES['fotonew'];

        //apakah tidak ada foto yg di kirim
        if($foto['error'] === 4 ){
            //jika ya maka pake foto yg lama
            $foto = $this->input->post('fotoold');
        //jika ada maka masukan ke dalam database
         }else{
            $config['upload_path']      = './assets/foto'; //menaru file foto
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; //extension foto yg di bolehkan (extension selain foto juga bisa)

            //mengload library upload
            $this->load->library('upload', $config);
            //jika upload gagal
            if ( !$this->upload->do_upload('fotonew')){
                $this->session->set_flashdata('message',
                '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error file yang di upload bukan ektension/foto foto . <br> ekstention yang di bolehkan JPG, JPEG, PNG, dan GIF
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                '); 
                redirect('mahasiswa/index');
            
            //jika berhasil
            }else{
                $foto = $this->upload->data('file_name');
            }
         }
        

        $data = [
            'nama'      =>$nama,
            'nim'       =>$nim,
            'tgl_lahir' =>$tgl_lahir,
            'jurusan'   =>$jurusan,
            'alamat'    =>$alamat,
            'email'     =>$email,
            'no_telp'   =>$no_telp,
            'foto'      =>$foto
        ];

        $where = ['id' => $id];

        $this->m_mahasiswa->update_data($where,$data,'tb_mahasiswa');
        $this->session->set_flashdata('message',
        '
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Data Berhasil di update
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('mahasiswa/index');
    }
    
    public function detail($id){
        $this->load->model('m_mahasiswa');
        $detail = $this->m_mahasiswa->detail_data($id);
        $data['detail'] = $detail;

        //head
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		//content
		$this->load->view('detail', $data);
		//js

		//footer
		$this->load->view('templates/footer');
    }

    //print data
    public function print(){
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data("tb_mahasiswa")->result();
        $this->load->view('print_mahasiswa', $data);
    }

    //export pdf
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data('tb_mahasiswa')->result();

        $this->load->view('laporan_pdf', $data);

        //menentukan ukuran kerta
        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        //convert ke pdf
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_mahsiswa.pdf", ['Attachment' =>0]);
    }


    public function excel()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data("tb_mahasiswa")->result();

        //memanggil file excel
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        //set informasi excel
        $object->getProperties()->setCreator("Falah Rafif Aiddi");
        $object->getProperties()->setLastModifiedBy("Falah Rafif Aiddi");
        $object->getProperties()->setTitle("Daftar Mahasiswa");
        //set sheet
        $object->setActiveSheetIndex(0);
        //mengubah data menjadi format excel
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NAMA MAHASISWA');
        $object->getActiveSheet()->setCellValue('C1', 'NIM');
        $object->getActiveSheet()->setCellValue('D1', 'TANGGAL LAHIR');
        $object->getActiveSheet()->setCellValue('E1', 'JURUSAN');
        $object->getActiveSheet()->setCellValue('F1', 'ALAMAT');
        $object->getActiveSheet()->setCellValue('G1', 'EMAIL');
        $object->getActiveSheet()->setCellValue('H1', 'NO. TELEPON');

        $baris = 2;
        $no = 1;

        //memasukan data table ke excel
        foreach($data['mahasiswa'] as $mhs) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $mhs->nama);
            $object->getActiveSheet()->setCellValue('C'.$baris, $mhs->nim);
            $object->getActiveSheet()->setCellValue('D'.$baris, $mhs->tgl_lahir);
            $object->getActiveSheet()->setCellValue('E'.$baris, $mhs->jurusan);
            $object->getActiveSheet()->setCellValue('F'.$baris, $mhs->alamat);
            $object->getActiveSheet()->setCellValue('G'.$baris, $mhs->email);
            $object->getActiveSheet()->setCellValue('H'.$baris, $mhs->no_telp);

            $baris++;
        }
        //nama output file
        $filename = "Data_Mahasiswa".'.xls';
        $object->getActiveSheet()->setTitle("Data Mahasiswa");
        ////////// 1 Didn't Work D:
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename="'.$filename.'"');
        // header('Cache-Control: max-age=0');
        ////////// 2 Didn't Work D:
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="$filename"');
        // header('Cache-Control: max-age=0');
        ////////// 3 Then That WORKING :D
        $objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');

        $objWriter->save('php://output');

        exit;
    }

    public function search()
    {   
        //mengambil data yang di input
        $keyword = $this->input->post('keyword');
        //mencari data sesuai yg di input
        $data['mahasiswa'] = $this->m_mahasiswa->get_keyword($keyword);

        //head
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		//content
		$this->load->view('mahasiswa', $data);
		//js

		//footer
		$this->load->view('templates/footer');
    }
}