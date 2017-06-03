package com.example.carlos.smartcar.utilities;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.carlos.smartcar.R;

import java.util.ArrayList;
import java.util.List;

public class ItemArrayAdapter extends ArrayAdapter<String[]> {
	private List<String[]> scoreList = new ArrayList<String[]>();

    static class ItemViewHolder {
        TextView devicetime;
        TextView longitude;
        TextView latitude;
        TextView gpsspeed;
    }

    public ItemArrayAdapter(Context context, int textViewResourceId) {
        super(context, textViewResourceId);
    }

	@Override
	public void add(String[] object) {
		scoreList.add(object);
		super.add(object);
	}

    @Override
	public int getCount() {
		return this.scoreList.size();
	}

    @Override
	public String[] getItem(int index) {
		return this.scoreList.get(index);
	}

    @Override
	public View getView(int position, View convertView, ViewGroup parent) {
		View row = convertView;
        ItemViewHolder viewHolder;
		if (row == null) {
			LayoutInflater inflater = (LayoutInflater) this.getContext().
                    getSystemService(Context.LAYOUT_INFLATER_SERVICE);
			row = inflater.inflate(R.layout.item_layout, parent, false);
            viewHolder = new ItemViewHolder();
            viewHolder.devicetime = (TextView) row.findViewById(R.id.devicetime);
            viewHolder.longitude = (TextView) row.findViewById(R.id.longitude);
            viewHolder.latitude = (TextView) row.findViewById(R.id.latitude);
            viewHolder.gpsspeed = (TextView) row.findViewById(R.id.gpsspeed);

            row.setTag(viewHolder);
		} else {
            viewHolder = (ItemViewHolder)row.getTag();
        }
        String[] stat = getItem(position);
        viewHolder.devicetime.setText(stat[0]);
        viewHolder.longitude.setText(stat[1]);
        viewHolder.latitude.setText(stat[2]);
        viewHolder.gpsspeed.setText(stat[3]);

        return row;
	}
}
