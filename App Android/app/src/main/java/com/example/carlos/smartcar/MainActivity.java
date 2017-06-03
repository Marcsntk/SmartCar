package com.example.carlos.smartcar;

import android.content.ClipData;
import android.content.ClipboardManager;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.Toast;

import com.example.carlos.smartcar.photography.MainFoto;
import com.example.carlos.smartcar.register_log.Login;
import com.example.carlos.smartcar.register_log.Register;
import com.example.carlos.smartcar.rutas.NuevaRuta;
import com.example.carlos.smartcar.settings_help.Ajustes;
import com.example.carlos.smartcar.settings_help.Comofuncionar;
import com.example.carlos.smartcar.settings_help.Quienesomos;

/**
 * Classe MainActivity
 * Created by Carlos
 */

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true); //Esta linea de codigo se utiliza para mostrar la flecha en el toolbar
        getSupportActionBar().setDisplayShowTitleEnabled(true); //Esta linea de codigo muestra el titulo en el toolbar

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        //Accion botón web
        Button b = (Button) findViewById(R.id.buttonWeb);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Uri uri = Uri.parse("https://smartcar.000webhostapp.com/");
                Intent in = new Intent(Intent.ACTION_VIEW, uri);
                startActivity(in);
            }
        });


        //Acciones boton flotante
        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this, NuevaRuta.class));
                Snackbar.make(view, "Creando nueva ruta", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    /**
     * Menú desplegable de opciones
     * @param item
     * @return
     */

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            startActivity(new Intent(MainActivity.this, Ajustes.class));
        }
        else if (id == R.id.salir)
        {
            finish();
        }
        else if (id == R.id.regist)
        {
            startActivity(new Intent(MainActivity.this, Register.class));
        }
        else if (id == R.id.login)
        {
            startActivity(new Intent(MainActivity.this, Login.class));
        }

        return super.onOptionsItemSelected(item);
    }

    /**
     * Menú desplegable lateral
     * @param item
     * @return boolean
     */

    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_camera) {
            startActivity(new Intent(MainActivity.this, Quienesomos.class));
        } else if (id == R.id.nav_gallery) {
            startActivity(new Intent(MainActivity.this, Comofuncionar.class));
        } else if (id == R.id.nav_slideshow) {
            //Opcion ayuda
            Toast toast1 = Toast.makeText(getApplicationContext(),
                    "Contacta con nosotros a través de acrcmsmartcar@gmail.com\n" +
                            "Correo copiado en el portapapeles", Toast.LENGTH_LONG);
                    toast1.show();
            //Copiar texto en el portapapeles
            ClipData clip = ClipData.newPlainText("acrcmsmartcar@gmail.com", "acrcmsmartcar@gmail.com");
            ClipboardManager clipboard = (ClipboardManager)this.getSystemService(CLIPBOARD_SERVICE);
            clipboard.setPrimaryClip(clip);
        } else if (id == R.id.nav_manage) {
            startActivity(new Intent(MainActivity.this, Ajustes.class));
        } else if (id == R.id.nav_share) {
            //Opcion Nueva ruta
            startActivity(new Intent(MainActivity.this, NuevaRuta.class));

        } else if (id == R.id.nav_photos) {
            startActivity(new Intent(MainActivity.this, MainFoto.class));
        } else if (id == R.id.nav_send) {
            startActivity(new Intent(MainActivity.this, SelecArxiu.class));
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

}
