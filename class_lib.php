<?php

abstract class info_umum
{
    protected $id_pemilik;
    protected $nama_pemilik;
    protected $alamat_pemilik;
    protected $berlakusampai;
    protected $telat;
    protected $nopol;
    protected $jenis;
    protected $swdkllj;
    protected $pkb;
    protected $finalpajak;
    public $denda_swdkllj_roda2 = 32000;
    public $denda_swdkllj_roda4 = 100000;

    abstract public function set_id_pemilik($value);
    abstract public function set_nopol($value);
    abstract public function set_jenis($value);
    abstract public function set_berlakusampai($value);
    abstract public function set_SWDKLLJ($value);
    abstract public function set_PKB($value);
    abstract public function set_file($value);
    abstract public function get_id_pemilik();
    abstract public function get_jenis();
    abstract public function get_berlakusampai();
    abstract public function get_PKB();
    abstract public function get_nopol();
    abstract public function get_SWDKLLJ();
    abstract public function get_file();

}

interface pajak
{
    public function show();
    public function pajak();
    public function info_pemilik($koneksi);
    public function hitung_telat();
}



class kendaraan extends info_umum implements pajak
{

    public function set_id_pemilik($value)
    {
        $this->id_pemilik=$value;
    }

    public function set_berlakusampai($value)
    {
        $this->berlakusampai=$value;
    }
    public function set_nopol($value)
    {
        $this->nopol=$value;
    }

    public function set_jenis($value)
    {
        $this->jenis=$value;
    }
    public function set_SWDKLLJ($value)
    {
        $this->swdkllj=$value;
    }
    public function set_PKB($value)
    {
        $this->pkb=$value;
    }
    public function set_file($value)
    {
        $this->pkb=$value;
    }
    
    public function get_id_pemilik()
    {
        return $this->id_pemilik;
    }
    public function get_jenis()
    {
        return $this->jenis;
    }
    
    public function get_berlakusampai()
    {
        return $this->berlakusampai;
    }
    public function get_nopol()
    {
        return $this->nopol;
    }
    public function get_PKB()
    {
        return $this->swdkllj;
    }
    public function get_SWDKLLJ()
    {
        return $this->pkb;
    }
    public function get_file()
    {
        return $this->pkb;
    }

    public function pajak()
    {
        $swdkllj = $this->swdkllj;
        $jenis = $this-> jenis;

        if ($jenis == "SEPEDA MOTOR")
        {
            $denda_swdkllj = $this -> denda_swdkllj_roda2;
        }

        if ($jenis == "MOBIL")
        {
            $denda_swdkllj = $this -> denda_swdkllj_roda4;
        }


        $pkb = $this->pkb;
        $telat = $this->telat;
        

        if($telat == 0)
        {
            $pajak = $swdkllj + $pkb;
        }

        else
        {
            $denda_pkb = ($pkb * (25/100) * ($telat/12));
            $pajak = round($swdkllj + $pkb + $denda_pkb + $denda_swdkllj,2) ;
        }
        $this->finalpajak = $pajak;
    
        return $pajak;            

    }


    public function info_pemilik($koneksi)
    {
        $value = $this->id_pemilik;
        $query = "select * from pemilik where `id_pemilik`='$value'";
        $sql = mysqli_query($koneksi, $query);
        while($row = mysqli_fetch_array($sql))
        {
            $nama_pemilik = $row['nama_pemilik'];
            $alamat_pemilik = $row['alamat_pemilik'];
        }
        $this->nama_pemilik = $nama_pemilik;
        $this->alamat_pemilik = $alamat_pemilik;
    }

    public function show()
    {
        echo "Nama Pemilik : " .$this->nama_pemilik ."<br>";
        echo "Alamat Pemilik : " .$this->alamat_pemilik ."<br>";
        echo "Masa Berlaku : " .$this->berlakusampai ."<br>";
        $this->hitung_telat();
        $telat = $this-> telat;
        echo "Telat : " .$telat ." Bulan <br>";

        echo "Jenis : " .$this->jenis ."<br>" ;
        echo "No Polisi : " .$this->nopol ."<br>";
        echo "Total Pajak : Rp." .$this->pajak();
      //  echo "Total Pajak : Rp." .$this->finalpajak;
        include 'koneksi.php';
        $this->simpan_ke_database($koneksi);
    }

    public function hitung_telat()
    {
        $berlakusampai = $this->berlakusampai;
	
        // Convert Ke Date Time
        $deadline = new DateTime($berlakusampai);
        $today = new DateTime();

        if ($deadline > $today)
        {
            $final = 0;
        }

        else
        {

        $diff = $today->diff($deadline);
        $tanggal = $diff->d;
        $bulan = $diff->m;
        $tahun = $diff->y;
        $default = 1;

        

        //echo $final;
        
        if ($tahun != 0)
        {
            $final = $tahun * 12 + $bulan;
        }

        if ($tahun == 0)
        { 
            if ($tanggal >= 2)
            {
            $final = $bulan + 1;
            }

            else
            {
                $final = $bulan;
            }
        }

        if ($tahun== 0 && $bulan == 0 && $tanggal >= 2)
        {
            $final = 1;
        }
    
        
    }

      $this->telat = $final;
    }

    public function simpan_ke_database($koneksi)
    {
        $nopol = $this->nopol;
        $id_pemilik = $this->id_pemilik;
        $berlakusampai = $this->berlakusampai;
        $jenis = $this->jenis;
        $swdkllj = $this->swdkllj;
        $pkb = $this->pkb;

        $finalpajak = $this->finalpajak;        

        $sql = mysqli_query($koneksi,"select * from kendaraan where `no_polisi_kendaraan`='$nopol'");
        $cek = mysqli_num_rows($sql);

        if($cek == 0)
        {

        $query_simpan = mysqli_query($koneksi,
        "insert into kendaraan
        set `no_polisi_kendaraan` = '$nopol',
        `id_pemilik`='$id_pemilik',
        `jenis_kendaraan`='$jenis',
        `berlakusampai_kendaraan`='$berlakusampai',
        `swdkllj_kendaraan` = '$swdkllj',
        `pkb_kendaraan` = '$pkb',
        `totalpajak_kendaraan` = '$finalpajak'
        
        ");
        }

        else
        {

           // echo "deklasrasi update";
            $query_update = mysqli_query($koneksi,
            "update `kendaraan` set `id_pemilik`='$id_pemilik',
            `jenis_kendaraan`='$jenis',
            `berlakusampai_kendaraan`='$berlakusampai',
            `swdkllj_kendaraan` = '$swdkllj',
            `pkb_kendaraan` = '$pkb',
            `totalpajak_kendaraan` = '$finalpajak'

            WHERE `no_polisi_kendaraan` = '$nopol'");
        }
    }


}

class info_umum_from_db
{
    public function tampil_pajak()
    {
        include 'koneksi.php';
        $sql = mysqli_query($koneksi,"select * from kendaraan where id_pemilik='1'");
        while ($arow = mysqli_fetch_array($sql)) {
            $array[]= $arow['totalpajak_kendaraan'];

            $value = implode(", ",$array);
        }
        return $value;
    }

    public function total_pajak()
    {
        $counttotal = $this -> tampil_pajak();
        //var_dump($counttotal);
        $final = explode (' ', $counttotal);
        return array_sum($final);
    }

}


?>  