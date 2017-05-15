package com.example.carlos.smartcar.rutas;

import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ToggleButton;

import com.example.carlos.smartcar.R;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationServices;

/**
 * Created by Carlos on 26/04/2017.
 */

public class NuevaRuta extends AppCompatActivity implements GoogleApiClient.OnConnectionFailedListener,
        GoogleApiClient.ConnectionCallbacks{
    private static final String LOGTAG = "android-localizacion";

    private static final int PETICION_PERMISO_LOCALIZACION = 101;

    private GoogleApiClient apiClient;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nueva_ruta);
        ToggleButton toggle = (ToggleButton) findViewById(R.id.btnActualizar);
        apiClient = new GoogleApiClient.Builder(this)
                .enableAutoManage(this, this)
                .addConnectionCallbacks(this)
                .addApi(LocationServices.API)
                .build();

        Button b = (Button) findViewById(R.id.buttonNuevaRuta);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                EditText tvlat = (EditText) findViewById(R.id.editText6);
                EditText tvlong = (EditText) findViewById(R.id.editText5);
                EditText tvnom = (EditText) findViewById(R.id.editText4);
                TextView  lblLatitud = (TextView) findViewById(R.id.lblLatitut);
                TextView  lblLongitud = (TextView) findViewById(R.id.lblLongitud);

                Intent i = new Intent(getApplicationContext(), MapaNuevaRuta.class);
                if(tvlat.getText().toString().matches("") || tvlong.getText().toString().matches("") || tvnom.getText().toString().matches(""))
                {
                    i.putExtra("latitud", 0);
                    i.putExtra("longitud",  0);
                    i.putExtra("nombre", "default");
                    i.putExtra("origenx", Double.parseDouble(lblLatitud.getText().toString()));
                    i.putExtra("origeny", Double.parseDouble(lblLongitud.getText().toString()));
                    Toast toast = Toast.makeText(getApplicationContext(), "Introduce valores correctos", Toast.LENGTH_LONG);
                    toast.show();

                }
                else {
                    i.putExtra("latitud", Double.parseDouble(tvlat.getText().toString()));
                    i.putExtra("longitud", Double.parseDouble(tvlong.getText().toString()));
                    i.putExtra("nombre", tvnom.getText().toString());
                    i.putExtra("origenx", Double.parseDouble(lblLatitud.getText().toString()));
                    i.putExtra("origeny", Double.parseDouble(lblLongitud.getText().toString()));
                }
                startActivity(i);
            }
        });


        toggle.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View view){

                TextView tv1 = (TextView) findViewById(R.id.textView14);
                TextView tv2 = (TextView) findViewById(R.id.textView15);
                TextView  lblLatitud = (TextView) findViewById(R.id.lblLatitut);
                TextView  lblLongitud = (TextView) findViewById(R.id.lblLongitud);
                if(tv1.getVisibility() == View.INVISIBLE)
                {
                    tv1.setVisibility(View.VISIBLE);
                    tv2.setVisibility(View.VISIBLE);
                    lblLatitud.setVisibility(View.VISIBLE);
                    lblLongitud.setVisibility(View.VISIBLE);
                }
                else
                {
                    tv1.setVisibility(View.INVISIBLE);
                    tv2.setVisibility(View.INVISIBLE);
                    lblLatitud.setVisibility(View.INVISIBLE);
                    lblLongitud.setVisibility(View.INVISIBLE);
                }
            }
        });
    }
    private void updateUI(Location loc) {

        TextView tv3 = (TextView) findViewById(R.id.lblLatitut);
        TextView tv4 = (TextView) findViewById(R.id.lblLongitud);

        if (loc != null) {
            tv3.setText(String.valueOf(loc.getLatitude()));
            tv4.setText(String.valueOf(loc.getLongitude()));
        } else {
            tv3.setText("0");
            tv4.setText("0");
            Toast toast = Toast.makeText(getApplicationContext(), "Ubicación desconocida", Toast.LENGTH_LONG);
            toast.show();
        }
    }
    @Override
    public void onConnectionFailed(ConnectionResult result) {
        //Se ha producido un error que no se puede resolver automáticamente
        //y la conexión con los Google Play Services no se ha establecido.

        Log.e(LOGTAG, "Error grave al conectar con Google Play Services");
    }
    @Override
    public void onConnected(@Nullable Bundle bundle) {
        //Conectado correctamente a Google Play Services

        if (ActivityCompat.checkSelfPermission(this,
                android.Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {

            ActivityCompat.requestPermissions(this,
                    new String[]{android.Manifest.permission.ACCESS_FINE_LOCATION},
                    PETICION_PERMISO_LOCALIZACION);
        } else {

            Location lastLocation =
                    LocationServices.FusedLocationApi.getLastLocation(apiClient);

            updateUI(lastLocation);
        }
    }
    @Override
    public void onConnectionSuspended(int i) {
        //Se ha interrumpido la conexión con Google Play Services

        Log.e(LOGTAG, "Se ha interrumpido la conexión con Google Play Services");
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
        if (requestCode == PETICION_PERMISO_LOCALIZACION) {
            if (grantResults.length == 1
                    && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                //Permiso concedido

                @SuppressWarnings("MissingPermission")
                Location lastLocation =
                        LocationServices.FusedLocationApi.getLastLocation(apiClient);

                updateUI(lastLocation);

            } else {
                //Permiso denegado:
                //Deberíamos deshabilitar toda la funcionalidad relativa a la localización.

                Log.e(LOGTAG, "Permiso denegado");
            }
        }
    }
}
