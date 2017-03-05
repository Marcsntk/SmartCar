package com.example.carlos.smartcar;

import android.app.Activity;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.security.NoSuchAlgorithmException;

/**
 * Created by Sylvermor on 26/01/2017.
 */

public class Register extends Activity {
    EditText name, password, email, cpassword, cemail;
    String Name, Password, Email, CPassword, CEmail;
    Context ctx=this;

    public Register() throws NoSuchAlgorithmException {
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register);

        //Asigna las variables del layout.
        name = (EditText) findViewById(R.id.register_name);
        password = (EditText) findViewById(R.id.register_password);
        cpassword = (EditText) findViewById(R.id.register_password_confirm);
        email = (EditText) findViewById(R.id.register_email);
        cemail = (EditText) findViewById(R.id.register_email_confirm);
    }

    public void register_register(View v) throws NoSuchAlgorithmException {

        //Recoge los datos de los textbox, y las asigna a variables. En caso del password,
        //la codifica al momento para evitar que nadie sepa la contraseña.
        Name = name.getText().toString();
        Password = Encrypt.encrypt(password.getText().toString());
        CPassword = Encrypt.encrypt(cpassword.getText().toString());
        Email = email.getText().toString();
        CEmail = cemail.getText().toString();
        BackGround b = new BackGround();
        b.execute(Name, Password, Email, CPassword, CEmail);
    }

    class BackGround extends AsyncTask<String, String, String> {

        @Override
        protected String doInBackground(String... params) {
            //El params[x] sale debido de los parametros que se hacen al llamar al metodo.
            //Fijate en el b.execute de arriba. Name > Password > Email, hence, 0 - 1 - 2.
            String name = params[0];
            String password = params[1];
            String email = params[2];
            String cpassword = params[3];
            String cemail = params[4];
            String data="";
            int tmp;

            if (!(email.equals(cemail)))

                return "Los correos electrónicos no coinciden";
            else if (!(password.equals(cpassword)))
                return "Las contraseñas no coinciden";
            else {
                try {
                    //Intenta contactar con la pagina que tiene los comandos de la BBDD.
                    //En esta DEMO, es un DNS que redirige al PC de mi casa, que es el que administra
                    //la BBDD, y donde estan las paginas PhP que facilitan todo el trabajo.
                    URL url = new URL("http://sylvermor.no-ip.org/app/register.php");
                    String urlParams = "name=" + name + "&password=" + password + "&email=" + email;

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
