package com.example.carlos.smartcar.rutas;

import android.os.Bundle;
import android.os.Parcelable;
import android.support.v7.app.AppCompatActivity;
import android.widget.ListView;

import com.example.carlos.smartcar.utilities.CSVFile;
import com.example.carlos.smartcar.utilities.ItemArrayAdapter;
import com.example.carlos.smartcar.R;

import java.io.File;
import java.io.InputStream;
import java.util.List;


public class MisRutas extends AppCompatActivity {
    private ListView listView;
    private ItemArrayAdapter itemArrayAdapter;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mis_rutas);
        listView = (ListView) findViewById(R.id.listView);
        itemArrayAdapter = new ItemArrayAdapter(getApplicationContext(), R.layout.item_layout);

        Parcelable state = listView.onSaveInstanceState();
        listView.setAdapter(itemArrayAdapter);
        listView.onRestoreInstanceState(state);
        InputStream inputStream = getResources().openRawResource(R.raw.tracklog);
        CSVFile csvFile = new CSVFile(inputStream);
        List<String[]> scoreList = csvFile.read();

        for(String[] scoreData:scoreList ) {
            itemArrayAdapter.add(scoreData);
        }
    }
}
