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
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.domain.UsuarioModel;
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
public class UsuarioDAO {

    /**
     *
     * @param usuario
     * @return
     */
    public static String userRegister(UsuarioModel usuario){
        String json;
        
        json = "usuario="+usuario.getRa()
                + "&email="+usuario.getEmail()
                + "&nome="+usuario.getNome()
                + "&sobrenome="+usuario.getSobrenome();
        
        OkHttpClient client = new OkHttpClient().newBuilder()
        .build();
        MediaType mediaType = MediaType.parse("application/x-www-form-urlencoded");
        RequestBody body = RequestBody.create(mediaType, json);
        Request request = new Request.Builder()
            .url(Host.getHost()+"user/desktopRegister")
            .method("POST", body)
            .addHeader("Content-Type", "application/x-www-form-urlencoded")
            .addHeader("Cookie", "ci_session=9uvbl14k2llnmki5t71jijq5pb8v2pam")
            .build();
       
        try {
            
            Response response = client.newCall(request).execute();
            String jsonString = response.body().string();
            JSONObject jsonObject = new JSONObject(jsonString);
            return jsonObject.getString("error_type");
            
        } catch (IOException | JSONException ex) {
            Logger.getLogger(UsuarioDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
    /**
     *
     * @param where
     * @return
     */
    public static ArrayList<UsuarioModel> getUsers(String where){
        ArrayList<UsuarioModel> resultado = null;
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
                try {
            
            stmt = con.prepareStatement(
                    "SELECT * FROM usuario WHERE ra LIKE ?"
                            + "OR email LIKE ?"
                            + "OR nome LIKE ?"
                            + "OR sobrenome LIKE ?"
            );
            stmt.setString(1, "%"+where+"%");
            stmt.setString(2, "%"+where+"%");
            stmt.setString(3, "%"+where+"%");
            stmt.setString(4, "%"+where+"%");
            rs = stmt.executeQuery();
            if(rs.next()){
                resultado = new ArrayList();
                
                do {
                    UsuarioModel usuario = new UsuarioModel();
                    usuario.setId(rs.getInt("id"));
                    usuario.setRa(rs.getInt("ra"));
                    usuario.setEmail(rs.getString("email"));
                    usuario.setNome(rs.getString("nome"));
                    usuario.setSobrenome(rs.getString("sobrenome"));

                    resultado.add(usuario);
                }while(rs.next());
                return resultado;
            }
            
        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt, rs);
            
        }
        return null;
    }
    
    public static UsuarioModel getUser(int where){
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        try {
            
            stmt = con.prepareStatement("SELECT * FROM usuario WHERE ra = ?");
            stmt.setInt(1, where);
            stmt.setMaxRows(1);         
            rs = stmt.executeQuery();
            if(rs.next()){
                UsuarioModel usuario = new UsuarioModel();
                usuario.setId(rs.getInt("id"));
                usuario.setRa(rs.getInt("ra"));
                usuario.setEmail(rs.getString("email"));
                usuario.setNome(rs.getString("nome"));
                usuario.setSobrenome(rs.getString("sobrenome"));
                
                return usuario;
            }

        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt);
            
        }
        return null;
    }
    public static Boolean deleteUser(int where){
        UsuarioModel usuario = getUser(where);
        if(usuario == null) return false;
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try {
            
            stmt = con.prepareStatement("DELETE FROM usuario WHERE id = ?");
            stmt.setInt(1, usuario.getId());      
            stmt.execute();
            return true;

        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt);
            
        }
        return false;
    }

    public static Boolean updateUser(UsuarioModel usuario) {
        UsuarioModel userId = getUser(usuario.getRa());
        if(userId == null) return false;
        
        usuario.setId(userId.getId());
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try {
            
            stmt = con.prepareStatement("UPDATE usuario SET email=?, nome=?, sobrenome=? WHERE id=?");
            stmt.setString(1, usuario.getEmail());      
            stmt.setString(2, usuario.getNome());      
            stmt.setString(3, usuario.getSobrenome());      
            stmt.setInt(4, usuario.getId());      
            stmt.execute();
            return true;

        } catch (SQLException ex) {
            
            Logger.getLogger(AdminDAO.class.getName()).log(Level.SEVERE, null, ex);
            
        }finally{
            
            ConnectionFactory.closeConnection(con, stmt);
            
        }
        return false;
    }
}
