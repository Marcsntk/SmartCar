package com.example.carlos.smartcar.settings_help;

import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import com.example.carlos.smartcar.R;

/**
 * Classe Quienesomos
 * Created by Carlos
 */
public class Quienesomos extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_quienesomos);
        setupActionBar();
        //Objeto WebView
        WebView myWebView = (WebView) findViewById(R.id.webview);
        WebSettings webSettings = myWebView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        myWebView.setWebViewClient(new WebViewClient());
        //Cargamos el URL de nuestro video en el WebView
        myWebView.loadUrl("https://www.youtube.com/watch?v=T3bxZic5r5Y");

    }

    /**
     * Método setupActionBar
     * Ajustes de la barra de acciones de la página
     */
    private void setupActionBar() {
        ActionBar actionBar = getSupportActionBar();
        if (actionBar != null) {
            // Muestra el botón de la flecha hacia atrás
            actionBar.setDisplayHomeAsUpEnabled(true);
        }
    }
}
