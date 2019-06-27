package com.example.user.godestination;

import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Calendar;

public class WeatherActivity extends AppCompatActivity {

    RelativeLayout layout;
    private TextView City, Forecast, Temp, Humidity, Pressure, Time;
    String name, weather_description;
    int temp,pressure,humidity;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_weather);

        City = (TextView) findViewById(R.id.city);
        Forecast = (TextView) findViewById(R.id.forecast);
        Temp = (TextView) findViewById(R.id.temp);
        Humidity = (TextView) findViewById(R.id.humidity);
        Pressure = (TextView) findViewById(R.id.pressure);
        layout = (RelativeLayout) findViewById(R.id.weather_layout);
        Time = (TextView) findViewById(R.id.time);

        Calendar calendar = Calendar.getInstance();
        SimpleDateFormat format = new SimpleDateFormat("HH:MM:SS");
        String HR = format.format(calendar.getTime());
        String time = "Current Time : " + HR;
        Time.setText(time);

        int hour = (HR.charAt(0) - '0') * 10 + (HR.charAt(1) - '0');
        if(hour >= 5 && hour <= 17)
            layout.setBackground(getResources().getDrawable(R.drawable.after_noon));
        else
            layout.setBackground(getResources().getDrawable(R.drawable.night));

        jsonTask jtask = new jsonTask();
        jtask.execute();
    }

    public class jsonTask extends AsyncTask<String, String, String> {

        HttpURLConnection httpURLConnection;
        BufferedReader bufferedReader;

        @Override
        protected String doInBackground(String... strings) {
            try {
                URL url = new URL("http://api.openweathermap.org/data/2.5/weather?q=Khulna,BD&appid=4c4ca8b659b3efb47ff4a2557cd8b325&units=metric\n");
                httpURLConnection = (HttpURLConnection) url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                bufferedReader = new BufferedReader(new InputStreamReader(inputStream));

                StringBuffer stringbuffer = new StringBuffer();
                String line = "";

                while((line = bufferedReader.readLine()) != null) {
                    stringbuffer.append(line);
                }

                String file = stringbuffer.toString();

                JSONObject fileobject = new JSONObject(file);
                JSONArray jsonArray = fileobject.getJSONArray("weather");
                JSONObject main = fileobject.getJSONObject("main");

                StringBuffer lastbuffer = new StringBuffer();

                temp = main.optInt("temp");
                pressure = main.optInt("pressure");
                humidity = main.optInt("humidity");

                JSONObject description = jsonArray.getJSONObject(0);
                weather_description = description.optString("description");

                name = fileobject.optString("name");

                return null;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            } catch (JSONException e) {
                e.printStackTrace();
            } finally {
                httpURLConnection.disconnect();
                try {
                    bufferedReader.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }

            return null;
        }

        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);

            City.setText(name);
            Forecast.setText(weather_description);
            Temp.setText(String.valueOf(temp));
            Humidity.setText(String.valueOf(humidity)+"%");
            Pressure.setText(String.valueOf(pressure));
        }
    }
}