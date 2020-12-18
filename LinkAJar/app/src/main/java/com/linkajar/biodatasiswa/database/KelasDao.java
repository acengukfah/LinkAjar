package com.linkajar.biodatasiswa.database;

import androidx.room.Dao;
import androidx.room.Delete;
import androidx.room.Insert;
import androidx.room.Query;
import androidx.room.Update;

import com.linkajar.biodatasiswa.model.KelasModel;
import com.linkajar.biodatasiswa.model.SiswaModel;

import java.util.List;


@Dao
public interface KelasDao {

    // Mengambil data
    @Query("SELECT * FROM KELAS ORDER BY nama_kelas ASC")
    List<KelasModel> select();

    // Memasukkan data
    @Insert
    void insert(KelasModel kelasModel);

    // Menghapus data
    @Delete
    void delete(KelasModel kelasModel);

    // Mengupdate data
    @Update
    void update(KelasModel kelasModel);

    // Mengambil data siswa
    @Query("SELECT * FROM TB_SISWA WHERE id_siswa = :id_siswa LIMIT 1")
    List<SiswaModel> detailSiswa(int id_siswa);

    // Mengambil detail siswa
    @Query("SELECT * FROM TB_SISWA WHERE id_kelas = :id_kelas ORDER BY nama_siswa ASC")
    List<SiswaModel> selectSiswa(int id_kelas);

    // Memasukkan data siswa
    @Insert
    void insertSiswa(SiswaModel siswaModel);

    // Menghapus data siswa
    @Delete
    void deleteSiswa(SiswaModel siswaModel);

    // Mengupdate data
    @Update
    void updateSiswa(SiswaModel siswaModel);
}
