package com.example.carlos.smartcar;

import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.net.Uri;
import android.os.Bundle;
import android.provider.OpenableColumns;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.example.carlos.smartcar.rutas.MisRutas;

/**
 * Created by Carlos on 03/05/2017.
*/

public class SelecArxiu  extends AppCompatActivity {

    private static final int ABRIRFICHERO_RESULT_CODE = 1;
    private Button b;
    private Intent intent;
    private TextView txtInfo;
    private static final int READ_REQUEST_CODE = 42;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_selec_arxiu);

        txtInfo = (TextView) findViewById(R.id.txtInfo);
        Button but = (Button) findViewById(R.id.btnAbrir);

        /**
         * Abrimos el gestor de ficheros del Android que utilice el dispositivo.
         */

        but.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(Intent.ACTION_OPEN_DOCUMENT);
                intent.addCategory(Intent.CATEGORY_OPENABLE);
                intent.setType("*/*");
                startActivityForResult(intent, READ_REQUEST_CODE);
            }
        });


        b = (Button) findViewById(R.id.btnIr);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(SelecArxiu.this, MisRutas.class));
            }
        });


    }

    /**
     * Se activa cuando seleccionamos un archivo en el gestor
     * @param requestCode
     * @param resultCode
     * @param resultData
     */

    @Override
    public void onActivityResult(int requestCode, int resultCode,
                                 Intent resultData) {
        /**
         * Dentro de este método lo que hacemos es coger el Uri que nos genera el selector
         * de archivos y extraer los datos que necesitamos como el Path, el nombre del fichero o
         * la extensión.
         */

        if (requestCode == READ_REQUEST_CODE && resultCode == Activity.RESULT_OK) {
            // The document selected by the user won't be returned in the intent.
            // Instead, a URI to that document will be contained in the return intent
            // provided to this method as a parameter.
            // Pull that URI using resultData.getData().
            Uri uri = null;
            if (resultData != null) {
                uri = resultData.getData();
                String path = uri.getPath().toString();
                TextView txtinfo = (TextView) findViewById(R.id.txtInfo);
                txtinfo.setText(path);
                String name = uri.getLastPathSegment().toString();
                Cursor returnCursor =
                        getContentResolver().query(uri, null, null, null, null);
                int extensionIndex = returnCursor.getColumnIndex(OpenableColumns.DISPLAY_NAME);
                int sizeIndex = returnCursor.getColumnIndex(OpenableColumns.SIZE);
                int nombreIndex = returnCursor.getColumnIndex(OpenableColumns.DISPLAY_NAME);
                returnCursor.moveToFirst();
                TextView txtmida = (TextView) findViewById(R.id.textView20);
                TextView txtnom = (TextView) findViewById(R.id.textView24);
                TextView txtextension = (TextView) findViewById(R.id.textView21);

                String nombre1 = returnCursor.getString(nombreIndex);
                String nombre = nombre1.substring(0, nombre1.lastIndexOf('.'));

                String extension1 = returnCursor.getString(extensionIndex);
                String extension = extension1.substring(extension1.lastIndexOf('.'), extension1.length());

                txtnom.setText(nombre);
                txtextension.setText(extension);
                txtmida.setText(Long.toString(returnCursor.getLong(sizeIndex))+ " bytes");

            }
        }
    }

}