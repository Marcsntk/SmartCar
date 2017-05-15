package com.example.carlos.smartcar.rutas;

import android.content.Intent;
import android.graphics.Color;
import android.location.Location;
import android.os.Bundle;
import android.support.v4.app.FragmentActivity;

import com.example.carlos.smartcar.R;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.Polyline;
import com.google.android.gms.maps.model.PolylineOptions;

import java.util.ArrayList;

import static android.R.attr.value;
import static com.example.carlos.smartcar.R.id.map;

public class MapaNuevaRuta extends FragmentActivity implements OnMapReadyCallback{

    private GoogleMap mMap;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mapa_nueva_ruta);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(map);
        mapFragment.getMapAsync(this);
    }

    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */


    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        Intent intent = getIntent();

        Double lat = intent.getDoubleExtra("latitud", 0);
        Double lon = intent.getDoubleExtra("longitud", 0);
        String nom = intent.getStringExtra("nombre");
        Double ox = intent.getDoubleExtra("origenx", 0);
        Double oy = intent.getDoubleExtra("origeny", 0);

        // Add a marker and move the camera
        LatLng DESTINO = new LatLng(lat, lon);
        Marker destino = mMap.addMarker(new MarkerOptions().position(DESTINO).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_AZURE)).draggable(true).title(nom));
        mMap.moveCamera(CameraUpdateFactory.newLatLng(DESTINO));
        PolylineOptions rectOptions = new PolylineOptions()
                .color(Color.parseColor("#3916D7"))
                .add(new LatLng(lat, lon))
                .add(new LatLng(ox, oy));

        // Get back the mutable Polyline
        Polyline polyline = mMap.addPolyline(rectOptions);
    }
}
