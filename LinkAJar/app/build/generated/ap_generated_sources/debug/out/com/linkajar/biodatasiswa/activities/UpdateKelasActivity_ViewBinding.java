// Generated code from Butter Knife. Do not modify!
package com.linkajar.biodatasiswa.activities;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import androidx.annotation.CallSuper;
import androidx.annotation.UiThread;
import butterknife.Unbinder;
import butterknife.internal.DebouncingOnClickListener;
import butterknife.internal.Utils;
import com.linkajar.biodatasiswa.R;
import java.lang.IllegalStateException;
import java.lang.Override;

public class UpdateKelasActivity_ViewBinding implements Unbinder {
  private UpdateKelasActivity target;

  private View view7f08004c;

  @UiThread
  public UpdateKelasActivity_ViewBinding(UpdateKelasActivity target) {
    this(target, target.getWindow().getDecorView());
  }

  @UiThread
  public UpdateKelasActivity_ViewBinding(final UpdateKelasActivity target, View source) {
    this.target = target;

    View view;
    target.edtNamaKelas = Utils.findRequiredViewAsType(source, R.id.edtNamaKelas, "field 'edtNamaKelas'", EditText.class);
    target.edtNamaWali = Utils.findRequiredViewAsType(source, R.id.edtNamaWali, "field 'edtNamaWali'", EditText.class);
    view = Utils.findRequiredView(source, R.id.btnSimpan, "field 'btnSimpan' and method 'onViewClicked'");
    target.btnSimpan = Utils.castView(view, R.id.btnSimpan, "field 'btnSimpan'", Button.class);
    view7f08004c = view;
    view.setOnClickListener(new DebouncingOnClickListener() {
      @Override
      public void doClick(View p0) {
        target.onViewClicked();
      }
    });
  }

  @Override
  @CallSuper
  public void unbind() {
    UpdateKelasActivity target = this.target;
    if (target == null) throw new IllegalStateException("Bindings already cleared.");
    this.target = null;

    target.edtNamaKelas = null;
    target.edtNamaWali = null;
    target.btnSimpan = null;

    view7f08004c.setOnClickListener(null);
    view7f08004c = null;
  }
}
