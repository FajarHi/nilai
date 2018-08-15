<?php 
 
class M_admin extends CI_Model
{
 
public function mapel_guru($id_kelas,$semester='')
{ 
return $this->db->query("SELECT * from guru a , mata_pelajaran b, kelas d
where b.id_kelas='$id_kelas' AND b.semester='$semester' AND (a.id_guru=b.id_guru) and (d.id_kelas=b.id_kelas)
group by b.id_mata_pelajaran");

}

public function siswa($value='')
{
return $this->db->query("SELECT * from siswa a ,kelas b where (a.kelas=b.id_kelas) group by a.id_siswa") ; 
}

public function nilai($id_kelas,$semester)
{
return $this->db->query("
SELECT * from 
nilai a ,kelas b,siswa c
WHERE (a.id_kelas='$id_kelas')
AND (a.semester='$semester')
AND (a.id_kelas=b.id_kelas) 
AND (a.id_siswa=c.id_siswa)
 ");
}

public function mapel()
{ 
return $this->db->query("SELECT * from guru a , mata_pelajaran b,  kelas d
where (b.id_guru=a.id_guru)  and (d.id_kelas=b.id_kelas)
group by b.id_mata_pelajaran");
}

public function siswa_data()
{
return $this->db->query("SELECT * from siswa a,kelas b where(a.kelas=b.id_kelas) GROUP BY a.id_siswa");
}


public function cari_siswa($kelas='',$semester='')
{
return $this->db->query("
SELECT * from 
nilai a,kelas b,siswa c 
where (a.id_kelas='$kelas')
AND   (a.semester='$semester')
AND   (a.id_siswa=c.id_siswa)
 group by a.id_siswa
 
  ");
}

public function raport($id_siswa,$semester)
{
return $this->db->query("
SELECT * from 
nilai a ,kelas b,siswa c,mata_pelajaran d
WHERE (a.id_siswa='$id_siswa')
AND (a.semester='$semester')  
AND (a.id_kelas=b.id_kelas) 
AND (a.id_mata_pelajaran=d.id_mata_pelajaran) 
AND (a.id_siswa=c.id_siswa) group by a.id_nilai");
}


public function rank()
{
 
}

public function cari_data_siswa($semester)
{ 
 return $this->db->query("SELECT * from siswa where semester='$semester'");
}



}