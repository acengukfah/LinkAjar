package com.linkajar.biodatasiswa.activities;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import butterknife.BindView;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.linkajar.biodatasiswa.R;
import com.linkajar.biodatasiswa.database.Constant;
import com.linkajar.biodatasiswa.database.SiswaDatabase;
import com.linkajar.biodatasiswa.model.SiswaModel;

import java.util.ArrayList;
import java.util.List;

public class DetailActivity extends AppCompatActivity {
    TextView txtNama;
    TextView txtUmur;
    TextView txtJenisKelamin;
    TextView txtEmail;
    TextView txtNomor_hp;

    SiswaDatabase siswaDatabase;
    int id_siswa;
    Bundle bundle;
    String nama, umur, jenis_kelamin, email, nomor_hp;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);
        Toolbar tbDetailDokter = findViewById(R.id.toolbar);
        tbDetailDokter.setTitle("Detail Siswa");
        setSupportActionBar(tbDetailDokter);
        assert getSupportActionBar() != null;
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        txtNama = findViewById(R.id.txtNama);
        txtUmur = findViewById(R.id.txtUmur);
        txtJenisKelamin = findViewById(R.id.txtJenisKelamin);
        txtEmail = findViewById(R.id.txtEmail);
        txtNomor_hp = findViewById(R.id.txtNomor_hp);


        bundle = getIntent().getExtras();
        siswaDatabase = SiswaDatabase.createDatabase(this);

        if (bundle != null) {
            getDetail();
        }

//        Log.d("ADebugTag", "Value: " + txtNama.getText());

    }

    private void getDetail() {
        // mengambil data di dalam bundle
        id_siswa = bundle.getInt(Constant.KEY_ID_SISWA);
        nama = bundle.getString(Constant.nama_siswa);
        umur = bundle.getString(Constant.umur);
        jenis_kelamin = bundle.getString(Constant.jenis_kelamin);
        email = bundle.getString(Constant.email);
        nomor_hp = bundle.getString(Constant.nomor_hp);

        // Menampilkan ke layar
        txtNama.setText("Nama : " + nama);
        txtUmur.setText("Umur : " + umur);
        txtJenisKelamin.setText("Jenis Kelamin : " + jenis_kelamin);
        txtEmail.setText("Email : " + email);
        txtNomor_hp.setText("Nomor Handphone : " + nomor_hp);
    }

    public void openWA(View view) {
        String url = "http://wa.me/" + txtNomor_hp.getText();

        Uri webpage = Uri.parse(url);
        Intent intent = new Intent(Intent.ACTION_VIEW, webpage);

        if (intent.resolveActivity(getPackageManager()) != null){
            startActivity(intent);
        }else {
            Log.d("ImplicitIntents", "Can't Handle This");
        }
    }

    public void openEmail(View view) {
        Intent intent = new Intent(Intent.ACTION_SENDTO);
        intent.setData(Uri.parse("mailto:" + txtEmail.getText())); // only email apps should handle this
        if (intent.resolveActivity(getPackageManager()) != null) {
            startActivity(intent);
        }
    }
}