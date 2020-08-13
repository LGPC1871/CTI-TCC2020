/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import java.io.IOException;
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
import util.Host;


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
        .url(Host.getHost()+"home/desktopGetJumbotron")
        .method("POST", body)
        .addHeader("Content-Type", "application/x-www-form-urlencoded")
        .build();
        
        Response response = null;
        
        try {
            response = client.newCall(request).execute();   
            String jsonData = response.body().string();
            JSONObject jumbotronData = new JSONObject(jsonData);
            
<<<<<<< HEAD
            stmt = con.prepareStatement("SELECT * FROM jumbotron WHERE id = ?");
            stmt.setInt(1, 1);
            stmt.setMaxRows(1);
            rs = stmt.executeQuery();
        
            if(rs.first()){
                HomeJumbotronModel jumbotronData = new HomeJumbotronModel();
                jumbotronData.setId(rs.getInt("id"));
                jumbotronData.setStatus(rs.getInt("status"));
                jumbotronData.setTitulo(rs.getString("titulo"));
                jumbotronData.setSubtitulo(rs.getString("subtitulo"));
                jumbotronData.setTexto(rs.getString("texto"));
                jumbotronData.setTextoBotao(rs.getString("textobotao"));
              
                return jumbotronData;
            }
        } catch (SQLException ex) {
=======
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
>>>>>>> origin/desktop
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
            .url(Host.getHost()+"home/desktopSetJumbotron")
            .method("POST", body)
            .addHeader("Content-Type", "application/x-www-form-urlencoded")
            .build();
        
        try {
<<<<<<< HEAD
            stmt = con.prepareStatement("UPDATE jumbotron SET status = ?, titulo = ?, subtitulo = ?, texto = ?, textobotao = ? WHERE id = ?");
            stmt.setInt(1, jumbotronData.getStatus());
            stmt.setString(2, jumbotronData.getTitulo());
            stmt.setString(3, jumbotronData.getSubtitulo());
            stmt.setString(4, jumbotronData.getTexto());
            stmt.setString(5, jumbotronData.getTextoBotao());
            stmt.setInt(6, 1);
            
            stmt.executeUpdate();
            
=======
            Response response = client.newCall(request).execute();
>>>>>>> origin/desktop
            return true;
        } catch (IOException ex) {
            Logger.getLogger(HomeJumbotronDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return false;
    }
}
