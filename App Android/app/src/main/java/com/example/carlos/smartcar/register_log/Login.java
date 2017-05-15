package com.example.carlos.smartcar.register_log;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.example.carlos.smartcar.utilities.Encrypt;
import com.example.carlos.smartcar.R;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.security.NoSuchAlgorithmException;

public class Login extends AppCompatActivity {

    EditText email, password;
    String Email, Password;
    Context ctx=this;
    String NAME=null, PASSWORD=null, EMAIL=null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        //Asigna las variables del layout.
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mainlogin);
        email = (EditText) findViewById(R.id.main_name);
        password = (EditText) findViewById(R.id.main_password);
    }

    public void main_register(View v){
        startActivity(new Intent(this,Register.class));
    }

    public void main_login(View v) throws NoSuchAlgorithmException {

        //Recoge los datos de los textbox, y las asigna a variables. En caso del password,
        //la codifica al momento para evitar que nadie sepa la contraseña.
        Email = email.getText().toString();
        Password = Encrypt.encrypt(password.getText().toString());
        BackGround b = new BackGround();
        b.execute(Email, Password);
    }

    class BackGround extends AsyncTask<String, String, String> {

        @Override
        protected String doInBackground(String... params) {
            //El params[x] sale debido de los parametros que se hacen al llamar al metodo.
            //Fijate en el b.execute de arriba. Name > Password, hence, 0 - 1.
            String email = params[0];
            String password = params[1];
            String data="";
            int tmp;

            try {
                //Intenta contactar con la pagina que tiene los comandos de la BBDD.
                //En esta DEMO, es un DNS que redirige al PC de mi casa, que es el que administra
                //la BBDD, y donde estan las paginas PhP que facilitan todo el trabajo.
                URL url = new URL("https://smartcar.000webhostapp.com//PHP/login.php");
                String urlParams = "email="+email+"&password="+password;

                //Aqui ya si que no tengo ni zorra.
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                httpURLConnection.setDoOutput(true);
                OutputStream os = httpURLConnection.getOutputStream();
                os.write(urlParams.getBytes());
                os.flush();
                os.close();

                InputStream is = httpURLConnection.getInputStream();
                while((tmp=is.read())!=-1){
                    data+= (char)tmp;
                }

                is.close();
                httpURLConnection.disconnect();

                return data;
            } catch (MalformedURLException e) {
                e.printStackTrace();
                return "Exception: "+e.getMessage();
            } catch (IOException e) {
                e.printStackTrace();
                return "Exception: "+e.getMessage();
            }
        }

        @Override
        protected void onPostExecute(String s) {
            String err=null;
            try {
                //Coge el SELECT hecho por la peticion PhP, y las asigna a estas variables.
                JSONObject root = new JSONObject(s);
                JSONObject user_data = root.getJSONObject("usuario");
                NAME = user_data.getString("name");
                PASSWORD = user_data.getString("password");
                EMAIL = user_data.getString("email");
            } catch (JSONException e) {
                e.printStackTrace();

                //El JSONException no usa código de errores, así que hay que hacer uso
                //del metodo contains de la clase String.

                // Si los datos introducidos no son correctos
                if (e.toString().contains("Value [] at usuario"))
                    err = "ERROR: Los datos de ingreso no son correctos.";

                // Si es incapaz de contactar con la BBDD. El error que busca es completo.
                else if (e.toString().contains("Value Exception of type java.lang.String cannot be converted to JSONObject"))
                    err = "ERROR: No se ha podido contactar con la base de datos.";

                //Cualquier otra opción.
                else
                    err = e.toString();
            }

            //Intenta enviar por parametro estas variables para enviarselas a la clase Home.
            Intent i = new Intent(ctx, Home.class);
            i.putExtra("name", NAME);
            i.putExtra("password", PASSWORD);
            i.putExtra("email", EMAIL);
            i.putExtra("err", err);
            if (err == null)
                startActivity(i);
            else
                Toast.makeText(ctx, err, Toast.LENGTH_LONG).show();

        }
    }
}
