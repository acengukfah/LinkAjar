// Generated code from Butter Knife. Do not modify!
package com.linkajar.biodatasiswa.activities;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import androidx.annotation.CallSuper;
import androidx.annotation.UiThread;
import butterknife.Unbinder;
import butterknife.internal.DebouncingOnClickListener;
import butterknife.internal.Utils;
import com.linkajar.biodatasiswa.R;
import java.lang.IllegalStateException;
import java.lang.Override;

public class TambahSiswaActivity_ViewBinding implements Unbinder {
  private TambahSiswaActivity target;

  private View view7f0800e7;

  private View view7f0800e8;

  private View view7f08004c;

  @UiThread
  public TambahSiswaActivity_ViewBinding(TambahSiswaActivity target) {
    this(target, target.getWindow().getDecorView());
  }

  @UiThread
  public TambahSiswaActivity_ViewBinding(final TambahSiswaActivity target, View source) {
    this.target = target;

    View view;
    target.edtNamaSiswa = Utils.findRequiredViewAsType(source, R.id.edtNamaSiswa, "field 'edtNamaSiswa'", EditText.class);
    target.edtUmur = Utils.findRequiredViewAsType(source, R.id.edtUmur, "field 'edtUmur'", EditText.class);
    view = Utils.findRequiredView(source, R.id.radio_laki, "field 'radioLaki' and method 'onViewClicked'");
    target.radioLaki = Utils.castView(view, R.id.radio_laki, "field 'radioLaki'", RadioButton.class);
    view7f0800e7 = view;
    view.setOnClickListener(new DebouncingOnClickListener() {
      @Override
      public void doClick(View p0) {
        target.onViewClicked(p0);
      }
    });
    view = Utils.findRequiredView(source, R.id.radio_perempuan, "field 'radioPerempuan' and method 'onViewClicked'");
    target.radioPerempuan = Utils.castView(view, R.id.radio_perempuan, "field 'radioPerempuan'", RadioButton.class);
    view7f0800e8 = view;
    view.setOnClickListener(new DebouncingOnClickListener() {
      @Override
      public void doClick(View p0) {
        target.onViewClicked(p0);
      }
    });
    target.edtAsal = Utils.findRequiredViewAsType(source, R.id.edtAsal, "field 'edtAsal'", EditText.class);
    target.edtEmail = Utils.findRequiredViewAsType(source, R.id.edtEmail, "field 'edtEmail'", EditText.class);
    target.edtPhone = Utils.findRequiredViewAsType(source, R.id.edtPhone, "field 'edtPhone'", EditText.class);
    view = Utils.findRequiredView(source, R.id.btnSimpan, "field 'btnSimpan' and method 'onViewClicked'");
    target.btnSimpan = Utils.castView(view, R.id.btnSimpan, "field 'btnSimpan'", Button.class);
    view7f08004c = view;
    view.setOnClickListener(new DebouncingOnClickListener() {
      @Override
      public void doClick(View p0) {
        target.onViewClicked();
      }
    });
    target.radioJenisKelaminGroup = Utils.findRequiredViewAsType(source, R.id.radio_jenis_kelamin, "field 'radioJenisKelaminGroup'", RadioGroup.class);
  }

  @Override
  @CallSuper
  public void unbind() {
    TambahSiswaActivity target = this.target;
    if (target == null) throw new IllegalStateException("Bindings already cleared.");
    this.target = null;

    target.edtNamaSiswa = null;
    target.edtUmur = null;
    target.radioLaki = null;
    target.radioPerempuan = null;
    target.edtAsal = null;
    target.edtEmail = null;
    target.edtPhone = null;
    target.btnSimpan = null;
    target.radioJenisKelaminGroup = null;

    view7f0800e7.setOnClickListener(null);
    view7f0800e7 = null;
    view7f0800e8.setOnClickListener(null);
    view7f0800e8 = null;
    view7f08004c.setOnClickListener(null);
    view7f08004c = null;
  }
}
