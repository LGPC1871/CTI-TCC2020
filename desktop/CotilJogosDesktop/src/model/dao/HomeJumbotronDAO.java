/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.domain.HomeJumbotronModel;
import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;
import org.json.JSONException;
import org.json.JSONObject;


/**
 *
 * @author lgpc1
 */
public class HomeJumbotronDAO {
    
    public static HomeJumbotronModel getJumbotronData(){
        /*
        * Corpo da Requisição
        */
        OkHttpClient client = new OkHttpClient().newBuilder()
        .build();
        MediaType mediaType = MediaType.parse("application/x-www-form-urlencoded");
        RequestBody body = RequestBody.create(mediaType, "");
        Request request = new Request.Builder()
        .url("http://localhost:80/home/desktopGetJumbotron")
        .method("POST", body)
        .addHeader("Content-Type", "application/x-www-form-urlencoded")
        .build();
        
        Response response = null;
        
        try {
            response = client.newCall(request).execute();   
            String jsonData = response.body().string();
            JSONObject jumbotronData = new JSONObject(jsonData);
            
            HomeJumbotronModel jumbotron;
            jumbotron = new HomeJumbotronModel();
            
            jumbotron.setStatus(jumbotronData.getInt("status"));
            jumbotron.setTitulo(jumbotronData.getString("titulo"));
            jumbotron.setSubtitulo(jumbotronData.getString("subtitulo"));
            jumbotron.setTexto(jumbotronData.getString("texto"));
            jumbotron.setStatusBotao(jumbotronData.getInt("botaoStatus"));
            jumbotron.setTextoBotao(jumbotronData.getString("botao"));
            
            return jumbotron;
            
        } catch (IOException | JSONException ex) {
            Logger.getLogger(HomeJumbotronDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
    
    public static Boolean setJumbotron(HomeJumbotronModel jumbotron){
        String json;
        
        json = "status=" + jumbotron.getStatus();
        json += "&";
        json += "titulo=" + jumbotron.getTitulo();
        json += "&";
        json += "subtitulo=" + jumbotron.getSubtitulo();
        json += "&";
        json += "texto=" + jumbotron.getTexto();
        json += "&";
        json += "botao=" + jumbotron.getTextoBotao();
        json += "&";
        json += "botaoStatus=" + jumbotron.getStatusBotao();
        
        OkHttpClient client = new OkHttpClient().newBuilder()
            .build();
        MediaType mediaType = MediaType.parse("application/x-www-form-urlencoded");
        RequestBody body = RequestBody.create(mediaType, json);
        Request request = new Request.Builder()
            .url("http://localhost:80/home/desktopSetJumbotron")
            .method("POST", body)
            .addHeader("Content-Type", "application/x-www-form-urlencoded")
            .build();
        
        try {
            Response response = client.newCall(request).execute();
            return true;
        } catch (IOException ex) {
            Logger.getLogger(HomeJumbotronDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return false;
    }
}
