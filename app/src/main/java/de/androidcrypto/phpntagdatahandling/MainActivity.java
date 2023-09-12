package de.androidcrypto.phpntagdatahandling;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.FormBody;
import okhttp3.Headers;
import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;
import okhttp3.ResponseBody;

public class MainActivity extends AppCompatActivity {

    Button sendHttpGet, sendHttpPost, createSampleFile;
    private com.google.android.material.textfield.TextInputEditText output;

    private final OkHttpClient httpClient = new OkHttpClient();

    String responseHeadersString;
    String responseBodyString;
    String urlFlutterCrypto = "";
    String sampleFileName = "test.md";
    Context appContext;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        output = findViewById(R.id.etOutput);
        sendHttpGet = findViewById(R.id.btnSendHttpGet);
        sendHttpPost = findViewById(R.id.btnSendHttpPost);
        createSampleFile = findViewById(R.id.btnCreateSampleFile);

        sendHttpGet.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                writeToUiAppend("sendHttpGet clicked");
                urlFlutterCrypto = "http://fluttercrypto.bplaced.net/apps/ntag/get_timestamp_sha.php?uid=01020304050607&mac=a60a107d";
                sendHttpGetAsync();
            }
        });

        sendHttpPost.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                writeToUiAppend("sendHttpPost clicked");
                appContext = view.getContext();
                urlFlutterCrypto = "http://fluttercrypto.bplaced.net/apps/ntag/get_timestamp_sha.php?uid=01020304050607&mac=a60a107d";
                try {
                    sendHttpPostAsyncFile();
                } catch (IOException e) {
                    writeToUiAppend("IOException: " + e.getMessage());
                    //throw new RuntimeException(e);
                }
            }
        });

        createSampleFile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                writeToUiAppend("createSampleFile clicked");
                String dataToWrite = "The lazy dog \njumps in the next line";
                FileWriter writer = null;
                try {
                    File file = new File(view.getContext().getFilesDir(), sampleFileName);
                    writer = new FileWriter(file);
                    writer.append(dataToWrite);
                    writer.flush();
                    writer.close();
                } catch (IOException e) {
                    e.printStackTrace();
                    writeToUiAppend("ERROR: " + e.toString());
                    return;
                }
                writeToUiAppend("SUCCESS on creating a sample file");
            }
        });

    }

    private void sendHttpPostAsyncFile() throws IOException {
        System.out.println("sendHttpPostAsyncFile started");
        final MediaType MEDIA_TYPE_MARKDOWN = MediaType.parse("text/x-markdown; charset=utf-8");

        //  private final OkHttpClient client = new OkHttpClient();

        Thread thread = new Thread(new Runnable() {

            @Override
            public void run() {
                try {
                    System.out.println("thread run");
                    // Your code goes here
                    //File file = new File("README.md");
                    File file = new File(appContext.getFilesDir(), sampleFileName);

                    Request request = new Request.Builder()
                            //.url("https://api.github.com/markdown/raw")
                            .url(urlFlutterCrypto)
                            //.post(RequestBody.create(MEDIA_TYPE_MARKDOWN, file)) // deprecated
                            .post(RequestBody.create(file, MEDIA_TYPE_MARKDOWN))
                            .build();

                    try (Response response = httpClient.newCall(request).execute()) {
                        if (!response.isSuccessful())
                            throw new IOException("Unexpected code " + response);

                        responseBodyString = response.body().string();
                        System.out.println(responseBodyString);
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        thread.start();
    }


    private void sendHttpPostAsync() throws IOException {
        // form parameters
        RequestBody formBody = new FormBody.Builder()
                .add("username", "abc")
                .add("password", "123")
                .add("custom", "secret")
                .build();
        Request request = new Request.Builder()
                .url("https://httpbin.org/post")
                .addHeader("User-Agent", "OkHttp Bot")
                .post(formBody)
                .build();
        try (Response response = httpClient.newCall(request).execute()) {
            if (!response.isSuccessful()) throw new IOException("Unexpected code " + response);
            // Get response body
            System.out.println(response.body().string());
        }
    }


    private void sendHttpGetAsync() {
        Request request = new Request.Builder()
                //.url("https://httpbin.org/get")
                .url(urlFlutterCrypto)
                .addHeader("custom-key", "mkyong")  // add request headers
                .addHeader("User-Agent", "OkHttp Bot")
                .build();

        httpClient.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(Call call, IOException e) {
                e.printStackTrace();
            }

            @Override
            public void onResponse(Call call, Response response) throws IOException {
                try (ResponseBody responseBody = response.body()) {
                    if (!response.isSuccessful())
                        throw new IOException("Unexpected code " + response);

                    // Get response headers
                    Headers responseHeaders = response.headers();
                    for (int i = 0, size = responseHeaders.size(); i < size; i++) {
                        //System.out.println(responseHeaders.name(i) + ": " + responseHeaders.value(i));
                        responseHeadersString = responseHeaders.name(i) + ": " + responseHeaders.value(i);
                        writeToUiAppend("responseHeadersString:\n" + responseHeadersString);
                        System.out.println("responseHeadersString: " + responseHeadersString);
                    }

                    // Get response body
                    //System.out.println(responseBody.string());
                    responseBodyString = response.body().string();
                    System.out.println("responseBodyString: " + responseBodyString);
                    writeToUiAppend("responseBodyString:\n" + responseBodyString);
                }
            }
        });

    }

    private void writeToUiAppend(String message) {
        writeToUiAppend(output, message);
    }

    private void writeToUiAppend(TextView textView, String message) {
        runOnUiThread(() -> {
            if (textView == null) System.out.println("*** NULL ***");
            String oldString = textView.getText().toString();
            if (TextUtils.isEmpty(oldString)) {
                textView.setText(message);
            } else {
                String newString = message + "\n" + oldString;
                textView.setText(newString);
                System.out.println(message);
            }
        });
    }
}