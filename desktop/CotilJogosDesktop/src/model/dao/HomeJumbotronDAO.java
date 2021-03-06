/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.domain.HomeJumbotronModel;

/**
 *
 * @author lgpc1
 */
public class HomeJumbotronDAO {
    
    public HomeJumbotronModel selectJumbotronData(){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        try {
            
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
            Logger.getLogger(HomeJumbotronDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{    
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
 
        return null;
    }
    
    public Boolean saveJumbotronData(HomeJumbotronModel jumbotronData){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try {
            stmt = con.prepareStatement("UPDATE jumbotron SET status = ?, titulo = ?, subtitulo = ?, texto = ?, textobotao = ? WHERE id = ?");
            stmt.setInt(1, jumbotronData.getStatus());
            stmt.setString(2, jumbotronData.getTitulo());
            stmt.setString(3, jumbotronData.getSubtitulo());
            stmt.setString(4, jumbotronData.getTexto());
            stmt.setString(5, jumbotronData.getTextoBotao());
            stmt.setInt(6, 1);
            
            stmt.executeUpdate();
            
            return true;
            
        } catch (SQLException ex) {
            Logger.getLogger(HomeJumbotronDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
        return false;
    }
}
