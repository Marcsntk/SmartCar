package com.example.carlos.smartcar;

/**
 * Created by Sylvermor on 26/01/2017.
 */

import android.app.Activity;
import android.os.Bundle;
import android.widget.TextView;

public class Home extends Activity{
    String name, password, email, Err;
    TextView nameTV, emailTV, passwordTV, err;

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
}