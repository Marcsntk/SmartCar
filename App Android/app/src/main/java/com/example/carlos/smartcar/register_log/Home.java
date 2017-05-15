package com.example.carlos.smartcar.register_log;

/**
 * Created by Sylvermor on 26/01/2017.
 */

import android.app.Activity;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.example.carlos.smartcar.R;
import com.example.carlos.smartcar.utilities.CSVFile;
import com.example.carlos.smartcar.utilities.Encrypt;

import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.security.NoSuchAlgorithmException;
import java.util.List;

public class Home extends Activity{
    String name, password, email, Err;
    TextView nameTV, emailTV, passwordTV, err;
    Context ctx = this;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.logged);

        //Son las variables del layout.
        nameTV = (TextView) findViewById(R.id.home_name);
        emailTV = (TextView) findViewById(R.id.home_email);
        passwordTV = (TextView) findViewById(R.id.home_password);
        err = (TextView) findViewById(R.id.err);

        //Son las variables que recoje por el PhP, gracias al MainActivity.
        // Si se modifica, no funcionará bien (para esta DEMO).
        name = getIntent().getStringExtra("name");
        password = getIntent().getStringExtra("password");
        email = getIntent().getStringExtra("email");
        Err = getIntent().getStringExtra("err");

        //Declara las variables del layout acorde a las variables recogidas de la BBDD.
        nameTV.setText("Welcome "+name);
        passwordTV.setText("Your password is "+password);
        emailTV.setText("Your email is "+email);
        err.setText(Err);
    }

    static String convertStreamToString(java.io.InputStream is) {
        java.util.Scanner s = new java.util.Scanner(is).useDelimiter("\\A");
        return s.hasNext() ? s.next() : "";
    }

    public void upload_data(View v) throws NoSuchAlgorithmException {

        //Recuperamos información del fichero.
        InputStream inputStream = getResources().openRawResource(R.raw.tracklog);

        //Lee el archivo del Resources y separa cada fila
        String csvFile = convertStreamToString(inputStream);
        String[] information = csvFile.split("\n");

        for (int i = 1; i < information.length;i++){
            //Ejecuta la aplicación en segundo plano. Pasa por parametro el email.
            Home.BackGround b = new Home.BackGround();
            b.execute(email,information[i], String.valueOf(i));
        }
    }

    class BackGround extends AsyncTask<String, String, String> {

        @Override
        protected String doInBackground(String... params) {
            //El params[x] sale debido de los parametros que se hacen al llamar al metodo.
            //Fijate en el b.execute de arriba. Name > Password > Email, hence, 0 - 1 - 2.
            String email = params[0];
            String[] split = params[1].split(",");
            String row = params[2];

            String data="";
            int tmp;

            try {
                //Intenta contactar con la pagina que tiene los comandos de la BBDD.
                //En esta DEMO, es un DNS que redirige al PC de mi casa, que es el que administra
                //la BBDD, y donde estan las paginas PhP que facilitan todo el trabajo.
                URL url = new URL("https://smartcar.000webhostapp.com//PHP/insert.php");
                String urlParams =  "email=" + email + "&" +        //Email
                                    "gTime=" + split[0] + "&" +     //GPS Time
                                    "dTime=" + split[1] + "&" +     //Device Time
                                    "lon=" + split[2] + "&" +       //Longitude
                                    "lat=" + split[3] + "&" +       //Latitude
                                    "gSpeed=" + split[4] + "&" +    //GPS Speed
                                    "hds=" + split[5] + "&" +       //Horizontal Dilution of Precision
                                    "alt=" + split[6] + "&" +       //Altitude
                                    "bear=" + split[7] + "&" +      //Bearing
                                    "gX=" + split[8] + "&" +        //G(X)
                                    "gY=" + split[9] + "&" +        //G(Y)
                                    "gZ=" + split[10] + "&" +       //G(Z)
                                    "gC=" + split[11] + "&" +       //G(Calibrate)
                                    "tDist=" + split[12] + "&" +    //Trip Distance
                                    "tLitres=" + split[13] + "&" +  //Trip Litres per 100 KM
                                    "litres=" + split[14] + "&" +   //Litres per 100 KM
                                    "fuel=" + split[15] + "&" +     //Fuel Cost
                                    "temp=" + split[16] + "&" +     //Engine Temperature
                                    "speed=" + split[17] + "&" +    //SpeedOBD
                                    "row=" + row                    //Row of the file
                        ;

                //Aqui ya si que no tengo ni zorra.
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                httpURLConnection.setDoOutput(true);
                OutputStream os = httpURLConnection.getOutputStream();
                os.write(urlParams.getBytes());
                os.flush();
                os.close();
                InputStream is = httpURLConnection.getInputStream();
                while ((tmp = is.read()) != -1) {
                    data += (char) tmp;
                }
                is.close();
                httpURLConnection.disconnect();

                return data;

            } catch (MalformedURLException e) {
                e.printStackTrace();
                return "Exception: " + e.getMessage();
            } catch (IOException e) {
                e.printStackTrace();
                return "Exception: " + e.getMessage();
            }
        }

        @Override
        protected void onPostExecute(String s) {
            if(s.equals("")){
                s="Data saved successfully.";
            }
            Toast.makeText(ctx, s, Toast.LENGTH_LONG).show();
        }
    }
}